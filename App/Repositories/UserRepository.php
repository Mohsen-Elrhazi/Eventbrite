<?php
namespace App\Repositories;

use App\Models\User;
use Config\Database;
use PDO; 

class UserRepository{
    private $conn;

    public function __construct(){
        $this->conn= Database::getConnection();
    }
    
    public function save(User $user):void{
        $stmt= $this->conn->prepare("INSERT INTO users(nom, prenom, image, email, password,role ,status) VALUES(:nom, :prenom, :image, :email, :password, :role,:status)");
        $stmt->execute([
            ':nom' => $user->getNom(),
            ':prenom' => $user->getPrenom(),
            ':image' => $user->getImage(),
            ':email' => $user->getEmail(),
            ':password' => $user->getPassword(),
            ':role' => $user->getRole(),
            ':status' => $user->getStatus()
        ]);
        
    }

    public function findByEmail($email):bool {
        $stmt= $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->rowCount() > 0;
    }

    public function getUserByEmail($email) {
        $stmt= $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}

?>


