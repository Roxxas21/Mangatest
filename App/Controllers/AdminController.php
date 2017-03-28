<?php
namespace App\Controllers;
use App\Core\Controller;
use ZipArchive;

class AdminController extends Controller
{
  public function __construct()
  {
    // adding helper
    $this->load('Config');
    session_start();
  }

  public function index()
  {
    if(!isset($_SESSION['user'])){
      header('Location: '.base_url().'admin/login');
      return;
    }

    header('Location: '.base_url().'admin/home');
    return ;
  }

  public function login()
  {
    if(!isset($_POST['login'])){
      $this->view('Admin/login');
      return ;
    }

    $user = $this->model('Users');

    $user->username = $_POST['username'];
    $user->password = $_POST['password'];

    if(!$user->isLogin()){
      $this->view('Admin/login');
      return ;
    }

    // adding session user
    $_SESSION['user'] = $user->username;
    header('Location: '.base_url().'admin/home');
    return ;
  }

  public function logout()
  {
    unset($_SESSION['user']);
    header('Location: '.base_url().'admin');
  }

  public function home()
  {
    if(!isset($_SESSION['user'])){
      header('Location: '.base_url().'admin');
      return ;
    }

    $manga = $this->model('Mangas');
    $data = $manga->getList();

    if(isset($_GET['cariManga'])){
      $manga = $this->model('Mangas');
      $data = $manga->search($_GET['cariManga']);
    }

    $this->view('Admin/home',[
      'title' => 'Admin Panel',
      'manga' => $data
    ]);

    return ;
  }
  public function input()
  {
    if(!isset($_SESSION['user'])){
      header('Location: '.base_url(),'admin');
      return;
    }

    if(!isset($_POST['inputManga'])){
      $this->view('Admin/inputManga',[
        'title' => 'Input Manga'
      ]);
      return ;
    }

    // input manga
    $manga = $this->model('Mangas');
    $manga->name = $_POST['name'];
    $manga->slug = str_replace(' ','-',$_POST['name']);
    $manga->genre = $_POST['genre'];
    $manga->rating = $_POST['rating'];
    $manga->synopsis = $_POST['synopsis'];

    // upload file cover
    $target = __DIR__ . "/../../public/assets/images/".$_FILES['cover']['name'];
    copy($_FILES['cover']['tmp_name'],$target);

    // upload berhasil;
    $manga->cover = $target;

    $manga->input();
    header('Location: '.base_url().'admin');
    return;
  }

  public function edit($id)
  {
    if(!isset($_SESSION['user'])){
      header('Location: '.base_url().'admin');
    }

    if(!isset($_POST['editManga'])){
      $manga = $this->model('Mangas');
      $manga->find($id);

      $this->view('Admin/editManga',[
        'title' => 'Edit Manga '.$manga->name,
        'manga' => $manga
      ]);
      return;
    }

    $manga = $this->model('Mangas');
    $manga->id = $id;
    $manga->name = $_POST['name'];
    $manga->synopsis = $_POST['synopsis'];
    $manga->genre = $_POST['genre'];
    $manga->rating = $_POST['rating'];
    $manga->update();

    header('Location: '.base_url().'admin');
    return ;
  }

  public function delete($id=null)
  {
    if($id !== null){
        $manga = $this->model('Mangas');
        $manga->id = $id;


        $chapter = $this->model('Chapters');
        $chapter->idManga = $manga->id;
        $chapter->getListId();

        $images = $this->model('Images');

        foreach ($chapter->id as $image) {
          $images->idChapter = $image->id;
          $images->delete();
        }

        $chapter->deleteFromManga();
        $manga->delete();
        header('Location: '.base_url().'admin');
        return ;
    }

    header('Location: '.base_url().'admin');
    return ;
  }

  public function manga($slug = null,$add = null)
  {
    if(!isset($_SESSION['user'])){
      header('Location: '.base_url().'admin');
      return ;
    }

      $manga = $this->model('Mangas');
      $manga->set($slug);
      $manga->reloadChapter();
      $this->view('Admin/chapter_tool',[
        'title'   => 'Edit manga chapter '.$manga->name,
        'manga'   => $manga,
        'chapter' => $manga->chapter
      ]);
      return ;
  }

  public function addChapter($slug)
  {
    if(!isset($_SESSION['user'])){
      header('Location: '.base_url().'admin');
    }

    $manga = $this->model('Mangas');
    $manga->set($slug);

    if(!isset($_POST['addChapter'])){
      $manga->set($slug);
        $this->view('Admin/add_chapter',[
          'title'   => 'Tambah chapter',
          'manga'   => $manga
        ]);
        return ;
    }

    $chapter = $this->model('Chapters');
    $chapter->idManga = $manga->id;
    $chapter->no = $_POST['noChapter'];
    $chapter->judul = $_POST['judulChapter'];
    $chapter->add();

    // save zip to images table
    // upload and extract zip
    $target = __DIR__. '/../../public/assets/images/';
    // upload file
    copy($_FILES['fileChapter']['tmp_name'],$target.$_FILES['fileChapter']['name']);
    // extract zip
    $zip = new ZipArchive;
    $zip->open($target.$_FILES['fileChapter']['name']);
    $zip->extractTo($target);
    unlink($target.$_FILES['fileChapter']['name']);
    $dir = scandir($target);

    $chapter->getId();

    // add images to database
    for ($i=2; $i < count($dir); $i++) {
        $image = $this->model('Images');
        $image->idChapter = $chapter->id;
        $image->image = $target.$dir[$i];
        $image->add();
        // delete the images
        unlink($target.$dir[$i]);
    }

    header('Location: '.base_url().'admin/manga/'.$manga->slug);
    return ;
  }

  public function deleteChapter($manga=null,$id=null)
  {
    if(!isset($id)){
      header('location: '.base_url().'admin/home');
      return ;
    }

    $chapter = $this->model('Chapters');
    $chapter->id = $id;

    // delete images where chapter exists in there.
    $image = $this->model('Images');
    $image->idChapter = $chapter->id;
    // delete from images table
    $image->delete();

    // delete from chapters table
    $chapter->delete();

    header('location: '.base_url().'admin/manga/'.$manga);
  }

}

?>
