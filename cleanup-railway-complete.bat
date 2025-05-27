@echo off
echo.
echo ===================================================================
echo  🧹 NETTOYAGE COMPLET RAILWAY - Keep Only Render Config
echo ===================================================================
echo.

set "FILES_DELETED=0"
set "DIRS_DELETED=0"

echo [1/3] 🗑️ Suppression des fichiers Railway/Docker...
echo.

:: Supprimer tous les Dockerfiles
if exist "Dockerfile" (
    del "Dockerfile"
    echo ✅ Dockerfile supprimé
    set /a FILES_DELETED+=1
)

if exist "Dockerfile.simple" (
    del "Dockerfile.simple"
    echo ✅ Dockerfile.simple supprimé
    set /a FILES_DELETED+=1
)

if exist "Dockerfile.nobuild" (
    del "Dockerfile.nobuild"
    echo ✅ Dockerfile.nobuild supprimé
    set /a FILES_DELETED+=1
)

if exist "Dockerfile.fix403" (
    del "Dockerfile.fix403"
    echo ✅ Dockerfile.fix403 supprimé
    set /a FILES_DELETED+=1
)

if exist "Dockerfile.debug" (
    del "Dockerfile.debug"
    echo ✅ Dockerfile.debug supprimé
    set /a FILES_DELETED+=1
)

if exist "Dockerfile.verbose" (
    del "Dockerfile.verbose"
    echo ✅ Dockerfile.verbose supprimé
    set /a FILES_DELETED+=1
)

:: Supprimer .dockerignore
if exist ".dockerignore" (
    del ".dockerignore"
    echo ✅ .dockerignore supprimé
    set /a FILES_DELETED+=1
)

:: Supprimer railway.toml
if exist "railway.toml" (
    del "railway.toml"
    echo ✅ railway.toml supprimé
    set /a FILES_DELETED+=1
)

:: Supprimer .env.railway
if exist ".env.railway" (
    del ".env.railway"
    echo ✅ .env.railway supprimé
    set /a FILES_DELETED+=1
)

:: Supprimer le dossier docker/
if exist "docker\" (
    rmdir /s /q "docker"
    echo ✅ Dossier docker/ supprimé
    set /a DIRS_DELETED+=1
)

echo.
echo [2/3] 🧹 Suppression des scripts Railway...
echo.

:: Supprimer scripts Railway spécifiques
if exist "deploy-railway.bat" (
    del "deploy-railway.bat"
    echo ✅ deploy-railway.bat supprimé
    set /a FILES_DELETED+=1
)

if exist "debug-403.bat" (
    del "debug-403.bat"
    echo ✅ debug-403.bat supprimé
    set /a FILES_DELETED+=1
)

:: Supprimer documentation Railway
if exist "RAILWAY-FIX.md" (
    del "RAILWAY-FIX.md"
    echo ✅ RAILWAY-FIX.md supprimé
    set /a FILES_DELETED+=1
)

if exist "DEPLOY-RAILWAY.md" (
    del "DEPLOY-RAILWAY.md"
    echo ✅ DEPLOY-RAILWAY.md supprimé
    set /a FILES_DELETED+=1
)

echo.
echo [3/3] ✅ Vérification de la configuration Render...
echo.

:: Vérifier que les fichiers Render sont présents
if exist "render.yaml" (
    echo ✅ render.yaml - Configuration Render OK
) else (
    echo ❌ render.yaml manquant
)

if exist "apache.conf" (
    echo ✅ apache.conf - Configuration Apache OK
) else (
    echo ❌ apache.conf manquant
)

if exist "RENDER-DEPLOY.md" (
    echo ✅ RENDER-DEPLOY.md - Documentation Render OK
) else (
    echo ❌ Documentation Render manquante
)

:: Vérifier structure CI4
if exist "public\index.php" (
    echo ✅ public/index.php - CI4 OK
) else (
    echo ❌ CI4 structure problématique
)

