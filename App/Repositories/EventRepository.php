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
        return $stmt->execute([
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
    }

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
