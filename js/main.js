// Mock data for destinations
const mockDestinations = [
    'Paris, France',
    'Londres, Royaume-Uni',
    'New York, États-Unis',
    'Tokyo, Japon',
    'Dubai, Émirats arabes unis',
    'Bangkok, Thaïlande',
    'Rome, Italie',
    'Sydney, Australie',
    'Barcelone, Espagne',
    'Amsterdam, Pays-Bas'
];

// State management
let state = {
    rooms: 1,
    adults: 2,
    children: 0,
    checkin: null,
    checkout: null,
    destination: ''
};

// DOM Elements
const destinationInput = document.getElementById('destination');
const suggestionsDiv = document.getElementById('suggestions');
const guestsBtn = document.getElementById('guestsBtn');
const guestsDropdown = document.getElementById('guestsDropdown');
const guestsDisplay = document.getElementById('guestsDisplay');
const checkinBtn = document.getElementById('checkinBtn');
const checkoutBtn = document.getElementById('checkoutBtn');
const checkinDisplay = document.getElementById('checkinDisplay');
const checkoutDisplay = document.getElementById('checkoutDisplay');
const searchForm = document.getElementById('searchForm');

// Initialize
document.addEventListener('DOMContentLoaded', () => {
    initDestinationSearch();
    initGuestsDropdown();
    initDatePickers();
    initCounters();
    initSearchForm();
    initTabSwitcher();
    initMobileMenu();
    updateGuestsDisplay();
    initStatsCounter();
    initScrollAnimations();
    initSearchEnhancements();
    initSearchButtonLoader();
});

// Destination Search with Autocomplete
function initDestinationSearch() {
    if (!destinationInput || !suggestionsDiv) return;
    
    destinationInput.addEventListener('input', (e) => {
        const value = e.target.value.toLowerCase();
        
        if (value.length < 2) {
            suggestionsDiv.classList.remove('show');
            return;
        }
        
        const filtered = mockDestinations.filter(dest => 
            dest.toLowerCase().includes(value)
        );
        
        if (filtered.length > 0) {
            suggestionsDiv.innerHTML = filtered.map(dest => `
                <a class="dropdown-item" href="#" data-destination="${dest}">
                    <i class="fas fa-map-marker-alt me-2 text-muted"></i>
                    ${dest}
                </a>
            `).join('');
            
            suggestionsDiv.classList.add('show');
            
            // Add click handlers to suggestions
            document.querySelectorAll('.dropdown-item').forEach(item => {
                item.addEventListener('click', (e) => {
                    e.preventDefault();
                    destinationInput.value = item.dataset.destination;
                    state.destination = item.dataset.destination;
                    suggestionsDiv.classList.remove('show');
                });
            });
        } else {
            suggestionsDiv.classList.remove('show');
        }
    });
    
    // Close suggestions when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.col-12.col-lg-4.search-field')) {
            suggestionsDiv.classList.remove('show');
        }
    });
}

// Guests Dropdown
function initGuestsDropdown() {
    if (guestsBtn && guestsDropdown) {
        // Déplacer le dropdown dans le body pour éviter les problèmes d'overflow
        document.body.appendChild(guestsDropdown);
        
        // Fonction pour positionner le dropdown avec CSS custom properties
        const positionDropdown = () => {
            const rect = guestsBtn.getBoundingClientRect();
            // Utiliser des CSS custom properties au lieu de styles inline
            guestsDropdown.style.setProperty('--dropdown-top', `${rect.bottom + 8}px`);
            guestsDropdown.style.setProperty('--dropdown-left', `${rect.left}px`);
            guestsDropdown.style.setProperty('--dropdown-width', `${rect.width}px`);
        };
        
        guestsBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            const isShowing = guestsDropdown.classList.toggle('show');
            if (isShowing) {
                positionDropdown();
                guestsBtn.classList.add('dropdown-active');
            } else {
                guestsBtn.classList.remove('dropdown-active');
            }
        });
        
        guestsBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                const isShowing = guestsDropdown.classList.toggle('show');
                if (isShowing) {
                    positionDropdown();
                    guestsBtn.classList.add('dropdown-active');
                } else {
                    guestsBtn.classList.remove('dropdown-active');
                }
            }
        });
        
        // Repositionner lors du scroll ou resize
        let repositionTimeout;
        const handleReposition = () => {
            if (guestsDropdown.classList.contains('show')) {
                clearTimeout(repositionTimeout);
                repositionTimeout = setTimeout(positionDropdown, 10);
            }
        };
        
        window.addEventListener('scroll', handleReposition, true);
        window.addEventListener('resize', handleReposition);
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('#guestsBtn') && !e.target.closest('#guestsDropdown') && guestsDropdown) {
            guestsDropdown.classList.remove('show');
            if (guestsBtn) {
                guestsBtn.classList.remove('dropdown-active');
            }
        }
    });
}

// Counter Buttons
function initCounters() {
    document.querySelectorAll('.counter-btn').forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.stopPropagation();
            const action = btn.dataset.action;
            const target = btn.dataset.target;
            
            if (action === 'plus') {
                state[target]++;
            } else if (action === 'minus' && state[target] > 0) {
                // Prevent going below minimums
                if (target === 'rooms' && state[target] === 1) return;
                if (target === 'adults' && state[target] === 1) return;
                state[target]--;
            }
            
            updateCounterDisplay(target);
            updateGuestsDisplay();
        });
    });
}

function updateCounterDisplay(target) {
    const countSpan = document.getElementById(`${target}-count`);
    countSpan.textContent = state[target];
}

function updateGuestsDisplay() {
    const totalGuests = state.adults + state.children;
    const text = `${state.rooms} room${state.rooms > 1 ? 's' : ''}, ${totalGuests} guest${totalGuests > 1 ? 's' : ''}`;
    if (guestsDisplay) {
        guestsDisplay.textContent = text;
    }
}

// Date Pickers (Simple mock - in production, use a library like flatpickr)
function initDatePickers() {
    // Set default dates
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(tomorrow.getDate() + 1);
    
    if (checkinDisplay && checkoutDisplay) {
        checkinDisplay.textContent = formatDate(today);
        checkoutDisplay.textContent = formatDate(tomorrow);
    }
    
    state.checkin = today;
    state.checkout = tomorrow;
    
    // Add click handlers (in production, this would open a date picker)
    if (checkinBtn) {
        checkinBtn.addEventListener('click', () => {
            alert('Un calendrier s\'ouvrirait ici. Pour cette démo, les dates sont prédéfinies.');
        });
        
        checkinBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                alert('Un calendrier s\'ouvrirait ici. Pour cette démo, les dates sont prédéfinies.');
            }
        });
    }
    
    if (checkoutBtn) {
        checkoutBtn.addEventListener('click', () => {
            alert('Un calendrier s\'ouvrirait ici. Pour cette démo, les dates sont prédéfinies.');
        });
        
        checkoutBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                alert('Un calendrier s\'ouvrirait ici. Pour cette démo, les dates sont prédéfinies.');
            }
        });
    }
}

function formatDate(date) {
    const days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    const dayName = days[date.getDay()];
    const month = date.getMonth() + 1;
    const day = date.getDate();
    return `${dayName} ${month}/${day}`;
}

// Tab Switcher
function initTabSwitcher() {
    document.querySelectorAll('.tab-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            // Remove active class from all tabs
            document.querySelectorAll('.tab-btn').forEach(b => b.classList.remove('active'));
            // Add active class to clicked tab
            btn.classList.add('active');
            
            // In a real app, this would switch the form content
            const tabType = btn.textContent.trim();
            console.log(`Switched to ${tabType} tab`);
        });
    });
}

