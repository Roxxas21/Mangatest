<?php

namespace App\Models;

use \PDO;

class Chapters extends Mangas
{
      public $id;
      public $no;
      public $judul;
      public $images;

      public function getReleases()
      {
        $sql = "SELECT manga.id as idManga, manga.name, manga.slug, manga.genre , manga.synopsis, chapter.id as idChapter, chapter.no, chapter.judul, chapter.rilis from manga,chapter where manga.id = chapter.idManga ORDER BY chapter.rilis ASC";
        $query = $this->db->query($sql);
        $result =$query->fetchAll(PDO::FETCH_OBJ);
        return $result;
      }

      public function getListImages()
      {
        $sql = "SELECT id FROM images WHERE noChapter = $this->no";
        $query = $this->db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $this->images  = $result;
        return true;
      }

      public function getImage($id)
      {
        $sql = "SELECT image FROM images WHERE id = '$id'";
        $query = $this->db->query($sql);
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
      }
}

?>
