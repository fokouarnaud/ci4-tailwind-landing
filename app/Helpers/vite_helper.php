<?php

/**
 * Helper Vite pour CodeIgniter 4
 * Intégration optimisée avec manifest.json et support dev/prod
 * 
 * @version 2.0
 * @author IT-Innov
 */

if (!function_exists('vite_asset')) {
    /**
     * Génère l'URL d'un asset Vite en utilisant le manifest.json
     * 
     * @param string $entry Point d'entrée (ex: 'resources/js/app.js')
     * @param bool|null $isDev Mode développement (auto-détecté si null)
     * @return string URL de l'asset
     */
    function vite_asset(string $entry, ?bool $isDev = null): string
    {
        // Auto-détection du mode développement
        if ($isDev === null) {
            $isDev = ENVIRONMENT === 'development' && is_vite_dev_server_running();
        }

        // En mode développement, utiliser le serveur Vite
        if ($isDev) {
            return "http://localhost:5173/{$entry}";
        }

        // En production, utiliser le manifest.json
        $manifestPath = FCPATH . 'assets/.vite/manifest.json';
        
        if (!file_exists($manifestPath)) {
            throw new RuntimeException("Manifest Vite introuvable : {$manifestPath}. Exécutez 'npm run build'");
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            throw new RuntimeException("Erreur de parsing du manifest Vite : " . json_last_error_msg());
        }
        
        if (!isset($manifest[$entry])) {
            throw new RuntimeException("Entrée '{$entry}' introuvable dans le manifest Vite. Entrées disponibles : " . implode(', ', array_keys($manifest)));
        }

        return base_url('assets/' . $manifest[$entry]['file']);
    }
}

if (!function_exists('vite_css_assets')) {
    /**
     * Récupère tous les fichiers CSS associés à une entrée
     * 
     * @param string $entry Point d'entrée
     * @param bool|null $isDev Mode développement
     * @return array Liste des URLs CSS
     */
    function vite_css_assets(string $entry, ?bool $isDev = null): array
    {
        // Auto-détection du mode développement
        if ($isDev === null) {
            $isDev = ENVIRONMENT === 'development' && is_vite_dev_server_running();
        }

        // En mode développement, le CSS est injecté par Vite
        if ($isDev) {
            return [];
        }

        $manifestPath = FCPATH . 'assets/.vite/manifest.json';
        
        if (!file_exists($manifestPath)) {
            return [];
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);
        $cssFiles = [];

        // CSS associés à l'entrée principale
        if (isset($manifest[$entry]['css'])) {
            foreach ($manifest[$entry]['css'] as $cssFile) {
                $cssFiles[] = base_url('assets/' . $cssFile);
            }
        }

        // Rechercher les entrées CSS séparées
        foreach ($manifest as $key => $asset) {
            if (str_ends_with($key, '.css') || (isset($asset['src']) && str_ends_with($asset['src'], '.css'))) {
                $cssFiles[] = base_url('assets/' . $asset['file']);
            }
        }

        return array_unique($cssFiles);
    }
}

if (!function_exists('vite_css')) {
    /**
     * Génère les balises <link> pour les assets CSS Vite
     * 
     * @param string $entry Point d'entrée CSS
     * @param bool|null $isDev Mode développement
     * @return string Balises HTML <link>
     */
    function vite_css(string $entry, ?bool $isDev = null): string
    {
        $cssAssets = vite_css_assets($entry, $isDev);
        
        if (empty($cssAssets)) {
            return '';
        }

        $links = '';
        foreach ($cssAssets as $cssUrl) {
            $links .= '<link rel="stylesheet" href="' . $cssUrl . '">' . PHP_EOL;
        }

        return $links;
    }
}

