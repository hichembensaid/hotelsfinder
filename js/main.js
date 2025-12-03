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
        guestsBtn.addEventListener('click', (e) => {
            e.stopPropagation();
            guestsDropdown.classList.toggle('show');
        });
        
        guestsBtn.addEventListener('keydown', (e) => {
            if (e.key === 'Enter' || e.key === ' ') {
                e.preventDefault();
                guestsDropdown.classList.toggle('show');
            }
        });
    }
    
    // Close dropdown when clicking outside
    document.addEventListener('click', (e) => {
        if (!e.target.closest('.col-12.col-lg-3.search-field') && guestsDropdown) {
            guestsDropdown.classList.remove('show');
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
            entry.target.style.opacity = '1';
            entry.target.style.transform = 'translateY(0)';
        }
    });
}, observerOptions);

// Observe cards for animation
document.addEventListener('DOMContentLoaded', () => {
    const cards = document.querySelectorAll('.destination-card, .about-card, .faq-item');
    cards.forEach(card => {
        card.style.opacity = '0';
        card.style.transform = 'translateY(30px)';
        card.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(card);
    });
});

// Header Shadow on Scroll
let lastScroll = 0;
window.addEventListener('scroll', () => {
    const header = document.querySelector('.header');
    const currentScroll = window.pageYOffset;
    
    if (currentScroll > 100) {
        header.style.boxShadow = '0 4px 12px rgba(0, 0, 0, 0.15)';
    } else {
        header.style.boxShadow = '0 2px 8px rgba(0, 0, 0, 0.1)';
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
                entry.target.style.opacity = '1';
                entry.target.style.transform = 'translateY(0)';
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });
    
    document.querySelectorAll('.card, .stat-card').forEach(el => {
        el.style.opacity = '0';
        el.style.transform = 'translateY(30px)';
        el.style.transition = 'opacity 0.6s ease, transform 0.6s ease';
        observer.observe(el);
    });
}

