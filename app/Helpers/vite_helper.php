<?php

/**
 * Helper Vite ULTRA-SIMPLE pour Production
 * Évite tous les problèmes CORS en forçant les bons chemins
 */

if (!function_exists('vite_assets')) {
    function vite_assets(string $jsEntry, array $jsAttributes = []): string
    {
        // FORCE: Toujours en mode production, jamais localhost
        $html = '';
        
        // Chemin direct vers les assets
        $assetsDir = FCPATH . 'assets/';
        
        // 1. Chercher tous les CSS
        $cssFiles = glob($assetsDir . '*.css') ?: [];
        foreach ($cssFiles as $cssFile) {
            $filename = basename($cssFile);
            $html .= '<link rel="stylesheet" href="' . base_url('assets/' . $filename) . '">' . PHP_EOL;
        }
        
        // 2. Chercher dans le sous-dossier css/
        $cssSubFiles = glob($assetsDir . 'css/*.css') ?: [];
        foreach ($cssSubFiles as $cssFile) {
            $filename = basename($cssFile);
            $html .= '<link rel="stylesheet" href="' . base_url('assets/css/' . $filename) . '">' . PHP_EOL;
        }
        
        // 3. Chercher tous les JS
        $jsFiles = glob($assetsDir . '*.js') ?: [];
        foreach ($jsFiles as $jsFile) {
            $filename = basename($jsFile);
            $html .= '<script type="module" src="' . base_url('assets/' . $filename) . '"></script>' . PHP_EOL;
        }
        
        // 4. Chercher dans le sous-dossier js/
        $jsSubFiles = glob($assetsDir . 'js/*.js') ?: [];
        foreach ($jsSubFiles as $jsFile) {
            $filename = basename($jsFile);
            $html .= '<script type="module" src="' . base_url('assets/js/' . $filename) . '"></script>' . PHP_EOL;
        }
        
        return $html;
    }
}

if (!function_exists('load_alpine_components')) {
    function load_alpine_components(): string
    {
        return '<script>
// Alpine.js Components - Inline pour éviter CORS
document.addEventListener("DOMContentLoaded", function() {
    // Définir les composants globalement
    window.darkMode = function() {
        return {
            isDark: localStorage.getItem("theme") === "dark" || 
                   (!localStorage.getItem("theme") && window.matchMedia("(prefers-color-scheme: dark)").matches),
            toggle() {
                this.isDark = !this.isDark;
                localStorage.setItem("theme", this.isDark ? "dark" : "light");
                document.documentElement.classList.toggle("dark", this.isDark);
                console.log("✅ Dark mode:", this.isDark);
            },
            init() {
                document.documentElement.classList.toggle("dark", this.isDark);
                console.log("🌙 Dark mode initialized:", this.isDark);
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
                console.log("📱 Navbar closed");
            }
        }
    };
    
    console.log("✅ Alpine.js components loaded");
});
</script>
<script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>' . PHP_EOL;
    }
}