// Search Form Submission
function initSearchForm() {
    searchForm.addEventListener('submit', (e) => {
        e.preventDefault();
        
        // Validate
        if (!destinationInput.value) {
            alert('Veuillez entrer une destination');
            destinationInput.focus();
            return;
        }
        
        // Collect search data
        const searchData = {
            destination: destinationInput.value,
            checkin: state.checkin,
            checkout: state.checkout,
            rooms: state.rooms,
            adults: state.adults,
            children: state.children
        };
        
        console.log('Search submitted:', searchData);
        
        // Show loading state
        const searchBtn = searchForm.querySelector('.btn-search-hc');
        searchBtn.classList.add('loading');
        searchBtn.disabled = true;
        
        // Simulate API call
        setTimeout(() => {
            searchBtn.classList.remove('loading');
            searchBtn.disabled = false;
            alert(`Recherche pour ${searchData.destination}\n${searchData.rooms} chambre(s), ${searchData.adults} adulte(s), ${searchData.children} enfant(s)\nDu ${formatDate(searchData.checkin)} au ${formatDate(searchData.checkout)}`);
        }, 1500);
    });
}

// Mobile Menu
function initMobileMenu() {
    const menuBtn = document.querySelector('.btn-menu-mobile');
    const navMenu = document.querySelector('.nav-menu');
    
    if (menuBtn && navMenu) {
        menuBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            navMenu.classList.toggle('active');
            
            // Toggle icon
            const icon = menuBtn.querySelector('i');
            if (icon) {
                if (navMenu.classList.contains('active')) {
                    icon.classList.remove('fa-bars');
                    icon.classList.add('fa-times');
                } else {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
        
        // Close menu when clicking outside
        document.addEventListener('click', (e) => {
            if (!e.target.closest('.navbar') && navMenu.classList.contains('active')) {
                navMenu.classList.remove('active');
                const icon = menuBtn.querySelector('i');
                if (icon) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            }
        });
        
        // Close menu when clicking on a menu item
        navMenu.querySelectorAll('a').forEach(link => {
            link.addEventListener('click', () => {
                navMenu.classList.remove('active');
                const icon = menuBtn.querySelector('i');
                if (icon) {
                    icon.classList.remove('fa-times');
                    icon.classList.add('fa-bars');
                }
            });
        });
    }
}

// Destination Cards Click Handler
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.destination-card').forEach(card => {
        card.addEventListener('click', () => {
            const destination = card.querySelector('.destination-overlay h3').textContent;
            destinationInput.value = destination;
            state.destination = destination;
            
            // Smooth scroll to search form
            document.querySelector('.search-card').scrollIntoView({ 
                behavior: 'smooth',
                block: 'center'
            });
            
            // Focus on destination input with a delay
            setTimeout(() => {
                destinationInput.focus();
            }, 500);
        });
    });
});

// Destination Links Click Handler
document.addEventListener('DOMContentLoaded', () => {
    document.querySelectorAll('.destination-link').forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const destination = link.textContent.replace('Hôtels à ', '');
            destinationInput.value = destination;
            state.destination = destination;
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
            
            // Focus on destination input with a delay
            setTimeout(() => {
                destinationInput.focus();
            }, 800);
        });
    });
});

// Smooth Scroll for All Links
document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', function (e) {
        e.preventDefault();
        const target = document.querySelector(this.getAttribute('href'));
        if (target) {
            target.scrollIntoView({
                behavior: 'smooth',
                block: 'start'
            });
        }
    });
});

// Intersection Observer for Animations
const observerOptions = {
    threshold: 0.1,
    rootMargin: '0px 0px -50px 0px'
};

const observer = new IntersectionObserver((entries) => {
    entries.forEach(entry => {
        if (entry.isIntersecting) {
            entry.target.classList.add('animate-visible');
        }
    });
}, observerOptions);

// Observe cards for animation
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.destination-card, .about-card, .faq-item');
    cards.forEach(card => {
        card.classList.add('animate-on-scroll');
        observer.observe(card);
    });
});

// Header Shadow on Scroll
let lastScroll = 0;
window.addEventListener('scroll', () => {
    const header = document.querySelector('.header');
    const currentScroll = window.pageYOffset;
    
    if (currentScroll > 100) {
        header.classList.add('scrolled');
    } else {
        header.classList.remove('scrolled');
    }
    
    lastScroll = currentScroll;
});

// Price Alert Button
const alertBtn = document.getElementById('alertBtn');
if (alertBtn) {
    alertBtn.addEventListener('click', () => {
        const email = prompt('Entrez votre adresse email pour recevoir des alertes prix :');
        if (email && validateEmail(email)) {
            alert(`✅ Alerte prix activée pour ${email}\nVous recevrez des notifications lorsque les prix baissent.`);
        } else if (email) {
            alert('❌ Adresse email invalide');
        }
    });
}

// Account Button
const accountBtn = document.getElementById('accountBtn');
if (accountBtn) {
    accountBtn.addEventListener('click', () => {
        alert('Connexion / Inscription\n\nCette fonctionnalité serait liée à un système d\'authentification complet.');
    });
}

// Email Validation Helper
function validateEmail(email) {
    const re = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return re.test(email);
}

// Animated Stats Counter
function initStatsCounter() {
    const stats = document.querySelectorAll('.stat-card h3[data-target]');
    
    const animateCounter = (element) => {
        const target = parseInt(element.getAttribute('data-target'));
        const suffix = element.getAttribute('data-suffix') || '+';
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const updateCounter = () => {
            current += increment;
            if (current < target) {
                const displayValue = Math.floor(current);
                // Format large numbers with spaces for readability
                element.textContent = displayValue.toLocaleString('fr-FR');
                requestAnimationFrame(updateCounter);
            } else {
                element.textContent = target.toLocaleString('fr-FR') + suffix;
            }
        };
        
        updateCounter();
    };
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    stats.forEach(stat => observer.observe(stat));
}

// Scroll Animations
function initScrollAnimations() {
    const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('animate-visible');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    document.querySelectorAll('.card, .stat-card').forEach(el => {
        el.classList.add('animate-on-scroll');
        observer.observe(el);
    });
}

// Enhanced Search Features
function initSearchEnhancements() {
    const searchInput = document.getElementById('destination');
    
    if (searchInput) {
        // Add search icon animation on focus
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.classList.add('input-focused');
        });
        
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.classList.remove('input-focused');
        });
        
        // Add typing indicator
        let typingTimer;
        searchInput.addEventListener('input', () => {
            clearTimeout(typingTimer);
            searchInput.parentElement.classList.add('searching');
            
            typingTimer = setTimeout(() => {
                searchInput.parentElement.classList.remove('searching');
            }, 500);
        });
    }
}

// Add loading state to search button
function initSearchButtonLoader() {
    const form = document.getElementById('searchForm');
    if (form) {
        form.addEventListener('submit', (e) => {
            const btn = form.querySelector('button[type="submit"]');
            btn.classList.add('loading');
            btn.innerHTML = '<span class="spinner-border spinner-border-sm me-2"></span>Recherche...';
            
            // Simulate search
            setTimeout(() => {
                btn.classList.remove('loading');
                btn.innerHTML = '<i class="fas fa-search"></i>';
            }, 2000);
        });
    }
}

// Enhanced Quick Filters Interaction
// Live Search Counter Animation
function initLiveSearchCounter() {
    const counterElement = document.querySelector('.searches-count');
    if (!counterElement) return;
    
    let count = 1247;
    
    setInterval(() => {
        // Randomly increment counter (simulating real-time searches)
        const increment = Math.floor(Math.random() * 3) + 1;
        count += increment;
        
        // Animate the change avec classes CSS
        counterElement.classList.add('counter-updating');
        
        setTimeout(() => {
            counterElement.textContent = count.toLocaleString('fr-FR');
            counterElement.classList.remove('counter-updating');
        }, 200);
    }, 5000); // Update every 5 seconds
}

// Hero Stats Animation on Scroll
function initHeroStatsAnimation() {
    const stats = document.querySelectorAll('.stat-item');
    
    stats.forEach((stat, index) => {
        stat.style.setProperty('--animation-delay', `${index * 0.2}s`);
    });
}

