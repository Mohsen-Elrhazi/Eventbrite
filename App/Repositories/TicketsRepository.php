<?php

namespace App\Repositories;

use App\Models\Ticket;
use PDOException;
use Config\Database;
use PDO;

class TicketsRepository 
{
    
    public function save($ticket)
    {
            $conn= Database::getConnection();
        $stmt = $conn->prepare("INSERT INTO Tickets (event_id,user_id,quantity) VALUES (:event_id,:user_id,:quantity)");
        $stmt->execute([
            $ticket->getEventId(),
            $ticket->getUserId(),
             $ticket->getQuantity(),
        ]);
    }

}