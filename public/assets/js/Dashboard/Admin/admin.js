let sidebar = document.querySelector(".sidebar");
let sidebarBtn = document.querySelector(".sidebarBtn");

sidebarBtn.onclick = function () {
  sidebar.classList.toggle("active");
  if (sidebar.classList.contains("active")) {
    sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
  } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
};

document.addEventListener("DOMContentLoaded", function () {
  const currentPage = window.location.href;

  const links = document.querySelectorAll(".sidebar a");

  links.forEach((link) => {
    if (currentPage.includes(link.getAttribute("href"))) {
      link.classList.add("active");
    }
  });
});

// Masquer l'alerte après 3 secondes (3000 millisecondes)
setTimeout(function () {
  var alertElement = document.querySelector(".alert");
  if (alertElement) {
    alertElement.style.display = "none";
  }
}, 2000);

// spinner
document.addEventListener("DOMContentLoaded", function () {
  document.getElementById("loader").style.display = "none";
});

document.querySelectorAll("a").forEach(function (link) {
  link.addEventListener("click", function (e) {
    document.getElementById("loader").style.display = "flex";

    window.onload = function () {
      document.getElementById("loader").style.display = "none";
    };
  });
});







//*****************Rocherche********************** */
