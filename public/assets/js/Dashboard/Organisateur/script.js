document.getElementById("addEventForm").addEventListener("submit", function (e) {
    e.preventDefault(); 
    
    const modalElement = document.getElementById("addEventModal");
    const bootstrapModal = bootstrap.Modal.getInstance(modalElement);
    

    bootstrapModal.hide();
    modalElement.classList.remove("show");
    modalElement.removeAttribute("style");
    modalElement.setAttribute("aria-hidden", "true");
    modalElement.removeAttribute("aria-modal");
    modalElement.removeAttribute("role");
    const backdrop = document.querySelector(".modal-backdrop");
    if (backdrop) {
        backdrop.parentNode.removeChild(backdrop);
    }
    
});
document.getElementById("addEventModal").addEventListener("show.bs.modal", function () {
    document.getElementById("addEventForm").reset();
});
document.addEventListener('DOMContentLoaded', () => {
    loadData();
});

function loadData() {
    $.ajax({
        url: '/event/index',
        success: function(response) {
            let events = JSON.parse(response);
            let eventsHTML = `<div class="row">`;

            events.forEach(event => {
                eventsHTML += `
                    <div class="col-md-4">
                        <div class="card mb-4 shadow-sm">
                            <img src="${event.image}" class="card-img-top" alt="Image de l'événement">
                            <div class="card-body">
                                <h5 class="card-title">${event.titre}</h5>
                                <p class="card-text" style='height:30px;'>${event.description}</p>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item"><strong>Date :</strong> ${event.event_date}</li>
                                    <li class="list-group-item"><strong>Heure :</strong> ${event.heure_debut} - ${event.heure_fin}</li>
                                    <li class="list-group-item"><strong>Prix :</strong> ${event.prix}€</li>
                                    <li class="list-group-item"><strong>Catégorie :</strong> ${event.category_id}</li>
                                </ul>
                                <div class="mt-3 text-center">
                                    <button onclick="editEvent(${event.event_id})" class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Modifier
                                    </button>
                                    <button onclick="deleteEvent(${event.event_id})" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Supprimer
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>`;
            });

            eventsHTML += `</div>`;
            $('#eventsContainer').html(eventsHTML);
        }
    });
}



// Appel AJAX pour ajouter un événement
$('#addEventForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: '/event/store',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            Swal.fire({
                title: "Succès!",
                text: "L'événement a été ajouté avec succès.",
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                let modal = document.getElementById('addEventModal');
                let modalInstance = bootstrap.Modal.getInstance(modal);
                modalInstance.hide(); // Correct way to hide modal in Bootstrap 5
                $('#addEventForm')[0].reset();
                loadData(); // Recharger la liste des événements
            });
        },
        error: function() {
            Swal.fire({
                title: "Erreur!",
                text: "Une erreur s'est produite lors de l'ajout de l'événement.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    });
});

// Fonction pour éditer un événement
function editEvent(id) {
    $.ajax({
        url: '/event/show/' + id,
        type: 'GET',
        success: function(response) {
            const event = JSON.parse(response);
            console.log(event);
            $('#editEventForm #event_id').val(event.event_id);
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

$('#editEventForm').submit(function(e) {
    e.preventDefault();
    $.ajax({
        url: '/event/update',
        type: 'POST',
        data: $(this).serialize(),
        success: function(response) {
            Swal.fire({
                title: "Succès!",
                text: "L'événement a été modifié avec succès.",
                icon: "success",
                confirmButtonText: "OK"
            }).then(() => {
                $('#editEventModal').modal('hide'); // Fermer le modal après confirmation
                loadData(); // Recharger la liste des événements
            });
        },
        error: function() {
            Swal.fire({
                title: "Erreur!",
                text: "Une erreur s'est produite lors de la modification de l'événement.",
                icon: "error",
                confirmButtonText: "OK"
            });
        }
    });
});




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
                success: function() {
                    Swal.fire({
                        title: "Supprimé !",
                        text: "L'événement a été supprimé avec succès.",
                        icon: "success",
                        timer: 1000,
                        showConfirmButton: false
                    });
                    loadData(); // Recharge la liste des événements
                },
                error: function() {
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