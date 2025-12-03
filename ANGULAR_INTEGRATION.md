# Guide d'Intégration Angular 18

## 📋 Vue d'ensemble

Cette maquette utilise **Bootstrap 5.3.2** et est prête pour l'intégration dans Angular 18.

## 🚀 Étapes d'intégration

### 1. Installation des dépendances

```bash
# Dans votre projet Angular 18
npm install bootstrap@5.3.2
npm install @ng-bootstrap/ng-bootstrap
npm install @popperjs/core
npm install @fortawesome/fontawesome-free
```

### 2. Configuration de Bootstrap dans angular.json

```json
{
  "projects": {
    "your-project": {
      "architect": {
        "build": {
          "options": {
            "styles": [
              "node_modules/bootstrap/dist/css/bootstrap.min.css",
              "node_modules/@fortawesome/fontawesome-free/css/all.min.css",
              "src/styles.css"
            ],
            "scripts": [
              "node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"
            ]
          }
        }
      }
    }
  }
}
```

### 3. Import de NgBootstrap dans app.module.ts

```typescript
import { NgModule } from '@angular/core';
import { BrowserModule } from '@angular/platform-browser';
import { NgbModule } from '@ng-bootstrap/ng-bootstrap';

@NgModule({
  imports: [
    BrowserModule,
    NgbModule
  ],
  // ...
})
export class AppModule { }
```

## 📁 Structure des composants recommandée

```
src/app/
├── components/
│   ├── header/
│   │   ├── header.component.ts
│   │   ├── header.component.html
│   │   └── header.component.scss
│   ├── hero/
│   │   ├── hero.component.ts
│   │   ├── hero.component.html
│   │   └── hero.component.scss
│   ├── search-form/
│   │   ├── search-form.component.ts
│   │   ├── search-form.component.html
│   │   └── search-form.component.scss
│   ├── destinations/
│   │   ├── destinations.component.ts
│   │   ├── destinations.component.html
│   │   └── destinations.component.scss
│   └── footer/
│       ├── footer.component.ts
│       ├── footer.component.html
│       └── footer.component.scss
├── models/
│   ├── search-params.model.ts
│   └── destination.model.ts
└── services/
    ├── search.service.ts
    └── destinations.service.ts
```

## 🔧 Conversion des composants

### Header Component

```typescript
// header.component.ts
import { Component } from '@angular/core';

@Component({
  selector: 'app-header',
  templateUrl: './header.component.html',
  styleUrls: ['./header.component.scss']
})
export class HeaderComponent {
  isMenuCollapsed = true;
  
  onAlertClick() {
    // Logique pour les alertes prix
  }
  
  onAccountClick() {
    // Logique pour le compte utilisateur
  }
}
```

```html
<!-- header.component.html -->
<header class="header sticky-top bg-white shadow-sm">
  <nav class="navbar navbar-expand-lg navbar-light">
    <div class="container">
      <a class="navbar-brand d-flex align-items-center" routerLink="/">
        <i class="fas fa-hotel text-primary fs-4 me-2"></i>
        <span class="fw-bold text-primary">HotelsFinder</span>
      </a>
      
      <button class="navbar-toggler" type="button" 
              (click)="isMenuCollapsed = !isMenuCollapsed"
              [attr.aria-expanded]="!isMenuCollapsed">
        <span class="navbar-toggler-icon"></span>
      </button>
      
      <div class="collapse navbar-collapse" 
           [ngbCollapse]="isMenuCollapsed">
        <ul class="navbar-nav mx-auto">
          <li class="nav-item">
            <a class="nav-link active" routerLink="/hotels">
              <i class="fas fa-bed me-1"></i> Hébergements
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" routerLink="/flights">
              <i class="fas fa-plane me-1"></i> Vols
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" routerLink="/cars">
              <i class="fas fa-car me-1"></i> Voitures
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" routerLink="/packages">
              <i class="fas fa-suitcase me-1"></i> Forfaits
            </a>
          </li>
        </ul>
        <div class="d-flex gap-2">
          <button class="btn btn-outline-primary btn-sm" 
                  (click)="onAlertClick()">
            <i class="fas fa-bell me-1"></i> Alertes prix
          </button>
          <button class="btn btn-outline-secondary btn-sm" 
                  (click)="onAccountClick()">
            <i class="fas fa-user"></i>
          </button>
        </div>
      </div>
    </div>
  </nav>
</header>
```

