
// Masquer l'alerte après 3 secondes (3000 millisecondes)
setTimeout(function () {
  var alertElement = document.querySelector(".alert");
  if (alertElement) {
    alertElement.style.display = "none";
  }
}, 2000);