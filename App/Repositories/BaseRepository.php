<?php
namespace App\Repositories;

use Config\Database;
use PDO;

abstract class BaseRepository{

protected $conn;

public function __construct(){
    $this->conn = Database::getConnection();
}

abstract public function save(object $object);
abstract public function edit(object $object);
abstract public function delete($id);
abstract public function display();
abstract public function findByID($id);

}

?>