<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container">
    <h1>Liste des événements</h1>
    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addEventModal">Ajouter un événement</button>

    <div id="eventsTable">
        <!-- Les événements seront chargés ici via AJAX -->
    </div>
</div>

<!-- Modal Ajouter un événement -->
<div class="modal fade" id="addEventModal" tabindex="-1" aria-labelledby="addEventModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addEventModalLabel">Ajouter un événement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="addEventForm">
                    <label for="titre">Titre:</label>
                    <input type="text" id="titre" name="titre" required><br>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea><br>

                    <label for="image">Image:</label>
                    <input type="text" id="image" name="image" required><br>

                    <label for="event_date">Date:</label>
                    <input type="date" id="event_date" name="event_date" required><br>

                    <label for="heure_debut">Heure de début:</label>
                    <input type="time" id="heure_debut" name="heure_debut" required><br>

                    <label for="heure_fin">Heure de fin:</label>
                    <input type="time" id="heure_fin" name="heure_fin" required><br>

                    <label for="prix">Prix:</label>
                    <input type="number" id="prix" name="prix" required><br>

                    <label for="content_url">URL du contenu:</label>
                    <input type="url" id="content_url" name="content_url" required><br>

                    <label for="category_id">Catégorie:</label>
                    <input type="number" id="category_id" name="category_id" value="1" required><br>

                    <button type="submit" class="btn btn-primary">Ajouter</button>
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
                <h5 class="modal-title" id="editEventModalLabel">Modifier l'événement</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm">
                    <label for="titre">Titre:</label>
                    <input type="text" id="titre" name="titre" required><br>

                    <label for="description">Description:</label>
                    <textarea id="description" name="description" required></textarea><br>

                    <label for="image">Image:</label>
                    <input type="text" id="image" name="image" required><br>

                    <label for="event_date">Date:</label>
                    <input type="date" id="event_date" name="event_date" required><br>

                    <label for="heure_debut">Heure de début:</label>
                    <input type="time" id="heure_debut" name="heure_debut" required><br>

                    <label for="heure_fin">Heure de fin:</label>
                    <input type="time" id="heure_fin" name="heure_fin" required><br>

                    <label for="prix">Prix:</label>
                    <input type="number" id="prix" name="prix" required><br>

                    <label for="content_url">URL du contenu:</label>
                    <input type="url" id="content_url" name="content_url" required><br>

                    <label for="category_id">Catégorie:</label>
                    <input type="number" id="category_id" name="category_id" value="1" required><br> <button
                        type="submit" class="btn btn-primary">Modifier</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/js/bootstrap.bundle.min.js"></script>
<script>

    document.addEventListener('DOMContentLoaded', () => {
        loadData();
    });
    function loadData() {
        $.ajax({
            url: '/event/index',
            success: function (response) {
                let events = JSON.parse(response);
                console.log(events);
                let eventsHTML = "<table class='table table-bordered'><thead><tr><th>Titre</th><th>Description</th><th>Image</th><th>Data</th><th>Debut</th><th>Fin</th><th>Content URL</th><th>Category ID</th><th>Actions</th></tr></thead><tbody>";
                events.forEach(event => {
                    eventsHTML += `<tr>
                            <td>${event.titre}</td>
                            <td>${event.description}</td>
                            <td>${event.image}</td>
                            <td>${event.event_date}</td>
                            <td>${event.heure_debut}</td>
                            <td>${event.heure_fin}</td>
                            <td>${event.content_url}</td>
                            <td>${event.category_id}</td>
                            <td>
                                <button onclick="editEvent(${event.event_id})" class="btn btn-warning">Éditer</button>
                                <button onclick="deleteEvent(${event.event_id})" class="btn btn-danger">Supprimer</button>
                            </td>
                        </tr>`;
                });
                eventsHTML += "</tbody></table>";
                $('#eventsTable').html(eventsHTML);
            }
        });
    }

    // Appel AJAX pour ajouter un événement
    $('#addEventForm').submit(function (e) {
        e.preventDefault();
        $.ajax({
            url: '/event/store',
            type: 'POST',
            data: $(this).serialize(),
            success: function (response) {
                // alert("Événement ajouté !");
                $('#addEventModal').modal('hide');
                loadData();
            }
        });
    });

    // Fonction pour éditer un événement
    function editEvent(id) {
        $.ajax({
            url: '/event/show/' + id,
            type: 'GET',
            success: function (response) {
                const event = JSON.parse(response);
                console.log(event)
                $('#editEventForm #titre').val(event.titre);
                $('#editEventForm #description').val(event.description);
                $('#editEventForm #image').val(event.image);
                $('#editEventForm #event_date').val(event.event_date);
                $('#editEventForm #heure_debut').val(event.heure_debut);
                $('#editEventForm #heure_fin').val(event.heure_fin);
                $('#editEventForm #prix').val(event.prix);
                $('#editEventForm #content_url').val(event.content_url);
                $('#editEventForm #category_id').val(event.category_id);
                $('#editEventForm #prix').val(event.prix);

                $('#editEventModal').modal('show');
            }
        });
    }

    // Appel AJAX pour supprimer un événement
    function deleteEvent(id) {
        if (confirm("Voulez-vous vraiment supprimer cet événement ?")) {
            $.ajax({
                url: '/event/destroy/' + id,
                type: 'POST',
                // data: { action: 'delete', id: id },
                success: function () {
                    // alert("Événement supprimé !");
                    loadData();
                }
            });
        }
    }
</script>

<!-- <script src="public/assets/js/dashboard/organisateur/script.js"></script> -->
<!-- <script src="../../../../../public/assets/js/Dashboard/Organisateur/script.js"></script> -->