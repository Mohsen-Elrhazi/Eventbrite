<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
                        <input type="number" id="category_id" name="category_id" class="form-control" value="1"
                            required>
                    </div>

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
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form id="editEventForm">
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
                        <input type="number" id="category_id" name="category_id" class="form-control" required>
                    </div>

                    <button type="submit" class="btn btn-success">Modifier</button>
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
                let eventsHTML = `
    <div class="table-container">
        <table class='table table-bordered table-striped table-hover'>
            <thead>
                <tr>
                    <th>Titre</th>
                    <th>Description</th>
                    <th>Image</th>
                    <th>Date</th>
                    <th>Début</th>
                    <th>Fin</th>
                    <th>Content URL</th>
                    <th>Category ID</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>`;

events.forEach(event => {
    eventsHTML += `
        <tr>
            <td>${event.titre}</td>
            <td>${event.description}</td>
            <td><img src="${event.image}" alt="Image de l'événement"></td>
            <td>${event.event_date}</td>
            <td>${event.heure_debut}</td>
            <td>${event.heure_fin}</td>
            <td>${event.content_url}</td>
            <td>${event.category_id}</td>
            <td>
                <button onclick="editEvent(${event.event_id})" class="btn btn-warning btn-sm">
                    <i class="fas fa-edit"></i> Éditer
                </button>
                <button onclick="deleteEvent(${event.event_id})" class="btn btn-danger btn-sm">
                    <i class="fas fa-trash-alt"></i> Supprimer
                </button>
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
                // $('#addEventModal').modal('hide');
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
    Swal.fire({
        title: "Êtes-vous sûr ?",
        text: "Cette action est irréversible !",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#d33",
        cancelButtonColor: "#3085d6",
        confirmButtonText: "Oui, supprimer",
        cancelButtonText: "Annuler"
    }).then((result) => {
        if (result.isConfirmed) {
            $.ajax({
                url: '/event/destroy/' + id,
                type: 'POST',
                success: function () {
                    Swal.fire({
                        title: "Supprimé !",
                        text: "L'événement a été supprimé avec succès.",
                        icon: "success",
                        timer: 2000,
                        showConfirmButton: false
                    });
                    loadData(); // Recharge la liste des événements
                },
                error: function () {
                    Swal.fire({
                        title: "Erreur",
                        text: "Une erreur s'est produite, veuillez réessayer.",
                        icon: "error"
                    });
                }
            });
        }
    });
}

</script>

<!-- <script src="public/assets/js/dashboard/organisateur/script.js"></script> -->
<!-- <script src="../../../../../public/assets/js/Dashboard/Organisateur/script.js"></script> -->