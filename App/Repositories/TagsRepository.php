<?php 

namespace App\Repositories;

use App\Models\Tags;
use PDO;
use InvalidArgumentException;

class TagsRepository extends BaseRepository {
  
    public function save(object $object) {
        if (!$object instanceof Tags) {
            throw new InvalidArgumentException("L'objet doit être une instance de tags");
        }

        $stmt = $this->conn->prepare("INSERT INTO tags (nom) VALUES (:nom)");
        $stmt->execute([
            ':nom' => $object->getNom(),
        ]);
    }
   public function display() {
    $stmt = $this->conn->prepare("SELECT * FROM tags ORDER BY tag_id ASC");
    $stmt->execute(); 
    $Tags = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = [];

    foreach ($Tags as $Tag) {
        $data[] = new Tags($Tag['nom'],  $Tag['tag_id']);
    }
    return $data;
}
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM tags WHERE tag_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); 
    }
    public function edit(object $object) {
        if ($object instanceof Tags) {
            $stmt = $this->conn->prepare("UPDATE tags SET nom = :nom WHERE tag_id = :id");
    
            $success = $stmt->execute([
                ':nom' => $object->getNom(), 
                ':id' => $object->getTagId()
            ]);
    
            return $success; 
        } else {
            throw new InvalidArgumentException("L'objet passé n'est pas une instance de tags.");
        }
    }
    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM tags WHERE tag_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $tag = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($tag) {
            return new Tags($tag['nom'],  $tag['tag_id']);
        }
        return null; 
    }
    
}