@echo off
echo.
echo ===================================================================
echo  🚀 VALIDATION DEPLOIEMENT RAILWAY - CI4 + Tailwind Template
echo ===================================================================
echo.

:: Variables
set "PROJECT_ROOT=%cd%"
set "BUILD_SUCCESS=0"
set "ERROR_COUNT=0"

echo [1/6] 📁 Verification de la structure des fichiers...
echo.

:: Verification des fichiers essentiels pour Railway
set "REQUIRED_FILES=Dockerfile public\index.php composer.json package.json"

for %%f in (%REQUIRED_FILES%) do (
    if exist "%%f" (
        echo ✅ %%f - OK
    ) else (
        echo ❌ %%f - MANQUANT
        set /a ERROR_COUNT+=1
    )
)

:: Verification des dossiers critiques
echo.
echo Verification des dossiers critiques...
if exist "public" (
    echo ✅ public/ - OK
) else (
    echo ❌ public/ - MANQUANT
    set /a ERROR_COUNT+=1
)

if exist "app" (
    echo ✅ app/ - OK
) else (
    echo ❌ app/ - MANQUANT
    set /a ERROR_COUNT+=1
)

if exist "writable" (
    echo ✅ writable/ - OK
) else (
    echo ❌ writable/ - MANQUANT
    set /a ERROR_COUNT+=1
)

echo.
echo [2/6] 📦 Test des dependances Node.js...
echo.

:: Verification npm
npm --version >nul 2>&1
if %errorlevel% equ 0 (
    echo ✅ npm disponible
    
    :: Test install dependencies
    echo Installation des dependances...
    call npm install --silent
    if %errorlevel% equ 0 (
        echo ✅ npm install - OK
    ) else (
        echo ❌ npm install - ERREUR
        set /a ERROR_COUNT+=1
    )
) else (
    echo ❌ npm non disponible
    set /a ERROR_COUNT+=1
)

echo.
echo [3/6] 🏗️ Test du build production...
echo.

:: Test build production
call npm run build:prod
if %errorlevel% equ 0 (
    echo ✅ Build production - OK
    set BUILD_SUCCESS=1
) else (
    echo ❌ Build production - ERREUR
    set /a ERROR_COUNT+=1
)

:: Verification des assets generes
if %BUILD_SUCCESS% equ 1 (
    echo.
    echo Verification des assets generes...
    if exist "public\assets" (
        echo ✅ Dossier public\assets cree
        
        :: Compter les fichiers
        for /f %%i in ('dir /b "public\assets\*.css" 2^>nul ^| find /c /v ""') do set CSS_COUNT=%%i
        for /f %%i in ('dir /b "public\assets\*.js" 2^>nul ^| find /c /v ""') do set JS_COUNT=%%i
        
        echo    📄 CSS files: %CSS_COUNT%
        echo    📄 JS files: %JS_COUNT%
        
        if %CSS_COUNT% gtr 0 (
            echo ✅ Fichiers CSS generes
        ) else (
            echo ❌ Aucun fichier CSS genere
            set /a ERROR_COUNT+=1
        )
        
        if %JS_COUNT% gtr 0 (
            echo ✅ Fichiers JS generes
        ) else (
            echo ❌ Aucun fichier JS genere
            set /a ERROR_COUNT+=1
        )
    ) else (
        echo ❌ Dossier public\assets non cree
        set /a ERROR_COUNT+=1
    )
)

echo.
echo [4/6] 🐘 Test PHP et Composer...
echo.

:: Verification PHP
php --version >nul 2>&1
if %errorlevel% equ 0 (
    echo ✅ PHP disponible
    php --version | findstr "PHP"
) else (
    echo ❌ PHP non disponible
    set /a ERROR_COUNT+=1
)

:: Verification Composer
composer --version >nul 2>&1
if %errorlevel% equ 0 (
    echo ✅ Composer disponible
    
    :: Test composer install
    echo Test installation Composer...
    composer install --no-dev --optimize-autoloader --quiet
    if %errorlevel% equ 0 (
        echo ✅ composer install - OK
    ) else (
        echo ❌ composer install - ERREUR
        set /a ERROR_COUNT+=1
    )
) else (
    echo ❌ Composer non disponible
    set /a ERROR_COUNT+=1
)

