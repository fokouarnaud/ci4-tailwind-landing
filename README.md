# 🚀 CI4 Tailwind Template v2.0
## Production-Ready avec Déploiement Railway

Template CodeIgniter 4 moderne avec Tailwind CSS, Vite, Alpine.js et configuration Docker optimisée pour Railway.

![CI4](https://img.shields.io/badge/CodeIgniter-4.6+-red?style=flat-square)
![Tailwind](https://img.shields.io/badge/Tailwind-v3.4-blue?style=flat-square)
![Vite](https://img.shields.io/badge/Vite-5.0-yellow?style=flat-square)
![Railway](https://img.shields.io/badge/Railway-Ready-purple?style=flat-square)
![Docker](https://img.shields.io/badge/Docker-Ready-blue?style=flat-square)

## ✨ **Nouveautés v2.0**

- 🐳 **Docker optimisé** pour Railway/Production
- 🚀 **Déploiement 1-click** via Railway
- 🔒 **Headers sécurisé** et optimisations performance
- 📊 **Monitoring intégré** et health checks
- 📧 **Email ready** (Resend/EmailJS)
- 🗄️ **Database ready** (Supabase/PostgreSQL)

## 🛠️ **Stack Technique**

### **Backend**
- **CodeIgniter 4.6+** - Framework PHP moderne
- **PHP 8.1+** - Performance et features modernes
- **Apache 2.4** - Serveur web optimisé

### **Frontend**
- **Tailwind CSS v3.4.1** - Framework CSS utility-first
- **Vite 5** - Build tool ultra-rapide avec HMR
- **Alpine.js 3.13** - Framework JS réactif léger
- **PostCSS** - Traitement CSS avancé

### **Infrastructure**
- **Docker** - Containerisation production-ready
- **Railway** - Platform-as-a-Service simple
- **PostgreSQL** - Base de données (via Supabase)
- **Redis** - Cache haute performance (optionnel)

## 🚀 **Installation Locale**

### **Prérequis**
- PHP 8.1+ avec extensions : `pdo`, `mbstring`, `intl`, `curl`
- Node.js 18+ et npm
- Composer 2.0+
- Git

### **Setup Rapide**
```bash
# Cloner le repository
git clone https://github.com/your-repo/ci4-tailwind-template.git
cd ci4-tailwind-template

# Installation des dépendances
composer install
npm install

# Configuration environnement
cp .env.example .env

# Build des assets
npm run build:prod

# Démarrage local
npm run start
```

## 🌐 **Déploiement Railway (5 minutes)**

### **Méthode Recommandée**

1. **Fork ce repository** sur GitHub

2. **Validation pré-déploiement**
   ```bash
   # Teste tout avant déploiement
   validate-deploy.bat
   ```

3. **Déploiement Railway**
   - Aller sur [railway.app](https://railway.app)
   - "New Project" → "Deploy from GitHub repo"
   - Sélectionner votre fork
   - Railway détecte automatiquement le Dockerfile ✅

4. **Configuration variables** (Railway Dashboard)
   ```env
   CI_ENVIRONMENT=production
   PORT=80
   ```

5. **URL automatique** : `https://yourapp.railway.app` 🎉

### **Guide Détaillé**
📖 **[DEPLOY-RAILWAY.md](DEPLOY-RAILWAY.md)** - Guide complet step-by-step

## 📋 **Commandes Développement**

```bash
# 🔧 Développement
npm run dev        # Serveur Vite HMR (port 5173)
npm run serve      # Serveur CI4 (port 8080)
npm run start      # Les deux ensemble (recommandé)

# 🏗️ Build Production
npm run build      # Build développement
npm run build:prod # Build production optimisé
npm run preview    # Preview du build

# 🧪 Tests & Validation
validate-deploy.bat # Validation complète pré-déploiement
npm run test:build  # Test build uniquement

# 🧹 Maintenance
npm run clean      # Nettoyer les assets générés
```

## 📁 **Structure Projet**

```
template/
├── 🐳 Dockerfile              # Configuration Docker Railway
├── 🚀 railway.toml            # Configuration Railway
├── 📁 app/
│   ├── Views/layouts/         # Templates CI4 avec Vite
│   ├── Controllers/           # Home.php + Test.php
│   └── Helpers/vite_helper.php # Helper CI4-Vite intelligent
├── 📁 resources/
│   ├── css/app.css           # Tailwind + composants custom
│   ├── js/app.js             # Alpine.js centralisé
│   └── static/               # Assets sources
├── 📁 public/
│   ├── assets/               # 🤖 Généré par Vite (CSS/JS)
│   ├── .htaccess             # Apache optimisé production
│   └── index.php             # Point d'entrée CI4
├── 📁 docker/
│   └── start.sh              # Script démarrage Railway
├── 🔧 vite.config.js          # Config Vite optimisée
├── 🎨 tailwind.config.js      # Couleurs + animations custom
└── 📚 documentation/          # Guides complets
```

## 🎨 **Utilisation**

### **Helper Vite dans les Templates**
```php
<!-- app/Views/layouts/header.php -->
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mon App CI4</title>
    
    <!-- Auto-détection dev/prod avec preload optimisé -->
    <?= vite_assets('resources/js/app.js') ?>
</head>
```

### **Classes Tailwind Personnalisées**
```html
<!-- Composants prêts à l'emploi -->
<div class="container-custom">
    <button class="btn-primary btn-lg">Action Principale</button>
    <button class="btn-secondary btn-sm">Action Secondaire</button>
    <nav class="glass">Navigation Moderne</nav>
    <div class="card">Contenu Card</div>
</div>
```

### **Alpine.js Centralisé**
```html
<!-- Dark mode toggle (prêt à l'emploi) -->
<button @click="window.darkMode.toggle()" 
        x-text="window.darkMode.isDark ? '☀️' : '🌙'">
</button>

<!-- Navigation mobile -->
<div x-data="window.navbar()" class="mobile-nav">
    <button @click="toggle()" x-text="isOpen ? '✕' : '☰'"></button>
    <nav x-show="isOpen" x-transition>Menu</nav>
</div>
```

## ⚙️ **Configuration**

### **Couleurs Personnalisées**
```javascript
// tailwind.config.js
module.exports = {
  theme: {
    extend: {
      colors: {
        primary: {
          50: '#eff6ff',
          500: '#3b82f6',  // Bleu principal
          900: '#1e3a8a'
        },
        secondary: {
          500: '#10b981'   // Vert secondaire
        }
      }
    }
  }
}
```

### **Variables d'Environnement**
```env
# .env
CI_ENVIRONMENT=development

# Base URL (auto-détectée en production)
app.baseURL = 'http://localhost:8080'

# Database (Supabase en production)
database.default.hostname = localhost
database.default.database = ci4_template
database.default.username = root
database.default.password = 

# Email (Resend en production)
email.SMTPHost = 
email.SMTPUser = 
email.SMTPPass = 
```

## 🔧 **Fonctionnalités Intégrées**

### **✅ Mode Sombre**
- Toggle automatique avec persistance localStorage
- Classes Tailwind `dark:` préconfigurées
- Transition fluide

### **✅ Navigation Responsive**
- Menu mobile avec animations
- Hamburger vers X avec transition
- Alpine.js optimisé

### **✅ Performance**
- CSS/JS minifiés et optimisés
- Compression Gzip/Deflate
- Cache navigateur 1 an pour assets
- Preload des ressources critiques

### **✅ Sécurité**
- Headers sécurisé (XSS, clickjacking, etc.)
- HTTPS forcé en production
- Protection fichiers système CI4

## 🌟 **Stack Gratuit Intégré**

### **🗄️ Base de Données : Supabase**
- PostgreSQL gratuit 500MB
- Interface admin graphique
- API REST auto-générée

### **📧 Emails : Resend**
- 3,000 emails/mois gratuit
- API simple, deliverability excellente
- Domaine personnalisé gratuit

### **🌐 Hébergement : Railway**
- $5 crédit gratuit/mois
- SSL automatique
- Git deploy automatique

### **📊 Monitoring : UptimeRobot**
- 50 monitors gratuits
- Alertes email/SMS
- Rapports uptime

## 📚 **Documentation**

- **[DEPLOY-RAILWAY.md](DEPLOY-RAILWAY.md)** - Guide déploiement complet
- **[POST-DEPLOY-GUIDE.md](POST-DEPLOY-GUIDE.md)** - Optimisations post-déploiement
- **[documentation/](documentation/)** - Guides techniques détaillés

## 🚀 **Scripts Utiles**

```bash
# Validation complète avant déploiement
./validate-deploy.bat

# Test de performance local
npm run start
# Puis ouvrir : http://localhost:8080

# Build et test production
npm run build:prod
php spark serve --port 8080
```

## 🎯 **Cas d'Usage**

### **🏢 Sites Corporate**
- Landing pages modernes
- Portfolios d'entreprise
- Sites vitrine

### **🛍️ Applications Web**
- Dashboards admin
- Applications CRUD
- APIs RESTful

### **🚀 MVPs & Prototypes**
- Validation d'idées rapide
- Démos clients
- Tests utilisateurs

## 💰 **Coûts**

### **Phase Demo/MVP (0€)**
- Railway : $5 crédit gratuit
- Supabase : 500MB gratuit
- Resend : 3,000 emails gratuit
- Domaine : Sous-domaine Railway gratuit

### **Phase Production (≈ 25€/mois)**
- Railway Hobby : $20/mois
- Domaine .com : $12/an
- Monitoring premium : $5/mois

## 🤝 **Contribution**

Ce template est open-source et maintenu activement. Contributions bienvenues !

```bash
# Fork le projet
git clone https://github.com/your-username/ci4-tailwind-template.git

# Créer une branch feature
git checkout -b feature/amazing-feature

# Commit et push
git commit -m "Add amazing feature"
git push origin feature/amazing-feature

# Créer Pull Request
```

## 📄 **Licence**

MIT License - Voir [LICENSE](LICENSE) pour plus de détails.

---

## 🎉 **Prêt à Déployer !**

**✅ Template production-ready en 5 minutes**  
**✅ Stack moderne et performant**  
**✅ Coût 0€ pour commencer**  
**✅ Évolutivité garantie**

### **Quick Start Railway :**
```bash
git clone [this-repo]
cd template
./validate-deploy.bat
# → Deploy sur Railway → 🚀 Live !
```

**🌟 Star ce repo si ça vous aide ! 🌟**
