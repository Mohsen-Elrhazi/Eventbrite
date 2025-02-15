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
            <div class='card'>
                <img src='" . $event->getImage() . "' class='card-img-top' alt='Event Image'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $event->getTitre() . "</h5>
                    <p class='card-text'><strong>Organizer:</strong> " . $event->getCategoryId() . "</p>
                    <p class='card-text'><strong>Price:</strong> $" . $event->getPrix() . "</p>
   <form method='post' action='/event/updateEventsStatus/'>
        <button class='btn btn-success'> details</button>
        </form>              </div>
            </div>
        </div>";
    }
}
