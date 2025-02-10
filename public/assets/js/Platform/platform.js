document.getElementById("login-btn").addEventListener("click", function() {
    sessionStorage.setItem("auth-tab", "login");
});

document.getElementById("signup-btn").addEventListener("click", function() {
    sessionStorage.setItem("auth-tab", "register");
});