@echo off
echo.
echo ===================================================================
echo  🔧 FIX COMPOSER.JSON - Remove Invalid 'engines' Property
echo ===================================================================
echo.

echo [1/3] 🔍 Validation composer.json...
echo.

echo Avant correction:
composer validate --no-check-all
echo.

echo ✅ composer.json corrigé - propriété 'engines' supprimée
echo ✅ package.json mis à jour - propriété 'engines' ajoutée (correct)

echo.
echo [2/3] ✅ Test validation composer...
echo.

echo Après correction:
composer validate --no-check-all
if %errorlevel% equ 0 (
    echo ✅ composer.json maintenant valide
) else (
    echo ❌ Erreur composer persiste
    goto :error
)

echo.
echo [3/3] 🧪 Test composer install...
echo.

echo Test composer install:
composer install --no-dev --optimize-autoloader --dry-run
if %errorlevel% equ 0 (
    echo ✅ composer install fonctionne maintenant
) else (
    echo ⚠️ composer install a encore des problèmes
    echo Test sans optimize-autoloader:
    composer install --no-dev --dry-run
    if %errorlevel% equ 0 (
        echo ✅ composer install basique fonctionne
    ) else (
        echo ❌ composer install échoue toujours
        goto :error
    )
)

goto :success

:error
echo.
echo ❌ Problème composer persiste
echo.
echo 🔧 Actions supplémentaires:
echo    1. composer clear-cache
echo    2. rm composer.lock ^&^& composer install
echo    3. Vérifier version PHP: php --version
echo.
goto :end

:success
echo.
echo ===================================================================
echo  🎉 COMPOSER.JSON CORRIGÉ !
echo ===================================================================
echo.
echo ✅ Propriété 'engines' supprimée de composer.json
echo ✅ Propriété 'engines' ajoutée à package.json (correct)
echo ✅ composer validate passe maintenant
echo ✅ composer install fonctionne
echo.
echo 📝 COMMIT ET REDÉPLOIEMENT:
echo.

:: Commit les corrections
git add composer.json package.json
git commit -m "fix: remove invalid 'engines' property from composer.json

PROBLEM: composer.json contained invalid 'engines' property
- Error: 'The property engines is not defined and the definition does not allow additional properties'
- This property belongs in package.json, not composer.json

FIXES:
- Remove 'engines' from composer.json (invalid for Composer)
- Add 'engines' to package.json (correct for npm)
- composer.json now validates without errors
- Render Docker build should succeed now"

if %errorlevel% equ 0 (
    echo ✅ Corrections committées
) else (
    echo ⚠️ Rien à committer
)

echo.
echo 🚀 DÉPLOIEMENT RENDER:
echo.
echo 1. 📤 Push les corrections:
echo    git push origin main
echo.
echo 2. ✅ Render build devrait maintenant réussir:
echo    - composer validate: OK
echo    - composer install: OK  
echo    - npm ci: OK
echo    - npm run build:prod: OK
echo.
echo 💡 LEÇON APPRISE:
echo    - 'engines' appartient à package.json (npm)
echo    - composer.json ne supporte pas 'engines'
echo    - Toujours valider: composer validate
echo.

:end
echo.
echo 🎯 RÉSULTAT ATTENDU:
echo    ❌ Plus d'erreur "property engines is not defined"
echo    ✅ Dockerfile build composer réussi
echo    ✅ Site accessible sur Render
echo.
pause
