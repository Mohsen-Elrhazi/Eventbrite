<?php 
use App\Controllers\EventController;
$eventController= new EventController();

$eventID= $_POST['eventID'];
$event= $eventController->getEvent($eventID);
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription & Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!--Bottstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/public/assets/css/Platform/ticket.css">
</head>

<body>
    <div class="container">

        <div class="form-wrapper">

            <form id="" class="form" method='POST' ACTION='/ticket/createTicket/'>
                <input name='event_id' type='hidden' value='<?php echo $event['event_id']; ?>'>

                <h2 class="title-form">Reserver votre ticket</h2>

                <div class="form-group d-flex">
                    <div id="plus">+</div>
                    <input id="quantite" name='quantite'>
                    <div id="moins">-</div>
                </div>

                <div class="form-group">
                    <p> Prix Unitaire
                        <span id="prixUnitaire">
                            <?php echo $event['prix']; ?>
                        </span>
                    <p>
                </div>

                <div class="form-group">
                    <p> Prix Total:
                        <span id="prixTotal"></span>
                    <p>
                </div>
                <button type="submit" class="btn btn-primary">Réserver</button>
            </form>

        </div>
    </div>

    <script src="/public/assets/js/Platform/reserverTicket.js"></script>
</body>

</html>