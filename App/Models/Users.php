<?php
namespace App\Models;
use App\Core\Database;

class Users extends Database
{
    public $username;
    public $password;

    public function getList()
    {
      $sql = 'SELECT * FROM users ORDER BY id';
      $query = $this->db->query($sql);
      $result = $query->fetchAll(PDO::FETCH_OBJ);
      return $result;
    }

    public function isLogin()
    {
      $sql = "SELECT * FROM users WHERE username = '$this->username' AND password = '$this->password'";
      $query = $this->db->query($sql);
      $result = $query->fetch();
      if (count($result) <= 1 ){
        return false;
      }
      return true;
    }
}

?>
