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
    <section class="hero-section py-4">
        <div class="container py-3">
            <div class="text-center">
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
                                        <button type="submit" class="btn btn-trivago btn-lg w-100 fw-bold" style="height: 56px;">
                                            Rechercher
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

    <!-- Partners Section -->
    <section class="py-4 bg-light">
        <div class="container">
            <h2 class="text-center fs-4 fw-normal mb-4">Nos partenaires</h2>
            <div class="row g-4 align-items-center justify-content-center">
                <div class="col-6 col-md-3 col-lg-2 text-center">
                    <div class="partner-logo p-3 bg-white rounded">
                        <img src="https://logodownload.org/wp-content/uploads/2019/01/booking-com-logo.png" alt="Booking.com" class="img-fluid" style="max-height: 40px;">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 text-center">
                    <div class="partner-logo p-3 bg-white rounded">
                        <img src="https://cdn.worldvectorlogo.com/logos/agoda-1.svg" alt="Agoda" class="img-fluid" style="max-height: 40px;">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 text-center">
                    <div class="partner-logo p-3 bg-white rounded">
                        <img src="https://logos-world.net/wp-content/uploads/2021/02/Hotels-com-Logo.png" alt="Hotels.com" class="img-fluid" style="max-height: 40px;">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 text-center">
                    <div class="partner-logo p-3 bg-white rounded">
                        <img src="https://upload.wikimedia.org/wikipedia/commons/0/0f/Expedia_2012_logo.svg" alt="Expedia" class="img-fluid" style="max-height: 40px;">
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 text-center">
                    <div class="partner-logo p-3 bg-white rounded">
                        <span class="text-muted fw-semibold small">Accor</span>
                    </div>
                </div>
                <div class="col-6 col-md-3 col-lg-2 text-center">
                    <div class="partner-logo p-3 bg-white rounded">
                        <span class="text-muted fw-semibold small">Trip.com</span>
                    </div>
                </div>
            </div>
            <p class="text-center text-muted mt-3 mb-0">et des centaines d'autres partenaires</p>
        </div>
    </section>

    <!-- USPs Section (Trivago Style) -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4 text-center">
                <div class="col-md-4">
                    <div class="p-4">
                        <div class="mb-3">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#007FA3" stroke-width="1.5">
                                <circle cx="11" cy="11" r="8"></circle>
                                <path d="m21 21-4.35-4.35"></path>
                            </svg>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Recherchez en toute simplicité</h3>
                        <p class="text-muted">Recherchez facilement des millions d'hôtels en quelques secondes.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <div class="mb-3">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#007FA3" stroke-width="1.5">
                                <path d="M3 3v18h18"></path>
                                <path d="M18 17V9"></path>
                                <path d="M13 17V5"></path>
                                <path d="M8 17v-3"></path>
                            </svg>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Comparez en toute confiance</h3>
                        <p class="text-muted">Comparez les prix des hôtels de centaines de sites à la fois.</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="p-4">
                        <div class="mb-3">
                            <svg width="80" height="80" viewBox="0 0 24 24" fill="none" stroke="#007FA3" stroke-width="1.5">
                                <line x1="12" y1="1" x2="12" y2="23"></line>
                                <path d="M17 5H9.5a3.5 3.5 0 0 0 0 7h5a3.5 3.5 0 0 1 0 7H6"></path>
                            </svg>
                        </div>
                        <h3 class="h5 fw-bold mb-3">Faites de belles économies</h3>
                        <p class="text-muted">Trouvez une super offre sur nos sites partenaires.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Special Offers (Trivago Style) -->
    <section class="py-5 bg-light">
        <div class="container">
            <h2 class="fs-3 fw-normal mb-4">Les offres d'hôtels spéciales du moment</h2>
            
            <div class="row g-3">
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-0 h-100 hover-shadow">
                            <img src="https://images.unsplash.com/photo-1499092346589-b9b6be3e94b2?w=400" class="card-img-top" alt="New York" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark">Hôtel Plaza NYC</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">8.9</span>
                                    <small class="text-muted">Excellent (1245 avis)</small>
                                </div>
                                <p class="text-muted small mb-2">New York, États-Unis</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-danger">-15%</span>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold fs-5 text-primary">240 €</div>
                                        <small class="text-muted">par nuit</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-0 h-100 hover-shadow">
                            <img src="https://images.unsplash.com/photo-1502602898657-3e91760cbb34?w=400" class="card-img-top" alt="Paris" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark">Le Marais Boutique</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">9.2</span>
                                    <small class="text-muted">Exceptionnel (892 avis)</small>
                                </div>
                                <p class="text-muted small mb-2">Paris, France</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-danger">-20%</span>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold fs-5 text-primary">189 €</div>
                                        <small class="text-muted">par nuit</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-0 h-100 hover-shadow">
                            <img src="https://images.unsplash.com/photo-1512453979798-5ea266f8880c?w=400" class="card-img-top" alt="Dubai" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark">Burj Al Arab View</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">9.5</span>
                                    <small class="text-muted">Exceptionnel (2104 avis)</small>
                                </div>
                                <p class="text-muted small mb-2">Dubai, Émirats Arabes Unis</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-danger">-18%</span>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold fs-5 text-primary">330 €</div>
                                        <small class="text-muted">par nuit</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
                
                <div class="col-12 col-sm-6 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="card border-0 h-100 hover-shadow">
                            <img src="https://images.unsplash.com/photo-1542051841857-5f90071e7989?w=400" class="card-img-top" alt="Tokyo" style="height: 200px; object-fit: cover;">
                            <div class="card-body">
                                <h5 class="card-title fw-semibold text-dark">Shibuya Grand Hotel</h5>
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-success me-2">8.7</span>
                                    <small class="text-muted">Excellent (1580 avis)</small>
                                </div>
                                <p class="text-muted small mb-2">Tokyo, Japon</p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div>
                                        <span class="badge bg-danger">-12%</span>
                                    </div>
                                    <div class="text-end">
                                        <div class="fw-bold fs-5 text-primary">195 €</div>
                                        <small class="text-muted">par nuit</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Popular Destinations -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fs-3 fw-normal mb-3">Destinations populaires</h2>
                <p class="text-muted mb-0">Découvrez les villes les plus recherchées</p>
            </div>
            
            <div class="row g-4">
                <div class="col-12 col-sm-6 col-lg-3">
                    <div class="card destination-card border-0 shadow-sm rounded-3 overflow-hidden h-100 position-relative">
                        <span class="badge bg-danger position-absolute top-0 end-0 m-3 z-3">-25%</span>
                        <div class="position-relative" style="height: 250px; background: url('https://images.unsplash.com/photo-1499092346589-b9b6be3e94b2?w=500') center/cover;">
                            <div class="position-absolute bottom-0 start-0 end-0 p-3 bg-gradient-dark text-white">
                                <div class="d-flex justify-content-between align-items-end">
                                    <div>
                                        <h5 class="mb-1 fw-bold">New York</h5>
                                        <small class="opacity-90">À partir de <strong class="fs-6">120€</strong>/nuit</small>
                                    </div>
                                    <div class="text-end">
                                        <i class="fas fa-star text-warning"></i>
                                        <small>4.8</small>
                                    </div>
                                </div>
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



    <!-- Recherches très populaires (Trivago Style) -->
    <section class="py-5">
        <div class="container">
            <h2 class="fs-3 fw-normal mb-4">Recherches très populaires</h2>
            
            <div class="row g-2">
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Paris</div>
                            <small class="text-muted">5 811 hôtels</small><br>
                            <small class="text-muted">270 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Londres</div>
                            <small class="text-muted">6 182 hôtels</small><br>
                            <small class="text-muted">312 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Barcelone</div>
                            <small class="text-muted">3 929 hôtels</small><br>
                            <small class="text-muted">193 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Marrakech</div>
                            <small class="text-muted">3 109 hôtels</small><br>
                            <small class="text-muted">193 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Dubai</div>
                            <small class="text-muted">4 632 hôtels</small><br>
                            <small class="text-muted">332 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels New York</div>
                            <small class="text-muted">2 450 hôtels</small><br>
                            <small class="text-muted">285 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Tokyo</div>
                            <small class="text-muted">1 850 hôtels</small><br>
                            <small class="text-muted">195 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Rome</div>
                            <small class="text-muted">4 220 hôtels</small><br>
                            <small class="text-muted">210 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Amsterdam</div>
                            <small class="text-muted">1 680 hôtels</small><br>
                            <small class="text-muted">245 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Istanbul</div>
                            <small class="text-muted">3 550 hôtels</small><br>
                            <small class="text-muted">165 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Bangkok</div>
                            <small class="text-muted">4 120 hôtels</small><br>
                            <small class="text-muted">95 € en moyenne</small>
                        </div>
                    </a>
                </div>
                <div class="col-6 col-md-4 col-lg-3">
                    <a href="#" class="text-decoration-none">
                        <div class="p-3 border rounded hover-bg-light">
                            <div class="fw-semibold text-dark">Hôtels Lisbonne</div>
                            <small class="text-muted">2 340 hôtels</small><br>
                            <small class="text-muted">180 € en moyenne</small>
                        </div>
                    </a>
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
