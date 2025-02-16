<?php
namespace App\Models;
class Tickets {
    private $ticket_id;
    private $event_id;
    private $user_id;
    private $quantity;
    
    public function __construct($event_id, $user_id, $quantity,$ticket_id=null ) {
        $this->event_id = $event_id;
        $this->user_id = $user_id;
        $this->quantity = $quantity;
        $this->ticket_id=$ticket_id;
           }
    public function getTicketId() {
        return $this->ticket_id;
    }

    public function getEventId() {
        return $this->event_id;
    }

    public function getUserId() {
        return $this->user_id;
    }


    public function getQuantity() {
        return $this->quantity;
    }


    public function setTicketId($ticket_id) {
        $this->ticket_id = $ticket_id;
    }

    public function setEventId($event_id) {
        $this->event_id = $event_id;
    }

    public function setUserId($user_id) {
        $this->user_id = $user_id;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

}
?>