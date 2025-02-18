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
        $userID = Session::getSession('user_id');
        echo json_encode($this->eventRepository->displayOrganisateur($userID));
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

        $eventID = $this->eventRepository->save($event);
        // inserer les ids des tags selectionnes dans la form ajout event dans la table event_tag
        if (isset($data['tags']) && is_array($data['tags'])) {
            $this->eventRepository->saveTags($eventID, $data['tags']);
        }

        // inserer id de user et id de event dans la table event_user
        $userID = Session::getSession('user_id');
        $this->eventRepository->saveEnrollement($eventID, $userID);

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
            'Active',
            $data['event_id']
        );
        // print_r($event);
        // print($data['event_id']);
        $this->eventRepository->edit($event);
        if (isset($data['tags']) && is_array($data['tags'])) {
            $this->eventRepository->editTags($data['event_id'], $data['tags']);
        }
    }

    public function destroy($id)
    {
        echo $this->eventRepository->delete($id);
    }

    public function showView($id)
    {
        echo json_encode($this->eventRepository->findByID($id));
     }

    public function displayEvents()
    {
        $role = Session::getSession('role');
        $events = $this->eventRepository->display1($role);

if ($role==="Admin") {
    foreach ($events as $event) {
        echo EventService::renderRowEvents(event: $event);
    }
} elseif ($role==="Participant") {
    foreach ($events as $event) {
        echo EventService::renderRowEventsParticipant(event: $event);
    }
}else {
    foreach ($events as $event) {
        echo EventService::renderRowEventsVisteur(event: $event);
    }
}


      
    }

    public function updateEventsStatus(int $id)
    {
        $this->eventRepository->updateEventStatus($id);
        Session::setSession('success', 'status a été changé avec success');
        $role = $this->eventRepository->findByID($id);
        header("location:/admin/events/");

        exit();
    }

    public function getEvent(int $id){
     $event = $this->eventRepository->findById($id);
      return $event;
    }

    public function details(){
        require_once dirname(__DIR__, 1) . '\Views\Platform\details.php';
    }
}