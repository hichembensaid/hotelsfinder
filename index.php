<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HotelsFinder - Les meilleures offres d'hôtels du monde entier</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Custom CSS (use style-bootstrap.css for Bootstrap version or style.css for vanilla version) -->
    <link rel="stylesheet" href="css/style-bootstrap.css">
</head>
<body>
    <!-- Header -->
    <header class="header sticky-top bg-white shadow-sm">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container">
                <a class="navbar-brand d-flex align-items-center" href="#">
                    <i class="fas fa-hotel text-primary fs-4 me-2"></i>
                    <span class="fw-bold text-primary">HotelsFinder</span>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold" href="#"><i class="fas fa-bed me-1"></i> Hébergements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-plane me-1"></i> Vols</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-car me-1"></i> Voitures</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#"><i class="fas fa-suitcase me-1"></i> Forfaits</a>
                        </li>
                    </ul>
                    <div class="d-flex gap-2">
                        <button class="btn btn-outline-primary btn-sm d-none d-lg-flex align-items-center" id="alertBtn">
                            <i class="fas fa-bell me-1"></i> Alertes prix
                        </button>
                        <button class="btn btn-outline-secondary btn-sm" id="accountBtn">
                            <i class="fas fa-user"></i>
                        </button>
                    </div>
                </div>
            </div>
        </nav>
    </header>

    <!-- Hero Section -->
    <section class="hero bg-gradient text-white py-5">
        <div class="container py-4">
            <div class="text-center mb-4">
                <h1 class="display-5 fw-bold mb-3">Les meilleures offres d'hôtels du monde entier. C'est notre garantie !</h1>
                <p class="lead mb-4">Comparez des centaines de sites de voyage pour trouver le prix idéal</p>
                
                <!-- Search Form -->
                <div class="card shadow-lg border-0 rounded-3">
                    <div class="card-body p-0">
                        <form id="searchForm">
                            <div class="row g-0 search-container">
                                <!-- Destination Input -->
                                <div class="col-12 col-lg-4 search-field border-end position-relative">
                                    <div class="p-3">
                                        <input 
                                            type="text" 
                                            id="destination" 
                                            class="form-control border-0 shadow-none px-0" 
                                            placeholder="Entrez une ville, un hôtel, un aéroport..." 
                                            aria-label="Destination"
                                            autocomplete="off">
                                        <div class="dropdown-menu w-100" id="suggestions"></div>
                                    </div>
                                </div>
                                
                                <!-- Date Range -->
                                <div class="col-12 col-lg-3 search-field border-end">
                                    <div class="d-flex h-100">
                                        <div class="flex-fill p-3 border-end cursor-pointer" id="checkinBtn" role="button" tabindex="0">
                                            <small class="text-muted d-block mb-1">Check-in</small>
                                            <span class="fw-semibold" id="checkinDisplay">Tue 12/9</span>
                                        </div>
                                        <div class="flex-fill p-3 cursor-pointer" id="checkoutBtn" role="button" tabindex="0">
                                            <small class="text-muted d-block mb-1">Check-out</small>
                                            <span class="fw-semibold" id="checkoutDisplay">Wed 12/10</span>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Guests Input -->
                                <div class="col-12 col-lg-3 search-field border-end position-relative">
                                    <div class="p-3 cursor-pointer h-100" id="guestsBtn" role="button" tabindex="0">
                                        <small class="text-muted d-block mb-1">Voyageurs</small>
                                        <span class="fw-semibold" id="guestsDisplay">1 room, 2 guests</span>
                                    </div>
                                    <div class="dropdown-menu p-3" id="guestsDropdown" style="min-width: 280px;">
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                            <span class="fw-semibold">Chambres</span>
                                            <div class="d-flex align-items-center gap-2">
                                                <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle counter-btn" data-action="minus" data-target="rooms" style="width: 36px; height: 36px;">−</button>
                                                <span id="rooms-count" class="fw-semibold" style="min-width: 24px; text-align: center;">1</span>
                                                <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle counter-btn" data-action="plus" data-target="rooms" style="width: 36px; height: 36px;">+</button>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center mb-3 pb-3 border-bottom">
                                            <span class="fw-semibold">Adultes</span>
                                            <div class="d-flex align-items-center gap-2">
                                                <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle counter-btn" data-action="minus" data-target="adults" style="width: 36px; height: 36px;">−</button>
                                                <span id="adults-count" class="fw-semibold" style="min-width: 24px; text-align: center;">2</span>
                                                <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle counter-btn" data-action="plus" data-target="adults" style="width: 36px; height: 36px;">+</button>
                                            </div>
                                        </div>
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold">Enfants</span>
                                            <div class="d-flex align-items-center gap-2">
                                                <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle counter-btn" data-action="minus" data-target="children" style="width: 36px; height: 36px;">−</button>
                                                <span id="children-count" class="fw-semibold" style="min-width: 24px; text-align: center;">0</span>
                                                <button type="button" class="btn btn-outline-secondary btn-sm rounded-circle counter-btn" data-action="plus" data-target="children" style="width: 36px; height: 36px;">+</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                
                                <!-- Search Button -->
                                <div class="col-12 col-lg-2 search-field">
                                    <div class="p-2 h-100 d-flex align-items-center justify-content-center">
                                        <button type="submit" class="btn btn-primary btn-lg w-100" style="height: 56px;">
                                            <i class="fas fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fs-2 fw-bold mb-2">Commencez votre recherche en explorant les destinations populaires</h2>
            <p class="text-center text-muted mb-5">Les meilleures offres d'hôtels du monde entier</p>
            
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1499092346589-b9b6be3e94b2?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">New York</h5>
                                <small class="opacity-90">À partir de 120€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1540959733332-eab4deabeeaf?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">Tokyo</h5>
                                <small class="opacity-90">À partir de 85€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">Dubai</h5>
                                <small class="opacity-90">À partir de 150€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">Paris</h5>
                                <small class="opacity-90">À partir de 95€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1513635269975-59663e0ac1ad?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">Londres</h5>
                                <small class="opacity-90">À partir de 110€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">Sydney</h5>
                                <small class="opacity-90">À partir de 130€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1552465011-b4e21bf6e79a?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">Bangkok</h5>
                                <small class="opacity-90">À partir de 45€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100">
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1515542622106-78bda8ba0e5b?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <h5 class="mb-1 fw-bold">Rome</h5>
                                <small class="opacity-90">À partir de 75€/nuit</small>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- About Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 h-100 text-center p-4 hover-lift">
                        <div class="rounded-circle bg-gradient-primary d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-search-dollar text-white fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Comparez des centaines de sites</h5>
                        <p class="text-muted mb-0">Notre moteur de recherche avancé compare les prix de centaines de sites de réservation pour vous garantir les meilleures offres.</p>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 h-100 text-center p-4 hover-lift">
                        <div class="rounded-circle bg-gradient-primary d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-bell text-white fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Alertes prix intelligentes</h5>
                        <p class="text-muted mb-0">Recevez des notifications lorsque les prix baissent. Configurez une alerte et réservez au moment le plus avantageux.</p>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 h-100 text-center p-4 hover-lift">
                        <div class="rounded-circle bg-gradient-primary d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-shield-alt text-white fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Transparence totale</h5>
                        <p class="text-muted mb-0">Pas de frais cachés. Les prix affichés sont complets et définitifs, pour une réservation en toute confiance.</p>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card border-0 shadow-sm rounded-3 h-100 text-center p-4 hover-lift">
                        <div class="rounded-circle bg-gradient-primary d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 70px; height: 70px;">
                            <i class="fas fa-mobile-alt text-white fs-3"></i>
                        </div>
                        <h5 class="fw-bold mb-3">Application mobile</h5>
                        <p class="text-muted mb-0">Gérez vos réservations où que vous soyez avec notre application mobile intuitive disponible sur iOS et Android.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- More Destinations -->
    <!-- More Destinations -->
    <section class="py-5">
        <div class="container">
            <h2 class="text-center fs-2 fw-bold mb-5">Voyagez à travers le monde</h2>
            
            <div class="row g-3">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à New York</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Tokyo</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Dubai</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Melbourne</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Istanbul</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Bangkok</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Sydney</a>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Londres</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Paris</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Hong Kong</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Las Vegas</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Rome</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Amsterdam</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Barcelone</a>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Seoul</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Osaka</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Kyoto</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Lisbonne</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Vienne</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Milan</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Cancún</a>
                    </div>
                </div>
                
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="d-flex flex-column gap-2">
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Kuala Lumpur</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Shanghai</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Taipei</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Chiang Mai</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Vancouver</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Doha</a>
                        <a href="#" class="text-decoration-none text-dark border-bottom pb-2 destination-link">Hôtels à Sapporo</a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ Section -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center fs-2 fw-bold mb-5">Questions fréquentes</h2>
            
            <div class="row g-4">
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 p-4">
                        <h5 class="fw-bold mb-3">Comment trouvez-vous les meilleures offres ?</h5>
                        <p class="text-muted mb-0">Notre moteur de recherche compare en temps réel les prix de centaines de sites de réservation pour vous présenter les meilleures offres disponibles.</p>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 p-4">
                        <h5 class="fw-bold mb-3">Les alertes prix sont-elles gratuites ?</h5>
                        <p class="text-muted mb-0">Oui, les alertes prix sont totalement gratuites. Inscrivez-vous simplement avec votre email pour être notifié des baisses de prix.</p>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 p-4">
                        <h5 class="fw-bold mb-3">Quels sont les avantages de l'application ?</h5>
                        <p class="text-muted mb-0">L'application vous permet de gérer vos réservations, recevoir des notifications en temps réel et accéder à des offres exclusives mobiles.</p>
                    </div>
                </div>
                
                <div class="col-12 col-md-6">
                    <div class="card border-0 shadow-sm rounded-3 h-100 p-4">
                        <h5 class="fw-bold mb-3">Comment annuler une réservation ?</h5>
                        <p class="text-muted mb-0">Les conditions d'annulation dépendent du site de réservation choisi. Consultez les détails avant de confirmer votre réservation.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class="bg-dark text-white py-5">
        <div class="container">
            <div class="row g-4">
                <div class="col-12 col-md-6 col-lg-3">
                    <h5 class="fw-bold mb-3">HotelsFinder</h5>
                    <p class="text-white-50 mb-3">Votre allié pour explorer le vaste monde du voyage. Notre mission est de vous offrir la meilleure expérience de recherche et de réservation.</p>
                    <div class="social-links d-flex gap-2">
                        <a href="#" class="text-white"><i class="fab fa-facebook"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-twitter"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-instagram"></i></a>
                        <a href="#" class="text-white"><i class="fab fa-linkedin"></i></a>
                    </div>
                </div>
                
                <div class="col-12 col-md-6 col-lg-3">
                    <h5 class="fw-bold mb-3">Entreprise</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">À propos</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Carrières</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Presse</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Blog</a></li>
                    </ul>
                </div>
                
                <div class="col-12 col-md-6 col-lg-3">
                    <h5 class="fw-bold mb-3">Support</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Centre d'aide</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Contactez-nous</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Politique de confidentialité</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Conditions d'utilisation</a></li>
                    </ul>
                </div>
                
                <div class="col-12 col-md-6 col-lg-3">
                    <h5 class="fw-bold mb-3">Partenaires</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Programme partenaires</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Affiliés</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">Publicité</a></li>
                        <li class="mb-2"><a href="#" class="text-white-50 text-decoration-none">API</a></li>
                    </ul>
                </div>
            </div>
            
            <hr class="my-4 border-secondary">
            
            <div class="text-center text-white-50">
                <p class="mb-0">&copy; 2025 HotelsFinder. Tous droits réservés.</p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap 5 JS Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Custom JS -->
    <script src="js/main.js"></script>
</body>
</html>