// Destination Input Smart Suggestions
function enhanceDestinationInput() {
    const input = document.getElementById('destination');
    if (!input) return;
    
    const popularDestinations = [
        '🇫🇷 Paris', '🇬🇧 Londres', '🇪🇸 Barcelone', 
        '🇮🇹 Rome', '🇹🇭 Bangkok', '🇦🇪 Dubaï'
    ];
    
    input.addEventListener('focus', () => {
        if (input.value === '') {
            // Show popular destinations as placeholder suggestion
            input.placeholder = popularDestinations[Math.floor(Math.random() * popularDestinations.length)];
        }
    });
    
    input.addEventListener('blur', () => {
        input.placeholder = 'Où voulez-vous aller ?';
    });
}

// Real-time Partner Counter
function initPartnerCounter() {
    const counterElement = document.getElementById('partnerCount');
    if (!counterElement) return;
    
    let count = 250;
    
    setInterval(() => {
        // Randomly fluctuate between 250-260
        count = 250 + Math.floor(Math.random() * 11);
        
        counterElement.classList.add('counter-updating');
        
        setTimeout(() => {
            counterElement.textContent = count + '+';
            counterElement.classList.remove('counter-updating');
        }, 150);
    }, 8000); // Update every 8 seconds
}

// Keyboard Shortcuts for Power Users
function initKeyboardShortcuts() {
    document.addEventListener('keydown', (e) => {
        // Alt + S = Focus search
        if (e.altKey && e.key === 's') {
            e.preventDefault();
            const searchInput = document.getElementById('destination');
            if (searchInput) {
                searchInput.focus();
                searchInput.scrollIntoView({ behavior: 'smooth', block: 'center' });
            }
        }
        
        // Alt + D = Toggle dates
        if (e.altKey && e.key === 'd') {
            e.preventDefault();
            const checkinBtn = document.getElementById('checkinBtn');
            if (checkinBtn) {
                checkinBtn.click();
            }
        }
        
        // Alt + G = Toggle guests
        if (e.altKey && e.key === 'g') {
            e.preventDefault();
            const guestsBtn = document.getElementById('guestsBtn');
            if (guestsBtn) {
                guestsBtn.click();
            }
        }
        
        // Escape = Close all dropdowns
        if (e.key === 'Escape') {
            document.querySelectorAll('.dropdown-menu.show').forEach(menu => {
                menu.classList.remove('show');
            });
            const guestsDropdown = document.getElementById('guestsDropdown');
            if (guestsDropdown && guestsDropdown.classList.contains('show')) {
                guestsDropdown.classList.remove('show');
            }
        }
    });
}

// Progressive Form Validation
function initProgressiveValidation() {
    const destinationInput = document.getElementById('destination');
    if (!destinationInput) return;
    
    let validationTimeout;
    
    destinationInput.addEventListener('input', () => {
        clearTimeout(validationTimeout);
        
        // Remove previous validation states
        destinationInput.parentElement.classList.remove('is-valid', 'is-invalid');
        
        if (destinationInput.value.length === 0) return;
        
        validationTimeout = setTimeout(() => {
            if (destinationInput.value.length >= 3) {
                destinationInput.parentElement.classList.add('is-valid');
                
                // Show success feedback
                const successIcon = document.createElement('i');
                successIcon.className = 'fas fa-check-circle text-success destination-success-icon';
                
                // Remove any existing icons
                const existingIcon = destinationInput.parentElement.querySelector('.fa-check-circle');
                if (existingIcon) existingIcon.remove();
                
                destinationInput.parentElement.style.position = 'relative';
                destinationInput.parentElement.appendChild(successIcon);
                
                setTimeout(() => successIcon.remove(), 2000);
            } else {
                destinationInput.parentElement.classList.add('is-invalid');
            }
        }, 500);
    });
}

// Accessibility Announcements
function initAccessibilityAnnouncements() {
    // Create live region for screen readers
    const liveRegion = document.createElement('div');
    liveRegion.setAttribute('role', 'status');
    liveRegion.setAttribute('aria-live', 'polite');
    liveRegion.setAttribute('aria-atomic', 'true');
    liveRegion.className = 'sr-only';
    liveRegion.id = 'a11y-announcer';
    document.body.appendChild(liveRegion);
}

function announceToScreenReader(message) {
    const announcer = document.getElementById('a11y-announcer');
    if (announcer) {
        announcer.textContent = message;
        setTimeout(() => announcer.textContent = '', 1000);
    }
}

// Performance Monitoring
function initPerformanceMonitoring() {
    if ('PerformanceObserver' in window) {
        // Monitor Largest Contentful Paint
        const observer = new PerformanceObserver((list) => {
            for (const entry of list.getEntries()) {
                console.log('LCP:', entry.renderTime || entry.loadTime);
            }
        });
        
        observer.observe({ entryTypes: ['largest-contentful-paint'] });
    }
    
    // Log page load performance
    window.addEventListener('load', () => {
        setTimeout(() => {
            const perfData = performance.getEntriesByType('navigation')[0];
            console.log('⚡ Performance Metrics:');
            console.log('  DOM Content Loaded:', Math.round(perfData.domContentLoadedEventEnd), 'ms');
            console.log('  Page Load Complete:', Math.round(perfData.loadEventEnd), 'ms');
        }, 0);
    });
}

// Initialize all new features
// ========================================
// HOTELS.PHP - FICHE HOTEL (KAYAK STYLE)
// ========================================

/**
 * Navigation sticky avec highlight des sections
 */
function initHotelDetailNav() {
    const nav = document.querySelector('.hotel-detail-nav');
    if (!nav) return;

    const navLinks = nav.querySelectorAll('.nav-link');
    const sections = document.querySelectorAll('[id]');

    // Fonction pour mettre à jour le lien actif
    function updateActiveLink() {
        const scrollPos = window.scrollY + 200;

        sections.forEach(section => {
            const sectionTop = section.offsetTop;
            const sectionHeight = section.offsetHeight;
            const sectionId = section.getAttribute('id');

            if (scrollPos >= sectionTop && scrollPos < sectionTop + sectionHeight) {
                navLinks.forEach(link => {
                    link.classList.remove('active');
                    if (link.getAttribute('href') === `#${sectionId}`) {
                        link.classList.add('active');
                    }
                });
            }
        });
    }

    // Smooth scroll vers les sections
    navLinks.forEach(link => {
        link.addEventListener('click', (e) => {
            e.preventDefault();
            const targetId = link.getAttribute('href');
            const targetSection = document.querySelector(targetId);
            
            if (targetSection) {
                const offsetTop = targetSection.offsetTop - 150;
                window.scrollTo({
                    top: offsetTop,
                    behavior: 'smooth'
                });
            }
        });
    });

    // Écouter le scroll
    window.addEventListener('scroll', updateActiveLink);
    updateActiveLink(); // Init
}

/**
 * Affichage dynamique du prix total
 */
function initPriceCalculator() {
    const checkinInput = document.querySelector('.sticky-top input[type="date"]:first-of-type');
    const checkoutInput = document.querySelector('.sticky-top input[type="date"]:last-of-type');
    
    if (!checkinInput || !checkoutInput) return;

    function calculateNights() {
        const checkin = new Date(checkinInput.value);
        const checkout = new Date(checkoutInput.value);
        
        if (checkin && checkout && checkout > checkin) {
            const nights = Math.ceil((checkout - checkin) / (1000 * 60 * 60 * 24));
            const pricePerNight = 88;
            const totalPrice = nights * pricePerNight;
            
            // Afficher un badge avec le nombre de nuits
            const priceDisplay = document.querySelector('.sticky-top .h3.fw-bold');
            if (priceDisplay && nights > 1) {
                const nightsBadge = document.createElement('small');
                nightsBadge.className = 'text-muted d-block';
                nightsBadge.style.fontSize = '14px';
                nightsBadge.textContent = `${nights} nuits = ${totalPrice} €`;
                
                // Supprimer l'ancien badge s'il existe
                const oldBadge = priceDisplay.parentElement.querySelector('.nights-badge');
                if (oldBadge) oldBadge.remove();
                
                nightsBadge.className += ' nights-badge';
                priceDisplay.parentElement.insertBefore(nightsBadge, priceDisplay.nextSibling);
            }
        }
    }

    checkinInput.addEventListener('change', calculateNights);
    checkoutInput.addEventListener('change', calculateNights);
}

