<?php
namespace App\Repositories;

use App\Models\Event;
use PDO;

class EventRepository extends BaseRepository
{
    public function display()
    {
        $stmt = $this->conn->query("SELECT * FROM events");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function save($event)
    {
        $stmt = $this->conn->prepare("INSERT INTO events (titre, description, event_date, heure_debut, heure_fin, prix, image, content_url, category_id) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)");
       $stmt->execute([
            $event->getTitre(),
            $event->getDescription(),
            $event->getEventDate(),
            $event->getHeureDebut(),
            $event->getHeureFin(),
            $event->getPrix(),
            $event->getImage(),
            $event->getContentUrl(),
            $event->getCategoryId()
        ]);

        $eventID= $this->conn->lastInsertId();   
        return $eventID;
    }

       // Méthode pour sauvegarder les tags
       public function saveTags(int $eventID, array $tagsID) {
        try{
            $stmt = $this->conn->prepare("INSERT INTO event_tag (event_id, tag_id) VALUES (:event_id, :tag_id)");
            foreach ($tagsID as $tagID) {
                $stmt->execute([
                    ':event_id' => $eventID,
                    ':tag_id' => $tagID,
                ]);
            }
        }catch(PDOException $e){
        die("erreur d'insertion des tags: ".$e->getMessage());
    }
}

// public function saveTags(int $eventID) {
//     try{
//         $stmt = $this->conn->prepare("INSERT INTO event_tag (event_id) VALUES (:event_id)");
//             $stmt->execute([
//                 ':event_id' => $eventID,
//             ]);
//     }catch(PDOException $e){
//     die("erreur d'insertion des tags: ".$e->getMessage());
// }
// }

    public function edit($event)
    {
        $stmt = $this->conn->prepare("UPDATE events SET titre = ?, description = ?, event_date = ?, heure_debut = ?, heure_fin = ?, prix = ?, image = ?, content_url = ?, category_id = ? WHERE event_id = ?");
        return $stmt->execute([
            $event->getTitre(),
            $event->getDescription(),
            $event->getEventDate(),
            $event->getHeureDebut(),
            $event->getHeureFin(),
            $event->getPrix(),
            $event->getImage(),
            $event->getContentUrl(),
            $event->getCategoryId(),
            $event->getId()
        ]);
    }

    public function delete($id)
    {
        $stmt = $this->conn->prepare("DELETE FROM events WHERE event_id = ?");
        return $stmt->execute([$id]);
    }

    public function findByID($id)
    {
        $stmt = $this->conn->prepare("SELECT * FROM events WHERE event_id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
}