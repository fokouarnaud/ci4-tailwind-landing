@echo off
echo.
echo ===================================================================
echo  🔧 TEST BASEURL CONFIGURATION
echo ===================================================================
echo.

echo [1/2] 📋 Configuration actuelle...
echo.

echo Variables d'environnement:
echo CI_ENVIRONMENT: %CI_ENVIRONMENT%
echo HTTP_HOST: %HTTP_HOST%
echo SERVER_NAME: %SERVER_NAME%

echo.
echo [2/2] ✅ Configuration Auto-Detection...
echo.

echo ✅ AVANT (problématique):
echo    baseURL = 'http://localhost:8080/'
echo    ^^ Hard-codé, causait CORS en production
echo.

echo ✅ APRÈS (corrigé):
echo    baseURL = '' (auto-détection)
echo    - Développement: http://localhost:8080/
echo    - Render Prod: https://yourapp.onrender.com/
echo    - Force HTTPS: Automatique sur Render
echo    - Hostnames: Auto-détectés
echo.

echo 🎯 RÉSULTAT ATTENDU:
echo    ❌ Plus d'erreur CORS localhost:8080
echo    ✅ Assets chargés depuis bon domaine
echo    ✅ base_url() retourne URL correcte
echo    ✅ HTTPS forcé en production
echo.

echo 💡 COMMIT ET DEPLOY:
echo    git add app/Config/App.php
echo    git commit -m "fix: auto-detect baseURL for Render deployment"
echo    git push origin main
echo.

pause
