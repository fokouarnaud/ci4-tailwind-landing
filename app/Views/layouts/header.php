<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?? 'CI4 Tailwind Template - Modern Web Development' ?>">
    <meta name="keywords" content="<?= $keywords ?? 'web development, CodeIgniter, Tailwind CSS, Alpine.js' ?>">
    <meta name="author" content="CI4 Template">
    
    <!-- SEO Meta Tags -->
    <meta property="og:title" content="<?= $title ?? 'CI4 Tailwind Template' ?>">
    <meta property="og:description" content="<?= $description ?? 'Modern CodeIgniter 4 template with Tailwind CSS' ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= current_url() ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    
    <title><?= $title ?? 'CI4 Tailwind Template' ?></title>
    
    <!-- CSS & JS via Vite optimisé -->
    <?= vite_assets('resources/js/app.js') ?>
    
    <!-- Alpine.js Fallback si assets principaux échouent -->
    <?= load_alpine_fallback() ?>
    
    <!-- Theme detection script (inline to prevent FOUC) -->
    <script>
        // Dark mode detection immédiate
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
        
        // Debug Alpine.js après chargement
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                console.log('🔍 Alpine.js Debug Check:');
                console.log('- window.darkMode:', typeof window.darkMode);
                console.log('- window.navbar:', typeof window.navbar);
                console.log('- window.Alpine:', typeof window.Alpine);
                
                // Vérifier si les fonctions sont disponibles
                if (typeof window.darkMode === 'function') {
                    try {
                        const testDark = window.darkMode();
                        console.log('✅ darkMode() callable, isDark:', testDark?.isDark);
                    } catch(e) {
                        console.error('❌ darkMode() error:', e.message);
                    }
                } else {
                    console.warn('⚠️ window.darkMode not available - using fallback');
                }
                
                if (typeof window.navbar === 'function') {
                    try {
                        const testNav = window.navbar();
                        console.log('✅ navbar() callable, isOpen:', testNav?.isOpen);
                    } catch(e) {
                        console.error('❌ navbar() error:', e.message);
                    }
                } else {
                    console.warn('⚠️ window.navbar not available - using fallback');
                }
            }, 1000);
        });
    </script>
</head>
<body class="min-h-screen bg-white dark:bg-gray-900 transition-colors duration-300">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-blue-600 text-white px-4 py-2 rounded-lg z-50">
        Skip to main content
    </a>
    
    <!-- Navigation -->
    <nav x-data="navbar()" 
         class="fixed top-0 left-0 right-0 z-40 bg-white dark:bg-gray-900 shadow-sm border-b border-gray-200 dark:border-gray-700">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between items-center h-16">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?= site_url() ?>" class="flex items-center space-x-2 group">
                        <div class="w-8 h-8 bg-blue-600 rounded-lg flex items-center justify-center transition-transform group-hover:scale-105">
                            <span class="text-white font-bold text-lg">CI</span>
                        </div>
                        <span class="text-xl font-bold text-gray-900 dark:text-white">
                            CI4 Template
                        </span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="<?= site_url() ?>" 
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 text-sm font-medium transition-colors">
                        Home
                    </a>
                    <a href="<?= site_url('test') ?>" 
                       class="text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 px-3 py-2 text-sm font-medium transition-colors">
                        Test
                    </a>
                </div>
                
                <!-- Desktop Actions -->
                <div class="hidden md:flex items-center space-x-4">
                    <!-- Dark Mode Toggle -->
                    <div x-data="darkMode()">
                        <button @click="toggle()" 
                                class="p-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                                :aria-label="isDark ? 'Switch to light mode' : 'Switch to dark mode'">
                            <svg x-show="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </button>
                    </div>
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center space-x-2">
                    <!-- Mobile Dark Mode Toggle -->
                    <div x-data="darkMode()">
                        <button @click="toggle()" 
                                class="p-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors">
                            <svg x-show="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- Hamburger Menu -->
                    <button @click="toggle()" 
                            class="p-2 rounded-lg text-gray-600 dark:text-gray-400 hover:bg-gray-100 dark:hover:bg-gray-800 transition-colors"
                            :aria-expanded="isOpen"
                            aria-label="Toggle navigation menu">
                        <svg x-show="!isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                        </svg>
                        <svg x-show="isOpen" class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        
        <!-- Mobile Menu -->
        <div x-show="isOpen" 
             x-transition:enter="transition ease-out duration-200"
             x-transition:enter-start="opacity-0 -translate-y-4"
             x-transition:enter-end="opacity-100 translate-y-0"
             x-transition:leave="transition ease-in duration-150"
             x-transition:leave-start="opacity-100 translate-y-0"
             x-transition:leave-end="opacity-0 -translate-y-4"
             class="md:hidden bg-white dark:bg-gray-900 border-t border-gray-200 dark:border-gray-700">
            <div class="px-4 py-3 space-y-3">
                <a href="<?= site_url() ?>" 
                   @click="close()" 
                   class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 text-sm font-medium transition-colors">
                    Home
                </a>
                <a href="<?= site_url('test') ?>" 
                   @click="close()" 
                   class="block px-3 py-2 text-gray-700 dark:text-gray-300 hover:text-blue-600 dark:hover:text-blue-400 text-sm font-medium transition-colors">
                    Test
                </a>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main id="main-content" class="pt-16">
