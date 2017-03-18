<?php

namespace App\Models;
use App\Core\Database;
use \PDO;

class Images extends Database
{

  public $id;
  public $idChapter;
  public $image;

  public function add()
  {
    $sql = "INSERT INTO images (idChapter,image) VALUES ($this->idChapter,load_file('$this->image'))";
    $query = $this->db->exec($sql);
    return ;
  }

  public function delete()
  {
    $sql = "DELETE FROM images WHERE idChapter = $this->idChapter";
    $query = $this->db->exec($sql);
    return ;
  }

}


?>
