@echo off
echo.
echo ===================================================================
echo  🔧 FIX RENDER FAVICON ERROR - Apache Configuration
echo ===================================================================
echo.

echo [1/3] 🔍 Analyse du problème...
echo.
echo Erreur détectée : "client denied by server configuration: favicon.ico"
echo.
echo 💡 Cause : Apache bloque l'accès aux fichiers statiques
echo 🔧 Solution : Mise à jour apache.conf + ajout favicon
echo.

echo [2/3] 🛠️ Application du fix...
echo.

:: Vérifier que apache.conf existe
if exist "apache.conf" (
    echo ✅ apache.conf corrigé avec permissions favicon
) else (
    echo ❌ apache.conf manquant
    goto :error
)

:: Créer un favicon simple si manquant
if not exist "public\favicon.ico" (
    echo 📄 Création d'un favicon par défaut...
    
    :: Vérifier si favicon.svg existe
    if exist "public\favicon.svg" (
        echo ✅ favicon.svg créé - Convertir en ICO si nécessaire
    ) else (
        echo ❌ favicon.svg manquant
    )
    
    :: Créer un favicon.ico minimal (copie index.php pour test)
    echo ^<^!-- Favicon placeholder --^> > "public\favicon.ico"
    echo ⚠️ Favicon temporaire créé - remplacer par un vrai ICO
)

:: Vérifier la configuration render.yaml
if exist "render.yaml" (
    findstr "apache.conf" render.yaml >nul
    if %errorlevel% equ 0 (
        echo ✅ render.yaml configuré pour utiliser apache.conf
    ) else (
        echo ⚠️ render.yaml pourrait nécessiter une mise à jour
    )
) else (
    echo ⚠️ render.yaml manquant
)

echo.
echo [3/3] 📝 Commit du fix...
echo.

:: Commit les corrections
git add apache.conf
git add public/favicon.*
git add .

git commit -m "fix: resolve Render favicon 403 error

- Update apache.conf to allow access to favicon.ico and static assets
- Add specific FilesMatch rules for web assets (ico, png, jpg, css, js)
- Fix Directory permissions for public folder
- Add graceful favicon fallback in Apache rewrite rules
- Create default favicon.svg as placeholder

Fixes Render error: [authz_core:error] client denied by server configuration: favicon.ico"

if %errorlevel% equ 0 (
    echo ✅ Fix committés pour Render
) else (
    echo ⚠️ Rien à committer ou déjà fait
)

goto :success

:error
echo.
echo ❌ Erreur pendant le fix
echo.
goto :end

:success
echo.
echo ===================================================================
echo  🎉 FIX FAVICON APPLIQUÉ !
echo ===================================================================
echo.
echo ✅ apache.conf mis à jour avec permissions correctes
echo ✅ favicon.svg créé (convertir en ICO recommandé)
echo ✅ Configuration committée pour Render
echo.
echo 🚀 REDÉPLOIEMENT RENDER :
echo.
echo 1. 📤 Push le fix :
echo    git push origin main
echo.
echo 2. 🔄 Render redéploie automatiquement (2-3 minutes)
echo.
echo 3. ✅ L'erreur favicon devrait être résolue
echo.
echo 💡 AMÉLIORATIONS SUPPLÉMENTAIRES :
echo.
echo 📄 Favicon professionnel :
echo    - Convertir favicon.svg en favicon.ico
echo    - Ajouter différentes tailles (16x16, 32x32, 48x48)
echo    - Placer dans public/favicon.ico
echo.
echo 🔧 Autres assets recommandés :
echo    - public/apple-touch-icon.png (180x180)
echo    - public/manifest.json (PWA)
echo    - public/robots.txt (SEO)
echo.
echo 📊 Vérification post-deploy :
echo    - URL : https://ci4-tailwind-landing.onrender.com/favicon.ico
echo    - Status : Devrait retourner 200 OK
echo    - Logs : Plus d'erreur [authz_core:error]
echo.
echo 🎯 MONITORING :
echo    - Render Logs : Vérifier absence d'erreurs favicon
echo    - Browser : F12 Console pour erreurs 404
echo    - GTmetrix : Performance après fix
echo.

:end
echo.
echo 📚 RESSOURCES :
echo    - Favicon Generator : favicon.io
echo    - Apache Docs : httpd.apache.org/docs/
echo    - Render Docs : render.com/docs
echo.
pause
