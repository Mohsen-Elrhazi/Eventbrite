<?php

namespace App\Services;

use App\Models\Event;

class EventService
{
    public static function renderRowEvents(Event $event)
    {
        $status = $event->getStatus();

        $btn = ' ';
        if ($status === "Active") {
            $btn = "<button class='btn btn-danger'> Disactivate</button>";
        } else {
            $btn = "<button class='btn btn-success'> Activate</button>";
        }
        return "
        <div class='col-md-4 mb-4'>
            <div class='card'>
                <img src='" . $event->getImage() . "' class='card-img-top' alt='Event Image'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $event->getTitre() . "</h5>
                    <p class='card-text'><strong>Organizer:</strong> " . $event->getCategoryId() . "</p>
                    <p class='card-text'><strong>Price:</strong> $" . $event->getPrix() . "</p>
            <form method='post' action='/event/updateEventsStatus/" . $event->getId() . "'>
        $btn
        </form>                    </div>
            </div>
        </div>";
    }
    public static function renderRowEventsVisteur(Event $event)
    {


        return "
        <div class='col-md-4 mb-4'>
            <div class='card'>
                <img src='" . $event->getImage() . "' class='card-img-top' alt='Event Image'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $event->getTitre() . "</h5>
                    <p class='card-text'><strong>Organizer:</strong> " . $event->getCategoryId() . "</p>
                    <p class='card-text'><strong>Price:</strong> $" . $event->getPrix() . "</p>
   <form method='post' action='/auth/login/'>
        <button class='btn btn-success'> details</button>
        </form>              </div>
            </div>
        </div>";
    }
    public static function renderRowEventsParticipant(Event $event)
    {

        return "
        <div class='col-md-4 mb-4'>
            <div class='card' style='cursor: pointer;' onclick=\"document.getElementById('detailsForm_" . $event->getId() . "').submit();\">
                <img src='" . $event->getImage() . "' class='card-img-top' alt='Event Image'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $event->getTitre() . "</h5>
                    <p class='card-text'><strong>Description:</strong> " . $event->getDescription() . "</p>
                    <p class='card-text'><strong>Prix:</strong> $" . $event->getPrix() . "</p>
    
                    <!-- Formulaire caché pour envoyer l'ID par POST -->
                    <form id='detailsForm_" . $event->getId() . "' method='post' action='/event/details/'>
                        <input type='hidden' name='eventID' value='" . $event->getId() . "'>
                    </form>
    
                    <!-- Formulaire pour réserver un ticket -->
                    <form method='post' action='/ticket/reserverTicket/' onClick='event.stopPropagation();'>
                        <input type='hidden' name='eventID' value='" . $event->getId() . "'>
                        <button class='btn btn-success' type='submit'>Réserver</button>
                    </form> 
                </div>
            </div>
        </div>";
    
    }
}