/**
 * Animation des cartes d'avis au scroll
 */
function initReviewsAnimation() {
    const reviewCards = document.querySelectorAll('.reviews-list .card');
    if (reviewCards.length === 0) return;

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });

    reviewCards.forEach(card => {
        card.classList.add('review-card-hidden');
        observer.observe(card);
    });
}

/**
 * Filtrage des offres avec petit-déjeuner
 */
function initBreakfastFilter() {
    const breakfastCheckbox = document.getElementById('breakfastFilter');
    if (!breakfastCheckbox) return;

    const roomOffers = document.querySelectorAll('.room-offers .card');

    breakfastCheckbox.addEventListener('change', (e) => {
        const showOnlyBreakfast = e.target.checked;

        roomOffers.forEach(card => {
            const hasBreakfast = card.querySelector('.badge .fa-coffee');
            
            if (showOnlyBreakfast && !hasBreakfast) {
                card.classList.add('card-hidden');
            } else {
                card.classList.remove('card-hidden');
            }
        });

        // Afficher un message si aucun résultat
        const visibleOffers = Array.from(roomOffers).filter(card => !card.classList.contains('card-hidden'));
        const existingMsg = document.querySelector('.no-results-message');
        
        if (visibleOffers.length === 0 && !existingMsg) {
            const message = document.createElement('div');
            message.className = 'alert alert-info no-results-message';
            message.innerHTML = '<i class="fas fa-info-circle me-2"></i> Aucune offre avec petit-déjeuner gratuit disponible pour ces dates.';
            roomOffers[0].parentElement.appendChild(message);
        } else if (visibleOffers.length > 0 && existingMsg) {
            existingMsg.remove();
        }
    });
}

/**
 * Bouton "Lire plus" pour les avis
 */
function initReadMore() {
    const readMoreBtns = document.querySelectorAll('.reviews-list .btn-link');
    
    readMoreBtns.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const reviewText = btn.previousElementSibling.querySelector('p');
            
            if (reviewText) {
                reviewText.classList.toggle('review-text-expanded');
                btn.textContent = reviewText.classList.contains('review-text-expanded') ? 'Lire moins' : 'Lire plus';
            }
        });
    });
}

/**
 * Animation du compteur de recherches en temps réel
 */
function initLiveViewersCounter() {
    const priceCard = document.querySelector('.sticky-top .card');
    if (!priceCard) return;

    // Créer un badge de viewers
    const viewersBadge = document.createElement('div');
    viewersBadge.className = 'alert alert-warning mb-0 mt-2 viewers-badge';
    viewersBadge.innerHTML = '<i class="fas fa-eye me-2"></i> <span id="viewersCount">0</span> personnes consultent cet hôtel';
    
    const cardBody = priceCard.querySelector('.card-body');
    cardBody.appendChild(viewersBadge);

    // Animer le compteur
    let viewers = Math.floor(Math.random() * 15) + 5;
    const viewersSpan = document.getElementById('viewersCount');
    
    setInterval(() => {
        const change = Math.random() > 0.5 ? 1 : -1;
        viewers = Math.max(3, Math.min(25, viewers + change));
        
        viewersSpan.classList.add('viewers-pulse');
        viewersSpan.textContent = viewers;
        
        setTimeout(() => {
            viewersSpan.classList.remove('viewers-pulse');
        }, 500);
    }, 4000);
}

/**
 * Tooltip sur les étoiles de l'hôtel
 */
function initStarsTooltip() {
    const starsContainer = document.querySelector('.stars');
    if (!starsContainer) return;

    starsContainer.title = 'Hôtel 5 étoiles';
    starsContainer.classList.add('cursor-help');
}

/**
 * ===== NOUVELLES FONCTIONS UX PREMIUM =====
 */

/**
 * Countdown timer pour offres limitées
 */
function initCountdownTimers() {
    const timers = document.querySelectorAll('.countdown-timer');
    
    timers.forEach(timer => {
        let minutes = 14;
        let seconds = 32;
        
        setInterval(() => {
            seconds--;
            if (seconds < 0) {
                seconds = 59;
                minutes--;
            }
            if (minutes < 0) {
                minutes = 0;
                seconds = 0;
            }
            
            timer.textContent = `${minutes}:${seconds.toString().padStart(2, '0')}`;
            
            // Alerte visuelle quand moins de 5 minutes
            if (minutes < 5) {
                timer.parentElement.classList.add('bg-danger');
                timer.parentElement.classList.remove('bg-warning');
            }
        }, 1000);
    });
}

/**
 * Animation de la barre de disponibilité
 */
function initAvailabilityAnimation() {
    const progressBars = document.querySelectorAll('.availability-bar .progress-bar');
    
    progressBars.forEach(bar => {
        const width = bar.getAttribute('style')?.match(/width:\s*(\d+%)/)?.[1] || bar.style.width;
        bar.style.setProperty('--target-width', width);
        bar.classList.add('progress-bar-reset');
        
        setTimeout(() => {
            bar.classList.remove('progress-bar-reset');
            bar.classList.add('progress-bar-animate');
        }, 500);
    });
}

/**
 * Bouton favori avec animation
 */
function initFavoriteButton() {
    const favoriteBtn = document.querySelector('.favorite-btn');
    if (!favoriteBtn) return;

    favoriteBtn.addEventListener('click', (e) => {
        e.preventDefault();
        favoriteBtn.classList.toggle('active');
        
        // Animation du coeur
        favoriteBtn.classList.remove('heartbeat-animation');
        requestAnimationFrame(() => {
            favoriteBtn.classList.add('heartbeat-animation');
            setTimeout(() => favoriteBtn.classList.remove('heartbeat-animation'), 500);
        });
        
        // Toast notification
        showToast(
            favoriteBtn.classList.contains('active') 
                ? '❤️ Ajouté aux favoris' 
                : 'Retiré des favoris',
            favoriteBtn.classList.contains('active') ? 'success' : 'info'
        );
    });
}

/**
 * Bouton partage avec menu dropdown
 */
function initShareButton() {
    const shareBtn = document.querySelector('.share-btn');
    if (!shareBtn) return;

    shareBtn.addEventListener('click', async (e) => {
        e.preventDefault();
        
        if (navigator.share) {
            try {
                await navigator.share({
                    title: 'The Mirage Resort & Spa',
                    text: 'Découvrez cet hôtel incroyable !',
                    url: window.location.href
                });
                showToast('✅ Partagé avec succès !', 'success');
            } catch (err) {
                console.log('Partage annulé');
            }
        } else {
            // Fallback : copier le lien
            navigator.clipboard.writeText(window.location.href);
            showToast('🔗 Lien copié dans le presse-papier', 'success');
        }
    });
}

/**
 * Simulation de prix en temps réel
 */
function initRealtimePriceUpdates() {
    const priceElements = document.querySelectorAll('.text-kayak-orange');
    
    setInterval(() => {
        priceElements.forEach(priceEl => {
            // Petit flicker pour simuler une mise à jour
            priceEl.classList.add('price-update-animation');
            setTimeout(() => {
                priceEl.classList.remove('price-update-animation');
            }, 300);
        });
    }, 15000); // Toutes les 15 secondes
}

/**
 * Animation des badges flottants
 */
function initFloatingBadges() {
    const badges = document.querySelectorAll('.badge-float');
    
    badges.forEach((badge, index) => {
        // Animation d'entrée décalée
        badge.style.setProperty('--badge-delay', `${index * 0.15}s`);
        
        // Animation de hover infinie
        setInterval(() => {
            badge.classList.remove('badge-bounce-animation');
            requestAnimationFrame(() => {
                badge.classList.add('badge-bounce-animation');
                setTimeout(() => badge.classList.remove('badge-bounce-animation'), 600);
            });
        }, 5000 + (index * 500));
    });
}

