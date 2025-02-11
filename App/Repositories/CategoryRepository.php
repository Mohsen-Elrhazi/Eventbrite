<?php 

namespace App\Repositories;

use Config\Database;
use App\Models\Category;
use PDO;
use InvalidArgumentException;

class CategoryRepository extends BaseRepository {
    public function __construct(){
        $this->conn = Database::getConnection();
    }

    public function save(object $object) {
        if (!$object instanceof Category) {
            throw new InvalidArgumentException("L'objet doit être une instance de Category");
        }

        $stmt = $this->conn->prepare("INSERT INTO category (nom, description) VALUES (:nom, :description)");
        $stmt->execute([
            ':nom' => $object->getNom(),
            ':description' => $object->getDescription()
        ]);
    }


   // function afficher les categories
   public function display() {
    $stmt = $this->conn->prepare("SELECT * FROM category ORDER BY category_id ASC");
    $stmt->execute(); 
    $categories = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $data = [];

    foreach ($categories as $category) {
        $data[] = new Category($category['nom'], $category['description'], $category['category_id']);
    }
    return $data;
}


    // delete category
    public function delete($id) {
        $stmt = $this->conn->prepare("DELETE FROM category WHERE category_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        return $stmt->execute(); 
    }
    

    // function edit category
    public function edit(object $object) {
        if ($object instanceof Category) {
            $stmt = $this->conn->prepare("UPDATE category SET nom = :nom, description = :description WHERE category_id = :id");
    
            $success = $stmt->execute([
                ':nom' => $object->getNom(), 
                ':description' => $object->getDescription(),
                ':id' => $object->getCategoryId()
            ]);
    
            return $success; 
        } else {
            throw new InvalidArgumentException("L'objet passé n'est pas une instance de Category.");
        }
    }
    

    // function trouver un objet par son id
    public function findById($id) {
        $stmt = $this->conn->prepare("SELECT * FROM category WHERE category_id = :id");
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        
        $category = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if ($category) {
            return new Category($category['nom'], $category['description'], $category['category_id']);
        }
        
        return null; 
    }
    
}