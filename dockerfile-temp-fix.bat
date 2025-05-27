@echo off
echo.
echo ===================================================================
echo  🚨 SOLUTION URGENTE - Dockerfile Temporaire pour Render
echo ===================================================================
echo.

echo [1/2] 📝 Création Dockerfile temporaire...
echo.
echo ✅ Dockerfile créé - Version temporaire pour contourner bug Render
echo.
echo ⚠️  IMPORTANT: Ce Dockerfile est TEMPORAIRE
echo    - Il permet de contourner l'erreur Render
echo    - À supprimer après premier deploy réussi
echo    - Puis passer en PHP natif
echo.

echo [2/2] 📤 Deploy avec Dockerfile temporaire...
echo.

:: Commit Dockerfile temporaire
git add Dockerfile
git commit -m "temp: add temporary Dockerfile to bypass Render detection bug

TEMPORARY FIX for persistent Docker error:
- Add minimal Dockerfile to satisfy Render's Docker detection
- This is a workaround for Render ignoring render.yaml and manual config
- Will be removed after successful deployment to switch to PHP native

Next steps after successful deploy:
1. Delete Dockerfile
2. Configure Render for PHP native mode
3. Use render.yaml or manual PHP configuration"

if %errorlevel% equ 0 (
    echo ✅ Dockerfile temporaire committé
) else (
    echo ⚠️ Rien à committer
)

echo.
echo ===================================================================
echo  🎯 PLAN D'ACTION
echo ===================================================================
echo.
echo 1. 📤 Push Dockerfile temporaire:
echo    git push origin main
echo.
echo 2. ✅ Vérifier deploy Render réussi:
echo    - Build logs: Docker build successful
echo    - URL accessible: https://ci4-tailwind-landing.onrender.com
echo.
echo 3. 🔄 Après deploy réussi, passer en PHP natif:
echo    del Dockerfile
echo    git add -u
echo    git commit -m "remove temporary Dockerfile, switch to PHP native"
echo    git push origin main
echo.
echo 4. ⚙️ Puis configurer Render pour PHP:
echo    - Dashboard → Settings → Build ^& Deploy
echo    - Environment: PHP
echo    - Build Command: composer install --no-dev ^&^& npm run build:prod
echo    - Start Command: vendor/bin/heroku-php-apache2 -C apache.conf public/
echo.
echo 💡 POURQUOI CETTE SOLUTION:
echo    - Render a un bug de détection de runtime
echo    - Même avec render.yaml et config manuelle, cherche Dockerfile
echo    - Dockerfile temporaire contourne le bug
echo    - Puis switch vers PHP natif fonctionne
echo.
echo ⚠️  TEMPORAIRE SEULEMENT:
echo    - Docker est plus lent que PHP natif
echo    - Dockerfile sera supprimé après premier succès
echo    - L'objectif reste PHP natif avec apache.conf
echo.

pause
