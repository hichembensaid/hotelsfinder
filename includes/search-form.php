    <!-- Hero Section with Search Form -->
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
