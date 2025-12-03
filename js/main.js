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

// Console Welcome Message
console.log('%cHotelsFinder POC', 'color: #0071c2; font-size: 24px; font-weight: bold;');
console.log('%cPage d\'accueil inspirée de HotelsCombined', 'color: #666; font-size: 14px;');
console.log('État actuel:', state);
