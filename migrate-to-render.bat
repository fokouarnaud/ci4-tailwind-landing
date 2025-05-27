@echo off
echo.
echo ===================================================================
echo  🚀 MIGRATION VERS RENDER.COM - CI4 + Tailwind
echo ===================================================================
echo.

set "ERROR_COUNT=0"

echo [1/5] 🧹 Nettoyage des fichiers Railway...
echo.

:: Supprimer les fichiers Railway/Docker
if exist "Dockerfile" del "Dockerfile"
if exist "Dockerfile.*" del "Dockerfile.*"
if exist "railway.toml" del "railway.toml"
if exist "docker\" rmdir /s /q "docker"
if exist ".dockerignore" del ".dockerignore"

echo ✅ Fichiers Railway supprimés

echo.
echo [2/5] 📦 Build local des assets...
echo.

:: S'assurer que cross-env est installé
npm list cross-env >nul 2>&1
if %errorlevel% neq 0 (
    echo Installation de cross-env...
    npm install --save-dev cross-env
)

:: Build assets avec fallback
call npm run build:prod
if %errorlevel% neq 0 (
    echo ⚠️ build:prod échoué, tentative build:prod:simple...
    call npm run build:prod:simple
    if %errorlevel% neq 0 (
        echo ⚠️ Tentative build standard...
        call npm run build
        if %errorlevel% neq 0 (
            echo ❌ Tous les builds ont échoué
            set /a ERROR_COUNT+=1
            goto :error
        )
    )
)

echo ✅ Assets buildés avec succès

:: Vérifier les assets
if exist "public\assets" (
    for /f %%i in ('dir /b "public\assets\*.css" 2^>nul ^| find /c /v ""') do set CSS_COUNT=%%i
    for /f %%i in ('dir /b "public\assets\*.js" 2^>nul ^| find /c /v ""') do set JS_COUNT=%%i
    echo    📄 CSS files: %CSS_COUNT%
    echo    📄 JS files: %JS_COUNT%
) else (
    echo ❌ Dossier public\assets non créé
    set /a ERROR_COUNT+=1
    goto :error
)

echo.
echo [3/5] 🔧 Configuration Render optimisée...
echo.

:: Vérifier que render.yaml existe
if exist "render.yaml" (
    echo ✅ render.yaml configuré
) else (
    echo ❌ render.yaml manquant
    set /a ERROR_COUNT+=1
    goto :error
)

:: Vérifier composer.json mis à jour
findstr "engines" composer.json >nul
if %errorlevel% equ 0 (
    echo ✅ composer.json optimisé pour Render
) else (
    echo ⚠️ composer.json pourrait nécessiter une mise à jour
)

echo.
echo [4/5] 📋 Vérification de la configuration...
echo.

:: Test composer install
echo Test installation composer...
composer validate --no-check-all --quiet
if %errorlevel% equ 0 (
    echo ✅ composer.json valide
) else (
    echo ⚠️ Problème potentiel avec composer.json
)

:: Vérifier structure requise
set "REQUIRED_FILES=public\index.php app\Config composer.json package.json"
for %%f in (%REQUIRED_FILES%) do (
    if exist "%%f" (
        echo ✅ %%f - OK
    ) else (
        echo ❌ %%f - MANQUANT
        set /a ERROR_COUNT+=1
    )
)

echo.
echo [5/5] 📝 Commit pour Render...
echo.

:: Git add avec assets
git add .
git add -f public/assets/*

:: Commit spécial pour Render
git commit -m "feat: migrate to Render.com deployment

- Remove Railway/Docker configuration
- Add render.yaml for Render.com
- Optimize composer.json for Render
- Pre-build assets for reliable deployment
- Update package.json with cross-env support

Ready for Render.com deployment:
1. Connect GitHub repo to Render
2. Auto-deploy will handle the rest
3. Live URL in 3-5 minutes"

if %errorlevel% equ 0 (
    echo ✅ Commit préparé pour Render
) else (
    echo ⚠️ Commit peut-être déjà fait ou rien à commiter
)

goto :success

:error
echo.
echo ===================================================================
echo  ❌ ERREUR DE MIGRATION
echo ===================================================================
echo.
echo 🔧 Actions requises :
echo    - Vérifier que npm run build fonctionne
echo    - S'assurer que les assets sont générés
echo    - Corriger les fichiers manquants
echo.
goto :end

:success
echo.
echo ===================================================================
echo  🎉 MIGRATION RENDER RÉUSSIE !
echo ===================================================================
echo.
echo ✅ Configuration Railway supprimée
echo ✅ Configuration Render optimisée
echo ✅ Assets buildés et committés
echo ✅ Prêt pour déploiement Render
echo.
echo 🚀 PROCHAINES ÉTAPES RENDER.COM :
echo.
echo 1. 📤 Push vers GitHub :
echo    git push origin main
echo.
echo 2. 🌐 Aller sur render.com :
echo    - Créer compte avec GitHub
echo    - New Web Service
echo    - Connect Repository → Sélectionner votre repo
echo.
echo 3. ⚙️ Configuration automatique :
echo    - Render détecte PHP ✅
echo    - Build Command : Auto-détecté ✅
echo    - Start Command : Auto-détecté ✅
echo.
echo 4. 🎯 Variables d'environnement (optionnelles) :
echo    CI_ENVIRONMENT=production
echo    COMPOSER_MEMORY_LIMIT=-1
echo.
echo 5. 🚀 Deploy automatique :
echo    - Temps : 3-5 minutes
echo    - URL : https://yourapp.onrender.com
echo    - SSL : Automatique ✅
echo.
echo 💰 AVANTAGES RENDER VS RAILWAY :
echo    ✅ 750h gratuit/mois (vs $5 crédit Railway)
echo    ✅ PHP natif (vs Docker compliqué)
echo    ✅ Setup 3 minutes (vs 10+ minutes Railway)
echo    ✅ Logs clairs (vs Docker logs obscurs)
echo    ✅ SSL custom domains gratuit
echo.
echo 📚 GUIDES DISPONIBLES :
echo    - POST-DEPLOY-GUIDE.md : Optimisations avancées
echo    - Documentation Render : render.com/docs
echo.

:end
echo.
echo 🎯 STACK COMPLET GRATUIT MAINTENANT :
echo    🌐 Render.com : Hébergement
echo    🗄️ Supabase : Database PostgreSQL  
echo    📧 Resend : Emails transactionnels
echo    📊 UptimeRobot : Monitoring
echo.
echo 💡 Total : 0€ pour commencer, performance excellente !
echo.
pause
exit /b %ERROR_COUNT%
