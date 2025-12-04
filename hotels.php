<?php include 'includes/header.php'; ?>

<!-- Fixed Navigation Bar (sticky pour les sections) -->
<nav class="hotel-detail-nav bg-white border-bottom sticky-top" style="top: 70px; z-index: 1020;">
    <div class="container">
        <ul class="nav nav-pills nav-fill py-2" id="hotelNav">
            <li class="nav-item">
                <a class="nav-link active" href="#overview">
                    <i class="fas fa-info-circle d-md-none"></i>
                    <span class="d-none d-md-inline">Aperçu</span>
                    <span class="d-md-none">Info</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#rooms">
                    <i class="fas fa-tag d-md-none"></i>
                    <span class="d-none d-md-inline">Tarifs</span>
                    <span class="d-md-none">Prix</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#amenities">
                    <i class="fas fa-concierge-bell d-md-none"></i>
                    <span class="d-none d-md-inline">Équipements</span>
                    <span class="d-md-none">Services</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#reviews">
                    <i class="fas fa-star d-md-none"></i>
                    <span class="d-none d-md-inline">Avis</span>
                    <span class="d-md-none">Avis</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#location">
                    <i class="fas fa-map-marker-alt d-md-none"></i>
                    <span class="d-none d-md-inline">Emplacement</span>
                    <span class="d-md-none">Carte</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Hero Section avec galerie d'images AMÉLIORÉ -->
<section class="hotel-hero position-relative">
    <div class="container-fluid px-0">
        <div class="row g-1">
            <!-- Image principale avec overlay gradient -->
            <div class="col-md-6">
                <div class="hero-main-image position-relative" data-bs-toggle="modal" data-bs-target="#galleryModal">
                    <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=800" alt="Hotel Main" class="img-fluid w-100" style="height: 450px; object-fit: cover; cursor: pointer;">
                    
                    <!-- Overlay gradient sophistiqué -->
                    <div class="hero-gradient-overlay"></div>
                </div>
            </div>
            
            <!-- Grille de 4 images avec hover effects -->
            <div class="col-md-6">
                <div class="row g-1">
                    <div class="col-6">
                        <div class="gallery-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=400" alt="Hotel" class="img-fluid w-100 gallery-img" style="height: 224px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="gallery-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=400" alt="Hotel" class="img-fluid w-100 gallery-img" style="height: 224px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="gallery-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1596394516093-501ba68a0ba6?w=400" alt="Hotel" class="img-fluid w-100 gallery-img" style="height: 224px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <div class="gallery-overlay">
                                <i class="fas fa-search-plus"></i>
                            </div>
                        </div>
                    </div>
                    <div class="col-6 position-relative">
                        <div class="gallery-image-wrapper">
                            <img src="https://images.unsplash.com/photo-1520250497591-112f2f40a3f4?w=400" alt="Hotel" class="img-fluid w-100 gallery-img" style="height: 224px; object-fit: cover; cursor: pointer;" data-bs-toggle="modal" data-bs-target="#galleryModal">
                            <div class="show-all-photos-enhanced" data-bs-toggle="modal" data-bs-target="#galleryModal">
                                <i class="fas fa-th-large"></i>
                                <div>Voir toutes<br>les photos</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Contenu Principal -->
