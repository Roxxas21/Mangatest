<?php

namespace App\Controllers;

use App\Core\Controller;

class HomeController extends Controller
{

		public function __construct()
		{
			$this->load('Config');
		}

    public function index()
    {
      // halaman utama rilisan
      $chapter = $this->model('Chapters');

      $releases = $chapter->getReleases();

      $this->view('Manga/home',[
        'title'     => 'Home',
        'releases'  => $releases
      ]);
    }

    public function list($genre = null)
    {
      if($genre!==null){
        $manga = $this->model('Mangas');
        $data = $manga->getList($genre);
        $this->view('Manga/list',[
          'title' => 'List '.$genre,
          'list' => $data
          ]);
        return ;
      }
      $manga = $this->model('Mangas');
      $data = $manga->getList();
      $this->view('Manga/list',[
        'title' => 'Manga List',
        'list'  => $data
        ]);
    }
    public function image($id)
    {
      $chapter = $this->model('Chapters')->getImage($id);
      header('Content-type: image/jpeg');
      echo $chapter->image;
    }
    public function manga($mangaSlug=null,$chapterNo = null)
    {
      if($chapterNo !== null){
        // baca komik
				$manga = $this->model('Mangas');
				$manga->set($mangaSlug);
        $chapter = $this->model('Chapters');
				$chapter->no = $chapterNo;
				$chapter->idManga = $manga->id;

				if(!$chapter->isExists()){
					header('Location: '.base_url()."home/manga/$mangaSlug");
					return;
				}

				$chapter->getId();
				$chapter->getListImages();
				$this->view('Manga/chapter/read',[
          'title'     => $manga->name. ' - '.$chapter->no,
					'manga'     => $mangaSlug,
					'chapterNo' => $chapterNo,
					'image'     => $chapter->images
				]);
				return ;
      }

      
      // show manga info
      $manga = $this->model('Mangas');
      $manga->set($mangaSlug);
      $manga->reloadChapter();

      if(isset($_GET['cariChapter'])){
        $chapter = $this->model('Chapters');
        $manga->chapter = $chapter->searchChapter($_GET['cariChapter']);
      }


      $this->view('Manga/info',[
        'title'   => $manga->name,
        'manga'   => $manga,
        'chapter' => $manga->chapter
      ]);

}
    public function cover($id)
    {
      $manga = $this->model('Mangas');
      $manga->getCover($id);
      header('Content-type: image/jpeg');
      echo $manga->cover;
    }
}
?>
