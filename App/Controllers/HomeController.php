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
        'releases' => $releases
      ]);
    }

    public function list($genre = null)
    {
      if($genre!==null){
        $manga = $this->model('Mangas');
        $data = $manga->getList($genre);
        $this->view('Manga/list',[
          'list' => $data
          ]);
        return ;
      }
      $manga = $this->model('Mangas');
      $data = $manga->getList();
      $this->view('Manga/list',[
        'list'  => $data
        ]);
    }
    public function image($id)
    {
      $chapter = $this->model('Chapters')->getImage($id);
      header('Content-type: image/jpeg');
      echo $chapter->image;
    }
    public function manga($mangaSlug,$chapterNo = null)
    {
      if($chapterNo !== null){
        // baca komik
        $chapter = $this->model('Chapters');
        $chapter->no = $chapterNo;

				if(!$chapter->isExists()){
					header('Location: '.base_url()."home/manga/$mangaSlug");
					return;
				}

				$chapter->getListImages();
				$this->view('Manga/chapter/read',[
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
      $this->view('Manga/info',[
        'manga' => $manga,
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
