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

            <!-- Formulaire de connexion -->
            <form id="login-form" class="form" action="/auth/login" method="POST">
                <h2 class="title-form">Signin</h2>

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