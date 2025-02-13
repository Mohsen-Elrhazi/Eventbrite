<?php
namespace App\Models;
class Tickets {
    private $ticket_id;
    private $event_id;
    private $user_id;
    private $status;
    private $prix_total;
    private $quantity;
    public function __construct($event_id, $user_id, $status = 'Pending', $prix_total = 0.00, $quantity = 1,$ticket_id=null ) {
        $this->event_id = $event_id;
        $this->user_id = $user_id;
        $this->status = $status;
        $this->prix_total = $prix_total;
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

    public function getStatus() {
        return $this->status;
    }

    public function getPrixTotal() {
        return $this->prix_total;
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


    public function setStatus($status) {
        $this->status = $status;
    }

    public function setPrixTotal($prix_total) {
        $this->prix_total = $prix_total;
    }

    public function setQuantity($quantity) {
        $this->quantity = $quantity;
    }

}
?>
