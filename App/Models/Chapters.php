<?php

namespace App\Models;
use App\Core\Database;
use \PDO;

class Chapters extends Database
{
      public $id;
      public $idManga;
      public $no;
      public $judul;
      public $images;

      public function getId()
      {
        $sql = "SELECT id FROM chapter WHERE no = $this->no AND idManga = $this->idManga";
        $query = $this->db->query($sql);
        $result = $query->fetch(PDO::FETCH_OBJ);
        $this->id = $result->id;
        return ;
      }

      public function searchChapter($key)
      {
        $sql = "SELECT * FROM chapter WHERE no LIKE '%$key%' AND idManga = $this->idManga";
        $query = $this->db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
      }

      public function getReleases()
      {
        $sql = "SELECT manga.id as idManga, manga.name, manga.slug, manga.genre , manga.synopsis, chapter.id as idChapter, chapter.no, chapter.judul, chapter.rilis from manga,chapter where manga.id = chapter.idManga ORDER BY chapter.rilis DESC";

        $query = $this->db->query($sql);
        $result =$query->fetchAll(PDO::FETCH_OBJ);
        return $result;
      }

      public function getListImages()
      {
        $sql = "SELECT id FROM images WHERE idChapter = $this->id";
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

      public function isExists()
      {
        $sql = "SELECT * FROM chapter WHERE no = $this->no AND idManga = $this->idManga";
        $query = $this->db->query($sql);
        $result = $query->rowCount();
        if($result > 0){
          return true;
        }
        return false;
      }

      public function add()
      {
        $sql = "INSERT INTO chapter (idManga,no,judul) VALUES ($this->idManga,$this->no,'$this->judul')";
        $query = $this->db->exec($sql);
        return ;
      }

      public function getListId()
      {
        $sql = "SELECT id FROM chapter WHERE idManga = $this->idManga";
        $query = $this->db->query($sql);
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        $this->id = $result;
      }

      public function deleteFromManga()
      {
        $sql = "DELETE FROM chapter WHERE idManga = $this->idManga";
        $query = $this->db->exec($sql);
        return ;
      }

      public function delete()
      {
        $sql = "DELETE FROM chapter WHERE id = $this->id";
        $query = $this->db->exec($sql);
        return true;
      }
}

?>
