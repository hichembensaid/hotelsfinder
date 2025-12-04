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
                <a class="navbar-brand d-flex align-items-center" href="/">
                    <i class="fas fa-hotel text-primary fs-4 me-2"></i>
                    <span class="fw-bold text-primary">HotelsFinder</span>
                </a>
                
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav mx-auto">
                        <li class="nav-item">
                            <a class="nav-link active fw-semibold" href="search.php"><i class="fas fa-bed me-1"></i> Hébergements</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="hotels.php"><i class="fas fa-plane me-1"></i> Hotels</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="regionsDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <i class="fas fa-map-marked-alt me-1"></i> Régions de Tunisie
                            </a>
                            <ul class="dropdown-menu dropdown-menu-regions" aria-labelledby="regionsDropdown">
                                <li><a class="dropdown-item" href="region.php?r=tunis"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Tunis</a></li>
                                <li><a class="dropdown-item" href="region.php?r=ariana"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Ariana</a></li>
                                <li><a class="dropdown-item" href="region.php?r=ben-arous"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Ben Arous</a></li>
                                <li><a class="dropdown-item" href="region.php?r=manouba"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Manouba</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="region.php?r=nabeul"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Nabeul</a></li>
                                <li><a class="dropdown-item" href="region.php?r=sousse"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Sousse</a></li>
                                <li><a class="dropdown-item" href="region.php?r=monastir"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Monastir</a></li>
                                <li><a class="dropdown-item" href="region.php?r=mahdia"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Mahdia</a></li>
                                <li><a class="dropdown-item" href="region.php?r=sfax"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Sfax</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="region.php?r=bizerte"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Bizerte</a></li>
                                <li><a class="dropdown-item" href="region.php?r=beja"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Béja</a></li>
                                <li><a class="dropdown-item" href="region.php?r=jendouba"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Jendouba</a></li>
                                <li><a class="dropdown-item" href="region.php?r=kef"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Le Kef</a></li>
                                <li><a class="dropdown-item" href="region.php?r=siliana"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Siliana</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="region.php?r=kairouan"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Kairouan</a></li>
                                <li><a class="dropdown-item" href="region.php?r=kasserine"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Kasserine</a></li>
                                <li><a class="dropdown-item" href="region.php?r=sidi-bouzid"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Sidi Bouzid</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="region.php?r=gabes"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Gabès</a></li>
                                <li><a class="dropdown-item" href="region.php?r=medenine"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Médenine</a></li>
                                <li><a class="dropdown-item" href="region.php?r=tataouine"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Tataouine</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item" href="region.php?r=gafsa"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Gafsa</a></li>
                                <li><a class="dropdown-item" href="region.php?r=tozeur"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Tozeur</a></li>
                                <li><a class="dropdown-item" href="region.php?r=kebili"><i class="fas fa-map-marker-alt me-2 text-primary"></i>Kébili</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item fw-bold text-primary" href="regions.php"><i class="fas fa-th-large me-2"></i>Toutes les régions</a></li>
                            </ul>
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
