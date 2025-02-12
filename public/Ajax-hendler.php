<?php

require_once '../Repositories/EventRepository.php';
require_once '../Models/Event.php';

use App\Repositories\EventRepository;
use App\Models\Event;

$eventRepo = new EventRepository();

if (isset($_POST['action'])) {
    $action = $_POST['action'];

    switch ($action) {
        case 'add':
            $event = new Event(
                null, 
                $_POST['titre'],
                $_POST['description'],
                $_POST['event_date'],
                $_POST['image'],
                $_POST['content_url'],
                $_POST['category_id']
            );
            $eventRepo->save($event);
            echo json_encode(["message" => "Événement ajouté avec succès!"]);
            break;

        case 'delete':
            $eventRepo->delete($_POST['id']);
            echo json_encode(["message" => "Événement supprimé!"]);
            break;

        case 'display':
            $events = $eventRepo->display();
            echo json_encode($events);
            break;

        default:
            echo json_encode(["error" => "Action non reconnue"]);
    }
} else {
    echo json_encode(["error" => "Aucune action spécifiée"]);
}
?>
