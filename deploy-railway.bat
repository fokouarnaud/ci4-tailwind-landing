@echo off
echo.
echo ===================================================================
echo  🚀 DEPLOIEMENT RAILWAY - BUILD LOCAL + PUSH
echo ===================================================================
echo.

set "ERROR_COUNT=0"

echo [1/4] 🏗️ Build local des assets...
echo.

:: Installation de cross-env si nécessaire
echo Vérification de cross-env...
npm list cross-env >nul 2>&1
if %errorlevel% neq 0 (
    echo Installation de cross-env...
    npm install --save-dev cross-env
)

:: Build production local avec fallback
echo Tentative build:prod avec cross-env...
call npm run build:prod
if %errorlevel% equ 0 (
    echo ✅ Build production local - OK
) else (
    echo ⚠️ Build:prod échoué, tentative build:prod:simple...
    call npm run build:prod:simple
    if %errorlevel% equ 0 (
        echo ✅ Build production simple - OK
    ) else (
        echo ⚠️ Build simple échoué, tentative build standard...
        call npm run build
        if %errorlevel% equ 0 (
            echo ✅ Build standard - OK
        ) else (
            echo ❌ Tous les builds ont échoué
            set /a ERROR_COUNT+=1
            goto :error
        )
    )
)

:: Verification des assets generes
if exist "public\assets" (
    echo ✅ Assets générés dans public\assets\
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
echo [2/4] 🐳 Configuration Dockerfile...
echo.

:: Utiliser le Dockerfile no-build
if exist "Dockerfile.nobuild" (
    copy /Y "Dockerfile.nobuild" "Dockerfile"
    echo ✅ Dockerfile.nobuild → Dockerfile
) else (
    echo ❌ Dockerfile.nobuild introuvable
    set /a ERROR_COUNT+=1
    goto :error
)

echo.
echo [3/4] 📦 Commit des assets buildés...
echo.

:: Git add avec assets
git add .
git add -f public/assets/*
git commit -m "feat: production build with assets for Railway deployment

- Build assets locally with npm run build:prod
- Use Dockerfile.nobuild for fast Railway deployment
- Include generated CSS/JS files in commit
- Ready for Railway deployment"

if %errorlevel% equ 0 (
    echo ✅ Commit avec assets - OK
) else (
    echo ⚠️ Commit peut-être déjà fait ou rien à commiter
)

echo.
echo [4/4] 🚀 Instructions de déploiement...
echo.

echo ✅ PREPARATION TERMINEE !
echo.
echo 🎯 Prochaines étapes Railway :
echo    1. git push origin main
echo    2. Aller sur railway.app
echo    3. New Project → Deploy from GitHub repo
echo    4. Sélectionner votre repository
echo    5. Railway détecte Dockerfile automatiquement
echo.
echo 📊 Variables d'environnement à ajouter dans Railway :
echo    CI_ENVIRONMENT=production
echo    PORT=80
echo.
echo 🌐 URL automatique : https://yourapp.railway.app
echo.

:success
echo ===================================================================
echo  🎉 SUCCÈS ! Projet prêt pour Railway
echo ===================================================================
echo.
echo ✅ Assets buildés localement
echo ✅ Dockerfile optimisé (no-build)
echo ✅ Commit avec assets prêt
echo.
echo 💡 Avantages de cette méthode :
echo    - Build ultra-rapide sur Railway (pas de npm)
echo    - Déploiement en 1-2 minutes
echo    - Moins de risques d'erreurs build
echo    - Prévisualisation locale garantie
echo.
goto :end

:error
echo.
echo ===================================================================
echo  ❌ ERREUR DE PREPARATION
echo ===================================================================
echo.
echo 🔧 Actions requises :
echo    - Vérifier que npm run build:prod fonctionne
echo    - S'assurer que les assets sont générés
echo    - Corriger les erreurs de build
echo.
echo 💡 Debug :
echo    npm run build:prod
echo    ls public/assets/
echo.

:end
echo.
echo 📖 Guides disponibles :
echo    - DEPLOY-RAILWAY.md : Guide complet
echo    - POST-DEPLOY-GUIDE.md : Optimisations
echo.
pause
exit /b %ERROR_COUNT%
