<?php

namespace App\Models;
use App\Core\Database;
use \PDO;

class Mangas extends Database
{
  public $id;
  public $name;
  public $slug;
  public $genre;
  public $synopsis;
  public $cover;
  public $chapter;
  public $totalChapter;

  public function find($id)
  {
    $sql = "SELECT * FROM manga WHERE id = '$id'";
    $query = $this->db->query($sql);
    $result = $query->fetch(PDO::FETCH_OBJ);

    if(empty((array)$result)){
      return false;
    }

    $this->id = $result->id;
    $this->name = $result->name;
    $this->slug = $result->slug;
    $this->genre = $result->genre;
    $this->rating = $result->rating;
    $this->synopsis = $result->synopsis;
  }

  public function set($slug)
  {
    $sql = "SELECT * FROM manga WHERE slug = '$slug'";
    $query = $this->db->query($sql);
    $result =$query->fetch(PDO::FETCH_OBJ);
    if(empty((array)$result)){
      return false;
    }

    $this->id = $result->id;
    $this->name =$result->name;
    $this->slug =$result->slug;
    $this->genre =$result->genre;
    $this->rating =$result->rating;
    $this->synopsis =$result->synopsis;
    $this->cover =$result->cover;
    return true;
  }

  public function search($key)
  {
    $sql = "SELECT * FROM manga WHERE name LIKE '%$key%'";
    $query = $this->db->query($sql);
    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  public function getList($genre = null)
  {
    $sql = "SELECT id,name,slug,genre,synopsis FROM manga WHERE genre = '$genre'";

    if($genre == null){
      $sql = "SELECT id,name,slug,genre,synopsis FROM manga ORDER BY id ASC";
    }

    $query = $this->db->query($sql);
    $result = $query->fetchAll(PDO::FETCH_OBJ);
    return $result;
  }

  public function getTopManga()
  {
    $sql = "SELECT * FROM manga ORDER BY rating DESC LIMIT 5";
    $query = $this->db->query($sql);
    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  public function getRecomendManga()
  {
    $sql = "SELECT * FROM manga ORDER BY rand() DESC LIMIT 4";
    $query = $this->db->query($sql);
    return $query->fetchAll(PDO::FETCH_OBJ);
  }

  public function getCover($id)
  {
    $sql = "SELECT cover FROM manga WHERE id =$id";
    $query = $this->db->query($sql);
    $result = $query->fetch(PDO::FETCH_OBJ);
    $this->cover = $result->cover;
    return true;
  }

  public function reloadChapter()
  {
    $sql = "SELECT * FROM chapter where idManga = $this->id";
    $query = $this->db->query($sql);
    $result =$query->fetchAll(PDO::FETCH_OBJ);
    $this->totalChapter = count($result);
    $this->chapter = $result;
    return true;
  }

  public function input()
  {
    $sql = "INSERT INTO manga (name,slug,genre,rating,synopsis,cover) VALUES
    ('$this->name','$this->slug','$this->genre',$this->rating,'$this->synopsis',load_file('$this->cover'))";
    $this->db->exec($sql);
    return ;
  }

  public function update()
  {
    $sql = "UPDATE manga SET name = '$this->name', genre = '$this->genre',rating = $this->rating,synopsis = '$this->synopsis' where id = $this->id";
    $query = $this->db->exec($sql);
    return true;
  }


  public function delete()
  {
    $sql = "DELETE FROM manga WHERE id = $this->id";
    $query = $this->db->exec($sql);
    return true;
  }

}

?>
