<?php

/**
 * Helper Vite FINAL - Force chemins corrects sans baseURL
 */

if (!function_exists('vite_assets')) {
    function vite_assets(string $jsEntry, array $jsAttributes = []): string
    {
        $html = '';
        
        // Forcer les chemins relatifs pour éviter les problèmes CORS
        $assetsDir = FCPATH . 'assets/';
        
        // 1. CSS files
        $cssFiles = glob($assetsDir . '*.css') ?: [];
        foreach ($cssFiles as $cssFile) {
            $filename = basename($cssFile);
            // Utiliser chemin relatif au lieu de base_url()
            $html .= '<link rel="stylesheet" href="/assets/' . $filename . '">' . PHP_EOL;
        }
        
        // CSS dans sous-dossiers
        $cssSubFiles = glob($assetsDir . 'css/*.css') ?: [];
        foreach ($cssSubFiles as $cssFile) {
            $filename = basename($cssFile);
            $html .= '<link rel="stylesheet" href="/assets/css/' . $filename . '">' . PHP_EOL;
        }
        
        // 2. JS files
        $jsFiles = glob($assetsDir . '*.js') ?: [];
        foreach ($jsFiles as $jsFile) {
            $filename = basename($jsFile);
            // Utiliser chemin relatif au lieu de base_url()
            $html .= '<script type="module" src="/assets/' . $filename . '"></script>' . PHP_EOL;
        }
        
        // JS dans sous-dossiers
        $jsSubFiles = glob($assetsDir . 'js/*.js') ?: [];
        foreach ($jsSubFiles as $jsFile) {
            $filename = basename($jsFile);
            $html .= '<script type="module" src="/assets/js/' . $filename . '"></script>' . PHP_EOL;
        }
        
        return $html;
    }
}

if (!function_exists('load_alpine_inline')) {
    function load_alpine_inline(): string
    {
        return '<script>
// Alpine.js Functions - Définies AVANT le chargement d\'Alpine
window.darkMode = function() {
    return {
        isDark: localStorage.getItem("theme") === "dark" || 
               (!localStorage.getItem("theme") && window.matchMedia("(prefers-color-scheme: dark)").matches),
        toggle() {
            this.isDark = !this.isDark;
            localStorage.setItem("theme", this.isDark ? "dark" : "light");
            document.documentElement.classList.toggle("dark", this.isDark);
            console.log("🌙 Dark mode:", this.isDark);
        },
        init() {
            document.documentElement.classList.toggle("dark", this.isDark);
        }
    }
};

window.navbar = function() {
    return {
        isOpen: false,
        toggle() {
            this.isOpen = !this.isOpen;
            console.log("📱 Navbar:", this.isOpen);
        },
        close() {
            this.isOpen = false;
        }
    }
};

console.log("✅ Alpine.js functions ready");
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>' . PHP_EOL;
    }
}

if (!function_exists('debug_current_urls')) {
    function debug_current_urls(): string
    {
        return '<script>
console.log("🔍 URL Debug:");
console.log("- Current URL:", window.location.href);
console.log("- Origin:", window.location.origin);
console.log("- Host:", window.location.host);
console.log("- Protocol:", window.location.protocol);
</script>' . PHP_EOL;
    }
}
