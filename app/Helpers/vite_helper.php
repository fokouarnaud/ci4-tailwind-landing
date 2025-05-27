<?php

/**
 * Vite Helper Functions - Version 4.0 compatible
 * 
 * Helper optimisé pour Tailwind CSS v4 et Vite 5+
 * avec support amélioré du nouveau plugin @tailwindcss/vite
 * 
 * Version 4.0 - Compatible avec Tailwind CSS v4
 */

if (! function_exists('vite_asset')) {
    /**
     * Obtient l'URL d'un asset Vite depuis le manifest
     * 
     * @param string $entry Point d'entrée (ex: 'resources/js/app.js')
     * @return string URL de l'asset ou chaîne vide si non trouvé
     */
    function vite_asset(string $entry): string
    {
        static $manifest = null;
        
        // Charger le manifest une seule fois
        if ($manifest === null) {
            $manifestPath = FCPATH . 'assets/.vite/manifest.json';
            
            if (!file_exists($manifestPath)) {
                if (ENVIRONMENT === 'development') {
                    log_message('info', 'Vite manifest not found. Run "npm run build" to generate assets.');
                }
                return '';
            }
            
            $manifestContent = file_get_contents($manifestPath);
            $manifest = json_decode($manifestContent, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                log_message('error', 'Invalid Vite manifest JSON: ' . json_last_error_msg());
                return '';
            }
        }
        
        // Chercher l'entrée dans le manifest
        if (!isset($manifest[$entry])) {
            log_message('warning', "Vite asset not found in manifest: {$entry}");
            return '';
        }
        
        $asset = $manifest[$entry];
        return base_url('assets/' . $asset['file']);
    }
}

if (! function_exists('vite_css')) {
    /**
     * Obtient l'URL du fichier CSS associé à une entrée Vite
     * Version optimisée pour Tailwind CSS v4
     * 
     * @param string $entry Point d'entrée (ex: 'resources/js/app.js')
     * @return string URL du CSS ou chaîne vide si non trouvé
     */
    function vite_css(string $entry): string
    {
        static $manifest = null;
        
        if ($manifest === null) {
            $manifestPath = FCPATH . 'assets/.vite/manifest.json';
            
            if (!file_exists($manifestPath)) {
                return '';
            }
            
            $manifestContent = file_get_contents($manifestPath);
            $manifest = json_decode($manifestContent, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return '';
            }
        }
        
        if (!isset($manifest[$entry])) {
            return '';
        }
        
        $asset = $manifest[$entry];
        
        // ✅ Tailwind v4 génère le CSS dans la propriété 'css' (array)
        if (isset($asset['css']) && !empty($asset['css']) && is_array($asset['css'])) {
            return base_url('assets/' . $asset['css'][0]);
        }
        
        // ✅ Cas où le CSS est une chaîne simple
        if (isset($asset['css']) && is_string($asset['css'])) {
            return base_url('assets/' . $asset['css']);
        }
        
        // ✅ Chercher tous les fichiers CSS dans le manifest
        foreach ($manifest as $manifestAsset) {
            if (isset($manifestAsset['file']) && str_ends_with($manifestAsset['file'], '.css')) {
                return base_url('assets/' . $manifestAsset['file']);
            }
        }
        
        return '';
    }
}

if (! function_exists('vite_all_css')) {
    /**
     * Obtient tous les fichiers CSS du manifest
     * Utile pour Tailwind CSS v4 qui peut générer plusieurs fichiers CSS
     * 
     * @return array URLs de tous les fichiers CSS
     */
    function vite_all_css(): array
    {
        static $manifest = null;
        
        if ($manifest === null) {
            $manifestPath = FCPATH . 'assets/.vite/manifest.json';
            
            if (!file_exists($manifestPath)) {
                return [];
            }
            
            $manifestContent = file_get_contents($manifestPath);
            $manifest = json_decode($manifestContent, true);
            
            if (json_last_error() !== JSON_ERROR_NONE) {
                return [];
            }
        }
        
        $cssFiles = [];
        foreach ($manifest as $asset) {
            if (isset($asset['file']) && str_ends_with($asset['file'], '.css')) {
                $cssFiles[] = base_url('assets/' . $asset['file']);
            }
            
            // Vérifier aussi dans la propriété css
            if (isset($asset['css']) && is_array($asset['css'])) {
                foreach ($asset['css'] as $cssFile) {
                    $cssFiles[] = base_url('assets/' . $cssFile);
                }
            }
        }
        
        return array_unique($cssFiles);
    }
}

if (! function_exists('vite_tags')) {
    /**
     * Génère les tags HTML pour charger les assets Vite
     * Version optimisée pour Tailwind CSS v4
     * 
     * @param string $entry Point d'entrée (ex: 'resources/js/app.js')
     * @return string HTML tags pour CSS et JS
     */
    function vite_tags(string $entry): string
    {
        $output = '';
        
        // ✅ CSS tags - optimisé pour Tailwind v4
        $cssUrl = vite_css($entry);
        if (!empty($cssUrl)) {
            $output .= '<link rel="stylesheet" href="' . $cssUrl . '">' . "\n";
        } else {
            // Fallback: charger tous les CSS si aucun spécifique trouvé
            $allCss = vite_all_css();
            foreach ($allCss as $cssUrl) {
                $output .= '<link rel="stylesheet" href="' . $cssUrl . '">' . "\n";
            }
        }
        
        // ✅ JS tag avec support module
        $jsUrl = vite_asset($entry);
        if (!empty($jsUrl)) {
            $output .= '<script type="module" src="' . $jsUrl . '"></script>' . "\n";
        }
        
        return $output;
    }
}

