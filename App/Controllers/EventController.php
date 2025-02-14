<?php

namespace App\Controllers;

use App\Models\Event;
use App\Repositories\EventRepository;
use App\Services\EventService;
use App\core\Session;

class EventController
{
    private $eventRepository;

    public function __construct()
    {
        $this->eventRepository = new EventRepository();
    }

    public function indexView()
    {
        echo json_encode($this->eventRepository->display());
    }

    public function store()
    {
        $data = $_POST;
        $event = new Event(
            $data['titre'],
            $data['description'],
            $data['event_date'],
            $data['heure_debut'],
            $data['heure_fin'],
            $data['prix'],
            $data['image'],
            $data['content_url'],
            $data['category_id'],
            'Inactive'
        );
        echo $this->eventRepository->save($event);
    }

    public function updateView()
    {
        $data = $_POST;
        $event = new Event(
            $data['titre'],
            $data['description'],
            $data['event_date'],
            $data['heure_debut'],
            $data['heure_fin'],
            $data['prix'],
            $data['image'],
            $data['content_url'],
            $data['category_id'],
            $data['event_id']
        );
        echo $this->eventRepository->edit($event);
    }

    public function destroy($id)
    {
        echo $this->eventRepository->delete($id);
    }

    public function showView($id)
    {
        echo json_encode($this->eventRepository->findByID($id));
    }

 
}
