    <!-- Hero Section with Search Form -->
    <section class="hero-section py-5">
        <div class="container py-4">
            <!-- Premium Title -->
            <div class="text-center mb-4">
                <h1 class="hero-title text-white fw-bold mb-2" style="font-size: 2.5rem; text-shadow: 0 2px 12px rgba(0,0,0,0.3);">
                    Trouvez l'hôtel de vos rêves
                </h1>
                <p class="text-white-90 fs-5 mb-0" style="text-shadow: 0 1px 8px rgba(0,0,0,0.2);">
                    Comparez des millions d'offres en quelques secondes
                </p>
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
                            <button type="submit" class="btn-search-premium">
                                <i class="fas fa-search me-2"></i>
                                <span>Rechercher</span>
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <!-- Quick Filters (Optional Premium Feature) -->
            <div class="text-center mt-3">
                <div class="quick-filters">
                    <button class="quick-filter-btn">
                        <i class="fas fa-wifi me-1"></i> WiFi gratuit
                    </button>
                    <button class="quick-filter-btn">
                        <i class="fas fa-swimmer me-1"></i> Piscine
                    </button>
                    <button class="quick-filter-btn">
                        <i class="fas fa-parking me-1"></i> Parking
                    </button>
                    <button class="quick-filter-btn">
                        <i class="fas fa-paw me-1"></i> Animaux acceptés
                    </button>
                </div>
            </div>
        </div>
    </section>
