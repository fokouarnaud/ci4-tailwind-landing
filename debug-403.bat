@echo off
echo.
echo ===================================================================
echo  🔧 DEBUG 403 RAILWAY - Test Docker Local
echo ===================================================================
echo.

echo [1/3] 📦 Build local avec assets...
echo.

:: Build assets d'abord
call npm run build
if %errorlevel% neq 0 (
    echo ❌ Build assets échoué
    goto :error
)

echo ✅ Assets buildés

echo.
echo [2/3] 🐳 Test Docker debug local...
echo.

:: Build image de debug
docker build -f Dockerfile.debug -t ci4-debug .
if %errorlevel% neq 0 (
    echo ❌ Docker build échoué
    goto :error
)

echo ✅ Docker image créée

:: Lancer container pour test
echo Lancement du container de test sur port 8090...
start /B docker run --rm -p 8090:80 ci4-debug

:: Attendre que le container démarre
echo Attente du démarrage (10 secondes)...
timeout /t 10 /nobreak >nul

echo.
echo [3/3] 🧪 Test de connexion...
echo.

:: Test HTTP
powershell -Command "try { $response = Invoke-WebRequest -Uri 'http://localhost:8090' -TimeoutSec 10; Write-Host '✅ Status:' $response.StatusCode; Write-Host 'Headers:'; $response.Headers | Format-Table; if ($response.Content -like '*CodeIgniter*') { Write-Host '✅ CodeIgniter détecté' } else { Write-Host '⚠️ Contenu inattendu' } } catch { Write-Host '❌ Erreur:' $_.Exception.Message }"

echo.
echo 🌐 Test manuel : http://localhost:8090
echo.

:success
echo ===================================================================
echo  📊 RÉSULTATS DU TEST
echo ===================================================================
echo.
echo Si le test local fonctionne :
echo ✅ Le problème vient de la configuration Railway
echo ✅ Utilisez Dockerfile.fix403 pour Railway
echo.
echo Si le test local échoue aussi :
echo ❌ Problème dans la configuration Apache/CI4
echo ❌ Vérifiez les logs Docker
echo.
echo 🔧 Solutions :
echo   1. Si local OK → cp Dockerfile.fix403 Dockerfile
echo   2. Si local KO → Vérifier structure CI4
echo.
echo Pour voir les logs Docker :
echo   docker logs [container-id]
echo.
echo Pour arrêter le test :
echo   docker stop [container-id]
echo.
goto :end

:error
echo.
echo ❌ Erreur pendant le test
echo.
echo Vérifiez :
echo   - Docker Desktop est lancé
echo   - npm run build fonctionne
echo   - Pas d'autre service sur port 8090
echo.

:end
echo.
pause
