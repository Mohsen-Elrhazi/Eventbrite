<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Navbar Udemy Style</title>
    <!-- Font Awesome CDN -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="/public/assets/css/Platform/platform.css">

</head>

<body>
    <nav class="navbar">
        <div class="navbar-left">
            <button class="menu-toggle">
                <i class="fas fa-bars"></i>
            </button>
            <a href="#" class="logo">Eventbrite</a>
            <div class="categories">
                <button class="categories-btn">
                    <span>Catégories</span>
                    <i class="fas fa-chevron-down" style="margin-left: 5px;"></i>
                </button>
                <div class="categories-content">
                    <a href="#"><i class="fas fa-code" style="margin-right: 10px;"></i>Développement</a>
                    <a href="#"><i class="fas fa-chart-line" style="margin-right: 10px;"></i>Business</a>
                    <a href="#"><i class="fas fa-calculator" style="margin-right: 10px;"></i>Finance & Comptabilité</a>
                    <a href="#"><i class="fas fa-laptop-code" style="margin-right: 10px;"></i>IT & Logiciels</a>
                    <a href="#"><i class="fas fa-bullhorn" style="margin-right: 10px;"></i>Marketing</a>
                    <a href="#"><i class="fas fa-paint-brush" style="margin-right: 10px;"></i>Design</a>
                </div>
            </div>
        </div>

        <div class="search-container">
            <input type="text" class="search-box" placeholder="Rechercher n'importe quoi...">
            <i class="fas fa-search search-icon"></i>
        </div>

        <div class="navbar-right">
            <!-- <a href="#" class="business-link">Udemy Business</a> -->
            <a href="/auth/auth" class="login-btn" id="login-btn">Se connecter</a>
            <a href="/auth/auth" class="signup-btn" id="signup-btn">S'inscrire</a>
            <a href="../../../index.php?page=logout" class="signup-btn">Logout</a>
            <div class="cart-container">
                <i class="fas fa-shopping-cart cart-icon"></i>
                <span class="cart-badge">0</span>
            </div>
        </div>
    </nav>

    <!-- Hero Section avec Carousel -->
    <section class="hero-section">
        <div id="heroCarousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-indicators">
                <div class="carousel-indicators">
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="0" class="active"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="1"></button>
                    <button type="button" data-bs-target="#heroCarousel" data-bs-slide-to="2"></button>
                </div>
            </div>

            <div class="carousel-inner">
                <!-- Premier slide - Développement -->
                <div class="carousel-item active">
                    <div class="carousel-overlay">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-md-6">
                                    <div class="carousel-content text-start">
                                        <span class="badge bg-primary">Plus populaire</span>
                                        <h2>Développement Web & Mobile</h2>
                                        <p>Maîtrisez les langages de programmation modernes et créez des applications
                                            innovantes. Nos cours couvrent JavaScript, Python, React et plus encore.</p>
                                        <div class="d-flex gap-3">
                                            <button class="btn hero-btn hero-btn-primary">Commencer</button>
                                            <button class="btn hero-btn btn-outline-light">Voir le programme</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <!-- <img src="https://img.freepik.com/free-vector/programming-concept-illustration_114360-1351.jpg"  
                                         alt="Développement" 
                                         class="carousel-image">-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deuxième slide - Marketing Digital -->
                <div class="carousel-item">
                    <div class="carousel-overlay marketing">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-md-6">
                                    <div class="carousel-content text-start">
                                        <span class="badge bg-success">Tendance</span>
                                        <h2>Marketing Digital</h2>
                                        <p>Développez votre présence en ligne avec nos cours de marketing digital. SEO,
                                            réseaux sociaux, analytics et stratégies de contenu.</p>
                                        <div class="d-flex gap-3">
                                            <button class="btn hero-btn hero-btn-primary">Explorer</button>
                                            <button class="btn hero-btn btn-outline-light">En savoir plus</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <!-- <img src="https://img.freepik.com/free-vector/digital-marketing-team-with-laptops-light-bulb-marketing-team-metrics-marketing-team-lead-responsibilities-concept_335657-258.jpg"  
                                         alt="Marketing Digital" 
                                         class="carousel-image">-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Deuxième slide - Data science -->

                <div class="carousel-item">
                    <div class="carousel-overlay data-science">
                        <div class="container h-100">
                            <div class="row h-100 align-items-center">
                                <div class="col-md-6">
                                    <div class="carousel-content text-start">
                                        <span class="badge bg-info">Haute Demande</span>
                                        <h2>Data Science & IA</h2>
                                        <p>Plongez dans l'univers des données et de l'intelligence artificielle. Machine
                                            Learning, Deep Learning, et analyse prédictive pour révolutionner la prise
                                            de décision.</p>
                                        <div class="d-flex gap-3">
                                            <button class="btn hero-btn hero-btn-primary">Découvrir</button>
                                            <button class="btn hero-btn btn-outline-light">Programme détaillé</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6 text-center">
                                    <!-- <img src="https://raw.githubusercontent.com/Tarikul-Islam-Anik/Animated-Fluent-Emojis/master/Emojis/Objects/Bar%20Chart.png" 
                                         alt="Data Science" 
                                         class="carousel-image"> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

            <button class="carousel-control-prev" type="button" data-bs-target="#heroCarousel" data-bs-slide="prev">
                <span class="carousel-control-prev-icon"></span>
                <span class="visually-hidden">Précédent</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#heroCarousel" data-bs-slide="next">
                <span class="carousel-control-next-icon"></span>
                <span class="visually-hidden">Suivant</span>
            </button>
        </div>
    </section>

    <!-- affichage des courses -->
    <section class="content">
        <h2 style="text-align:center;">Events </h2>

        <div class='cards-cours'>

        </div>
    </section>
    <!--fin affichage des courses -->

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <div class="footer-content">
                <!-- Grille principale -->
                <div class="row">
                    <!-- Colonne À propos -->
                    <div class="col-md-3 mb-4">
                        <h5>À propos de Udemy</h5>
                        <ul class="footer-links">
                            <li><a href="#">Qui sommes-nous</a></li>
                            <li><a href="#">Carrières</a></li>
                            <li><a href="#">Blog</a></li>
                            <li><a href="#">Investisseurs</a></li>
                        </ul>
                    </div>

                    <!-- Colonne Ressources -->
                    <div class="col-md-3 mb-4">
                        <h5>Ressources</h5>
                        <ul class="footer-links">
                            <li><a href="#">Centre d'aide</a></li>
                            <li><a href="#">Devenir formateur</a></li>
                            <li><a href="#">Udemy Business</a></li>
                            <li><a href="#">Guide des apprenants</a></li>
                        </ul>
                    </div>

                    <!-- Colonne Légal -->
                    <div class="col-md-3 mb-4">
                        <h5>Légal</h5>
                        <ul class="footer-links">
                            <li><a href="#">Conditions d'utilisation</a></li>
                            <li><a href="#">Politique de confidentialité</a></li>
                            <li><a href="#">Paramètres des cookies</a></li>
                            <li><a href="#">Mentions légales</a></li>
                        </ul>
                    </div>

                    <!-- Colonne Newsletter -->
                    <div class="col-md-3 mb-4">
                        <h5>Restez informé</h5>
                        <p class="newsletter-text">Inscrivez-vous à notre newsletter</p>
                        <div class="newsletter-form">
                            <input type="email" placeholder="Votre email" class="form-control mb-2">
                            <button class="btn btn-primary w-100">S'inscrire</button>
                        </div>
                        <div class="social-links mt-3">
                            <a href="#"><i class="fab fa-facebook-f"></i></a>
                            <a href="#"><i class="fab fa-twitter"></i></a>
                            <a href="#"><i class="fab fa-linkedin-in"></i></a>
                            <a href="#"><i class="fab fa-instagram"></i></a>
                        </div>
                    </div>
                </div>

                <!-- Barre de séparation -->
                <hr class="footer-divider">

                <!-- Bas du footer -->
                <div class="footer-bottom">
                    <div class="row align-items-center">
                        <div class="col-md-6">
                            <p class="copyright">© 2024 Udemy. Tous droits réservés.</p>
                        </div>
                        <div class="col-md-6 text-md-end">
                            <div class="language-selector">
                                <i class="fas fa-globe"></i>
                                <select class="footer-select">
                                    <option value="fr">Français</option>
                                    <option value="en">English</option>
                                    <option value="es">Español</option>
                                    <option value="de">Deutsch</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS et ses dépendances -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js"></script>

    <script src="/public/assets/js/Platform/platform.js">
    </script>



</body>

</html>