### Search Form Component

```typescript
// search-form.component.ts
import { Component } from '@angular/core';
import { FormBuilder, FormGroup, Validators } from '@angular/forms';

interface SearchParams {
  destination: string;
  checkin: Date;
  checkout: Date;
  rooms: number;
  adults: number;
  children: number;
}

@Component({
  selector: 'app-search-form',
  templateUrl: './search-form.component.html',
  styleUrls: ['./search-form.component.scss']
})
export class SearchFormComponent {
  searchForm: FormGroup;
  showGuestsDropdown = false;
  showSuggestions = false;
  
  destinations = [
    'Paris, France',
    'Londres, Royaume-Uni',
    'New York, États-Unis',
    'Tokyo, Japon',
    'Dubai, Émirats arabes unis',
    // ...
  ];
  
  filteredDestinations: string[] = [];
  
  constructor(private fb: FormBuilder) {
    this.searchForm = this.fb.group({
      destination: ['', Validators.required],
      checkin: [new Date(), Validators.required],
      checkout: [new Date(Date.now() + 86400000), Validators.required],
      rooms: [1, [Validators.required, Validators.min(1)]],
      adults: [2, [Validators.required, Validators.min(1)]],
      children: [0, [Validators.required, Validators.min(0)]]
    });
  }
  
  onDestinationInput(value: string) {
    if (value.length >= 2) {
      this.filteredDestinations = this.destinations.filter(dest =>
        dest.toLowerCase().includes(value.toLowerCase())
      );
      this.showSuggestions = this.filteredDestinations.length > 0;
    } else {
      this.showSuggestions = false;
    }
  }
  
  selectDestination(destination: string) {
    this.searchForm.patchValue({ destination });
    this.showSuggestions = false;
  }
  
  toggleGuestsDropdown() {
    this.showGuestsDropdown = !this.showGuestsDropdown;
  }
  
  updateCounter(field: string, action: 'plus' | 'minus') {
    const currentValue = this.searchForm.get(field)?.value || 0;
    const minValues = { rooms: 1, adults: 1, children: 0 };
    
    if (action === 'plus') {
      this.searchForm.patchValue({ [field]: currentValue + 1 });
    } else if (action === 'minus' && currentValue > minValues[field]) {
      this.searchForm.patchValue({ [field]: currentValue - 1 });
    }
  }
  
  get guestsDisplay(): string {
    const rooms = this.searchForm.get('rooms')?.value || 1;
    const adults = this.searchForm.get('adults')?.value || 2;
    const children = this.searchForm.get('children')?.value || 0;
    const totalGuests = adults + children;
    return `${rooms} room${rooms > 1 ? 's' : ''}, ${totalGuests} guest${totalGuests > 1 ? 's' : ''}`;
  }
  
  onSubmit() {
    if (this.searchForm.valid) {
      console.log('Search params:', this.searchForm.value);
      // Appel au service de recherche
    }
  }
}
```

### Destinations Component

```typescript
// destinations.component.ts
import { Component, OnInit } from '@angular/core';

interface Destination {
  name: string;
  imageUrl: string;
  priceFrom: number;
}

@Component({
  selector: 'app-destinations',
  templateUrl: './destinations.component.html',
  styleUrls: ['./destinations.component.scss']
})
export class DestinationsComponent implements OnInit {
  destinations: Destination[] = [
    {
      name: 'New York',
      imageUrl: 'https://images.unsplash.com/photo-1499092346589-b9b6be3e94b2?w=500',
      priceFrom: 120
    },
    // ...
  ];
  
  ngOnInit() {
    // Charger les destinations depuis l'API
  }
  
  onDestinationClick(destination: Destination) {
    // Navigation vers la page de recherche avec la destination pré-sélectionnée
  }
}
```

