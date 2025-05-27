# 🚀 Guide de Déploiement Railway - CI4 + Tailwind Template

## ✅ Configuration Terminée - Prêt à Déployer !

Votre template CI4 + Tailwind est maintenant configuré avec une solution Docker mainttenable et robuste pour Railway.

## 📁 Fichiers de Déploiement Créés

```
template/
├── Dockerfile              ← Configuration Docker optimisée
├── docker/start.sh          ← Script de démarrage Railway
├── railway.toml             ← Configuration Railway
├── .dockerignore            ← Optimisation build Docker
├── .env.railway             ← Template variables d'environnement
└── public/.htaccess         ← Configuration Apache optimisée
```

## 🔧 **Étapes de Déploiement (5 minutes)**

### **1. Préparer le Repository**
```bash
# Dans votre dossier template/
git add .
git commit -m "feat: Railway deployment configuration with Docker

- Add optimized Dockerfile for PHP 8.1 + Apache
- Configure production-ready .htaccess with security headers
- Add Railway.toml configuration
- Optimize build with .dockerignore
- Add startup script for Railway environment"

git push origin main
```

### **2. Déployer sur Railway**

#### **Option A : Via Dashboard Railway**
1. **Aller sur** [railway.app](https://railway.app)
2. **New Project** → **Deploy from GitHub repo**
3. **Sélectionner votre repository** `template`
4. **Railway détecte automatiquement** le Dockerfile ✅

#### **Option B : Via Railway CLI**
```bash
# Installer Railway CLI
npm install -g @railway/cli

# Login et déployer
railway login
railway link
railway up
```

### **3. Configuration Variables Railway**

Dans le Dashboard Railway → **Variables** :
```env
CI_ENVIRONMENT=production
COMPOSER_ALLOW_SUPERUSER=1
```

**Optionnel (si base de données) :**
```env
DATABASE_URL=postgresql://user:pass@host:5432/db
```

### **4. Tester le Déploiement**
- ✅ **URL automatique** : `https://yourapp.railway.app`
- ✅ **Page d'accueil** : Votre landing page CI4
- ✅ **Route test** : `/test` pour validation

## 🔍 **Debug en Cas de Problème**

### **Voir les Logs Railway**
```bash
# Via CLI
railway logs

# Via Dashboard
Project → Deployments → View Logs
```

### **Erreurs Communes et Solutions**

| Erreur | Solution |
|--------|----------|
| `Application failed to respond` | Vérifier les logs → Souvent port mal configuré |
| `Build failed` | Vérifier `npm run build:prod` fonctionne localement |
| `500 Internal Error` | Vérifier permissions `/writable` et configuration Apache |
| `Assets not loading` | Vérifier que `public/assets/` contient les fichiers build |

## 🎯 **Vérifications Post-Déploiement**

### **✅ Checklist Fonctionnelle**
- [ ] Page d'accueil charge correctement
- [ ] Styles Tailwind appliqués
- [ ] Alpine.js fonctionne (test dark mode)
- [ ] Routes CI4 accessibles (`/`, `/test`)
- [ ] Assets optimisés chargent (CSS/JS avec hash)

### **✅ Checklist Performance**
- [ ] **GTmetrix** : Score A ou B
- [ ] **Lighthouse** : Performance > 80
- [ ] **Compression** : Gzip/Deflate actif
- [ ] **Headers sécurité** : X-Content-Type-Options, X-Frame-Options

## 🚀 **Prochaines Étapes Optionnelles**

### **1. Domaine Personnalisé**
Railway → Settings → Domains → Add Custom Domain

### **2. Base de Données (Supabase)**
```bash
# Variables à ajouter dans Railway
DATABASE_URL=postgresql://postgres:pass@host.supabase.co:5432/postgres
```

### **3. SSL Automatique**
Railway configure automatiquement Let's Encrypt ✅

### **4. Monitoring**
- **UptimeRobot** : Surveillance 24/7 gratuite
- **Railway Metrics** : CPU, RAM, requêtes

## 📊 **Optimisations Avancées**

### **Cache Headers Optimisés**
Déjà configuré dans `.htaccess` :
- CSS/JS : Cache 1 an
- Images : Cache 1 an  
- HTML : Pas de cache (mise à jour temps réel)

### **Compression Automatique**
- **Gzip/Deflate** : Configuré Apache
- **Brotli** : Support si disponible Railway

### **Security Headers**
Déjà configuré :
- `X-Content-Type-Options: nosniff`
- `X-Frame-Options: DENY`
- `X-XSS-Protection: 1; mode=block`
- `Referrer-Policy: strict-origin-when-cross-origin`

## 🎯 **Support et Maintenance**

### **Logs de Production**
```bash
# Logs Railway en temps réel
railway logs --tail

# Logs CI4 (si configuré)
railway shell
tail -f /var/www/html/writable/logs/log-$(date +%Y-%m-%d).log
```

### **Mise à jour du Code**
```bash
# Simple push pour mise à jour
git push origin main
# Railway redéploie automatiquement ✅
```

### **Rollback Rapide**
Railway Dashboard → Deployments → Redeploy Previous Version

---

## 🎉 **Félicitations !**

Votre template CI4 + Tailwind est maintenant **production-ready** avec :
- ✅ **Docker optimisé** pour performance
- ✅ **Configuration sécurisée** Apache + headers
- ✅ **Build automatique** Vite + Tailwind
- ✅ **Déploiement simple** Git push = deploy
- ✅ **Monitoring** logs en temps réel
- ✅ **Évolutivité** facile ajout de features

**🚀 Temps total de setup : ~5 minutes | Coût : 0€ pour commencer**
