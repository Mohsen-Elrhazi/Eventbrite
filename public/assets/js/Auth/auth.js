
document.addEventListener("DOMContentLoaded", function () {
    const tabs = document.querySelectorAll('.tab');
    const forms = document.querySelectorAll('.form');

    const loginForm = document.getElementById("login-form");
    const registerForm = document.getElementById("register-form");
    const forgotPasswordForm = document.getElementById("forgot-password-form");

    const loginTab = document.querySelector(".tab[data-tab='login']");
    const registerTab = document.querySelector(".tab[data-tab='register']");

    // Fonction pour afficher un formulaire et masquer les autres
    function showForm(formToShow, activeTab) {
        forms.forEach(form => form.classList.remove("active"));
        formToShow.classList.add("active");

        // Mise à jour des onglets actifs
        tabs.forEach(tab => tab.classList.remove("active"));
        activeTab.classList.add("active");
    }

    // Vérifier si le bouton a été cliqué depuis platform.php
    const authTab = sessionStorage.getItem("auth-tab");
    if (authTab === "login") {
        showForm(loginForm, loginTab);
    } else {
        showForm(registerForm, registerTab); // Par défaut, afficher l'inscription
    }

    // Nettoyer la session après le chargement
    sessionStorage.removeItem("auth-tab");

    // Gestion des clics sur les onglets dans auth.php
    loginTab.addEventListener("click", function () {
        showForm(loginForm, loginTab);
    });

    registerTab.addEventListener("click", function () {
        showForm(registerForm, registerTab);
    });

    // Gestion du mot de passe oublié
    document.getElementById("forgot-password-link").addEventListener("click", function (e) {
        e.preventDefault();
        showForm(forgotPasswordForm, null);
    });

    document.getElementById("back-to-login-link").addEventListener("click", function (e) {
        e.preventDefault();
        showForm(loginForm, loginTab);
    });
});
