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
        
        $eventID= $this->eventRepository->save($event);
// inserer les ids des tags selectionnes dans la form ajout event dans la table event_tag
        if (isset($data['tags']) && is_array($data['tags'])) {    
            $this->eventRepository->saveTags($eventID, $data['tags']);
        }
        
// inserer id de user et id de event dans la table event_user
        $userID= Session::getSession('user_id');
        $this->eventRepository->saveEnrollement( $eventID, $userID);
        
    }

    public function update()
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