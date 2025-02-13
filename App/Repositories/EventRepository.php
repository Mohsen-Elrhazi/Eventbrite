<?php
namespace App\Repositories;

use App\Models\Event;
use Config\Database;
use InvalidArgumentException;
use PDO;

class EventRepository extends BaseRepository
{
    public function save(object $object)
    {
        if ($object instanceof Event) {
            $sql = "INSERT INTO events(titre, image, description, event_date, content_url, category_id)VALUES(:titre,:image, :description ,:event_date ,:content_url , :category_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':titre' => $object->getTitre(),
                ':image' => $object->getImage(),
                ':description' => $object->getDescription(),
                ':event_date' => $object->getEventDATE(),
                ':cotent_url' => $object->getContentURL(),
                ':category_id' => $object->getCategoryID()
            ]);
        } else {
            throw new InvalidArgumentException("Object passe n'est pas une instanse de event!");
        }
    }
    public function edit(object $object)
    {
        if ($object instanceof Event) {
            $sql = "INSERT INTO events(titre ,image ,description ,event_date ,content_url ,category_id)VALUES(:titre ,:image ,:description ,:event_date ,:content_url , :category_id)";
            $stmt = $this->conn->prepare($sql);
            $stmt->execute([
                ':titre' => $object->getTitre(),
                ':image' => $object->getImage(),
                ':description' => $object->getDescription(),
                ':event_date' => $object->getEventDATE(),
                ':cotent_url' => $object->getContentURL(),
                ':category_id' => $object->getCategoryID()
            ]);
        } else {
            throw new InvalidArgumentException("Object passe n'est pas une instanse de event!");
        }
    }
    public function delete($id)
    {
        $sql = "DELETE FROM events WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([
            ':id' => $id
        ]);
    }
    public function display()
    {
        $sql = "SELECT * FROM events";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);
        $data = [];
        foreach ($events as $event) {
            $data[] = new Event(
                $event['event_id'],
                $event['titre'],
                $event['description'],
                $event['event_date'],
                $event['image'],
                $event['content_url'],
                $event['category_id']
            );
        }
        return $data;
    }

    public function findByID($id)
    {
        $sql = "SELECT * FROM events WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute([':id' => $id]);
        $event = $stmt->fetch(PDO::FETCH_ASSOC);
        return new Event(
            $event['event_id'],
            $event['titre'],
            $event['description'],
            $event['event_date'],
            $event['image'],
            $event['content_url'],
            $event['category_id']
        );
    }
}