/**
 * Tracker de consultations en temps réel
 */
function initRealTimeViewers() {
    const viewersTexts = document.querySelectorAll('[class*="personnes regardent"]');
    
    viewersTexts.forEach(text => {
        const updateViewers = () => {
            const currentNumber = parseInt(text.textContent.match(/\d+/)[0]);
            const change = Math.random() > 0.5 ? 1 : -1;
            const newNumber = Math.max(5, Math.min(35, currentNumber + change));
            
            text.textContent = text.textContent.replace(/\d+/, newNumber);
            
            // Animation flash
            text.classList.add('text-flash-orange');
            setTimeout(() => {
                text.classList.remove('text-flash-orange');
            }, 300);
        };
        
        setInterval(updateViewers, 8000);
    });
}

/**
 * Animation des cards au scroll
 */
function initRoomCardsAnimation() {
    const cards = document.querySelectorAll('.room-card-enhanced');
    
    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry, index) => {
            if (entry.isIntersecting) {
                setTimeout(() => {
                    entry.target.classList.add('room-card-visible');
                }, index * 100);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    cards.forEach(card => {
        card.classList.add('room-card-hidden');
        observer.observe(card);
    });
}

/**
 * Galerie d'images avec préchargement
 */
function initGalleryPreload() {
    const galleryImages = document.querySelectorAll('[data-bs-toggle="modal"][data-bs-target="#galleryModal"]');
    
    galleryImages.forEach(img => {
        img.addEventListener('click', () => {
            // Animation de zoom
            const imgElement = img.querySelector('img') || img;
            imgElement.classList.add('image-zoom-click');
            setTimeout(() => {
                imgElement.classList.remove('image-zoom-click');
            }, 200);
        });
    });
}

/**
 * Toast notification helper
 */
function showToast(message, type = 'info') {
    const toast = document.createElement('div');
    toast.className = `toast-notification toast-${type}`;
    toast.textContent = message;
    
    document.body.appendChild(toast);
    
    // Laisser le navigateur appliquer les styles avant l'animation
    requestAnimationFrame(() => {
        toast.classList.add('toast-show');
    });
    
    setTimeout(() => {
        toast.classList.add('toast-hide');
        setTimeout(() => toast.remove(), 300);
    }, 2700);
}

// Ajouter les animations CSS nécessaires
const style = document.createElement('style');
style.textContent = `
    @keyframes heartBeat {
        0%, 100% { transform: scale(1); }
        25% { transform: scale(1.3); }
        50% { transform: scale(1.1); }
        75% { transform: scale(1.25); }
    }
    
    @keyframes priceUpdate {
        0%, 100% { transform: scale(1); opacity: 1; }
        50% { transform: scale(1.05); opacity: 0.8; }
    }
    
    @keyframes bounceSmall {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-5px); }
    }
    
    @keyframes slideInRight {
        from { transform: translateX(400px); opacity: 0; }
        to { transform: translateX(0); opacity: 1; }
    }
    
    @keyframes slideOutRight {
        from { transform: translateX(0); opacity: 1; }
        to { transform: translateX(400px); opacity: 0; }
    }
`;
document.head.appendChild(style);

/**
 * Bouton "Afficher plus" pour les offres de chambres
 */
function initShowMoreRooms() {
    const showMoreBtn = document.querySelector('.room-offers .btn-outline-primary:not(.w-100)');
    if (!showMoreBtn) return;

    let expanded = false;
    const extraRooms = `
        <div class="card mb-3 border-0 shadow-sm extra-room" style="display: none;">
            <div class="card-body">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <h5 class="fw-bold mb-2">Suite Junior</h5>
                        <div class="d-flex gap-2 mb-2">
                            <span class="badge bg-light text-dark"><i class="fas fa-coffee"></i> Petit-déjeuner gratuit</span>
                            <span class="badge bg-info text-white"><i class="fas fa-hot-tub"></i> Jacuzzi</span>
                        </div>
                        <p class="text-muted small mb-0">Agoda</p>
                    </div>
                    <div class="col-md-3 text-end">
                        <div class="text-muted small mb-1">À partir de</div>
                        <div class="price-display">
                            <span class="h3 fw-bold text-kayak-orange">125 €</span>
                        </div>
                        <div class="text-muted small">Avant taxes</div>
                    </div>
                    <div class="col-md-3 text-end">
                        <button class="btn btn-primary w-100">Voir l'offre</button>
                        <small class="text-muted d-block mt-2">Agoda</small>
                    </div>
                </div>
            </div>
        </div>
    `;

    showMoreBtn.addEventListener('click', () => {
        const roomOffersContainer = document.querySelector('.room-offers');
        
        if (!expanded) {
            // Ajouter les chambres cachées
            roomOffersContainer.insertAdjacentHTML('beforeend', extraRooms.repeat(2));
            
            // Animer l'apparition
            setTimeout(() => {
                document.querySelectorAll('.extra-room').forEach((room, index) => {
                    setTimeout(() => {
                        room.style.display = 'block';
                        room.style.animation = 'fadeInUp 0.5s ease';
                    }, index * 100);
                });
            }, 50);
            
            showMoreBtn.innerHTML = 'Masquer les offres <i class="fas fa-chevron-up"></i>';
            expanded = true;
        } else {
            // Masquer les chambres supplémentaires
            document.querySelectorAll('.extra-room').forEach(room => {
                room.style.animation = 'fadeOut 0.3s ease';
                setTimeout(() => room.remove(), 300);
            });
            
            showMoreBtn.innerHTML = 'Afficher 5 autres tarifs de chambre <i class="fas fa-chevron-down"></i>';
            expanded = false;
        }
    });
}

document.addEventListener('DOMContentLoaded', () => {
    initLiveSearchCounter();
    initHeroStatsAnimation();
    enhanceDestinationInput();
    initPartnerCounter();
    initKeyboardShortcuts();
    initProgressiveValidation();
    initAccessibilityAnnouncements();
    initPerformanceMonitoring();
    
    // Init fonctions page hotels.php - Basiques
    initHotelDetailNav();
    initPriceCalculator();
    initReviewsAnimation();
    initBreakfastFilter();
    initReadMore();
    initLiveViewersCounter();
    initStarsTooltip();
    initShowMoreRooms();
    
    // Init fonctions page hotels.php - PREMIUM UX
    initCountdownTimers();
    initAvailabilityAnimation();
    initFavoriteButton();
    initShareButton();
    initRealtimePriceUpdates();
    initFloatingBadges();
    initRealTimeViewers();
    initRoomCardsAnimation();
    initGalleryPreload();
    
    // Init fonctions MOBILE PREMIUM
    initMobileCTA();
    initMobileQuickActions();
    initMobileScrollIndicators();
    initTouchGestures();
    initMobileSwipeGallery();
    addBodyClassForMobile();
    
    // Message console amélioré
    console.log('%c🎨 HOTELS.PHP - PREMIUM UX ACTIVÉ', 'color: #ff8000; font-size: 16px; font-weight: bold;');
    console.log('%c✨ Toutes les micro-interactions sont actives', 'color: #2ecc71; font-size: 12px;');
    console.log('%c📱 Mobile Premium UX activé', 'color: #3498db; font-size: 12px;');
});

// ========================================
// MOBILE PREMIUM UX FUNCTIONS
// ========================================

/**
 * Ajouter classe body pour styling mobile
 */
function addBodyClassForMobile() {
    if (document.querySelector('.mobile-cta-bar')) {
        document.body.classList.add('hotel-page');
    }
}

/**
 * Mobile CTA Bar - Scroll to rooms
 */
function initMobileCTA() {
    const mobileCTABtn = document.getElementById('mobileCTABtn');
    if (!mobileCTABtn) return;

    mobileCTABtn.addEventListener('click', () => {
        const roomsSection = document.getElementById('rooms');
        if (roomsSection) {
            roomsSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
            
            // Animation haptic feedback
            mobileCTABtn.classList.add('btn-pulse-animation');
            setTimeout(() => {
                mobileCTABtn.classList.remove('btn-pulse-animation');
            }, 300);
            
            // Toast
            showToast('📋 Comparaison des offres...', 'info');
        }
    });

    // Update price dynamically
    window.addEventListener('scroll', () => {
        const scrollPercent = (window.scrollY / (document.documentElement.scrollHeight - window.innerHeight)) * 100;
        
        if (scrollPercent > 20 && scrollPercent < 80) {
            mobileCTABtn.innerHTML = '<i class="fas fa-check-circle me-2"></i> Réserver maintenant';
        } else {
            mobileCTABtn.innerHTML = '<i class="fas fa-search me-2"></i> Voir les offres';
        }
    });
}

/**
 * Mobile Quick Actions Buttons
 */
function initMobileQuickActions() {
    const shareBtn = document.getElementById('mobileShareBtn');
    const favoriteBtn = document.getElementById('mobileFavoriteBtn');
    const scrollTopBtn = document.getElementById('scrollTopBtn');

    // Share button
    if (shareBtn) {
        shareBtn.addEventListener('click', async () => {
            if (navigator.share) {
                try {
                    await navigator.share({
                        title: 'The Mirage Resort & Spa',
                        text: 'Découvrez cet hôtel incroyable !',
                        url: window.location.href
                    });
                    showToast('✅ Partagé avec succès !', 'success');
                } catch (err) {
                    console.log('Partage annulé');
                }
            } else {
                navigator.clipboard.writeText(window.location.href);
                showToast('🔗 Lien copié !', 'success');
            }
            
            // Haptic feedback simulation
            shareBtn.classList.add('btn-scale-click');
            setTimeout(() => {
                shareBtn.classList.remove('btn-scale-click');
            }, 100);
        });
    }

    // Favorite button
    if (favoriteBtn) {
        favoriteBtn.addEventListener('click', () => {
            favoriteBtn.classList.toggle('active');
            
            const icon = favoriteBtn.querySelector('i');
            if (favoriteBtn.classList.contains('active')) {
                icon.className = 'fas fa-heart';
                showToast('❤️ Ajouté aux favoris', 'success');
            } else {
                icon.className = 'far fa-heart';
                showToast('Retiré des favoris', 'info');
            }
            
            // Animation
            favoriteBtn.classList.add('heartbeat-animation');
            setTimeout(() => {
                favoriteBtn.classList.remove('heartbeat-animation');
            }, 500);
        });
    }

    // Scroll to top button
    if (scrollTopBtn) {
        window.addEventListener('scroll', () => {
            if (window.scrollY > 500) {
                scrollTopBtn.classList.add('visible');
            } else {
                scrollTopBtn.classList.remove('visible');
            }
        });

        scrollTopBtn.addEventListener('click', () => {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
            
            // Haptic feedback
            scrollTopBtn.classList.add('btn-scale-click');
            setTimeout(() => {
                scrollTopBtn.classList.remove('btn-scale-click');
            }, 150);
        });
    }
}

/**
 * Mobile Scroll Indicators for horizontal sections
 */
function initMobileScrollIndicators() {
    if (window.innerWidth > 768) return;

    const horizontalSections = [
        document.querySelector('.quick-features'),
        document.querySelector('.activities-section .row')
    ];

    horizontalSections.forEach(section => {
        if (!section) return;

        let isScrolling;
        section.addEventListener('scroll', () => {
            section.style.opacity = '0.7';
            
            clearTimeout(isScrolling);
            isScrolling = setTimeout(() => {
                section.style.opacity = '1';
            }, 150);
        });

        // Add scroll hint animation
        if (section.scrollWidth > section.clientWidth) {
            section.style.position = 'relative';
            
            const hint = document.createElement('div');
            hint.className = 'scroll-hint';
            hint.innerHTML = '→';
            
            section.appendChild(hint);
            
            // Hide hint after first scroll
            section.addEventListener('scroll', () => {
                hint.classList.add('hidden');
            }, { once: true });
        }
    });
}

/**
 * Touch Gestures - Swipe et Long Press
 */
function initTouchGestures() {
    if (window.innerWidth > 768) return;

    let touchStartX = 0;
    let touchStartY = 0;
    let touchStartTime = 0;

    // Swipe gesture pour naviguer entre sections
    document.addEventListener('touchstart', (e) => {
        touchStartX = e.touches[0].clientX;
        touchStartY = e.touches[0].clientY;
        touchStartTime = Date.now();
    });

    document.addEventListener('touchend', (e) => {
        const touchEndX = e.changedTouches[0].clientX;
        const touchEndY = e.changedTouches[0].clientY;
        const touchDuration = Date.now() - touchStartTime;
        
        const deltaX = touchEndX - touchStartX;
        const deltaY = touchEndY - touchStartY;

        // Swipe horizontal (min 100px, max 500ms)
        if (Math.abs(deltaX) > 100 && Math.abs(deltaY) < 50 && touchDuration < 500) {
            if (deltaX > 0) {
                // Swipe right
                console.log('Swipe right detected');
            } else {
                // Swipe left
                console.log('Swipe left detected');
            }
        }
    });

    // Long press sur images pour partager
    const images = document.querySelectorAll('.gallery-img, .activity-image img');
    images.forEach(img => {
        let longPressTimer;
        
        img.addEventListener('touchstart', () => {
            longPressTimer = setTimeout(() => {
                // Vibration si disponible
                if (navigator.vibrate) {
                    navigator.vibrate(50);
                }
                showToast('📸 Image sauvegardée', 'success');
            }, 800);
        });
        
        img.addEventListener('touchend', () => {
            clearTimeout(longPressTimer);
        });
        
        img.addEventListener('touchmove', () => {
            clearTimeout(longPressTimer);
        });
    });
}

/**
 * Mobile Swipe Gallery avec Hammer.js like behavior
 */
function initMobileSwipeGallery() {
    if (window.innerWidth > 768) return;

    const galleryRow = document.querySelector('.hotel-hero .row.g-1');
    if (!galleryRow) return;

    let startX = 0;
    let scrollLeft = 0;
    let isDown = false;

    // Make gallery images swipeable
    const galleryImages = galleryRow.querySelectorAll('.col-6');
    galleryImages.forEach((col, index) => {
        col.style.transition = 'transform 0.3s ease';
        
        col.addEventListener('touchstart', (e) => {
            isDown = true;
            startX = e.touches[0].pageX;
        });
        
        col.addEventListener('touchmove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.touches[0].pageX;
            const walk = (x - startX) * 2;
            col.style.setProperty('--touch-drag-offset', `${walk}px`);
            col.classList.add('touch-dragging');
        });
        
        col.addEventListener('touchend', () => {
            isDown = false;
            col.classList.remove('touch-dragging');
            col.style.removeProperty('--touch-drag-offset');
        });
    });
}

