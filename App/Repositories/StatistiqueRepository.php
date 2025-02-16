<?php 

namespace App\Repositories;
use Config\Database;
use PDO;


class StatistiqueRepository  {
    protected $conn;

    public function __construct(){
        $this->conn = Database::getConnection();
    }
    public function getOrganisateursCount(){
        $stmt=$this->conn->prepare("SELECT COUNT(*) FROM users WHERE role = 'Organisateur'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }
    public function getParticipantCount(){
        $stmt=$this->conn->prepare("SELECT COUNT(*) FROM users WHERE role = 'Participant'");
        $stmt->execute();
        return $stmt->fetchColumn();
    }

    
} 