<div class="container my-4">
    <div class="row">
        <!-- Colonne principale (gauche) -->
        <div class="col-lg-8">
            <!-- En-tête de l'hôtel AMÉLIORÉ -->
            <div class="hotel-header mb-4" id="overview">
                <div class="d-flex justify-content-between align-items-start mb-3">
                    <div class="flex-grow-1">
                        <div class="d-flex align-items-center gap-2 mb-2">
                            <h1 class="display-5 fw-bold mb-0">The Mirage Resort & Spa</h1>
                            <button class="btn btn-link p-0 share-btn" title="Partager">
                                <i class="fas fa-share-alt"></i>
                            </button>
                            <button class="btn btn-link p-0 favorite-btn" title="Ajouter aux favoris">
                                <i class="far fa-heart"></i>
                            </button>
                        </div>
                        
                        <div class="d-flex align-items-center gap-3 mb-3 flex-wrap">
                            <span class="stars text-warning" title="Hôtel 5 étoiles">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                            </span>
                            <span class="text-muted">
                                <i class="fas fa-map-marker-alt me-1"></i> Avenue Bettino Craxi, Hammamet 8050
                            </span>
                            <span class="badge bg-primary">
                                <i class="fas fa-swimmer me-1"></i> Front de mer
                            </span>
                        </div>

                        <!-- Badges de caractéristiques rapides -->
                        <div class="quick-features d-flex gap-2 flex-wrap">
                            <span class="feature-badge">
                                <i class="fas fa-wifi text-primary"></i> WiFi gratuit
                            </span>
                            <span class="feature-badge">
                                <i class="fas fa-parking text-primary"></i> Parking gratuit
                            </span>
                            <span class="feature-badge">
                                <i class="fas fa-swimming-pool text-primary"></i> Piscine
                            </span>
                            <span class="feature-badge">
                                <i class="fas fa-spa text-primary"></i> Spa
                            </span>
                            <span class="feature-badge">
                                <i class="fas fa-cocktail text-primary"></i> Bar
                            </span>
                        </div>
                    </div>
                    
                    <div class="text-end ms-3">
                        <div class="rating-badge-enhanced bg-success text-white px-3 py-2 rounded shadow-sm">
                            <div class="d-flex align-items-center gap-2 mb-1">
                                <div class="fs-3 fw-bold">8.3</div>
                            </div>
                            <div class="fw-semibold">Très bien</div>
                            <div class="rating-stars small">
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star"></i>
                                <i class="fas fa-star-half-alt"></i>
                            </div>
                        </div>
                        <small class="d-block text-muted mt-2">
                            <i class="fas fa-users me-1"></i> 1,079 avis vérifiés
                        </small>
                    </div>
                </div>

                <!-- Barre d'alerte / Info importante -->
                <div class="alert alert-warning border-0 shadow-sm d-flex align-items-center mb-3" role="alert">
                    <i class="fas fa-fire text-danger fs-5 me-3"></i>
                    <div class="flex-grow-1">
                        <strong>Forte demande !</strong> Cet hôtel a été réservé 47 fois dans les dernières 24 heures
                    </div>
                    <span class="badge bg-danger pulse-badge">Populaire</span>
                </div>

                <!-- Description Aperçu -->
                <div class="card border-0 shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title fw-bold mb-3">Aperçu</h5>
                        <p class="text-muted">
                            Hôtel en bord de mer avec 3 restaurants et 2 piscines extérieures. 
                            Au The Mirage Resort & SPA, profitez de la plage de sable privée, 
                            dînez sur place au Main Buffet ou savourez un verre dans l'un des 
                            3 bars/salons de l'hôtel. Le service de ménage est disponible sur demande.
                        </p>
                        <button class="btn btn-link p-0 text-primary">Lire plus <i class="fas fa-chevron-down"></i></button>
                    </div>
                </div>
            </div>

            <!-- Section Tarifs & Offres -->
            <div class="latest-deals mb-4" id="rooms">
                <h2 class="h3 fw-bold mb-3">Dernières offres pour The Mirage Resort & Spa</h2>
                
                <!-- Filtre de dates -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row g-3">
                            <div class="col-md-3">
                                <label class="form-label small text-muted">Arrivée</label>
                                <input type="date" class="form-control" value="2025-12-04">
                            </div>
                            <div class="col-md-3">
                                <label class="form-label small text-muted">Départ</label>
                                <input type="date" class="form-control" value="2025-12-05">
                            </div>
                            <div class="col-md-4">
                                <label class="form-label small text-muted">Voyageurs</label>
                                <select class="form-select">
                                    <option>1 chambre, 2 adultes</option>
                                    <option>2 chambres, 4 adultes</option>
                                </select>
                            </div>
                            <div class="col-md-2 d-flex align-items-end">
                                <button class="btn btn-primary w-100">
                                    <i class="fas fa-search"></i>
                                </button>
                            </div>
                        </div>
                        <div class="form-check mt-3">
                            <input class="form-check-input" type="checkbox" id="breakfastFilter">
                            <label class="form-check-label" for="breakfastFilter">
                                Afficher les offres avec petit-déjeuner gratuit
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Filtres de recherche -->
                <div class="filters-banner mb-3">
                    <div class="card border-0 shadow-sm">
                        <div class="card-body p-3">
                            <div class="row g-3 align-items-center">
                                <!-- Filtre Pension -->
                                <div class="col-md-6">
                                    <label for="filterPension" class="form-label mb-1 small text-muted">
                                        <i class="fas fa-utensils"></i> Type de pension
                                    </label>
                                    <select id="filterPension" class="form-select">
                                        <option value="">Toutes les pensions</option>
                                        <option value="petit-dejeuner">Petit-déjeuner inclus</option>
                                        <option value="demi-pension">Demi-pension</option>
                                        <option value="pension-complete">Pension complète</option>
                                        <option value="all-inclusive">All inclusive</option>
                                        <option value="sans-repas">Sans repas</option>
                                    </select>
                                </div>
                                
                                <!-- Filtre Nombre d'adultes -->
                                <div class="col-md-6">
                                    <label for="filterAdults" class="form-label mb-1 small text-muted">
                                        <i class="fas fa-users"></i> Nombre d'adultes
                                    </label>
                                    <select id="filterAdults" class="form-select">
                                        <option value="">Tous</option>
                                        <option value="1" selected>1 adulte</option>
                                        <option value="2">2 adultes</option>
                                        <option value="3">3 adultes</option>
                                        <option value="4">4 adultes</option>
                                        <option value="5">5+ adultes</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Liste des offres de chambres AMÉLIORÉE -->
                <div class="room-offers">
                    <!-- Offre 1 - Meilleure offre -->
                    <div class="card mb-3 border-0 shadow-sm room-card-enhanced position-relative">
                        <span class="badge bg-success best-deal-badge position-absolute top-0 end-0 m-2">
                            <i class="fas fa-medal"></i> Meilleure offre
                        </span>
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-0 mb-md-0">
                                    <h5 class="fw-bold mb-2">Chambre Standard - lits variés</h5>
                                    <div class="d-flex gap-2 mb-2 flex-wrap">
                                        <span class="badge bg-light text-dark"><i class="fas fa-coffee"></i> Petit-déjeuner gratuit</span>
                                        <span class="badge bg-light text-dark"><i class="fas fa-undo"></i> Annulation gratuite</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 text-start text-md-end">
                                    <div class="text-muted small mb-1">À partir de</div>
                                    <div class="price-display">
                                        <span class="h3 fw-bold text-kayak-orange">88 €</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 text-end">
                                    <div class="deal-provider-info mt-2 d-flex justify-content-end">
                                        <img src="https://content.r9cdn.net/rimg/provider-logos/hotels/h/EXPEDIAHOTEL.png?width=80" alt="Expedia" class="provider-logo" style="max-width: 80px; height: auto;">
                                    </div>
                                    <button class="btn btn-primary w-100">Voir l'offre</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Offre 2 -->
                    <div class="card mb-3 border-0 shadow-sm room-card-enhanced">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-0 mb-md-0">
                                    <h5 class="fw-bold mb-2">Chambre Standard - Vue ville</h5>
                                    <div class="d-flex gap-2 mb-2 flex-wrap">
                                        <span class="badge bg-light text-dark"><i class="fas fa-coffee"></i> Petit-déjeuner gratuit</span>
                                        <span class="badge bg-light text-dark"><i class="fas fa-wifi"></i> WiFi</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 text-start text-md-end">
                                    <div class="text-muted small mb-1">À partir de</div>
                                    <div class="price-display">
                                        <span class="h3 fw-bold text-kayak-orange">91 €</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 text-end">
                                    <div class="deal-provider-info mt-2 d-flex justify-content-end">
                                        <img src="https://content.r9cdn.net/rimg/provider-logos/hotels/h/EXPEDIAHOTEL.png?width=80" alt="Expedia" class="provider-logo" style="max-width: 80px; height: auto;">
                                    </div>
                                    <button class="btn btn-primary w-100">Voir l'offre</button>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Offre 3 - Non remboursable -->
                    <div class="card mb-3 border-0 shadow-sm room-card-enhanced">
                        <div class="card-body">
                            <div class="row align-items-center">
                                <div class="col-md-6 mb-0 mb-md-0">
                                    <h5 class="fw-bold mb-2">Bungalow - Non remboursable</h5>
                                    <div class="d-flex gap-2 mb-2 flex-wrap">
                                        <span class="badge bg-light text-dark"><i class="fas fa-coffee"></i> Petit-déjeuner gratuit</span>
                                        <span class="badge bg-warning text-dark"><i class="fas fa-exclamation-triangle"></i> Non remboursable</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 text-start text-md-end">
                                    <div class="text-muted small mb-1">À partir de</div>
                                    <div class="price-display">
                                        <span class="h3 fw-bold text-kayak-orange">88 €</span>
                                    </div>
                                </div>
                                <div class="col-6 col-md-3 text-end">
                                    <div class="deal-provider-info mt-2 d-flex justify-content-end">
                                        <img src="https://content.r9cdn.net/rimg/provider-logos/hotels/h/EXPEDIAHOTEL.png?width=80" alt="Expedia" class="provider-logo" style="max-width: 80px; height: auto;">
                                    </div>
                                    <button class="btn btn-primary w-100">Voir l'offre</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Bouton voir plus -->
                    <button class="btn btn-outline-primary w-100 mb-4">
                        Afficher 5 autres tarifs de chambre <i class="fas fa-chevron-down"></i>
                    </button>
                </div>
            </div>

            <!-- Section Équipements -->
            <div class="amenities-section mb-4" id="amenities">
                <h2 class="h3 fw-bold mb-3">Équipements à The Mirage Resort & Spa</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-umbrella-beach text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Plage privée</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-swimming-pool text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Piscine extérieure</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-utensils text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Restaurant</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-dumbbell text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Centre de fitness</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-wifi text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>WiFi gratuit</strong>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-cocktail text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Bar/Salon</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-bell text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Service en chambre</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-tennis-ball text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Tennis</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-spa text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Spa</strong>
                                    </div>
                                </div>
                                <div class="amenity-item d-flex align-items-start mb-3">
                                    <i class="fas fa-coffee text-primary fs-5 me-3"></i>
                                    <div>
                                        <strong>Machine à thé/café</strong>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-link p-0 text-primary mt-3">
                            Afficher les 102 équipements <i class="fas fa-chevron-down"></i>
                        </button>
                    </div>
                </div>
            </div>

            <!-- Section Avis -->
            <div class="reviews-section mb-4" id="reviews">
                <h2 class="h3 fw-bold mb-3">Avis sur The Mirage Resort & Spa</h2>
                
                <!-- Résumé des notes -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="row align-items-center mb-4">
                            <div class="col-md-3 text-center">
                                <div class="rating-score bg-success text-white rounded p-4">
                                    <div class="display-4 fw-bold">8.3</div>
                                    <div class="h5 mb-0">Très bien</div>
                                </div>
                                <small class="text-muted d-block mt-2">1079 avis vérifiés</small>
                            </div>
                            <div class="col-md-9">
                                <div class="rating-bars">
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-3 text-nowrap">Merveilleux</span>
                                        <div class="progress flex-grow-1" style="height: 10px;">
                                            <div class="progress-bar bg-success" style="width: 74%"></div>
                                        </div>
                                        <span class="ms-3 text-muted">795</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-3 text-nowrap">Très bien</span>
                                        <div class="progress flex-grow-1" style="height: 10px;">
                                            <div class="progress-bar bg-info" style="width: 12%"></div>
                                        </div>
                                        <span class="ms-3 text-muted">134</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-3 text-nowrap">Bien</span>
                                        <div class="progress flex-grow-1" style="height: 10px;">
                                            <div class="progress-bar bg-warning" style="width: 6%"></div>
                                        </div>
                                        <span class="ms-3 text-muted">63</span>
                                    </div>
                                    <div class="d-flex align-items-center mb-2">
                                        <span class="me-3 text-nowrap">Passable</span>
                                        <div class="progress flex-grow-1" style="height: 10px;">
                                            <div class="progress-bar bg-danger" style="width: 5%"></div>
                                        </div>
                                        <span class="ms-3 text-muted">87</span>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Résumé des points positifs -->
                        <h6 class="fw-bold mb-3">Points forts (+)</h6>
                        <div class="row">
                            <div class="col-md-12">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Options de bar de plage et repas buffet délicieux <small class="text-muted">(7 avis)</small></li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> La nourriture au restaurant principal est absolument délicieuse <small class="text-muted">(4 avis)</small></li>
                                    <li class="mb-2"><i class="fas fa-check-circle text-success me-2"></i> Personnel très poli et serviable <small class="text-muted">(8 avis)</small></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filtres et tri des avis -->
                <div class="d-flex justify-content-between align-items-center mb-3">
                    <div>
                        <select class="form-select form-select-sm d-inline-block w-auto">
                            <option>Plus récents</option>
                            <option>Les mieux notés</option>
                            <option>Les moins bien notés</option>
                        </select>
                    </div>
                    <button class="btn btn-outline-secondary btn-sm">
                        <i class="fas fa-filter"></i> Tous les filtres
                    </button>
                </div>

                <!-- Liste des avis -->
                <div class="reviews-list">
                    <!-- Avis 1 -->
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <div class="rating-badge-small bg-success text-white px-2 py-1 rounded d-inline-block">
                                        <strong>9.0</strong> Merveilleux
                                    </div>
                                </div>
                                <small class="text-muted">Nov 2025</small>
                            </div>
                            <h6 class="fw-bold">Amani</h6>
                            <small class="text-muted d-block mb-2">Publié sur Booking.com</small>
                            <div class="mb-3">
                                <strong class="text-success d-block mb-2">Points forts (+)</strong>
                                <p class="text-muted mb-0">Le personnel. La grande chambre spacieuse. Les grandes piscines</p>
                            </div>
                            <div>
                                <strong class="text-danger d-block mb-2">Points faibles (-)</strong>
                                <p class="text-muted mb-0">Les bungalows sont un peu éloignés, ce serait bien d'avoir de petites voitures de golf pour aider les visiteurs à rejoindre leurs chambres. La nourriture pourrait être meilleure.</p>
                            </div>
                        </div>
                    </div>

                    <!-- Avis 2 -->
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <div class="rating-badge-small bg-success text-white px-2 py-1 rounded d-inline-block">
                                        <strong>10</strong> Merveilleux
                                    </div>
                                </div>
                                <small class="text-muted">Oct 2025</small>
                            </div>
                            <h6 class="fw-bold">Rebecca</h6>
                            <small class="text-muted d-block mb-2">Publié sur Booking.com</small>
                            <div class="mb-3">
                                <strong class="text-success d-block mb-2">Points forts (+)</strong>
                                <p class="text-muted mb-0">L'enregistrement s'est déroulé sans problème et nous avons été accueillis par une équipe de réception amicale et serviable. Notre bungalow premium était spacieux et propre. Le lit était très confortable. Les piscines sont magnifiques avec un choix de 3 et du soleil à tous les angles, beaucoup de chaises longues aussi. Le personnel est absolument incroyable...</p>
                            </div>
                            <div>
                                <strong class="text-danger d-block mb-2">Points faibles (-)</strong>
                                <p class="text-muted mb-0">Le choix de cocktails était pauvre, c'est une solution facile et sera fait une fois qu'ils changent de marque.</p>
                            </div>
                            <button class="btn btn-link p-0 text-primary">Lire plus</button>
                        </div>
                    </div>

                    <!-- Avis 3 -->
                    <div class="card border-0 shadow-sm mb-3">
                        <div class="card-body">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <div>
                                    <div class="rating-badge-small bg-warning text-white px-2 py-1 rounded d-inline-block">
                                        <strong>7.0</strong> Bien
                                    </div>
                                </div>
                                <small class="text-muted">Nov 2025</small>
                            </div>
                            <h6 class="fw-bold">Anonyme</h6>
                            <small class="text-muted d-block mb-2">Publié sur Booking.com</small>
                            <div class="mb-3">
                                <strong class="text-success d-block mb-2">Points forts (+)</strong>
                                <p class="text-muted mb-0">Le personnel de l'hôtel était exceptionnellement amical, en particulier M. Adel, le directeur de la réception, et M. Saber, le responsable de la restauration, qui ont fait preuve d'un professionnalisme exceptionnel.</p>
                            </div>
                            <div>
                                <strong class="text-danger d-block mb-2">Points faibles (-)</strong>
                                <p class="text-muted mb-0">Veuillez noter que le logo Mirage à l'entrée principale nécessite une attention.</p>
                            </div>
                            <button class="btn btn-link p-0 text-primary">Lire plus</button>
                        </div>
                    </div>
                </div>

                <button class="btn btn-outline-primary w-100">
                    Voir plus d'avis <i class="fas fa-chevron-down"></i>
                </button>
            </div>

            <!-- Section Emplacement -->
            <div class="location-section mb-4" id="location">
                <h2 class="h3 fw-bold mb-3">Emplacement</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <p class="fw-bold mb-3"><i class="fas fa-map-marker-alt text-danger me-2"></i> Avenue Bettino Craxi, Hammamet 8050</p>
                        
                        <!-- Map placeholder -->
                        <div class="map-placeholder bg-light rounded mb-3" style="height: 300px; display: flex; align-items: center; justify-content: center;">
                            <div class="text-center text-muted">
                                <i class="fas fa-map-marked-alt fa-3x mb-2"></i>
                                <p>Carte interactive</p>
                            </div>
                        </div>

                        <!-- Points d'intérêt à proximité -->
                        <h6 class="fw-bold mb-3">À proximité</h6>
                        <div class="row">
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Port Yasmine Hammamet – 0.7 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Yasmine Beach – 1.1 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Carthage Land – 1.3 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Casino La Médina – 1.6 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Centre Culturel – 2.6 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Yasmine Golf Course – 3 km</li>
                                </ul>
                            </div>
                            <div class="col-md-6">
                                <ul class="list-unstyled">
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Golf Citrus – 3.1 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Sirens Statue – 3.4 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Hammamet Fort – 3.4 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Kasbah Hammamet – 3.4 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Médina of Hammamet – 3.5 km</li>
                                    <li class="mb-2"><i class="fas fa-map-pin text-muted me-2"></i> Great Mosque – 3.6 km</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Activités & Expériences à proximité -->
            <div class="activities-section mb-4">
                <h2 class="h3 fw-bold mb-3">
                    <i class="fas fa-umbrella-beach text-primary me-2"></i>
                    Activités & Expériences à proximité
                </h2>
                <p class="text-muted mb-4">Découvrez les meilleures activités recommandées près de votre hôtel</p>
                
                <div class="row g-3">
                    <!-- Activité 1 -->
                    <div class="col-md-4">
                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="https://images.unsplash.com/photo-1559827260-dc66d52bef19?w=400" alt="Plongée" class="img-fluid">
                                <div class="activity-badge">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-star"></i> 4.8
                                    </span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h6 class="fw-bold mb-2">Plongée sous-marine</h6>
                                <p class="small text-muted mb-2">
                                    <i class="fas fa-clock me-1"></i> 3 heures
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-map-marker-alt me-1"></i> 2.5 km
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        <span class="fw-bold text-primary">À partir de 45 €</span>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activité 2 -->
                    <div class="col-md-4">
                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="https://images.unsplash.com/photo-1621277224630-81d9af65e40c?w=400" alt="Quad" class="img-fluid">
                                <div class="activity-badge">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-star"></i> 4.9
                                    </span>
                                </div>
                                <div class="popular-tag">
                                    <i class="fas fa-fire"></i> Populaire
                                </div>
                            </div>
                            <div class="activity-content">
                                <h6 class="fw-bold mb-2">Safari en quad dans le désert</h6>
                                <p class="small text-muted mb-2">
                                    <i class="fas fa-clock me-1"></i> 2 heures
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-map-marker-alt me-1"></i> 8 km
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        <span class="fw-bold text-primary">À partir de 65 €</span>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activité 3 -->
                    <div class="col-md-4">
                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="https://images.unsplash.com/photo-1544551763-46a013bb70d5?w=400" alt="Spa" class="img-fluid">
                                <div class="activity-badge">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-star"></i> 5.0
                                    </span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h6 class="fw-bold mb-2">Spa & Massage relaxant</h6>
                                <p class="small text-muted mb-2">
                                    <i class="fas fa-clock me-1"></i> 90 min
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-map-marker-alt me-1"></i> Sur place
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        <span class="fw-bold text-primary">À partir de 35 €</span>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activité 4 -->
                    <div class="col-md-4">
                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="https://images.unsplash.com/photo-1530789253388-582c481c54b0?w=400" alt="Golf" class="img-fluid">
                                <div class="activity-badge">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-star"></i> 4.7
                                    </span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h6 class="fw-bold mb-2">Golf 18 trous</h6>
                                <p class="small text-muted mb-2">
                                    <i class="fas fa-clock me-1"></i> 4 heures
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-map-marker-alt me-1"></i> 3 km
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        <span class="fw-bold text-primary">À partir de 55 €</span>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activité 5 -->
                    <div class="col-md-4">
                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="https://images.unsplash.com/photo-1558618666-fcd25c85cd64?w=400" alt="Médina" class="img-fluid">
                                <div class="activity-badge">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-star"></i> 4.6
                                    </span>
                                </div>
                            </div>
                            <div class="activity-content">
                                <h6 class="fw-bold mb-2">Visite guidée de la Médina</h6>
                                <p class="small text-muted mb-2">
                                    <i class="fas fa-clock me-1"></i> 3 heures
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-map-marker-alt me-1"></i> 3.5 km
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        <span class="fw-bold text-primary">À partir de 25 €</span>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Activité 6 -->
                    <div class="col-md-4">
                        <div class="activity-card">
                            <div class="activity-image">
                                <img src="https://images.unsplash.com/photo-1527004013197-933c4bb611b3?w=400" alt="Yacht" class="img-fluid">
                                <div class="activity-badge">
                                    <span class="badge bg-warning text-dark">
                                        <i class="fas fa-star"></i> 4.9
                                    </span>
                                </div>
                                <div class="exclusive-tag">
                                    <i class="fas fa-crown"></i> Exclusif
                                </div>
                            </div>
                            <div class="activity-content">
                                <h6 class="fw-bold mb-2">Croisière en yacht privatif</h6>
                                <p class="small text-muted mb-2">
                                    <i class="fas fa-clock me-1"></i> 4 heures
                                    <span class="mx-2">•</span>
                                    <i class="fas fa-map-marker-alt me-1"></i> 0.7 km
                                </p>
                                <div class="d-flex justify-content-between align-items-center">
                                    <div class="price">
                                        <span class="fw-bold text-primary">À partir de 180 €</span>
                                    </div>
                                    <button class="btn btn-sm btn-outline-primary">
                                        Réserver
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section Politiques -->
            <div class="policies-section mb-4">
                <h2 class="h3 fw-bold mb-3">Politiques</h2>
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <div class="row g-4">
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-3"><i class="fas fa-clock text-primary me-2"></i> Arrivée / Départ</h6>
                                <p class="mb-2"><strong>Arrivée :</strong> À partir de 15h00</p>
                                <p class="mb-0"><strong>Départ :</strong> Avant 12h00</p>
                            </div>
                            <div class="col-md-6">
                                <h6 class="fw-bold mb-3"><i class="fas fa-ban text-danger me-2"></i> Annulation</h6>
                                <p class="mb-0">Les politiques d'annulation/prépaiement varient selon le type de chambre et le fournisseur.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Section FAQ -->
            <div class="faq-section mb-4">
                <h2 class="h3 fw-bold mb-3">Questions fréquemment posées</h2>
                <div class="accordion" id="faqAccordion">
                    <div class="accordion-item border-0 shadow-sm mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq1">
                                Où se trouve The Mirage Resort & Spa ?
                            </button>
                        </h2>
                        <div id="faq1" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                The Mirage Resort & Spa est situé à Avenue Bettino Craxi, Hammamet 8050, en Tunisie.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq2">
                                Quels sont les horaires d'arrivée et de départ ?
                            </button>
                        </h2>
                        <div id="faq2" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                L'arrivée est à partir de 15h00 et le départ avant 12h00.
                            </div>
                        </div>
                    </div>
                    <div class="accordion-item border-0 shadow-sm mb-2">
                        <h2 class="accordion-header">
                            <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq3">
                                The Mirage Resort & Spa propose-t-il le WiFi gratuit ?
                            </button>
                        </h2>
                        <div id="faq3" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                            <div class="accordion-body">
                                Oui, le WiFi gratuit est disponible dans tout l'établissement.
                            </div>
                        </div>
                    </div>
                </div>
                <button class="btn btn-link text-primary p-0 mt-2">Voir plus de FAQ <i class="fas fa-chevron-down"></i></button>
            </div>
        </div>

        <!-- Sidebar droite (carte sticky) -->
        <div class="col-lg-4">
            <div class="sticky-top" style="top: 150px;">
                <!-- Carte de réservation rapide -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <div>
                                <small class="text-muted">À partir de</small>
                                <div class="h3 fw-bold text-kayak-orange mb-0">88 €</div>
                                <small class="text-muted">par nuit</small>
                            </div>
                            <div class="rating-badge bg-success text-white px-3 py-2 rounded">
                                <div class="fw-bold">8.3</div>
                                <small>Très bien</small>
                            </div>
                        </div>
                        <hr>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Arrivée</label>
                            <input type="date" class="form-control" value="2025-12-04">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Départ</label>
                            <input type="date" class="form-control" value="2025-12-05">
                        </div>
                        <div class="mb-3">
                            <label class="form-label small fw-bold">Voyageurs</label>
                            <select class="form-select">
                                <option>1 chambre, 2 adultes</option>
                                <option>2 chambres, 4 adultes</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100 mb-2">
                            <i class="fas fa-search me-2"></i> Voir les offres
                        </button>
                        <small class="text-muted d-block text-center">Nous recherchons dans plus de 200 sites</small>
                    </div>
                </div>

                <!-- Conseils d'experts -->
                <div class="card border-0 shadow-sm mb-3">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3"><i class="fas fa-lightbulb text-warning me-2"></i> Conseils d'experts</h6>
                        <ul class="list-unstyled small">
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Les tarifs les moins chers sont généralement en novembre et janvier</li>
                            <li class="mb-2"><i class="fas fa-check text-success me-2"></i> Réservez le dimanche ou lundi pour de meilleures offres</li>
                            <li class="mb-0"><i class="fas fa-check text-success me-2"></i> Chambre trouvée à partir de 68 € sur KAYAK</li>
                        </ul>
                    </div>
                </div>

                <!-- Hôtels à proximité -->
                <div class="card border-0 shadow-sm">
                    <div class="card-body">
                        <h6 class="fw-bold mb-3">Hôtels à proximité</h6>
                        
                        <div class="nearby-hotel mb-3">
                            <div class="d-flex gap-2">
                                <img src="https://images.unsplash.com/photo-1566073771259-6a8506099945?w=100" alt="Hotel" class="rounded" style="width: 80px; height: 60px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <h6 class="small fw-bold mb-1">Club Eldorador Salambo</h6>
                                    <small class="text-muted d-block mb-1">0.14 km</small>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-warning text-dark">4★</span>
                                        <strong class="text-kayak-orange">84 €</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="nearby-hotel mb-3">
                            <div class="d-flex gap-2">
                                <img src="https://images.unsplash.com/photo-1571896349842-33c89424de2d?w=100" alt="Hotel" class="rounded" style="width: 80px; height: 60px; object-fit: cover;">
                                <div class="flex-grow-1">
                                    <h6 class="small fw-bold mb-1">Le Royal Hammamet</h6>
                                    <small class="text-muted d-block mb-1">0.27 km</small>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="badge bg-warning text-dark">5★</span>
                                        <strong class="text-kayak-orange">69 €</strong>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <button class="btn btn-outline-primary btn-sm w-100">Voir plus d'hôtels</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Galerie Photos -->
