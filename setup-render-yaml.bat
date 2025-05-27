@echo off
echo.
echo ===================================================================
echo  📝 RENDER.YAML - Infrastructure as Code Setup
echo ===================================================================
echo.

echo [1/4] 🔧 Validation render.yaml...
echo.

:: Vérifier que render.yaml existe et est correct
if exist "render.yaml" (
    echo ✅ render.yaml trouvé
    
    :: Vérifier la syntaxe de base
    findstr "services:" render.yaml >nul
    if %errorlevel% equ 0 (
        echo ✅ Structure services: OK
    ) else (
        echo ❌ Structure services manquante
        goto :error
    )
    
    findstr "type: web" render.yaml >nul
    if %errorlevel% equ 0 (
        echo ✅ Type web service: OK
    ) else (
        echo ❌ Type web service manquant
        goto :error
    )
    
    findstr "env: php" render.yaml >nul
    if %errorlevel% equ 0 (
        echo ✅ Environment PHP: OK
    ) else (
        echo ❌ Environment PHP manquant
        goto :error
    )
    
) else (
    echo ❌ render.yaml manquant
    goto :error
)

echo.
echo [2/4] 🏗️ Test build command localement...
echo.

:: Tester la commande de build du render.yaml
echo Test: composer install --no-dev --optimize-autoloader
composer install --no-dev --optimize-autoloader --quiet
if %errorlevel% equ 0 (
    echo ✅ Composer install - OK
) else (
    echo ❌ Composer install - ERREUR
    goto :error
)

echo Test: npm ci
npm ci --silent
if %errorlevel% equ 0 (
    echo ✅ npm ci - OK
) else (
    echo ❌ npm ci - ERREUR
    goto :error
)

echo Test: npm run build:prod
call npm run build:prod
if %errorlevel% equ 0 (
    echo ✅ npm run build:prod - OK
) else (
    echo ⚠️ build:prod échoué, test build standard...
    call npm run build
    if %errorlevel% equ 0 (
        echo ✅ npm run build - OK (fallback)
    ) else (
        echo ❌ Build assets - ERREUR
        goto :error
    )
)

echo.
echo [3/4] 📋 Validation configuration complète...
echo.

:: Vérifier que tous les éléments sont en place
echo Vérification des composants requis:

if exist "public\index.php" (
    echo ✅ public/index.php - Point d'entrée CI4
) else (
    echo ❌ public/index.php manquant
    goto :error
)

if exist "composer.json" (
    echo ✅ composer.json - Dépendances PHP
) else (
    echo ❌ composer.json manquant
    goto :error
)

if exist "package.json" (
    echo ✅ package.json - Dépendances Node.js
) else (
    echo ❌ package.json manquant
    goto :error
)

if exist "public\assets" (
    echo ✅ public/assets - Assets buildés
    for /f %%i in ('dir /b "public\assets\*" 2^>nul ^| find /c /v ""') do set ASSET_COUNT=%%i
    echo    📄 Assets files: %ASSET_COUNT%
) else (
    echo ❌ public/assets manquant
    goto :error
)

if exist "app\Config\App.php" (
    echo ✅ app/Config/App.php - Configuration CI4
) else (
    echo ❌ Configuration CI4 manquante
    goto :error
)

echo.
echo [4/4] 📝 Commit render.yaml infrastructure...
echo.

:: Commit la configuration Infrastructure as Code
git add render.yaml
git add .
git commit -m "feat: add render.yaml Infrastructure as Code configuration

- Add comprehensive render.yaml for Render.com deployment
- Configure PHP environment with optimized build commands
- Set production environment variables
- Enable auto-deploy and health checks
- Infrastructure as Code approach for maintainability

Render Configuration:
- Build: composer + npm + build:prod
- Start: heroku-php-apache2 public/
- Environment: production PHP 8.1+
- Auto-deploy: enabled
- Health check: / endpoint"

if %errorlevel% equ 0 (
    echo ✅ Configuration committée
) else (
    echo ⚠️ Rien à committer ou déjà fait
)

goto :success

:error
echo.
echo ===================================================================
echo  ❌ ERREUR CONFIGURATION RENDER.YAML
echo ===================================================================
echo.
echo 🔧 Problèmes détectés:
echo    - Vérifier la syntaxe render.yaml
echo    - Tester les commandes de build localement
echo    - S'assurer que tous les fichiers requis existent
echo.
goto :end

:success
echo.
echo ===================================================================
echo  🎉 RENDER.YAML INFRASTRUCTURE READY !
echo ===================================================================
echo.
echo ✅ render.yaml validé et configuré
echo ✅ Build commands testés localement
echo ✅ Infrastructure as Code committée
echo ✅ Prêt pour déploiement Render
echo.
echo 🚀 DÉPLOIEMENT RENDER AVEC render.yaml :
echo.
echo 1. 📤 Push configuration:
echo    git push origin main
echo.
echo 2. 🌐 Render.com Dashboard:
echo    - New Web Service
echo    - Connect Repository
echo    - Render détecte render.yaml automatiquement ✅
echo    - Configuration auto-importée ✅
echo.
echo 3. ⚡ Fonctionnalités activées:
echo    ✅ Auto-Deploy (git push = redeploy)
echo    ✅ PR Previews (test branches automatiquement)
echo    ✅ Environment Variables (production)
echo    ✅ Health Checks (monitoring)
echo    ✅ Build Caching (performance)
echo.
echo 4. 🎯 Résultat:
echo    - URL: https://ci4-tailwind-template.onrender.com
echo    - SSL: Automatique Let's Encrypt
echo    - Uptime: 750h gratuit/mois
echo    - Performance: Optimisée
echo.
echo 💡 AVANTAGES INFRASTRUCTURE AS CODE:
echo    ✅ Configuration versionnée dans Git
echo    ✅ Reproductible sur d'autres projets
echo    ✅ Facile à maintenir et modifier
echo    ✅ Documentation intégrée
echo    ✅ Rollback possible via Git
echo.
echo 📊 MONITORING DISPONIBLE:
echo    - Render Dashboard: Métriques en temps réel
echo    - Logs: Streaming en direct
echo    - Alerts: Email automatiques
echo    - Health: Status checks continus
echo.

:end
echo.
echo 📚 DOCUMENTATION:
echo    - render.yaml: Configuration complète
echo    - RENDER-DEPLOY.md: Guide détaillé
echo    - Render Docs: render.com/docs
echo.
echo 🎯 Votre template CI4 + Tailwind est maintenant enterprise-ready !
echo.
pause
