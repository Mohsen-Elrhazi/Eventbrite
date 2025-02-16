<?php
namespace App\Controllers;
use App\core\Session;
use App\Models\Tickets;
use App\Repositories\TicketsRepository;

class ticketController{
    private $ticketRepository;

    public function __construct()
    {
        $this->ticketRepository = new TicketsRepository();
    }


    public function ticketView(){
        require_once dirname(__DIR__, 1) . '\Views\Platform\reserverTicket.php';
    }

    public function reserverTicket(){
        if(!Session::hasSession("user_id")){
            header("location:/auth/login/");
        }else{
           $this->ticketView();
        }
    }

    public function createTicket(){
        $userID=Session::getSession("user_id");
        $event_id=$_POST['event_id'];
        $quantity=$_POST['quantite'];

        $ticket= new Tickets(event_id:$event_id, user_id:$userID,quantity:$quantity);
        $this->ticketRepository->save($ticket);
        header("location:/");
    }


}