if (!function_exists('vite_js')) {
    /**
     * Génère les balises <script> pour les assets JS Vite
     * 
     * @param string $entry Point d'entrée JS
     * @param bool|null $isDev Mode développement
     * @param array $attributes Attributs supplémentaires pour la balise script
     * @return string Balises HTML <script>
     */
    function vite_js(string $entry, ?bool $isDev = null, array $attributes = []): string
    {
        // Auto-détection du mode développement
        if ($isDev === null) {
            $isDev = ENVIRONMENT === 'development' && is_vite_dev_server_running();
        }

        // Préparer les attributs
        $attrs = '';
        foreach ($attributes as $key => $value) {
            $attrs .= ' ' . $key . '="' . htmlspecialchars($value) . '"';
        }

        // En mode développement
        if ($isDev) {
            $html = '';
            
            // Client Vite pour HMR
            $html .= '<script type="module" src="http://localhost:5173/@vite/client"></script>' . PHP_EOL;
            
            // Script principal
            $html .= '<script type="module" src="http://localhost:5173/' . $entry . '"' . $attrs . '></script>' . PHP_EOL;
            
            return $html;
        }

        // En production
        try {
            $assetUrl = vite_asset($entry, false);
            return '<script type="module" src="' . $assetUrl . '"' . $attrs . '></script>' . PHP_EOL;
        } catch (RuntimeException $e) {
            // En cas d'erreur, afficher un commentaire de debug
            return "<!-- Erreur Vite: {$e->getMessage()} -->" . PHP_EOL;
        }
    }
}

if (!function_exists('vite_assets')) {
    /**
     * Charge automatiquement tous les assets Vite (CSS + JS) pour une entrée donnée
     * 
     * @param string $jsEntry Point d'entrée JavaScript principal (qui importe le CSS)
     * @param array $jsAttributes Attributs pour les balises script
     * @return string HTML complet (CSS + JS)
     */
    function vite_assets(string $jsEntry, array $jsAttributes = []): string
    {
        $isDev = ENVIRONMENT === 'development' && is_vite_dev_server_running();
        
        $html = '';
        
        // CSS Assets (extraits automatiquement du JS par Vite)
        $html .= vite_css($jsEntry, $isDev);
        
        // JavaScript Assets
        $html .= vite_js($jsEntry, $isDev, $jsAttributes);
        
        return $html;
    }
}

if (!function_exists('is_vite_dev_server_running')) {
    /**
     * Vérifie si le serveur de développement Vite est en cours d'exécution
     * 
     * @param string $host Host du serveur Vite
     * @param int $port Port du serveur Vite
     * @return bool True si le serveur Vite est accessible
     */
    function is_vite_dev_server_running(string $host = 'localhost', int $port = 5173): bool
    {
        static $cache = null;
        
        // Cache le résultat pour éviter les appels multiples
        if ($cache !== null) {
            return $cache;
        }

        $context = stream_context_create([
            'http' => [
                'timeout' => 1,
                'ignore_errors' => true,
                'method' => 'HEAD'
            ]
        ]);
        
        $url = "http://{$host}:{$port}/@vite/client";
        $cache = @file_get_contents($url, false, $context) !== false;
        
        return $cache;
    }
}

if (!function_exists('vite_manifest_info')) {
    /**
     * Retourne les informations du manifest Vite pour debug
     * 
     * @return array|null Contenu du manifest ou null si non trouvé
     */
    function vite_manifest_info(): ?array
    {
        $manifestPath = FCPATH . 'assets/.vite/manifest.json';
        
        if (!file_exists($manifestPath)) {
            return null;
        }

        $manifest = json_decode(file_get_contents($manifestPath), true);
        
        if (json_last_error() !== JSON_ERROR_NONE) {
            return null;
        }

        return $manifest;
    }
}

if (!function_exists('vite_preload_assets')) {
    /**
     * Génère les balises de preload pour les assets critiques
     * 
     * @param array $entries Entrées à preloader
     * @return string Balises de preload
     */
    function vite_preload_assets(array $entries): string
    {
        $isDev = ENVIRONMENT === 'development' && is_vite_dev_server_running();
        
        // Pas de preload en développement
        if ($isDev) {
            return '';
        }

        $html = '';
        $manifest = vite_manifest_info();
        
        if (!$manifest) {
            return '';
        }

        foreach ($entries as $entry) {
            if (isset($manifest[$entry])) {
                $asset = $manifest[$entry];
                $url = base_url('assets/' . $asset['file']);
                
                // Preload JS
                if (str_ends_with($asset['file'], '.js')) {
                    $html .= '<link rel="modulepreload" href="' . $url . '">' . PHP_EOL;
                }
                
                // Preload CSS
                if (isset($asset['css'])) {
                    foreach ($asset['css'] as $cssFile) {
                        $cssUrl = base_url('assets/' . $cssFile);
                        $html .= '<link rel="preload" href="' . $cssUrl . '" as="style">' . PHP_EOL;
                    }
                }
            }
        }

        return $html;
    }
}