/**
 * Performance: Lazy load images on mobile
 */
function initMobileLazyLoad() {
    if (window.innerWidth > 768) return;
    if ('IntersectionObserver' in window) {
        const imageObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const img = entry.target;
                    if (img.dataset.src) {
                        img.src = img.dataset.src;
                        img.classList.remove('skeleton-loader');
                        imageObserver.unobserve(img);
                    }
                }
            });
        }, { rootMargin: '50px' });

        document.querySelectorAll('img[data-src]').forEach(img => {
            img.classList.add('skeleton-loader');
            imageObserver.observe(img);
        });
    }
}

/* ============================================
   INDEX.PHP - MOBILE PREMIUM FEATURES
   ============================================ */

/**
 * Hero Stats Auto-Carousel Mobile
 */
function initHomeHeroStatsCarousel() {
    if (window.innerWidth > 768) return;
    
    const statsContainer = document.querySelector('.hero-stats');
    if (!statsContainer) return;
    
    let currentIndex = 0;
    const stats = statsContainer.querySelectorAll('.stat-item');
    const statCount = stats.length;
    
    // Auto-scroll every 3 seconds
    setInterval(() => {
        currentIndex = (currentIndex + 1) % statCount;
        const scrollPosition = stats[currentIndex].offsetLeft - 15; // 15px padding
        
        statsContainer.scrollTo({
            left: scrollPosition,
            behavior: 'smooth'
        });
    }, 3000);
    
    // Vibrate on manual scroll
    statsContainer.addEventListener('scroll', () => {
        if (navigator.vibrate) {
            navigator.vibrate(5);
        }
    });
}

