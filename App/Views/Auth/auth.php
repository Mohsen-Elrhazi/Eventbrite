<!-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500&display=swap" rel="stylesheet">
    <style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(135deg, #f5f7fa, #c3cfe2);
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        color: #333;
    }

    .container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        overflow: hidden;
        width: 100%;
        max-width: 400px;
    }

    .form-container {
        padding: 2rem;
    }

    h2 {
        text-align: center;
        margin-bottom: 1.5rem;
        font-size: 1.8rem;
        color: #444;
    }

    .form-group {
        position: relative;
        margin-bottom: 1.5rem;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px 10px 10px 5px;
        border: none;
        border-bottom: 2px solid #ccc;
        font-size: 16px;
        background: transparent;
        outline: none;
        transition: border-color 0.3s ease;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-bottom-color: #007bff;
    }

    .form-group label {
        position: absolute;
        top: 10px;
        left: 5px;
        font-size: 16px;
        color: #999;
        pointer-events: none;
        transition: all 0.3s ease;
    }

    .form-group input:focus~label,
    .form-group input:not(:placeholder-shown)~label,
    .form-group select:focus~label,
    .form-group select:not([value=""])~label {
        top: -12px;
        font-size: 12px;
        color: #007bff;
    }

    .btn {
        width: 100%;
        padding: 12px;
        background: #007bff;
        color: #fff;
        border: none;
        border-radius: 6px;
        font-size: 16px;
        cursor: pointer;
        transition: background 0.3s ease;
    }

    .btn:hover {
        background: #0056b3;
    }

    .social-login {
        text-align: center;
        margin-top: 1.5rem;
    }

    .social-login p {
        margin-bottom: 1rem;
        color: #666;
    }

    .social-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .btn.google,
    .btn.facebook {
        display: flex;
        align-items: center;
        gap: 8px;
        padding: 10px 20px;
        border-radius: 6px;
        font-size: 14px;
        transition: background 0.3s ease;
    }

    .btn.google {
        background: transparent;
    }

    .btn.facebook {
        background: transparent;
    }

    .btn.google:hover {
        /* background: #c23321; */
    }

    .btn.facebook:hover {
        /* background: #365899; */
    }

    .btn img {
        width: 18px;
        height: 18px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-container">
            <h2>Créer un compte</h2>
            <form action="#" method="POST">
                <div class="form-group"><input type="text" id="nom" name="nom" ><label for="nom">Nom</label>
                </div>
                <div class="form-group"><input type="text" id="prenom" name="prenom" ><label
                        for="prenom">Prénom</label></div>
                <div class="form-group"><select id="role" name="role" >
                        <option value="participant">Participant</option>
                        <option value="organisateur">Organisateur</option>
                    </select><label for="role">Rôle</label></div>
                <div class="form-group"><input type="email" id="email" name="email" ><label
                        for="email">Email</label></div>
                <div class="form-group"><input type="password" id="password" name="password" ><label
                        for="password">Mot de passe</label></div><button type="submit" class="btn">S'inscrire</button>
            </form>
            <div class="social-login">
                <p>Ou s'inscrire avec :</p>
                <div class="social-buttons"><button class="btn google"><img src="/assets/images/google.png"
                            alt="Google Logo">Google
                    </button><button class="btn facebook"><img
                            src="https://upload.wikimedia.org/wikipedia/commons/f/fb/Facebook_icon_2013.svg"
                            alt="Facebook Logo">Facebook </button></div>
            </div>
        </div>
    </div>
</body>

</html> -->
<!-- <!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    /* Reset */
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    }

    body {
        font-family: 'Inter', sans-serif;
        background-color: #f8f9fa;
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        color: #333;
    }

    .container {
        background: #fff;
        border-radius: 12px;
        box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 400px;
        padding: 2rem;
    }

    .form-wrapper {
        display: flex;
        flex-direction: column;
        gap: 1.5rem;
    }

    h2 {
        text-align: center;
        font-size: 1.75rem;
        font-weight: 600;
        color: #2c3e50;
        margin-bottom: 1rem;
    }

    .form-group {
        position: relative;
        margin-bottom: 1.25rem;
    }

    .form-group input,
    .form-group select {
        width: 100%;
        padding: 10px;
        border: 2px solid #e0e0e0;
        border-radius: 8px;
        font-size: 14px;
        outline: none;
        transition: border-color 0.3s ease;
        background: transparent;
    }

    .form-group input:focus,
    .form-group select:focus {
        border-color: #007bff;
    }

    .form-group label {
        position: absolute;
        top: 50%;
        left: 10px;
        transform: translateY(-50%);
        font-size: 14px;
        color: #999;
        background: #fff;
        padding: 0 5px;
        transition: all 0.3s ease;
        pointer-events: none;
    }

    .form-group input:focus~label,
    .form-group input:not(:placeholder-shown)~label,
    .form-group select:focus~label,
    .form-group select:not([value=""])~label {
        top: 0;
        font-size: 12px;
        color: #007bff;
    }

    .btn {
        width: 100%;
        padding: 12px;
        border: none;
        border-radius: 8px;
        font-size: 14px;
        font-weight: 500;
        cursor: pointer;
        transition: background 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
    }

    .btn img {
        width: 22px;
        height: 22px;
    }

    .btn-primary {
        background: #007bff;
        color: #fff;
    }

    .btn-primary:hover {
        background: #0056b3;
    }

    .social-login {
        text-align: center;
        margin-top: 1.5rem;
    }

    .divider {
        position: relative;
        margin: 1.5rem 0;
        color: #999;
    }

    .divider::before,
    .divider::after {
        content: '';
        position: absolute;
        top: 50%;
        width: 45%;
        height: 1px;
        background: #e0e0e0;
    }

    .divider::before {
        left: 0;
    }

    .divider::after {
        right: 0;
    }

    .social-buttons {
        display: flex;
        gap: 10px;
        justify-content: center;
    }

    .btn-social {
        background: #fff;
        border: 1px solid #e0e0e0;
        color: #333;
        transition: all 0.3s ease;
    }

    .btn-social:hover {
        background: #f8f9fa;
        border-color: #007bff;
        color: #007bff;
    }

    .btn-social i {
        font-size: 16px;
        color: inherit;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="form-wrapper">
            <h2>Créer un compte</h2>
            <form action="#" method="POST">
                <div class="form-group"><input type="text" id="nom" name="nom"  placeholder=" "><label
                        for="nom">Nom</label></div>
                <div class="form-group"><input type="text" id="prenom" name="prenom"  placeholder=" "><label
                        for="prenom">Prénom</label></div>
                <div class="form-group"><select id="role" name="role" >
                        <option value="" disabled selected>Choisissez un rôle</option>
                        <option value="participant">Participant</option>
                        <option value="organisateur">Organisateur</option>
                    </select><label for="role">Rôle</label></div>
                <div class="form-group"><input type="email" id="email" name="email"  placeholder=" "><label
                        for="email">Email</label></div>
                <div class="form-group"><input type="password" id="password" name="password" 
                        placeholder=" "><label for="password">Mot de passe</label></div><button type="submit"
                    class="btn btn-primary">S'inscrire</button>
            </form>
            <div class="social-login">
                <p class="divider">Ou s'inscrire avec</p>
                <div class="social-buttons">
                    <button class="btn btn-social btn-google"><img src="/assets/images/google.png"
                            alt="Google Logo">Google </button>
                    <button class="btn btn-social btn-facebook"><img src="/assets/images/facebook.png"
                            alt="Google Logo">Facebook </button>
                </div>
            </div>
        </div>
    </div>
</body>

</html> -->

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription & Connexion</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <link rel="stylesheet" href="/assets/css/Auth/auth.css">
</head>

<body>
    <div class="container">
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
                        <option value="participant">Participant</option>
                        <option value="organisateur">Organisateur</option>
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
                        <img src="/assets/images/google.png" alt="Google Logo">Google
                    </button>
                    <button class="btn btn-social btn-facebook">
                        <img src="/assets/images/facebook.png" alt="Facebook Logo">Facebook
                    </button>
                </div>
            </div>
        </div>
    </div>

    <script src="/assets/js/Auth/auth.js">
    </script>
</body>

</html>