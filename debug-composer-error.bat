@echo off
echo.
echo ===================================================================
echo  🔧 DEBUG COMPOSER ERROR - Render Dockerfile
echo ===================================================================
echo.

echo [1/4] 🔍 Diagnostic composer local...
echo.

:: Test composer localement
echo Test composer validate:
composer validate --no-check-all
if %errorlevel% equ 0 (
    echo ✅ composer.json valide
) else (
    echo ❌ composer.json invalide
    goto :error
)

echo.
echo Test composer install local:
composer install --no-dev --optimize-autoloader --dry-run
if %errorlevel% equ 0 (
    echo ✅ composer install fonctionne localement
) else (
    echo ❌ composer install échoue localement
    echo.
    echo Tentative composer install basique:
    composer install --dry-run
    if %errorlevel% equ 0 (
        echo ✅ composer install basique fonctionne
    ) else (
        echo ❌ composer install basique échoue aussi
        goto :error
    )
)

echo.
echo [2/4] 📋 Vérification des fichiers requis...
echo.

:: Vérifier structure
set "REQUIRED_FILES=composer.json composer.lock package.json package-lock.json public\index.php"

for %%f in (%REQUIRED_FILES%) do (
    if exist "%%f" (
        echo ✅ %%f présent
    ) else (
        echo ❌ %%f manquant
        if "%%f"=="composer.lock" (
            echo Génération composer.lock...
            composer update --lock
        )
    )
)

echo.
echo [3/4] 🛠️ Correction Dockerfile...
echo.

:: Le Dockerfile a été corrigé avec:
echo ✅ Dockerfile mis à jour avec gestion d'erreurs
echo ✅ Fallbacks multiples pour composer install
echo ✅ Fallbacks multiples pour npm build
echo ✅ Debug output pour diagnostics
echo ✅ Installation Node.js 18 LTS spécifique

echo.
echo [4/4] 📝 Alternatives si problème persiste...
echo.

:: Créer composer.json minimal si problème
if not exist "composer.json.backup" (
    copy "composer.json" "composer.json.backup"
    echo ✅ Backup composer.json créé
)

echo.
echo ===================================================================
echo  🔧 SOLUTIONS MULTIPLES
echo ===================================================================
echo.
echo 1. 📤 Push Dockerfile corrigé:
echo    git add Dockerfile
echo    git commit -m "fix: Dockerfile with error handling and fallbacks"
echo    git push origin main
echo.
echo 2. 📊 Vérifier logs Render détaillés:
echo    - Dashboard → Deployments → View Logs
echo    - Chercher erreur exacte composer
echo.
echo 3. 🔄 Si composer échoue encore, alternatives:
echo.
echo    A. Commit vendor/ directory:
echo       composer install --no-dev
echo       git add vendor/
echo       git commit -m "temp: add vendor directory"
echo.
echo    B. Simplifier composer.json:
echo       - Supprimer scripts post-install
echo       - Supprimer require-dev
echo.
echo    C. Build assets localement:
echo       npm run build:prod
echo       git add public/assets/
echo       git commit -m "temp: pre-built assets"
echo.

goto :success

:error
echo.
echo ❌ Problème composer détecté localement
echo.
echo 🔧 Actions correctives:
echo    1. composer clear-cache
echo    2. rm composer.lock ^&^& composer install
echo    3. Vérifier PHP version: php --version
echo.
goto :end

:success
echo.
echo ===================================================================
echo  🎯 PLAN D'ACTION
echo ===================================================================
echo.
echo ✅ Dockerfile corrigé avec gestion d'erreurs robuste
echo ✅ Fallbacks multiples pour composer + npm
echo ✅ Debug output pour identifier problèmes
echo.
echo 🚀 Prochaines étapes:
echo    1. git add Dockerfile
echo    2. git commit -m "fix: robust Dockerfile error handling"
echo    3. git push origin main
echo    4. Vérifier logs Render pour diagnostic détaillé
echo.
echo 💡 Si ça échoue encore:
echo    - Problème probablement avec dépendances composer
echo    - On peut commit vendor/ temporairement
echo    - Ou pré-builder assets localement
echo.

:end
echo.
pause