if (! function_exists('vite_dev_server')) {
    /**
     * Vérifie si le serveur de développement Vite est actif
     * Version optimisée avec cache statique
     * 
     * @return bool
     */
    function vite_dev_server(): bool
    {
        if (ENVIRONMENT !== 'development') {
            return false;
        }
        
        // Cache du résultat pour éviter les appels répétés
        static $isRunning = null;
        if ($isRunning !== null) {
            return $isRunning;
        }
        
        // Essayer de se connecter au serveur Vite (localhost:5173)
        $context = stream_context_create([
            'http' => [
                'timeout' => 1,
                'ignore_errors' => true,
            ]
        ]);
        
        $result = @file_get_contents('http://localhost:5173/@vite/client', false, $context);
        $isRunning = ($result !== false);
        
        return $isRunning;
    }
}

if (! function_exists('vite_dev_tags')) {
    /**
     * Génère les tags pour le mode développement Vite
     * Compatible avec le plugin @tailwindcss/vite
     * 
     * @param string $entry Point d'entrée (ex: 'resources/js/app.js')
     * @return string HTML tags pour le dev server
     */
    function vite_dev_tags(string $entry): string
    {
        if (!vite_dev_server()) {
            return '';
        }
        
        $output = '';
        
        // ✅ Vite client script pour HMR
        $output .= '<script type="module" src="http://localhost:5173/@vite/client"></script>' . "\n";
        
        // ✅ Entry point script - Tailwind v4 sera traité automatiquement
        $output .= '<script type="module" src="http://localhost:5173/' . $entry . '"></script>' . "\n";
        
        return $output;
    }
}

if (! function_exists('vite')) {
    /**
     * Point d'entrée principal pour charger les assets Vite
     * Compatible avec Tailwind CSS v4 et le plugin @tailwindcss/vite
     * 
     * @param string $entry Point d'entrée (ex: 'resources/js/app.js')
     * @param bool $debug Afficher les infos de debug
     * @return string HTML tags appropriés
     */
    function vite(string $entry = 'resources/js/app.js', bool $debug = false): string
    {
        $output = '';
        
        // Debug info pour le développement
        if ($debug && ENVIRONMENT === 'development') {
            $output .= "<!-- Vite v4 Debug: Entry = {$entry} -->\n";
            $output .= "<!-- Vite v4 Debug: Environment = " . ENVIRONMENT . " -->\n";
            $output .= "<!-- Vite v4 Debug: Dev Server = " . (vite_dev_server() ? 'Active' : 'Inactive') . " -->\n";
            $output .= "<!-- Vite v4 Debug: Tailwind CSS v4 Ready -->\n";
        }
        
        // En développement avec serveur Vite actif
        if (ENVIRONMENT === 'development' && vite_dev_server()) {
            $output .= vite_dev_tags($entry);
        } else {
            // En production ou si le dev server n'est pas disponible
            $output .= vite_tags($entry);
        }
        
        return $output;
    }
}

if (! function_exists('vite_manifest_debug')) {
    /**
     * Fonction de debug pour afficher le contenu du manifest
     * Utile pour diagnostiquer les problèmes de build Tailwind v4
     * 
     * @return string Contenu formaté du manifest
     */
    function vite_manifest_debug(): string
    {
        $manifestPath = FCPATH . 'assets/.vite/manifest.json';
        
        if (!file_exists($manifestPath)) {
            return "❌ Manifest not found at: {$manifestPath}";
        }
        
        $manifestContent = file_get_contents($manifestPath);
        $manifest = json_decode($manifestContent, true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return "❌ Invalid manifest JSON: " . json_last_error_msg();
        }
        
        $output = "✅ Manifest loaded successfully:\n";
        $output .= "📁 Path: {$manifestPath}\n";
        $output .= "📄 Content:\n";
        $output .= json_encode($manifest, JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES);
        
        return $output;
    }
}

if (! function_exists('vite_v4_health_check')) {
    /**
     * Vérification de santé pour Tailwind CSS v4 et Vite
     * 
     * @return array Résultats de la vérification
     */
    function vite_v4_health_check(): array
    {
        $results = [
            'manifest_exists' => false,
            'dev_server_running' => false,
            'css_files_found' => 0,
            'js_files_found' => 0,
            'tailwind_v4_ready' => false,
        ];
        
        // Vérifier le manifest
        $manifestPath = FCPATH . 'assets/.vite/manifest.json';
        $results['manifest_exists'] = file_exists($manifestPath);
        
        if ($results['manifest_exists']) {
            $manifestContent = file_get_contents($manifestPath);
            $manifest = json_decode($manifestContent, true);
            
            if (json_last_error() === JSON_ERROR_NONE) {
                foreach ($manifest as $asset) {
                    if (isset($asset['file'])) {
                        if (str_ends_with($asset['file'], '.css')) {
                            $results['css_files_found']++;
                        }
                        if (str_ends_with($asset['file'], '.js')) {
                            $results['js_files_found']++;
                        }
                    }
                }
                
                // Tailwind v4 est prêt si on a du CSS généré
                $results['tailwind_v4_ready'] = $results['css_files_found'] > 0;
            }
        }
        
        // Vérifier le serveur de développement
        $results['dev_server_running'] = vite_dev_server();
        
        return $results;
    }
}