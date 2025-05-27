# 🚀 CI4 Tailwind Template

Template CodeIgniter 4 moderne avec Tailwind CSS v3, Vite et Alpine.js.

## 🛠️ Stack

- **CodeIgniter 4.6+**
- **Tailwind CSS v3.4.1** avec plugins Forms & Typography
- **Vite 5** pour le bundling et HMR
- **Alpine.js 3.13** pour l'interactivité
- **PHP 8.2+** et **Node.js 18+**

## 🚀 Installation

```bash
# Installation des dépendances
composer install
npm install

# Configuration
cp env .env

# Premier build
npm run build

# Démarrage
npm run start
```

## 📋 Commandes

```bash
# Développement
npm run dev        # Serveur Vite (port 5173)
npm run serve      # Serveur CI4 (port 8080)  
npm run start      # Les deux ensemble

# Build
npm run build      # Build développement
npm run build:prod # Build production
npm run preview    # Preview du build

# Maintenance
npm run clean      # Nettoyer les assets
```

## 📁 Structure

```
template/
├── app/Views/layouts/     # Templates CI4
├── resources/
│   ├── css/app.css       # Tailwind CSS
│   ├── js/app.js         # Entry point Alpine.js
│   └── static/           # Assets statiques
├── public/assets/        # 🤖 Généré par Vite
├── vite.config.js        # Configuration Vite
├── tailwind.config.js    # Configuration Tailwind
└── package.json          # Dépendances npm
```

## 🎨 Utilisation

### **Helper Vite dans les templates :**
```php
<!-- Dans header.php -->
<?= vite('resources/js/app.js') ?>
```

### **Classes Tailwind personnalisées :**
```html
<div class="container-custom">
  <button class="btn-primary btn-sm">Action</button>
  <nav class="glass">Navigation</nav>
</div>
```

### **Alpine.js pour l'interactivité :**
```html
<div x-data="{ open: false }">
  <button @click="open = !open">Toggle</button>
  <div x-show="open">Contenu</div>
</div>
```

## ⚙️ Configuration

- **Tailwind** : Couleurs `primary` et `secondary` personnalisées
- **Fonts** : Inter (display et body), JetBrains Mono
- **Mode sombre** : Classe `dark` avec Alpine.js
- **Responsive** : Breakpoints Tailwind standard
- **Plugins** : Forms et Typography inclus

---

**🎯 Prêt pour le développement !**