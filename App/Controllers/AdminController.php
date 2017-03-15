<?php
namespace App\Controllers;
use App\Core\Controller;


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
    $this->view('Admin/home',[
      'title' => 'Admin Panel',
      'manga' => $data
    ]);
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
    }

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
        'title' => 'Edit Manga',
        'manga' => $manga
      ]);
    }
  }

}

?>