## 🎨 Styles personnalisés (styles.scss)

```scss
/* Import Bootstrap */
@import 'bootstrap/scss/bootstrap';

/* Custom theme colors */
$primary: #006ce4;
$primary-hover: #0053ba;

/* Override Bootstrap variables */
$theme-colors: (
  "primary": $primary,
);

/* Custom styles from style-bootstrap.css */
:root {
  --bs-primary: #{$primary};
  --primary-hover: #{$primary-hover};
}

// Import your custom styles
@import 'styles/custom';
```

## 📦 Services

### Search Service

```typescript
// search.service.ts
import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { Observable } from 'rxjs';

@Injectable({
  providedIn: 'root'
})
export class SearchService {
  private apiUrl = 'https://api.example.com/search';
  
  constructor(private http: HttpClient) {}
  
  search(params: SearchParams): Observable<any> {
    return this.http.post(`${this.apiUrl}/hotels`, params);
  }
  
  getDestinationSuggestions(query: string): Observable<string[]> {
    return this.http.get<string[]>(`${this.apiUrl}/destinations`, {
      params: { q: query }
    });
  }
}
```

## 🔄 Migration étape par étape

1. **Phase 1 : Setup**
   - Installer les dépendances
   - Configurer Bootstrap dans angular.json
   - Copier les styles personnalisés

2. **Phase 2 : Composants statiques**
   - Créer Header Component
   - Créer Hero Component
   - Créer Footer Component

3. **Phase 3 : Composants interactifs**
   - Créer Search Form Component avec Reactive Forms
   - Implémenter les dropdowns avec NgBootstrap
   - Ajouter la validation

4. **Phase 4 : Données dynamiques**
   - Créer les services
   - Connecter à l'API
   - Gérer l'état avec NgRx (optionnel)

5. **Phase 5 : Optimisation**
   - Lazy loading des modules
   - Optimisation des images
   - PWA configuration

## 📚 Ressources utiles

- [Angular Documentation](https://angular.io/docs)
- [Bootstrap 5 Documentation](https://getbootstrap.com/docs/5.3/)
- [NgBootstrap Components](https://ng-bootstrap.github.io/)
- [Angular Reactive Forms](https://angular.io/guide/reactive-forms)

## ⚡ Tips d'optimisation

1. Utiliser `OnPush` change detection strategy
2. Lazy load les images avec `loading="lazy"`
3. Utiliser `trackBy` dans les `*ngFor`
4. Implémenter le virtual scrolling pour les longues listes
5. Utiliser les Web Workers pour les calculs lourds

## 🧪 Tests

```typescript
// search-form.component.spec.ts
import { ComponentFixture, TestBed } from '@angular/core/testing';
import { ReactiveFormsModule } from '@angular/forms';
import { SearchFormComponent } from './search-form.component';

describe('SearchFormComponent', () => {
  let component: SearchFormComponent;
  let fixture: ComponentFixture<SearchFormComponent>;

  beforeEach(async () => {
    await TestBed.configureTestingModule({
      declarations: [ SearchFormComponent ],
      imports: [ ReactiveFormsModule ]
    }).compileComponents();
  });

  beforeEach(() => {
    fixture = TestBed.createComponent(SearchFormComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });

  it('should validate required fields', () => {
    expect(component.searchForm.valid).toBeFalsy();
    component.searchForm.patchValue({
      destination: 'Paris',
      checkin: new Date(),
      checkout: new Date(Date.now() + 86400000)
    });
    expect(component.searchForm.valid).toBeTruthy();
  });
});
```

## 🎯 Avantages de cette approche

✅ **Réutilisabilité** : Composants modulaires et réutilisables
✅ **Maintenabilité** : Code organisé et facile à maintenir
✅ **Performance** : Optimisations Angular built-in
✅ **Testabilité** : Tests unitaires et e2e facilités
✅ **TypeScript** : Type safety et meilleur intellisense
✅ **Évolutivité** : Architecture prête pour la croissance