if exist "composer.json" (
    echo ✅ composer.json - PHP dependencies OK
) else (
    echo ❌ composer.json manquant
)

if exist "package.json" (
    echo ✅ package.json - Node.js dependencies OK
) else (
    echo ❌ package.json manquant
)

echo.
echo ===================================================================
echo  📊 RÉSUMÉ DU NETTOYAGE
echo ===================================================================
echo.
echo 🗑️ Fichiers supprimés : %FILES_DELETED%
echo 📁 Dossiers supprimés : %DIRS_DELETED%
echo.
echo ❌ SUPPRIMÉ - Configuration Railway :
echo    - Dockerfile* (tous les variants)
echo    - .dockerignore
echo    - railway.toml
echo    - .env.railway
echo    - docker/ (dossier complet)
echo    - deploy-railway.bat
echo    - debug-403.bat
echo    - RAILWAY-FIX.md
echo    - DEPLOY-RAILWAY.md
echo.
echo ✅ CONSERVÉ - Configuration Render :
echo    - render.yaml (Infrastructure as Code)
echo    - apache.conf (Configuration Apache optimisée)
echo    - RENDER-DEPLOY.md (Documentation)
echo    - fix-render-favicon.bat (Maintenance)
echo    - setup-render-yaml.bat (Setup)
echo.
echo ✅ CONSERVÉ - Code Application :
echo    - app/ (CodeIgniter 4)
echo    - public/ (Assets + Entry Point)
echo    - resources/ (Sources Tailwind/JS)
echo    - composer.json (PHP dependencies)
echo    - package.json (Node.js dependencies)
echo    - .env, .env.example (Configuration)
echo.

echo.
echo ===================================================================
echo  🎯 CONFIGURATION FINALE RENDER-ONLY
echo ===================================================================
echo.
echo 🚀 STACK SIMPLIFIÉ :
echo    ✅ Render.com : Hébergement PHP natif
echo    ✅ Infrastructure as Code : render.yaml
echo    ✅ Performance optimisée : apache.conf
echo    ✅ CI4 + Tailwind : Code application
echo.
echo 💡 AVANTAGES APRÈS NETTOYAGE :
echo    ✅ Plus de complexity Docker
echo    ✅ Plus d'erreurs Railway 403
echo    ✅ Configuration simple et claire
echo    ✅ Déploiement fiable et rapide
echo    ✅ Infrastructure maintenable
echo.
echo 📝 COMMIT RECOMMANDÉ :
echo.

:: Commit automatique du nettoyage
git add .
git add -u

git commit -m "cleanup: remove all Railway/Docker configuration, keep Render-only

REMOVED Railway/Docker files:
- All Dockerfile variants (simple, nobuild, fix403, debug, verbose)
- .dockerignore and railway.toml
- docker/ directory and related scripts
- Railway-specific documentation and scripts

KEPT Render configuration:
- render.yaml (Infrastructure as Code)
- apache.conf (optimized for Render)
- RENDER-DEPLOY.md (deployment guide)
- Core CI4 + Tailwind application code

Result: Clean, simple Render-only deployment ready for production"

if %errorlevel% equ 0 (
    echo ✅ Nettoyage committés
) else (
    echo ⚠️ Rien à committer ou déjà fait
)

echo.
echo 🚀 PROCHAINES ÉTAPES :
echo.
echo 1. 📤 Push le nettoyage :
echo    git push origin main
echo.
echo 2. 🌐 Déploiement Render automatique :
echo    - Configuration render.yaml détectée
echo    - Build et deploy automatiques
echo    - URL live en 3-5 minutes
echo.
echo 3. ✅ Vérification post-deploy :
echo    - Site accessible : https://ci4-tailwind-landing.onrender.com
echo    - Favicon fix appliqué
echo    - Performance optimisée
echo.
echo 💰 COÛT FINAL : 0€
echo    - Render : 750h gratuit/mois
echo    - Infrastructure as Code simple
echo    - Maintenance minimale
echo.

pause
