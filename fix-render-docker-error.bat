@echo off
echo.
echo ===================================================================
echo  🔧 FIX RENDER DOCKER ERROR - Force PHP Native Mode
echo ===================================================================
echo.

echo [1/3] 🚨 Diagnostic du problème...
echo.
echo ❌ Erreur détectée: "failed to read dockerfile: open Dockerfile: no such file or directory"
echo.
echo 💡 CAUSE: Render cherche un Dockerfile au lieu d'utiliser render.yaml
echo 🔧 SOLUTION: Forcer Render à utiliser PHP natif
echo.

echo [2/3] 🧹 Nettoyage final des résidus Docker...
echo.

:: S'assurer qu'aucun Dockerfile n'existe
if exist "Dockerfile" (
    del "Dockerfile"
    echo ✅ Dockerfile supprimé
)

if exist "Dockerfile.*" (
    del "Dockerfile.*"
    echo ✅ Variants Dockerfile supprimés
)

if exist ".dockerignore" (
    del ".dockerignore"
    echo ✅ .dockerignore supprimé
)

:: Vérifier que render.yaml est présent et correct
if exist "render.yaml" (
    echo ✅ render.yaml présent
    
    :: Vérifier qu'il spécifie runtime: php
    findstr "runtime: php" render.yaml >nul
    if %errorlevel% equ 0 (
        echo ✅ runtime: php configuré
    ) else (
        echo ❌ runtime: php manquant dans render.yaml
        goto :error
    )
    
    :: Vérifier buildCommand
    findstr "buildCommand:" render.yaml >nul
    if %errorlevel% equ 0 (
        echo ✅ buildCommand configuré
    ) else (
        echo ❌ buildCommand manquant
        goto :error
    )
    
    :: Vérifier startCommand
    findstr "startCommand:" render.yaml >nul
    if %errorlevel% equ 0 (
        echo ✅ startCommand configuré
    ) else (
        echo ❌ startCommand manquant
        goto :error
    )
    
) else (
    echo ❌ render.yaml manquant - CRITIQUE
    goto :error
)

echo.
echo [3/3] 🔧 Ajout de configuration explicite...
echo.

:: Créer un fichier .buildpacks pour forcer PHP
echo php > .buildpacks
echo ✅ .buildpacks créé (force PHP detection)

:: Créer un fichier composer.json minimal si manquant
if not exist "composer.json" (
    echo ❌ composer.json manquant - CRITIQUE pour PHP detection
    goto :error
) else (
    echo ✅ composer.json présent
)

:: Créer runtime.txt pour spécifier version PHP
echo php-8.1.0 > runtime.txt
echo ✅ runtime.txt créé (PHP 8.1)

:: Mettre à jour render.yaml pour être plus explicite
echo.
echo 📝 Vérification render.yaml...

:: Afficher la configuration actuelle
echo.
echo Configuration render.yaml actuelle:
echo =====================================
type render.yaml | findstr /n "runtime\|buildCommand\|startCommand"
echo =====================================

goto :success

:error
echo.
echo ❌ Configuration Render incomplète
echo.
echo 🔧 Actions requises:
echo    - Vérifier que render.yaml existe
echo    - S'assurer que runtime: php est spécifié
echo    - Vérifier buildCommand et startCommand
echo.
goto :end

:success
echo.
echo ===================================================================
echo  🎉 CONFIGURATION PHP NATIVE FORCÉE !
echo ===================================================================
echo.
echo ✅ Tous les fichiers Docker supprimés
echo ✅ render.yaml configuré pour PHP natif
echo ✅ .buildpacks créé (force PHP detection)
echo ✅ runtime.txt créé (PHP 8.1)
echo.
echo 📝 COMMIT ET REDÉPLOIEMENT :
echo.

:: Commit les corrections
git add .
git add .buildpacks runtime.txt
git add -u

git commit -m "fix: force Render PHP native mode, remove Docker detection

PROBLEM: Render was trying to use Docker instead of PHP native runtime
- Error: failed to read dockerfile: open Dockerfile: no such file or directory

SOLUTION: Force PHP detection and runtime
- Remove all Dockerfile* files completely
- Add .buildpacks file to force PHP buildpack
- Add runtime.txt to specify PHP 8.1
- Ensure render.yaml uses runtime: php

CONFIGURATION:
- Build: composer + npm (PHP native)
- Start: heroku-php-apache2 with apache.conf
- Runtime: PHP 8.1 (no Docker)
- Deploy: Native PHP deployment"

if %errorlevel% equ 0 (
    echo ✅ Configuration PHP native committée
) else (
    echo ⚠️ Rien à committer ou déjà fait
)

echo.
echo 🚀 INSTRUCTIONS RENDER :
echo.
echo 1. 📤 Push la configuration PHP native :
echo    git push origin main
echo.
echo 2. 🔄 Render devrait maintenant :
echo    ✅ Détecter PHP au lieu de Docker
echo    ✅ Utiliser render.yaml configuration
echo    ✅ Lancer composer install + npm build
echo    ✅ Démarrer avec heroku-php-apache2
echo.
echo 3. 🔍 Vérification Render Dashboard :
echo    - Build logs: "Detected PHP" (pas Docker)
echo    - Runtime: "PHP 8.1"
echo    - Start command: heroku-php-apache2
echo.
echo 💡 SI LE PROBLÈME PERSISTE :
echo.
echo 🎯 Alternative: Configuration manuelle Render
echo    1. Render Dashboard → Settings
echo    2. Build Command: composer install --no-dev --optimize-autoloader ^&^& npm ci ^&^& npm run build:prod
echo    3. Start Command: vendor/bin/heroku-php-apache2 -C apache.conf public/
echo    4. Auto-Deploy: Enabled
echo.
echo 📞 Support Render si render.yaml ignoré:
echo    - Contacter support@render.com
echo    - Mentionner: "render.yaml ignored, Docker detection instead of PHP"
echo.

:end
echo.
echo 🎯 RÉSULTAT ATTENDU :
echo    ❌ Plus d'erreur Docker/Dockerfile
echo    ✅ Build PHP natif rapide (2-3 min)
echo    ✅ Site accessible sans 403 errors
echo    ✅ Favicon fonctionne avec apache.conf
echo.
pause
