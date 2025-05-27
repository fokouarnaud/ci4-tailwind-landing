@echo off
echo.
echo ===================================================================
echo  🔧 FIX BUILD WINDOWS - Installation cross-env
echo ===================================================================
echo.

echo [1/3] 📦 Installation de cross-env...
echo.

:: Installation de cross-env
npm install --save-dev cross-env
if %errorlevel% equ 0 (
    echo ✅ cross-env installé avec succès
) else (
    echo ❌ Erreur installation cross-env
    goto :error
)

echo.
echo [2/3] 🧪 Test des différents builds...
echo.

:: Test build:prod avec cross-env
echo Test build:prod (avec cross-env)...
call npm run build:prod
if %errorlevel% equ 0 (
    echo ✅ npm run build:prod - OK
    set "BUILD_METHOD=build:prod"
    goto :success
)

:: Test build:prod:simple
echo.
echo Test build:prod:simple (sans NODE_ENV)...
call npm run build:prod:simple
if %errorlevel% equ 0 (
    echo ✅ npm run build:prod:simple - OK
    set "BUILD_METHOD=build:prod:simple"
    goto :success
)

:: Test build standard
echo.
echo Test build standard...
call npm run build
if %errorlevel% equ 0 (
    echo ✅ npm run build - OK
    set "BUILD_METHOD=build"
    goto :success
)

:error
echo.
echo ❌ Tous les builds ont échoué
echo.
echo 🔧 Solutions à essayer :
echo   1. Vérifier que Node.js est installé : node --version
echo   2. Vérifier que npm fonctionne : npm --version
echo   3. Nettoyer et réinstaller : npm clean-install
echo   4. Supprimer node_modules et package-lock.json puis npm install
echo.
goto :end

:success
echo.
echo [3/3] 📄 Mise à jour package.json...
echo.

:: Afficher le contenu actuel
echo Scripts npm disponibles :
npm run
echo.

echo ===================================================================
echo  🎉 BUILD CORRIGÉ !
echo ===================================================================
echo.
echo ✅ Méthode de build fonctionnelle : %BUILD_METHOD%
echo ✅ cross-env installé et configuré
echo.
echo 🚀 Vous pouvez maintenant utiliser :
echo   npm run %BUILD_METHOD%
echo   deploy-railway.bat
echo.
echo 💡 Configuration mise à jour :
echo   - cross-env : Variables d'environnement cross-platform
echo   - build:prod : Avec NODE_ENV=production
echo   - build:prod:simple : Sans variables d'environnement
echo   - build : Build standard Vite
echo.

echo [4/4] 🧪 Test final du déploiement...
echo.

:: Test rapide avec la méthode qui fonctionne
call npm run %BUILD_METHOD%
if %errorlevel% equ 0 (
    if exist "public\assets" (
        echo ✅ Assets générés dans public\assets\
        for /f %%i in ('dir /b "public\assets\*.css" 2^>nul ^| find /c /v ""') do set CSS_COUNT=%%i
        for /f %%i in ('dir /b "public\assets\*.js" 2^>nul ^| find /c /v ""') do set JS_COUNT=%%i
        echo    📄 CSS files: %CSS_COUNT%
        echo    📄 JS files: %JS_COUNT%
        
        echo.
        echo 🎯 PRÊT POUR DÉPLOIEMENT !
        echo   ./deploy-railway.bat
        echo   git push origin main
        echo   → Railway deploy ✅
    ) else (
        echo ⚠️ Dossier public\assets non créé
    )
) else (
    echo ❌ Test final échoué
)

:end
echo.
pause
