<?php 
use App\Controllers\EventController;
$eventController = new EventController();

$eventID = $_POST['eventID'];
$event = $eventController->getEvent($eventID);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Détails de l'événement</title>
    <link rel="stylesheet" href="/public/assets/css/Platform/details.css">
    <style>

    </style>
</head>

<body>
    <div class="event-container">
        <div class="event-details">
            <!-- Informations de event -->
            <div class="event-info">
                <div class="event-header">
                    <div class="text-content">
                        <h1><?php echo $event['titre']; ?></h1>
                        <div class="event-price">
                            <span class="price-label">Prix:</span>
                            <span class="price-amount"><?php echo $event['prix']; ?>€</span>
                        </div>
                        <p class="description"><?php echo $event['description']; ?></p>
                    </div>
                    <div class="thumbnail">
                        <img src="<?php echo $event['image']; ?>" alt="Image de l'événement">
                    </div>
                </div>
            </div>

            <!-- Section Contenu -->
            <div class="event-content">
                <div class="video-wrapper">
                    <iframe src="<?php echo $event['content_url'] ?>" allowfullscreen></iframe>
                </div>
            </div>

            <div class="navigation">
                <a href="javascript:history.back()" class="btn-back">
                    <svg class="icon" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2">
                        <path d="M15 18l-6-6 6-6" />
                    </svg>
                    Retour
                </a>
            </div>
        </div>
    </div>
</body>

</html>