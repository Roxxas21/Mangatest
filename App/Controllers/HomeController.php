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

			$manga = $this->model('Mangas');
			$topManga = $manga->getTopManga();

			$recomendManga = $manga->getRecomendManga();

      $this->view('Manga/home',[
        'title'     		=> 'Home',
        'releases'  		=> $releases,
				'topManga'			=> $topManga,
				'recomendManga'	=> $recomendManga
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

			if(isset($_GET['cariManga'])){
				$data = $manga->search($_GET['cariManga']);
			}

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
					'manga'     => $manga->name,
          'slug'      => $manga->slug,
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
				$chapter->idManga = $manga->id;
        $manga->chapter = $chapter->searchChapter($_GET['cariChapter'],$manga->id);
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
