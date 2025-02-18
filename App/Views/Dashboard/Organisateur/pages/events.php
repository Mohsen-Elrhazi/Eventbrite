<?php 
use App\Controllers\CategoryController;
use App\Controllers\TagsController;

$categoryController= new CategoryController();
$tagController= new TagsController();
?>

<div class="container">
    <h1>Liste des événements</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">Ajouter un événement</button>


    <div id="eventsContainer" class="container mt-4">
        <!-- Les événements seront chargés ici via AJAX -->
    </div>


</div>

<!-- Modal Ajouter un événement -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Ajouter un événement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="addEventForm">
                    <div class="mb-3">
                        <label for="titre">Titre:</label>
                        <input type="text" id="titre" name="titre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image">Image:</label>
                        <input type="text" id="image" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="event_date">Date:</label>
                        <input type="date" id="event_date" name="event_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="heure_debut">Heure de début:</label>
                        <input type="time" id="heure_debut" name="heure_debut" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="heure_fin">Heure de fin:</label>
                        <input type="time" id="heure_fin" name="heure_fin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="prix">Prix:</label>
                        <input type="number" id="prix" name="prix" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="content_url">URL du contenu:</label>
                        <input type="url" id="content_url" name="content_url" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Catégorie:</label>

                        <select id="category_id" name="category_id" class="form-control">
                            <?php 
                            $categoryController->OptionCategories();
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 d-flex flex-wrap">
                        <?php 
                            $tagController->checkboxTags();
                        ?>
                    </div>


                    <button type="submit" class="btn btn-primary" name="ajouterEvent">Ajouter</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Modifier un événement -->
<div class="modal fade" id="editEventModal" tabindex="-1" aria-labelledby="editEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editEventModalLabel">Modifier l' événement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm" method="post" action="/event/update">
                    <input type="hidden" id="event_id" name="event_id">

                    <div class="mb-3">
                        <label for="titre">Titre:</label>
                        <input type="text" id="titre" name="titre" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="description">Description:</label>
                        <textarea id="description" name="description" class="form-control" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="image">Image:</label>
                        <input type="text" id="image" name="image" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="event_date">Date:</label>
                        <input type="date" id="event_date" name="event_date" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="heure_debut">Heure de début:</label>
                        <input type="time" id="heure_debut" name="heure_debut" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="heure_fin">Heure de fin:</label>
                        <input type="time" id="heure_fin" name="heure_fin" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="prix">Prix:</label>
                        <input type="number" id="prix" name="prix" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="content_url">URL du contenu:</label>
                        <input type="url" id="content_url" name="content_url" class="form-control" required>
                    </div>

                    <div class="mb-3">
                        <label for="category_id">Catégorie:</label>

                        <select id="category_id" name="category_id" class="form-control">
                            <?php 
                            $categoryController->OptionCategories();
                            ?>
                        </select>
                    </div>

                    <div class="mb-3 d-flex flex-wrap">
                        <?php 
                            $tagController->checkboxTags();
                        ?>
                    </div>

                    <button type="submit" class="btn btn-success">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>

