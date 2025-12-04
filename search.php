<?php
// Include Header
include 'includes/header.php';
?>

    <!-- Search Results Page - Trivago Style -->
    <div class="search-results-page">
        <!-- Top Search Bar (Sticky) -->
        <div class="top-search-bar sticky-top bg-white shadow-sm">
            <div class="container-fluid">
                <div class="row align-items-center py-3">
                    <div class="col-md-3">
                        <div class="search-destination">
                            <i class="fas fa-map-marker-alt text-primary me-2"></i>
                            <strong>Hammamet, Tunisie</strong>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="search-dates">
                            <i class="fas fa-calendar text-primary me-2"></i>
                            <span>17 févr. - 18 févr.</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="search-guests">
                            <i class="fas fa-users text-primary me-2"></i>
                            <span>2 personnes, 1 chambre</span>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <button class="btn btn-outline-primary btn-sm w-100">Modifier</button>
                    </div>
                    <div class="col-md-3 text-end">
                        <button class="btn btn-link text-dark">
                            <i class="fas fa-map-marked-alt me-1"></i> Carte
                        </button>
                        <button class="btn btn-link text-dark">
                            <i class="far fa-heart me-1"></i> Favoris
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Content -->
        <div class="container-fluid px-4 py-4">
            <div class="row">
                <!-- Sidebar Filters -->
                <div class="col-lg-3">
                    <div class="filters-sidebar">
                        <!-- Results Count -->
                        <div class="mb-4">
                            <h5 class="fw-bold">Nous avons trouvé <span class="text-primary">158 hôtels</span> sur 243 sites</h5>
                        </div>

                        <!-- Sort By -->
                        <div class="filter-section mb-4">
                            <h6 class="fw-bold mb-3">Trier par</h6>
                            <select class="form-select">
                                <option selected>Hébergements en vedette</option>
                                <option>Prix croissant</option>
                                <option>Prix décroissant</option>
                                <option>Notes des clients</option>
                                <option>Distance du centre</option>
                            </select>
                        </div>

                        <!-- Quick Filters -->
                        <div class="filter-section mb-4">
                            <h6 class="fw-bold mb-3">Filtres rapides</h6>
                            <div class="quick-filter-chips">
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-hotel me-1"></i> Hôtel</span>
                                </label>
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-star me-1"></i> Avis : 8,5+</span>
                                </label>
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-map-marker-alt me-1"></i> Près du centre-ville</span>
                                </label>
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-coffee me-1"></i> Petit déjeuner inclus</span>
                                </label>
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-wifi me-1"></i> Wi-Fi</span>
                                </label>
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-parking me-1"></i> Parking</span>
                                </label>
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-utensils me-1"></i> Restaurant</span>
                                </label>
                                <label class="filter-chip">
                                    <input type="checkbox" class="filter-checkbox">
                                    <span class="chip-label"><i class="fas fa-paw me-1"></i> Animaux acceptés</span>
                                </label>
                            </div>
                        </div>

                        <!-- Price Range -->
                        <div class="filter-section mb-4">
                            <h6 class="fw-bold mb-3">Prix par nuit</h6>
                            <div class="price-range-slider">
                                <input type="range" class="form-range" min="0" max="500" value="250">
                                <div class="d-flex justify-content-between mt-2">
                                    <span class="text-muted">0 €</span>
                                    <span class="text-muted">500+ €</span>
                                </div>
                            </div>
                        </div>

                        <!-- Location -->
                        <div class="filter-section mb-4">
                            <h6 class="fw-bold mb-3">Emplacement</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="center">
                                <label class="form-check-label" for="center">
                                    Centre-ville <span class="text-muted">(42)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="beach">
                                <label class="form-check-label" for="beach">
                                    Plage <span class="text-muted">(89)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="airport">
                                <label class="form-check-label" for="airport">
                                    Aéroport <span class="text-muted">(12)</span>
                                </label>
                            </div>
                        </div>

                        <!-- Rating -->
                        <div class="filter-section mb-4">
                            <h6 class="fw-bold mb-3">Note minimale</h6>
                            <div class="rating-filters">
                                <button class="rating-filter-btn">Tout</button>
                                <button class="rating-filter-btn">6+</button>
                                <button class="rating-filter-btn">7+</button>
                                <button class="rating-filter-btn">8+</button>
                                <button class="rating-filter-btn active">9+</button>
                            </div>
                        </div>

                        <!-- Amenities -->
                        <div class="filter-section mb-4">
                            <h6 class="fw-bold mb-3">Équipements</h6>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="pool">
                                <label class="form-check-label" for="pool">
                                    Piscine <span class="text-muted">(112)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="spa">
                                <label class="form-check-label" for="spa">
                                    Spa <span class="text-muted">(45)</span>
                                </label>
                            </div>
                            <div class="form-check mb-2">
                                <input class="form-check-input" type="checkbox" id="gym">
                                <label class="form-check-label" for="gym">
                                    Salle de sport <span class="text-muted">(67)</span>
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="ac">
                                <label class="form-check-label" for="ac">
                                    Climatisation <span class="text-muted">(134)</span>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Hotel Listings -->
                <div class="col-lg-9">
                    <div class="hotels-list">
                        <?php for($i = 0; $i < 10; $i++): ?>
                        <!-- Hotel Card - Kayak Style -->
                        <div class="hotel-card-kayak mb-4" role="group">
                            <article class="card border rounded-3 shadow-sm" itemscope itemtype="https://schema.org/Hotel">
                                <div class="row g-0">
                                    <!-- Image Section with Carousel -->
                                    <div class="col-md-3 position-relative">
                                        <div class="kayak-image-carousel">
                                            <div class="carousel-wrapper">
                                                <button type="button" class="carousel-nav carousel-prev" aria-label="Image précédente">
                                                    <i class="fas fa-chevron-left"></i>
                                                </button>
                                                <div class="carousel-images">
                                                    <img src="https://content.r9cdn.net/rimg/kimg/1d/40/6e3ab30d3734d009.jpg?width=400&height=300" 
                                                         alt="Iberostar Waves Averroes" 
                                                         class="carousel-image active" 
                                                         itemprop="image">
                                                    <img src="https://content.r9cdn.net/rimg/himg/ea/53/77/expedia_group-314830-32634716-582165.jpg?width=400&height=300" 
                                                         alt="Iberostar Waves Averroes Pool" 
                                                         class="carousel-image">
                                                </div>
                                                <button type="button" class="carousel-nav carousel-next" aria-label="Image suivante">
                                                    <i class="fas fa-chevron-right"></i>
                                                </button>
                                            </div>
                                            
                                            <div class="image-actions">
                                                <button type="button" class="btn-save-kayak" title="Enregistrer">
                                                    <i class="far fa-heart"></i>
                                                    <span>Save</span>
                                                </button>
                                                <button type="button" class="btn-share-kayak" title="Partager">
                                                    <i class="fas fa-share-alt"></i>
                                                    <span>Share</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Details Section -->
                                    <div class="col-md-5">
                                        <div class="hotel-details-kayak p-3">
                                            <!-- Hotel Name & Rating -->
                                            <div class="kayak-name-section mb-0">
                                                <div class="kayak-name-location">
                                                    <div class="d-flex align-items-center gap-2 flex-wrap">
                                                        <h2 class="kayak-hotel-name mb-0">
                                                            <a href="#" class="kayak-name-link" target="_blank" itemprop="name">
                                                                Iberostar Waves Averroes
                                                            </a>
                                                        </h2>
                                                        <!-- Rating & Stars -->
                                                        <div class="stars-kayak">
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                            <i class="fas fa-star"></i>
                                                        </div>
                                                    </div>
                                                    <!-- Location -->
                                                    <div class="kayak-location">
                                                        <button type="button" class="btn-location-kayak">
                                                            Hammamet
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="kayak-rating-compact">
                                                    <div class="rating-score-badge">8.3</div>
                                                    <div class="rating-score-label">
                                                        <span class="rating-quality">Very good</span>
                                                        <span class="rating-count">(2309)</span>
                                                    </div>
                                                </div>
                                            </div>


                                            <!-- Provider Deals List -->
                                            <div class="kayak-deals-list">
                                                <a href="#" class="kayak-deal-item" target="_blank">
                                                    <div class="deal-provider-info">
                                                        <img src="https://content.r9cdn.net/rimg/provider-logos/hotels/h/EXPEDIAHOTEL.png?width=80" 
                                                             alt="Expedia" 
                                                             class="provider-logo">
                                                    </div>
                                                    <div class="deal-price-info">
                                                        <span class="deal-price">76 €</span>
                                                    </div>
                                                </a>
                                                
                                                <a href="#" class="kayak-deal-item" target="_blank">
                                                    <div class="deal-provider-info">
                                                        <img src="https://content.r9cdn.net/rimg/provider-logos/hotels/h/kayak-logo.png?width=80" 
                                                             alt="KAYAK" 
                                                             class="provider-logo">
                                                    </div>
                                                    <div class="deal-price-info">
                                                        <span class="deal-price">76 €</span>
                                                    </div>
                                                </a>

                                                <!-- Show More Button -->
                                                <button type="button" class="kayak-show-more-btn">
                                                    <div class="show-more-content">
                                                        <div class="show-more-text">
                                                            <span class="provider-name">Agoda.com</span>
                                                            <span class="more-count">and 4 more</span>
                                                        </div>
                                                        <i class="fas fa-chevron-down"></i>
                                                    </div>
                                                    <div class="show-more-price">73 €</div>
                                                </button>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Main Price Section (Right) -->
                                    <div class="col-md-4">
                                        <div class="kayak-price-section p-3 h-100">
                                            <div class="main-deal-kayak">
                                                <div class="main-provider mb-2">
                                                    <img src="https://content.r9cdn.net/rimg/provider-logos/hotels/h/BOOKINGDOTCOM.png?width=100" 
                                                         alt="Booking.com" 
                                                         class="main-provider-logo">
                                                </div>
                                                <div class="main-price-kayak mb-2">
                                                    <span class="price-large">78 €</span>
                                                </div>
                                                <div class="main-amenities mb-3">
                                                    <span class="amenity-tag">Free breakfast</span>
                                                </div>
                                                <button type="button" class="btn-view-deal-kayak w-100">
                                                    View Deal
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </article>
                        </div>

                        <?php endfor; ?>
                        <!-- More Hotels Placeholder -->
                        <div class="text-center py-5">
                            <button class="btn btn-outline-primary btn-lg">
                                <i class="fas fa-plus-circle me-2"></i> Afficher plus d'hôtels
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php
// Include Footer
include 'includes/footer.php';
?>
