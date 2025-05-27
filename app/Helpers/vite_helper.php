<?php

/**
 * Helper Vite pour CodeIgniter 4 - Version Production Fixed
 * Corrige les problèmes CORS et chemins assets
 */

if (!function_exists('vite_assets')) {
    /**
     * Charge automatiquement tous les assets Vite (CSS + JS) pour une entrée donnée
     * Version simplifiée pour production
     */
    function vite_assets(string $jsEntry, array $jsAttributes = []): string
    {
        $isDev = ENVIRONMENT === 'development' && is_vite_dev_server_running();
        
        if ($isDev) {
            // Mode développement - Serveur Vite
            $html = '<script type="module" src="http://localhost:5173/@vite/client"></script>' . PHP_EOL;
            $html .= '<script type="module" src="http://localhost:5173/' . $jsEntry . '"></script>' . PHP_EOL;
            return $html;
        }
        
        // Mode production - Assets buildés
        $html = '';
        
        // Chercher les assets dans public/assets/
        $assetsPath = FCPATH . 'assets/';
        $manifestPath = $assetsPath . '.vite/manifest.json';
        
        // Si pas de manifest, utiliser les noms de fichiers directs
        if (!file_exists($manifestPath)) {
            // Fallback: chercher les fichiers CSS et JS directement
            $cssFiles = glob($assetsPath . '*.css');
            $jsFiles = glob($assetsPath . '*.js');
            
            // CSS
            foreach ($cssFiles as $cssFile) {
                $filename = basename($cssFile);
                $html .= '<link rel="stylesheet" href="' . base_url('assets/' . $filename) . '">' . PHP_EOL;
            }
            
            // JS
            foreach ($jsFiles as $jsFile) {
                $filename = basename($jsFile);
                $html .= '<script type="module" src="' . base_url('assets/' . $filename) . '"></script>' . PHP_EOL;
            }
            
            return $html;
        }
        
        // Utiliser le manifest
        $manifest = json_decode(file_get_contents($manifestPath), true);
        
        if (isset($manifest[$jsEntry])) {
            $entry = $manifest[$jsEntry];
            
            // CSS
            if (isset($entry['css'])) {
                foreach ($entry['css'] as $cssFile) {
                    $html .= '<link rel="stylesheet" href="' . base_url('assets/' . $cssFile) . '">' . PHP_EOL;
                }
            }
            
            // JS
            $html .= '<script type="module" src="' . base_url('assets/' . $entry['file']) . '"></script>' . PHP_EOL;
        }
        
        return $html;
    }
}

if (!function_exists('is_vite_dev_server_running')) {
    /**
     * Vérifie si le serveur de développement Vite est accessible
     */
    function is_vite_dev_server_running(string $host = 'localhost', int $port = 5173): bool
    {
        static $cache = null;
        
        if ($cache !== null) {
            return $cache;
        }

        $context = stream_context_create([
            'http' => [
                'timeout' => 1,
                'ignore_errors' => true,
            ]
        ]);
        
        $url = "http://{$host}:{$port}";
        $cache = @file_get_contents($url, false, $context) !== false;
        
        return $cache;
    }
}

if (!function_exists('load_alpine_fallback')) {
    /**
     * Charge Alpine.js en fallback si les assets principaux échouent
     */
    function load_alpine_fallback(): string
    {
        $html = '<!-- Alpine.js Fallback -->' . PHP_EOL;
        $html .= '<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>' . PHP_EOL;
        $html .= '<script>' . PHP_EOL;
        $html .= 'window.darkMode = function() {' . PHP_EOL;
        $html .= '    return {' . PHP_EOL;
        $html .= '        isDark: localStorage.getItem("theme") === "dark",' . PHP_EOL;
        $html .= '        toggle() {' . PHP_EOL;
        $html .= '            this.isDark = !this.isDark;' . PHP_EOL;
        $html .= '            localStorage.setItem("theme", this.isDark ? "dark" : "light");' . PHP_EOL;
        $html .= '            document.documentElement.classList.toggle("dark", this.isDark);' . PHP_EOL;
        $html .= '        },' . PHP_EOL;
        $html .= '        init() {' . PHP_EOL;
        $html .= '            document.documentElement.classList.toggle("dark", this.isDark);' . PHP_EOL;
        $html .= '        }' . PHP_EOL;
        $html .= '    }' . PHP_EOL;
        $html .= '};' . PHP_EOL;
        $html .= 'window.navbar = function() {' . PHP_EOL;
        $html .= '    return {' . PHP_EOL;
        $html .= '        isOpen: false,' . PHP_EOL;
        $html .= '        toggle() { this.isOpen = !this.isOpen; }' . PHP_EOL;
        $html .= '    }' . PHP_EOL;
        $html .= '};' . PHP_EOL;
        $html .= '</script>' . PHP_EOL;
        
        return $html;
    }
}
