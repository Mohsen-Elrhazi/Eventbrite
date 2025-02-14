<?php 
use App\Controllers\EventController;

$eventController=new EventController();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bootstrap Cards Example</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <div class="row">
            <!-- <div class="col-md-4 mb-4">
                <div class="card">
                    <img src="https://via.placeholder.com/300x200" class="card-img-top" alt="Event Image">
                    <div class="card-body">
                        <h5 class="card-title">Event Title 1</h5>
                        <p class="card-text"><strong>Organizer:</strong> Organizer Name 1</p>
                        <p class="card-text"><strong>Price:</strong> $50</p>
                        <a href="#" class="btn btn-primary">activate</a>
                    </div>
                </div>
            </div> -->
<?php 
// $eventController->displayEvents();
?>

        </div>
    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>