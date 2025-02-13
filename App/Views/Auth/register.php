<?php 
use App\Core\Session;
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription & Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <!--Bottstrap-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <link rel="stylesheet" href="/public/assets/css/Auth/auth.css">
</head>

<body>

    <div class="container">

        <div class="form-wrapper">

            <!-- Formulaire d'inscription -->
            <form id="register-form" class="form" action="/auth/register" method="POST">
                <h2 class="title-form">signup</h2>

                <div class="form-group">
                    <input type="text" id="nom" name="nom" placeholder=" ">
                    <label for="nom">Nom</label>
                </div>
                <div class="form-group">
                    <input type="text" id="prenom" name="prenom" placeholder=" ">
                    <label for="prenom">Prénom</label>
                </div>
                <div class="form-group">
                    <input type="text" id="image" name="image" placeholder=" ">
                    <label for="image">Image</label>
                </div>
                <div class="form-group">
                    <select id="role" name="role">
                        <!-- <option disabled selected>Choisissez un rôle</option> -->
                        <option value="Participant">Participant</option>
                        <option value="Organisateur">Organisateur</option>
                    </select>
                    <label for="role">Rôle</label>
                </div>
                <div class="form-group">
                    <input type="email" id="email-register" name="email" placeholder=" ">
                    <label for="email-register">Email</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password-register" name="password" placeholder=" ">
                    <label for="password-register">Mot de passe</label>
                </div>
                <button type="submit" class="btn btn-primary">S'inscrire</button>
                <div class="forgot-password-link">
                    <!-- <a href="auth/login" id="forgot-password-link"> Se connecter ?</a> -->
                    <p clss="">Vous avez déja inscrit ?<a href="auth/login" id="forgot-password-link"> Se connecter
                            ?</a></p>
                </div>

            </form>

            <!-- Authentification sociale -->
            <div class="social-login">
                <p class="divider">Ou continuer avec</p>
                <div class="social-buttons">
                    <button class="btn btn-social btn-google">
                        <img src="/public/assets/images/google.png" alt="Google Logo">Google
                    </button>
                    <button class="btn btn-social btn-facebook">
                        <img src="/public/assets/images/facebook.png" alt="Facebook Logo">Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="/public/assets/js/Auth/auth.js"></script>

</body>

</html>