// Enhanced Search Features
function initSearchEnhancements() {
    const searchInput = document.getElementById('destination');
    
    if (searchInput) {
        // Add search icon animation on focus
        searchInput.addEventListener('focus', () => {
            searchInput.parentElement.style.backgroundColor = '#f0f8ff';
        });
        
        searchInput.addEventListener('blur', () => {
            searchInput.parentElement.style.backgroundColor = '';
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
function initQuickFilters() {
    const filterButtons = document.querySelectorAll('.quick-filter-btn');
    const selectedFilters = new Set();
    
    filterButtons.forEach(btn => {
        btn.addEventListener('click', (e) => {
            e.preventDefault();
            const filter = btn.getAttribute('data-filter');
            
            // Toggle selection
            if (selectedFilters.has(filter)) {
                selectedFilters.delete(filter);
                btn.classList.remove('filter-active');
            } else {
                selectedFilters.add(filter);
                btn.classList.add('filter-active');
            }
            
            // Add ripple effect
            const ripple = document.createElement('span');
            ripple.classList.add('filter-ripple');
            btn.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
            
            // Update form with selected filters
            console.log('Filtres actifs:', Array.from(selectedFilters));
            
            // Show toast notification
            showFilterToast(filter, selectedFilters.has(filter));
        });
    });
}

function showFilterToast(filter, isAdded) {
    const filterNames = {
        'wifi': 'WiFi gratuit',
        'pool': 'Piscine',
        'parking': 'Parking',
        'pets': 'Animaux acceptés',
        'breakfast': 'Petit-déjeuner',
        'spa': 'Spa & Bien-être'
    };
    
    const toast = document.createElement('div');
    toast.className = 'filter-toast';
    toast.innerHTML = `
        <i class="fas fa-${isAdded ? 'check-circle' : 'times-circle'} me-2"></i>
        ${filterNames[filter]} ${isAdded ? 'ajouté' : 'retiré'}
    `;
    
    document.body.appendChild(toast);
    
    setTimeout(() => toast.classList.add('show'), 10);
    setTimeout(() => {
        toast.classList.remove('show');
        setTimeout(() => toast.remove(), 300);
    }, 2000);
}

// Live Search Counter Animation
function initLiveSearchCounter() {
    const counterElement = document.querySelector('.searches-count');
    if (!counterElement) return;
    
    let count = 1247;
    
    setInterval(() => {
        // Randomly increment counter (simulating real-time searches)
        const increment = Math.floor(Math.random() * 3) + 1;
        count += increment;
        
        // Animate the change
        counterElement.style.transform = 'scale(1.2)';
        counterElement.style.color = '#2ecc71';
        
        setTimeout(() => {
            counterElement.textContent = count.toLocaleString('fr-FR');
            counterElement.style.transform = 'scale(1)';
            counterElement.style.color = '';
        }, 200);
    }, 5000); // Update every 5 seconds
}

// Hero Stats Animation on Scroll
function initHeroStatsAnimation() {
    const stats = document.querySelectorAll('.stat-item');
    
    stats.forEach((stat, index) => {
        stat.style.animationDelay = `${index * 0.2}s`;
    });
}

// Trust Badge Rotation
function initTrustBadgeRotation() {
    const badges = [
        { icon: 'shield-check', text: 'Réservation 100% sécurisée' },
        { icon: 'credit-card', text: 'Paiement sécurisé SSL' },
        { icon: 'undo', text: 'Annulation gratuite' },
        { icon: 'headset', text: 'Support 24/7' },
        { icon: 'award', text: 'Meilleur prix garanti' },
        { icon: 'lock', text: 'Vos données protégées' }
    ];
    
    const badgeElement = document.querySelector('.hero-trust-badge');
    if (!badgeElement) return;
    
    let currentIndex = 0;
    
    setInterval(() => {
        badgeElement.style.opacity = '0';
        badgeElement.style.transform = 'translateY(-10px)';
        
        setTimeout(() => {
            currentIndex = (currentIndex + 1) % badges.length;
            const badge = badges[currentIndex];
            
            const content = Array.from(badgeElement.children);
            let textIndex = 0;
            
            content.forEach((child, idx) => {
                if (child.tagName === 'I' && idx % 2 === 0) {
                    child.className = `fas fa-${badge.icon}`;
                } else if (child.tagName === 'SPAN' && !child.classList.contains('mx-2')) {
                    if (textIndex === Math.floor(idx / 2)) {
                        child.textContent = badge.text;
                        textIndex++;
                    }
                }
            });
            
            badgeElement.style.opacity = '1';
            badgeElement.style.transform = 'translateY(0)';
        }, 300);
    }, 4000); // Rotate every 4 seconds
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
        
        counterElement.style.transform = 'scale(1.15)';
        counterElement.style.color = '#2ecc71';
        
        setTimeout(() => {
            counterElement.textContent = count + '+';
            counterElement.style.transform = 'scale(1)';
            counterElement.style.color = '';
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
                successIcon.className = 'fas fa-check-circle text-success';
                successIcon.style.position = 'absolute';
                successIcon.style.right = '16px';
                successIcon.style.top = '50%';
                successIcon.style.transform = 'translateY(-50%)';
                successIcon.style.animation = 'fadeInUp 0.3s ease-out';
                
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
    
    // Announce when filters are selected
    const filterButtons = document.querySelectorAll('.quick-filter-btn');
    filterButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            const filterName = btn.textContent.trim().split('\n')[0];
            announceToScreenReader(`Filtre ${filterName} ${btn.classList.contains('filter-active') ? 'activé' : 'désactivé'}`);
        });
    });
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
document.addEventListener('DOMContentLoaded', () => {
    initQuickFilters();
    initLiveSearchCounter();
    initHeroStatsAnimation();
    initTrustBadgeRotation();
    enhanceDestinationInput();
    initPartnerCounter();
    initKeyboardShortcuts();
    initProgressiveValidation();
    initAccessibilityAnnouncements();
    initPerformanceMonitoring();
});

// Console Welcome Message
console.log('%cHotelsFinder Premium UX', 'color: #006ce4; font-size: 24px; font-weight: bold;');
console.log('%cOptimisé pour la conversion et l\'engagement', 'color: #666; font-size: 14px;');
console.log('%c✨ Nouvelles fonctionnalités UX actives', 'color: #2ecc71; font-size: 12px; font-weight: bold;');
console.log('État actuel:', state);
