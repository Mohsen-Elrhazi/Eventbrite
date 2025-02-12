<?php

namespace App\Repositories;

use App\Models\User;
use Config\Database;
use PDO;

class UserRepository
{
    private $conn;

    public function __construct()
    {
        $this->conn = Database::getConnection();
    }

    public function save(User $user): void
    {
        $stmt = $this->conn->prepare("INSERT INTO users(nom, prenom, image, email, password,role ,status) VALUES(:nom, :prenom, :image, :email, :password, :role,:status)");
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

    public function findByEmail($email): bool
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->rowCount() > 0;
    }

    public function getUserByEmail($email)
    {
        $stmt = $this->conn->prepare("SELECT * FROM users WHERE email = :email");
        $stmt->execute([
            ':email' => $email
        ]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function display()
    {
        $stmt = $this->conn->prepare("SELECT * FROM users where role='Organisateur' ORDER BY user_id ASC");
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = [];

        foreach ($users as $user) {
            $data[] = new User($user['nom'], $user['prenom'], $user['image'], $user["email"], $user["password"], $user["role"], $user["status"], $user["user_id"]);
        }
        return $data;
    }
    public function updateStatus($table,$columnID,$id){
        $stmt = $this->conn->prepare("UPDATE $table SET status = CASE WHEN status = 'Active' THEN 'Inactive' ELSE 'Active' END WHERE $columnID = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute();
    }
}
