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

            <!-- Formulaire de mot de passe oublié -->
            <form id="forgot-password-form" class="form" action="/auth/forgot-password" method="POST">
                <h2 class="title-form">Forgot password</h2>

                <div class="form-group">
                    <input type="email" id="email-forgot" name="email" placeholder=" ">
                    <label for="email-forgot">Email</label>
                </div>
                <button type="submit" class="btn btn-primary">Réinitialiser le mot de passe</button>
                <div class="forgot-password-link">
                    <a href="/auth/login" id="back-to-login-link">Retour à la connexion</a>
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