<div class="modal fade" id="galleryModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Galerie Photos - The Mirage Resort & Spa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div id="galleryCarousel" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://images.unsplash.com/photo-1542314831-068cd1dbfeeb?w=1200" class="d-block w-100" alt="Hotel">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1611892440504-42a792e24d32?w=1200" class="d-block w-100" alt="Hotel">
                        </div>
                        <div class="carousel-item">
                            <img src="https://images.unsplash.com/photo-1582719478250-c89cae4dc85b?w=1200" class="d-block w-100" alt="Hotel">
                        </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#galleryCarousel" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#galleryCarousel" data-bs-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- CTA Mobile Sticky Bottom (visible uniquement sur mobile) -->
<div class="mobile-cta-bar d-lg-none">
    <div class="price-info">
        <small>À partir de</small>
        <div class="price">88 €<small style="font-size: 14px; font-weight: normal;">/nuit</small></div>
    </div>
    <button class="btn btn-primary" id="mobileCTABtn">
        <i class="fas fa-search me-2"></i>
        Voir les offres
    </button>
</div>

<!-- Bouton flottant Quick Actions (mobile) -->
<div class="mobile-quick-actions d-lg-none">
    <button class="quick-action-btn" id="mobileShareBtn" title="Partager">
        <i class="fas fa-share-alt"></i>
    </button>
    <button class="quick-action-btn" id="mobileFavoriteBtn" title="Favoris">
        <i class="far fa-heart"></i>
    </button>
    <button class="quick-action-btn scroll-to-top" id="scrollTopBtn" title="Haut de page">
        <i class="fas fa-arrow-up"></i>
    </button>
</div>

<?php include 'includes/footer.php'; ?>