/**
 * Mobile Search Form Enhancements
 */
function initMobileSearchForm() {
    if (window.innerWidth > 768) return;
    
    const searchForm = document.querySelector('.search-form-premium');
    if (!searchForm) return;
    
    // Add ripple effect on input click
    const inputGroups = searchForm.querySelectorAll('.search-input-group');
    inputGroups.forEach(group => {
        group.addEventListener('click', function(e) {
            const ripple = document.createElement('span');
            ripple.className = 'ripple-effect';
            const rect = this.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.style.setProperty('--ripple-size', `${size}px`);
            ripple.style.setProperty('--ripple-x', `${x}px`);
            ripple.style.setProperty('--ripple-y', `${y}px`);
            
            this.style.position = 'relative';
            this.style.overflow = 'hidden';
            this.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        });
    });
    
    // Enhance dropdown behavior for mobile
    const guestsDropdown = document.querySelector('.guests-dropdown');
    if (guestsDropdown) {
        // Add backdrop for mobile dropdown
        const backdrop = document.createElement('div');
        backdrop.className = 'mobile-dropdown-backdrop';
        document.body.appendChild(backdrop);
        
        // Show/hide backdrop with dropdown (only on mobile)
        const observer = new MutationObserver((mutations) => {
            mutations.forEach((mutation) => {
                if (mutation.attributeName === 'class') {
                    const isShown = guestsDropdown.classList.contains('show');
                    // Only show backdrop on mobile screens
                    if (window.innerWidth <= 768) {
                        backdrop.classList.toggle('show', isShown);
                        if (isShown && navigator.vibrate) {
                            navigator.vibrate(10);
                        }
                    }
                }
            });
        });
        
        observer.observe(guestsDropdown, { attributes: true });
        
        // Close on backdrop click
        backdrop.addEventListener('click', () => {
            guestsDropdown.classList.remove('show');
        });
    }
}

/**
 * Partners Swipe Carousel with Indicators
 */
function initPartnersSwipe() {
    if (window.innerWidth > 768) return;
    
    const partnersRow = document.querySelector('.partners-section .row.g-3');
    if (!partnersRow) return;
    
    // Add scroll indicator
    const indicator = document.createElement('div');
    indicator.className = 'partners-scroll-indicator';
    
    const partnerLogos = partnersRow.querySelectorAll('.partner-logo');
    const dotCount = Math.min(5, Math.ceil(partnerLogos.length / 2));
    
    for (let i = 0; i < dotCount; i++) {
        const dot = document.createElement('div');
        dot.className = 'indicator-dot';
        if (i === 0) dot.classList.add('active');
        indicator.appendChild(dot);
    }
    
    partnersRow.parentElement.style.position = 'relative';
    partnersRow.parentElement.appendChild(indicator);
    
    // Update indicator on scroll
    partnersRow.addEventListener('scroll', () => {
        const scrollPercentage = partnersRow.scrollLeft / (partnersRow.scrollWidth - partnersRow.clientWidth);
        const activeDot = Math.floor(scrollPercentage * dotCount);
        
        indicator.querySelectorAll('.indicator-dot').forEach((dot, index) => {
            dot.classList.toggle('active', index === activeDot);
        });
    });
}

/**
 * Destinations Swipe with Progress Bar and Scroll Hint
 */
function initDestinationsSwipe() {
    if (window.innerWidth > 768) return;
    
    const destGrid = document.querySelector('.destinations-grid');
    const scrollHint = document.querySelector('.destinations-scroll-hint');
    if (!destGrid) return;
    
    // Add progress bar
    const progressBar = document.createElement('div');
    progressBar.className = 'destinations-progress-bar';
    
    destGrid.parentElement.style.position = 'relative';
    destGrid.parentElement.appendChild(progressBar);
    
    let hasScrolled = false;
    
    // Update progress on scroll
    destGrid.addEventListener('scroll', () => {
        const scrollPercentage = (destGrid.scrollLeft / (destGrid.scrollWidth - destGrid.clientWidth)) * 100;
        progressBar.style.setProperty('--progress-width', scrollPercentage + '%');
        
        // Hide scroll hint after first scroll
        if (!hasScrolled && destGrid.scrollLeft > 10) {
            hasScrolled = true;
            destGrid.classList.add('scrolled');
            if (scrollHint) {
                scrollHint.style.opacity = '0';
                scrollHint.style.visibility = 'hidden';
            }
        }
        
        // Haptic feedback at 50%
        if (scrollPercentage > 48 && scrollPercentage < 52 && navigator.vibrate) {
            navigator.vibrate(5);
        }
    }, { passive: true });
    
    // Auto-hide scroll hint after 3 seconds
    setTimeout(() => {
        if (scrollHint && !hasScrolled) {
            scrollHint.style.transition = 'opacity 0.5s ease, visibility 0.5s ease';
            scrollHint.style.opacity = '0';
            scrollHint.style.visibility = 'hidden';
        }
    }, 3000);
}

/**
 * Special Offers Swipe with Progress Bar and Scroll Hint
 */
function initSpecialOffersSwipe() {
    if (window.innerWidth > 768) return;
    
    const offersGrid = document.querySelector('.offers-grid');
    const scrollHint = document.querySelector('.offers-scroll-hint');
    if (!offersGrid) return;
    
    // Add progress bar
    const progressBar = document.createElement('div');
    progressBar.className = 'offers-progress-bar';
    
    offersGrid.parentElement.style.position = 'relative';
    offersGrid.parentElement.appendChild(progressBar);
    
    let hasScrolled = false;
    
    // Update progress on scroll
    offersGrid.addEventListener('scroll', () => {
        const scrollPercentage = (offersGrid.scrollLeft / (offersGrid.scrollWidth - offersGrid.clientWidth)) * 100;
        progressBar.style.setProperty('--progress-width', scrollPercentage + '%');
        
        // Hide scroll hint after first scroll
        if (!hasScrolled && offersGrid.scrollLeft > 10) {
            hasScrolled = true;
            offersGrid.classList.add('scrolled');
            if (scrollHint) {
                scrollHint.style.opacity = '0';
                scrollHint.style.visibility = 'hidden';
            }
        }
        
        // Haptic feedback at 50%
        if (scrollPercentage > 48 && scrollPercentage < 52 && navigator.vibrate) {
            navigator.vibrate(5);
        }
    }, { passive: true });
    
    // Auto-hide scroll hint after 3 seconds
    setTimeout(() => {
        if (scrollHint && !hasScrolled) {
            scrollHint.style.transition = 'opacity 0.5s ease, visibility 0.5s ease';
            scrollHint.style.opacity = '0';
            scrollHint.style.visibility = 'hidden';
        }
    }, 3000);
}

/**
 * Mobile FAB (Floating Action Button) - Quick Search
 */
