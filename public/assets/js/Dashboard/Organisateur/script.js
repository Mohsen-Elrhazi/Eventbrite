function editEvent(id) {
    // Logic to fetch and display the form to edit the event
}

function deleteEvent(id) {
    if (confirm("Êtes-vous sûr de vouloir supprimer cet événement ?")) {
        $.ajax({
            url: 'public/ajax-handler.php',
            type: 'POST',
            data: { action: 'delete', id: id },
            success: function(response) {
                if (response.status === 'success') {
                    $('#event-' + id).remove();
                }
            }
        });
    }
}

function createEvent(data) {
    $.ajax({
        url: 'public/ajax-handler.php',
        type: 'POST',
        data: { action: 'create', ...data },
        success: function(response) {
            if (response.status === 'success') {
                location.reload();
            }
        }
    });
}
