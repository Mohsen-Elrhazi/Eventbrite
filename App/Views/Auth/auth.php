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

    <link rel="stylesheet" href="/public/assets/css/Auth/auth.css">
</head>

<body>
    <div class="container">
        <?php echo Session::getSession('error'); ?>
        <div class="form-wrapper">

            <!-- Onglets pour basculer entre Register et Login -->
            <div class="tabs">
                <button class="tab " data-tab="register">S'inscrire</button>
                <button class="tab " data-tab="login" id="tab-login">Se connecter</button>
            </div>

            <!-- Formulaire d'inscription -->
            <form id="register-form" class="form " action="/auth/register" method="POST">
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
                        <option value="" disabled selected>Choisissez un rôle</option>
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

            </form>

            <!-- Formulaire de connexion -->
            <form id="login-form" class="form" action="/auth/login" method="POST">


                <div class="form-group">
                    <input type="email" id="email-login" name="email" placeholder=" ">
                    <label for="email-login">Email</label>
                </div>
                <div class="form-group">
                    <input type="password" id="password-login" name="password" placeholder=" ">
                    <label for="password-login">Mot de passe</label>
                </div>
                <button type="submit" class="btn btn-primary">Se connecter</button>
                <div class="forgot-password-link">
                    <a href="#" id="forgot-password-link">Mot de passe oublié ?</a>
                </div>
            </form>

            <!-- Formulaire de mot de passe oublié -->
            <form id="forgot-password-form" class="form" action="/auth/forgot-password" method="POST">
                <div class="form-group">
                    <input type="email" id="email-forgot" name="email" placeholder=" ">
                    <label for="email-forgot">Email</label>
                </div>
                <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
                <div class="forgot-password-link">
                    <a href="#" id="back-to-login-link">Retour à la connexion</a>
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

    <script src="/public/assets/js/Auth/auth.js">
    </script>
</body>

</html>