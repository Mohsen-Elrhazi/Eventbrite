document.addEventListener("DOMContentLoaded", function () {

    document.getElementById("addEventForm").addEventListener("submit", function (e) {
        e.preventDefault();

        let formData = new FormData(this);
        formData.append("action", "add");

        fetch("Ajax-handler.php", {
            method: "POST",
            body: formData,
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            loadEvents();
        })
        .catch(error => console.error("Erreur:", error));
    });


    function loadEvents() {
        fetch("Ajax-handler.php", {
            method: "POST",
            body: new URLSearchParams({ action: "display" }),
        })
        .then(response => response.json())
        .then(data => {
            let eventsList = document.getElementById("eventsList");
            eventsList.innerHTML = "";
            data.forEach(event => {
                eventsList.innerHTML += `
                    <li>
                        ${event.titre} - <button onclick="deleteEvent(${event.id})">Supprimer</button>
                    </li>
                `;
            });
        });
    }


    window.deleteEvent = function (id) {
        fetch("Ajax-handler.php", {
            method: "POST",
            body: new URLSearchParams({ action: "delete", id: id }),
        })
        .then(response => response.json())
        .then(data => {
            alert(data.message);
            loadEvents();
        })
        .catch(error => console.error("Erreur:", error));
    };

    loadEvents();
});
