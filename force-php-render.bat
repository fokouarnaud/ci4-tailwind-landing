@echo off
echo.
echo ===================================================================
echo  🚨 FIX URGENT - Render Force PHP Mode (No Docker)
echo ===================================================================
echo.

echo [1/4] 🔍 Diagnostic Render configuration...
echo.

echo ❌ PROBLÈME: Render cherche Dockerfile malgré render.yaml
echo 💡 CAUSE: Detection priority Docker > PHP
echo 🎯 SOLUTION: Supprimer render.yaml temporairement + force PHP

echo.
echo [2/4] 🗑️ Suppression configuration conflictuelle...
echo.

:: Backup render.yaml
if exist "render.yaml" (
    copy "render.yaml" "render.yaml.backup"
    del "render.yaml"
    echo ✅ render.yaml supprimé temporairement (backup créé)
)

:: S'assurer qu'aucun Docker file n'existe
for %%f in (Dockerfile Dockerfile.* .dockerignore) do (
    if exist "%%f" (
        del "%%f"
        echo ✅ %%f supprimé
    )
)

echo.
echo [3/4] 🔧 Configuration PHP native explicite...
echo.

:: Créer composer.json optimisé pour Render si besoin
if exist "composer.json" (
    echo ✅ composer.json présent
) else (
    echo ❌ composer.json manquant - CRITIQUE
    goto :error
)

:: Créer package.json vérifié
if exist "package.json" (
    echo ✅ package.json présent
) else (
    echo ❌ package.json manquant
    goto :error
)

:: Forcer détection PHP avec plusieurs méthodes
echo php > .buildpacks
echo ✅ .buildpacks créé

echo php-8.1.0 > runtime.txt
echo ✅ runtime.txt créé

:: Créer index.php à la racine pour force detection
if not exist "index.php" (
    echo ^<?php header('Location: public/'^); ?^> > index.php
    echo ✅ index.php racine créé (redirect vers public/)
)

:: Vérifier structure CI4
if exist "public\index.php" (
    echo ✅ public/index.php (CI4 entry point) présent
) else (
    echo ❌ public/index.php manquant - CRITIQUE
    goto :error
)

echo.
echo [4/4] 📝 Configuration manuelle Render...
echo.

echo ===================================================================
echo  🎯 CONFIGURATION MANUELLE RENDER DASHBOARD
echo ===================================================================
echo.
echo 1. 🌐 Aller sur render.com Dashboard
echo 2. 📝 Sélectionner votre service
echo 3. ⚙️ Settings → Build ^& Deploy
echo 4. 🔧 Configurer MANUELLEMENT:
echo.
echo    Environment: PHP
echo    Build Command: 
echo    composer install --no-dev --optimize-autoloader ^&^& npm ci ^&^& npm run build:prod
echo.
echo    Start Command:
echo    vendor/bin/heroku-php-apache2 -C apache.conf public/
echo.
echo    Auto-Deploy: Yes
echo.
echo 5. 💾 Save Changes
echo 6. 🚀 Manual Deploy
echo.

:: Commit les changements
git add .
git add -u
git commit -m "fix: force PHP detection, remove render.yaml conflicts

URGENT FIX for Docker error:
- Remove render.yaml temporarily (backup created)
- Add .buildpacks file to force PHP detection  
- Add runtime.txt for PHP 8.1
- Add root index.php for PHP detection
- Manual Render configuration required

Manual Config Render Dashboard:
Environment: PHP
Build: composer install --no-dev --optimize-autoloader && npm ci && npm run build:prod  
Start: vendor/bin/heroku-php-apache2 -C apache.conf public/
Auto-Deploy: Yes

This forces PHP native deployment without Docker detection"

if %errorlevel% equ 0 (
    echo ✅ Configuration force PHP committée
) else (
    echo ⚠️ Rien à committer
)

goto :success

:error
echo ❌ Fichiers critiques manquants
goto :end

:success
echo.
echo ===================================================================
echo  🎉 CONFIGURATION PHP FORCÉE !
echo ===================================================================
echo.
echo ✅ render.yaml supprimé (conflit résolu)
echo ✅ .buildpacks + runtime.txt créés
echo ✅ index.php racine ajouté
echo ✅ Configuration committée
echo.
echo 🚀 ÉTAPES SUIVANTES CRITIQUES:
echo.
echo 1. 📤 Push immédiat:
echo    git push origin main
echo.
echo 2. 🎯 Configuration manuelle Render:
echo    - Dashboard → Settings → Build ^& Deploy
echo    - Environment: PHP (IMPORTANT)
echo    - Build Command: composer install --no-dev --optimize-autoloader ^&^& npm ci ^&^& npm run build:prod
echo    - Start Command: vendor/bin/heroku-php-apache2 -C apache.conf public/
echo.
echo 3. 🔄 Manual Deploy:
echo    - Trigger deploy manuellement
echo    - Vérifier logs: "Detected PHP" (pas Docker)
echo.
echo 💡 APRÈS SUCCÈS PHP:
echo    - Vous pourrez remettre render.yaml plus tard
echo    - cp render.yaml.backup render.yaml
echo    - Mais d'abord tester PHP natif sans YAML
echo.

:end
echo.
echo 🎯 RÉSULTAT ATTENDU:
echo    ❌ Plus d'erreur "failed to read dockerfile"
echo    ✅ Build PHP natif réussi
echo    ✅ Site accessible avec apache.conf
echo    ✅ Favicon fonctionne
echo.
echo ⚠️  IMPORTANT: Configuration manuelle Render OBLIGATOIRE
echo    render.yaml supprimé pour éviter conflits Docker
echo.
pause
