<?php

namespace App\Services;

use App\Models\Event;

class EventService
{
    public static function renderRowEvents(Event $event)
    {
         return "
        <div class='col-md-4 mb-4'>
            <div class='card'>
                <img src='" . $event->getImage() . "' class='card-img-top' alt='Event Image'>
                <div class='card-body'>
                    <h5 class='card-title'>" . $event->getTitre() . "</h5>
                    <p class='card-text'><strong>Organizer:</strong> " . $event->getCategoryId() . "</p>
                    <p class='card-text'><strong>Price:</strong> $" . $event->getPrix() . "</p>
                    <a href='" . $event->getContentUrl() . "' class='btn btn-primary'>Activate</a>
                </div>
            </div>
        </div>";
    }
}
