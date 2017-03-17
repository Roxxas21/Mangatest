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

}


?>
