    <!-- Hero Section with Search Form -->
    <section class="hero-section py-5">
        <div class="container py-4">
            <!-- Premium Title with Animation -->
            <div class="text-center mb-4 hero-content-animated">
                <h1 class="hero-title text-white fw-bold mb-3 position-relative d-inline-block" style="font-size: 2.75rem; text-shadow: 0 2px 12px rgba(0,0,0,0.3); animation: fadeInUp 0.8s ease-out;">
                    Trouvez l'hôtel de vos rêves
                    <span class="title-underline"></span>
                </h1>
                <p class="text-white-90 fs-5 mb-2" style="text-shadow: 0 1px 8px rgba(0,0,0,0.2); animation: fadeInUp 0.8s ease-out 0.2s backwards;">
                    Comparez des millions d'offres en quelques secondes
                </p>
                <div class="hero-trust-badge" style="animation: fadeInUp 0.8s ease-out 0.3s backwards;">
                    <i class="fas fa-shield-check me-2"></i>
                    <span>Réservation 100% sécurisée</span>
                    <span class="mx-2">•</span>
                    <i class="fas fa-credit-card me-2"></i>
                    <span>Annulation gratuite</span>
                    <span class="mx-2">•</span>
                    <i class="fas fa-headset me-2"></i>
                    <span>Support 24/7</span>
                </div>
                <div class="hero-stats d-flex justify-content-center gap-4 mt-3" style="animation: fadeInUp 0.8s ease-out 0.4s backwards;">
                    <div class="stat-item text-white">
                        <i class="fas fa-hotel me-2"></i>
                        <span class="fw-bold">2M+</span> hôtels
                    </div>
                    <div class="stat-item text-white">
                        <i class="fas fa-globe me-2"></i>
                        <span class="fw-bold">190+</span> pays
                    </div>
                    <div class="stat-item text-white">
                        <i class="fas fa-star me-2"></i>
                        <span class="fw-bold">50M+</span> avis
                    </div>
                </div>
            </div>

            <!-- Premium Search Form -->
            <div class="search-form-premium shadow-xl">
                <form id="searchForm">
                    <div class="search-grid">
                        <!-- Destination Input with Icon -->
                        <div class="search-input-group">
                            <div class="input-icon">
                                <i class="fas fa-map-marker-alt text-primary"></i>
                            </div>
                            <div class="input-content">
                                <label class="input-label">Destination</label>
                                <input 
                                    type="text" 
                                    id="destination" 
                                    class="input-field" 
                                    placeholder="Où voulez-vous aller ?" 
                                    aria-label="Destination"
                                    autocomplete="off">
                                <div class="dropdown-menu w-100" id="suggestions"></div>
                            </div>
                        </div>
                        
                        <!-- Check-in Date with Icon -->
                        <div class="search-input-group cursor-pointer" id="checkinBtn" role="button" tabindex="0">
                            <div class="input-icon">
                                <i class="fas fa-calendar-alt text-primary"></i>
                            </div>
                            <div class="input-content">
                                <label class="input-label">Arrivée</label>
                                <div class="input-display" id="checkinDisplay">Mer 03 Déc</div>
                            </div>
                        </div>
                        
                        <!-- Check-out Date with Icon -->
                        <div class="search-input-group cursor-pointer" id="checkoutBtn" role="button" tabindex="0">
                            <div class="input-icon">
                                <i class="fas fa-calendar-check text-primary"></i>
                            </div>
                            <div class="input-content">
                                <label class="input-label">Départ</label>
                                <div class="input-display" id="checkoutDisplay">Jeu 04 Déc</div>
                            </div>
                        </div>
                        
                        <!-- Guests with Icon -->
                        <div class="search-input-group cursor-pointer position-relative" id="guestsBtn" role="button" tabindex="0">
                            <div class="input-icon">
                                <i class="fas fa-users text-primary"></i>
                            </div>
                            <div class="input-content">
                                <label class="input-label">Voyageurs</label>
                                <div class="input-display" id="guestsDisplay">2 adultes, 1 chambre</div>
                            </div>
                            
                            <!-- Premium Guests Dropdown -->
                            <div class="dropdown-menu guests-dropdown" id="guestsDropdown">
                                <div class="guest-counter-item">
                                    <div>
                                        <div class="fw-semibold text-dark">Chambres</div>
                                        <small class="text-muted">Nombre de chambres</small>
                                    </div>
                                    <div class="counter-controls">
                                        <button type="button" class="counter-btn-modern" data-action="minus" data-target="rooms">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="rooms-count" class="counter-value">1</span>
                                        <button type="button" class="counter-btn-modern" data-action="plus" data-target="rooms">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="guest-counter-item">
                                    <div>
                                        <div class="fw-semibold text-dark">Adultes</div>
                                        <small class="text-muted">18 ans et plus</small>
                                    </div>
                                    <div class="counter-controls">
                                        <button type="button" class="counter-btn-modern" data-action="minus" data-target="adults">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="adults-count" class="counter-value">2</span>
                                        <button type="button" class="counter-btn-modern" data-action="plus" data-target="adults">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                                
                                <div class="guest-counter-item">
                                    <div>
                                        <div class="fw-semibold text-dark">Enfants</div>
                                        <small class="text-muted">0-17 ans</small>
                                    </div>
                                    <div class="counter-controls">
                                        <button type="button" class="counter-btn-modern" data-action="minus" data-target="children">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <span id="children-count" class="counter-value">0</span>
                                        <button type="button" class="counter-btn-modern" data-action="plus" data-target="children">
                                            <i class="fas fa-plus"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Premium Search Button -->
                        <div class="search-button-wrapper">
                            <button type="submit" class="btn-search-premium position-relative">
                                <i class="fas fa-search me-2"></i>
                                <span>Rechercher</span>
                                <span class="search-pulse-indicator"></span>
                                <span class="btn-shine"></span>
                            </button>
                            <div class="search-hint text-center mt-2">
                                <small class="text-white-80">
                                    <i class="fas fa-bolt text-warning me-1"></i>
                                    <span class="searches-count">1,247</span> recherches aujourd'hui
                                </small>
                            </div>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Quick Filters Enhanced -->
            <div class="text-center mt-4">
                <p class="text-white-80 mb-3 small">
                    <i class="fas fa-filter me-1"></i> Filtres populaires
                    <span class="trending-indicator ms-2">
                        <i class="fas fa-fire text-danger"></i>
                        <span class="trending-text">Tendances</span>
                    </span>
                </p>
                <div class="quick-filters">
                    <button class="quick-filter-btn" data-filter="wifi">
                        <i class="fas fa-wifi me-1"></i> WiFi gratuit
                        <span class="filter-badge">87%</span>
                    </button>
                    <button class="quick-filter-btn" data-filter="pool">
                        <i class="fas fa-swimmer me-1"></i> Piscine
                        <span class="filter-badge">64%</span>
                    </button>
                    <button class="quick-filter-btn" data-filter="parking">
                        <i class="fas fa-parking me-1"></i> Parking
                        <span class="filter-badge">72%</span>
                    </button>
                    <button class="quick-filter-btn" data-filter="pets">
                        <i class="fas fa-paw me-1"></i> Animaux acceptés
                        <span class="filter-badge">32%</span>
                    </button>
                    <button class="quick-filter-btn" data-filter="breakfast">
                        <i class="fas fa-coffee me-1"></i> Petit-déjeuner
                        <span class="filter-badge">55%</span>
                    </button>
                    <button class="quick-filter-btn filter-new" data-filter="spa">
                        <i class="fas fa-spa me-1"></i> Spa & Bien-être
                        <span class="filter-badge">41%</span>
                        <span class="new-badge">NEW</span>
                    </button>
                </div>
                <div class="filter-helper-text mt-3">
                    <small class="text-white-80">
                        <i class="fas fa-lightbulb me-1"></i>
                        <span class="filter-tip">Astuce : Combinez plusieurs filtres pour des résultats personnalisés</span>
                    </small>
                </div>
            </div>
        </div>
    </section>