echo.
echo [5/6] 🔧 Test de la configuration CodeIgniter...
echo.

:: Test du serveur CI4 local
echo Test du serveur CodeIgniter local...
start /B php spark serve --port 8081 >nul 2>&1
ping 127.0.0.1 -n 3 >nul

:: Test de connexion HTTP
powershell -Command "try { $response = Invoke-WebRequest -Uri 'http://localhost:8081' -TimeoutSec 5; if ($response.StatusCode -eq 200) { Write-Host '✅ Serveur CI4 répond - OK' } else { Write-Host '❌ Serveur CI4 - Code:' $response.StatusCode; exit 1 } } catch { Write-Host '❌ Serveur CI4 inaccessible'; exit 1 }"
if %errorlevel% equ 0 (
    echo ✅ Routes CI4 fonctionnelles
) else (
    echo ❌ Problème avec les routes CI4
    set /a ERROR_COUNT+=1
)

:: Arreter le serveur de test
taskkill /F /IM php.exe >nul 2>&1

echo.
echo [6/6] 🐳 Validation Docker (optionnel)...
echo.

:: Test Docker si disponible
docker --version >nul 2>&1
if %errorlevel% equ 0 (
    echo ✅ Docker disponible
    docker --version | findstr "Docker"
    
    echo.
    echo Test build Docker (ceci peut prendre quelques minutes)...
    docker build -t ci4-template-test . >nul 2>&1
    if %errorlevel% equ 0 (
        echo ✅ Docker build - OK
        
        :: Nettoyage de l'image de test
        docker rmi ci4-template-test >nul 2>&1
    ) else (
        echo ❌ Docker build - ERREUR
        set /a ERROR_COUNT+=1
    )
) else (
    echo ⚠️ Docker non disponible (optionnel pour Railway)
)

echo.
echo ===================================================================
echo  📊 RAPPORT DE VALIDATION
echo ===================================================================
echo.

if %ERROR_COUNT% equ 0 (
    echo 🎉 VALIDATION REUSSIE ! Votre projet est prêt pour Railway
    echo.
    echo ✅ Tous les tests sont passés
    echo ✅ Build production fonctionnel
    echo ✅ Configuration CI4 validée
    echo ✅ Assets générés correctement
    echo.
    echo 🚀 Prochaine étape : Déploiement Railway
    echo    1. git add .
    echo    2. git commit -m "feat: ready for Railway deployment"
    echo    3. git push origin main
    echo    4. Connecter à Railway et déployer
    echo.
    echo 📖 Guide détaillé : DEPLOY-RAILWAY.md
) else (
    echo ❌ VALIDATION ECHOUEE ! %ERROR_COUNT% erreur(s) détectée(s)
    echo.
    echo 🔧 Actions requises :
    if %BUILD_SUCCESS% equ 0 (
        echo    - Corriger les erreurs de build (npm run build:prod)
    )
    echo    - Vérifier les dépendances manquantes
    echo    - Tester la configuration CI4 localement
    echo.
    echo 📖 Consultez DEPLOY-RAILWAY.md pour plus de détails
)

echo.
echo ===================================================================
echo  💡 INFORMATIONS UTILES
echo ===================================================================
echo.
echo 🌐 URL de test local : http://localhost:8080 (npm start)
echo 🚀 Railway Dashboard : https://railway.app
echo 📊 Monitoring gratuit : https://uptimerobot.com
echo 📧 Emails gratuits : https://resend.com
echo 🗄️ DB gratuite : https://supabase.com
echo.
echo 📁 Structure optimale pour Railway :
echo    ├── Dockerfile (✓)
echo    ├── public/ (✓)
echo    ├── app/ (✓)
echo    ├── composer.json (✓)
echo    └── package.json (✓)
echo.
echo ⏱️ Temps de déploiement estimé : 3-5 minutes
echo 💰 Coût : 0€ pour commencer (Railway $5 crédit gratuit/mois)
echo.

pause
exit /b %ERROR_COUNT%
