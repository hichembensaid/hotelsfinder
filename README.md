# HotelsFinder - Moteur de Recherche d'Hôtels

Un moteur de recherche d'hôtels moderne inspiré de HotelsCombined, avec une interface utilisateur épurée et intuitive.

## 🎨 Caractéristiques

### Design
- Interface moderne et épurée
- Moteur de recherche horizontal avec champs intégrés
- Design responsive (desktop, tablette, mobile)
- Animations fluides et transitions douces
- Palette de couleurs professionnelle

### Fonctionnalités
- **Recherche de destination** avec autocomplétion
- **Sélecteur de dates** (check-in / check-out)
- **Sélecteur de voyageurs** (chambres, adultes, enfants)
- **Destinations populaires** avec images
- **Section informative** sur les fonctionnalités
- **FAQ** interactive
- **Footer** complet avec liens sociaux

### Technique
- HTML5 sémantique
- CSS3 moderne (Flexbox, Grid, animations)
- JavaScript vanilla (ES6+)
- Design mobile-first
- Accessibilité (ARIA labels, navigation clavier)

## 🚀 Installation

### Prérequis
- PHP 7.4+ (pour le serveur de développement)
- Navigateur web moderne

### Démarrage rapide

1. Cloner ou télécharger le projet
2. Ouvrir un terminal dans le dossier du projet
3. Lancer le serveur de développement :
```bash
php -S localhost:8000
```
4. Ouvrir http://localhost:8000 dans votre navigateur

## 📁 Structure du projet

```
test/
│
├── index.php          # Page principale
├── css/
│   └── style.css      # Styles CSS
├── js/
│   └── main.js        # Scripts JavaScript
└── README.md          # Documentation
```

## 🎯 Composants principaux

### Moteur de recherche
Le moteur de recherche est conçu comme une barre horizontale avec 4 champs principaux :
1. **Destination** - Recherche avec autocomplétion
2. **Dates** - Sélecteur de dates (check-in / check-out)
3. **Voyageurs** - Sélecteur de chambres et voyageurs
4. **Bouton recherche** - Icône de recherche

### Design responsive
- **Desktop (>1024px)** : Tous les champs sur une seule ligne
- **Tablette (768-1024px)** : Destination sur une ligne, le reste sur la suivante
- **Mobile (<768px)** : Tous les champs empilés verticalement

## 🎨 Personnalisation

### Couleurs
Les couleurs principales sont définies dans les variables CSS dans `style.css` :
```css
:root {
    --primary-color: #006ce4;
    --primary-hover: #0053ba;
    --text-dark: #262626;
    --text-light: #757575;
    --bg-light: #f7f9fa;
}
```

### Destinations
Les destinations peuvent être modifiées dans :
- **HTML** : Section "destinations" dans `index.php`
- **JavaScript** : Tableau `mockDestinations` dans `main.js`

## 🔧 Fonctionnalités JavaScript

### État de l'application
```javascript
let state = {
    rooms: 1,
    adults: 2,
    children: 0,
    checkin: null,
    checkout: null,
    destination: ''
};
```

### Événements principaux
- Autocomplétion de la destination
- Ouverture/fermeture des dropdowns
- Compteurs de voyageurs (+/-)
- Soumission du formulaire
- Navigation mobile

## 📱 Accessibilité

- Labels ARIA sur tous les éléments interactifs
- Navigation au clavier complète
- Focus visible sur les éléments
- Rôles ARIA appropriés
- Contraste de couleurs conforme WCAG

## 🌐 Navigateurs supportés

- Chrome (dernières versions)
- Firefox (dernières versions)
- Safari (dernières versions)
- Edge (dernières versions)
- Navigateurs mobiles modernes

## 📝 Notes de développement

### Pour production
- Intégrer une vraie bibliothèque de date picker (ex: Flatpickr)
- Connecter à une API de recherche d'hôtels
- Ajouter la gestion des erreurs
- Implémenter l'authentification utilisateur
- Ajouter les alertes prix fonctionnelles
- Optimiser les images
- Minifier CSS et JS

### Améliorations possibles
- Système de filtres avancés
- Carte interactive
- Comparaison de prix en temps réel
- Historique de recherche
- Favoris et wishlist
- Multi-langue
- Mode sombre

## 📄 Licence

Ce projet est un projet d'étude et de démonstration.

## 🙏 Crédits

Design inspiré de HotelsCombined.com
Icons: Font Awesome
Images: Unsplash

---

**Développé avec ❤️ pour l'apprentissage du développement web**