function initMobileFAB() {
    if (window.innerWidth > 768) return;
    
    // Check if we're on homepage
    const searchForm = document.querySelector('.search-form-premium');
    if (!searchForm) return;
    
    // Create FAB
    const fab = document.createElement('button');
    fab.className = 'mobile-fab';
    fab.innerHTML = '<i class="fas fa-search"></i>';
    fab.setAttribute('aria-label', 'Recherche rapide');
    
    // Hide FAB initially
    fab.classList.add('fab-hidden');
    document.body.appendChild(fab);
    
    // Show FAB when scrolled past hero
    let lastScroll = 0;
    window.addEventListener('scroll', () => {
        const currentScroll = window.pageYOffset;
        const heroHeight = document.querySelector('.hero-section')?.offsetHeight || 600;
        
        if (currentScroll > heroHeight && currentScroll > lastScroll) {
            // Scrolling down, past hero - show FAB
            fab.classList.remove('fab-hidden');
            fab.classList.add('fab-visible');
        } else if (currentScroll < heroHeight / 2) {
            // Near top - hide FAB
            fab.classList.remove('fab-visible');
            fab.classList.add('fab-hidden');
        }
        
        lastScroll = currentScroll;
    });
    
    // Click FAB to scroll to search form
    fab.addEventListener('click', () => {
        if (navigator.vibrate) {
            navigator.vibrate(20);
        }
        
        searchForm.scrollIntoView({
            behavior: 'smooth',
            block: 'center'
        });
        
        // Focus first input after scroll
        setTimeout(() => {
            const firstInput = searchForm.querySelector('input, select');
            if (firstInput) {
                firstInput.focus();
            }
        }, 500);
    });
}

/**
 * Home Mobile Gestures - Pull to refresh hint
 */
function initHomeMobileGestures() {
    if (window.innerWidth > 768) return;
    
    let touchStartY = 0;
    let pullDistance = 0;
    
    // Pull-to-refresh hint (visual only)
    const refreshHint = document.createElement('div');
    refreshHint.className = 'pull-refresh-hint';
    refreshHint.innerHTML = '<i class="fas fa-sync-alt me-2"></i>Glissez pour actualiser';
    document.body.appendChild(refreshHint);
    
    document.addEventListener('touchstart', (e) => {
        if (window.pageYOffset === 0) {
            touchStartY = e.touches[0].clientY;
        }
    });
    
    document.addEventListener('touchmove', (e) => {
        if (window.pageYOffset === 0 && touchStartY > 0) {
            pullDistance = e.touches[0].clientY - touchStartY;
            
            if (pullDistance > 0 && pullDistance < 100) {
                const topValue = Math.min(pullDistance - 50, 0) + 'px';
                refreshHint.style.setProperty('--hint-top', topValue);
            }
        }
    });
    
    document.addEventListener('touchend', () => {
        if (pullDistance > 80) {
            // Show refresh message
            refreshHint.classList.add('show');
            refreshHint.innerHTML = '<i class="fas fa-check-circle me-2"></i>Déjà à jour!';
            
            setTimeout(() => {
                refreshHint.classList.remove('show');
                setTimeout(() => {
                    refreshHint.innerHTML = '<i class="fas fa-sync-alt me-2"></i>Glissez pour actualiser';
                }, 300);
            }, 2000);
        } else {
            refreshHint.classList.remove('show');
        }
        
        touchStartY = 0;
        pullDistance = 0;
    });
}

/**
 * Initialize all mobile features for homepage
 */
function initHomepageMobile() {
    if (window.innerWidth <= 768) {
        initHomeHeroStatsCarousel();
        initMobileSearchForm();
        initPartnersSwipe();
        initDestinationsSwipe();
        initMobileFAB();
        initHomeMobileGestures();
        
        console.log('%c✅ Homepage Mobile Features Initialized', 'color: #2ecc71; font-weight: bold;');
    }
}

/**
 * ===== MOBILE FILTERS BOTTOM SHEET (SEARCH PAGE) =====
 */
function initMobileFilters() {
    const openBtn = document.getElementById('openFiltersBtn');
    const closeBtn = document.getElementById('closeFiltersBtn');
    const applyBtn = document.getElementById('applyFiltersBtn');
    const resetBtn = document.getElementById('resetFiltersBtn');
    const sidebar = document.getElementById('filtersSidebar');
    const backdrop = document.getElementById('filtersBackdrop');
    const countBadge = document.getElementById('activeFiltersCount');
    
    if (!openBtn || !sidebar) return; // Not on search page
    
    // Track active filters count
    let activeFiltersCount = 0;
    
    function updateFiltersCount() {
        const checkedFilters = sidebar.querySelectorAll('input[type="checkbox"]:checked, .rating-filter-btn.active');
        activeFiltersCount = checkedFilters.length;
        countBadge.textContent = activeFiltersCount;
        countBadge.style.display = activeFiltersCount > 0 ? 'flex' : 'none';
    }
    
    function openFilters() {
        sidebar.classList.add('show');
        backdrop.classList.add('show');
        document.body.style.overflow = 'hidden';
        
        // Haptic feedback
        if (navigator.vibrate) {
            navigator.vibrate(10);
        }
    }
    
    function closeFilters() {
        sidebar.classList.remove('show');
        backdrop.classList.remove('show');
        document.body.style.overflow = '';
    }
    
    function applyFilters() {
        updateFiltersCount();
        closeFilters();
        
        // Scroll to top of results
        window.scrollTo({ top: 0, behavior: 'smooth' });
        
        // Haptic feedback
        if (navigator.vibrate) {
            navigator.vibrate([10, 20, 10]);
        }
    }
    
    function resetFilters() {
        // Uncheck all checkboxes
        sidebar.querySelectorAll('input[type="checkbox"]:checked').forEach(cb => {
            cb.checked = false;
        });
        
        // Deactivate rating filters
        sidebar.querySelectorAll('.rating-filter-btn.active').forEach(btn => {
            btn.classList.remove('active');
        });
        
        // Reset price range
        const priceRange = sidebar.querySelector('input[type="range"]');
        if (priceRange) {
            priceRange.value = priceRange.max / 2;
        }
        
        updateFiltersCount();
        
        // Haptic feedback
        if (navigator.vibrate) {
            navigator.vibrate(20);
        }
    }
    
    // Event Listeners
    openBtn.addEventListener('click', openFilters);
    if (closeBtn) closeBtn.addEventListener('click', closeFilters);
    if (applyBtn) applyBtn.addEventListener('click', applyFilters);
    if (resetBtn) resetBtn.addEventListener('click', resetFilters);
    backdrop.addEventListener('click', closeFilters);
    
    // Close on ESC key
    document.addEventListener('keydown', (e) => {
        if (e.key === 'Escape' && sidebar.classList.contains('show')) {
            closeFilters();
        }
    });
    
    // Update count on filter change
    sidebar.addEventListener('change', updateFiltersCount);
    
    // Handle rating filter buttons
    sidebar.querySelectorAll('.rating-filter-btn').forEach(btn => {
        btn.addEventListener('click', () => {
            sidebar.querySelectorAll('.rating-filter-btn').forEach(b => b.classList.remove('active'));
            btn.classList.add('active');
            updateFiltersCount();
        });
    });
    
    // Initialize count
    updateFiltersCount();
}

// Initialize homepage mobile features on load
if (document.readyState === 'loading') {
    document.addEventListener('DOMContentLoaded', () => {
        initHomepageMobile();
        initMobileFilters(); // Initialize search page mobile filters
        initSpecialOffersSwipe(); // Initialize special offers carousel
    });
} else {
    initHomepageMobile();
    initMobileFilters(); // Initialize search page mobile filters
    initSpecialOffersSwipe(); // Initialize special offers carousel
}

// Reinitialize on resize (orientation change)
let resizeTimer;
window.addEventListener('resize', () => {
    clearTimeout(resizeTimer);
    resizeTimer = setTimeout(() => {
        initHomepageMobile();
        initMobileFilters();
        initSpecialOffersSwipe();
    }, 250);
});

// Console Welcome Message
console.log('%cHotelsFinder Premium UX', 'color: #006ce4; font-size: 24px; font-weight: bold;');
console.log('%cOptimisé pour la conversion et l\'engagement', 'color: #666; font-size: 14px;');
console.log('%c✨ Nouvelles fonctionnalités UX actives', 'color: #2ecc71; font-size: 12px; font-weight: bold;');
console.log('État actuel:', state);
