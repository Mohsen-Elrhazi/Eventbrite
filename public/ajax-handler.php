<?php
// require_once '../App/Controllers/EventController.php';

// $controller = new EventController();

// if ($_SERVER['REQUEST_METHOD'] === 'POST') {
//     if ($_POST['action'] === 'create') {
//         $controller->store($_POST);
//     } elseif ($_POST['action'] === 'update') {
//         $controller->update($_POST);
//     } elseif ($_POST['action'] === 'delete') {
//         $controller->destroy($_POST['id']);
//     }
// } elseif ($_SERVER['REQUEST_METHOD'] === 'GET') {
//     if ($_GET['action'] === 'load') {
//         $events = $controller->index();
//         echo json_encode(['status' => 'success', 'events' => $events]);
//     } elseif ($_GET['action'] === 'loadEvent' && isset($_GET['id'])) {
//         $event = $controller->show($_GET['id']);
//         echo json_encode(['status' => 'success', 'event' => $event]);
//     }
// }
