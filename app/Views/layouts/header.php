<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?= $description ?? 'IT-Innov - Professional Web & Mobile Development Solutions' ?>">
    <meta name="keywords" content="<?= $keywords ?? 'web development, mobile apps, CodeIgniter, Tailwind CSS' ?>">
    <meta name="author" content="IT-Innov">
    
    <!-- SEO Meta Tags -->
    <meta property="og:title" content="<?= $title ?? 'IT-Innov - Web & Mobile Solutions' ?>">
    <meta property="og:description" content="<?= $description ?? 'Professional web and mobile development solutions' ?>">
    <meta property="og:type" content="website">
    <meta property="og:url" content="<?= current_url() ?>">
    <meta property="og:image" content="<?= base_url('images/og-image.jpg') ?>">
    
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="<?= $title ?? 'IT-Innov - Web & Mobile Solutions' ?>">
    <meta name="twitter:description" content="<?= $description ?? 'Professional web and mobile development solutions' ?>">
    
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('favicon.ico') ?>">
    
    <title><?= $title ?? 'IT-Innov - Web & Mobile Solutions' ?></title>
    
    <!-- Preload des assets critiques -->
    <?= vite_preload_assets(['resources/js/app.js']) ?>
    
    <!-- CSS & JS via Vite optimisé -->
    <?= vite_assets('resources/js/app.js') ?>
    
    <!-- Theme detection script (inline to prevent FOUC) -->
    <script>
        // Dark mode detection
        if (localStorage.getItem('theme') === 'dark' || (!localStorage.getItem('theme') && window.matchMedia('(prefers-color-scheme: dark)').matches)) {
            document.documentElement.classList.add('dark');
        }
        
        // Debug Alpine.js components when ready
        document.addEventListener('DOMContentLoaded', function() {
            setTimeout(() => {
                console.log('🔍 Alpine.js Debug Check:');
                console.log('- window.darkMode:', typeof window.darkMode);
                console.log('- window.navbar:', typeof window.navbar);
                console.log('- window.Alpine:', typeof window.Alpine);
                
                // Test if functions are callable
                try {
                    const testDark = window.darkMode();
                    console.log('- darkMode() callable:', !!testDark, 'isDark:', testDark?.isDark);
                } catch(e) {
                    console.error('- darkMode() error:', e.message);
                }
                
                try {
                    const testNav = window.navbar();
                    console.log('- navbar() callable:', !!testNav, 'isOpen:', testNav?.isOpen);
                } catch(e) {
                    console.error('- navbar() error:', e.message);
                }
            }, 1000);
        });
    </script>
</head>
<body class="min-h-screen bg-white dark:bg-secondary-900 transition-colors duration-300">
    <!-- Skip to main content for accessibility -->
    <a href="#main-content" class="sr-only focus:not-sr-only focus:absolute focus:top-4 focus:left-4 bg-primary-600 text-white px-4 py-2 rounded-lg z-50">
        Skip to main content
    </a>
    
    <!-- Navigation -->
    <nav x-data="navbar()" 
         class="fixed top-0 left-0 right-0 z-40 transition-all duration-300"
         :class="{
             'glass shadow-lg': isScrolled,
             'bg-transparent': !isScrolled
         }">
        <div class="container-custom">
            <div class="flex justify-between items-center h-16 lg:h-20">
                <!-- Logo -->
                <div class="flex items-center">
                    <a href="<?= site_url() ?>" class="flex items-center space-x-2 group">
                        <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center transition-transform group-hover:scale-105">
                            <span class="text-white font-bold text-lg">IT</span>
                        </div>
                        <span class="text-xl font-display font-bold text-secondary-900 dark:text-white">
                            IT-Innov
                        </span>
                    </a>
                </div>
                
                <!-- Desktop Navigation -->
                <div class="hidden lg:flex items-center space-x-8">
                    <a href="<?= site_url('about') ?>" 
                       class="nav-link <?= uri_string() === 'about' ? 'active' : '' ?>">
                        <?= lang('Main.about') ?>
                    </a>
                    <a href="<?= site_url('services') ?>" 
                       class="nav-link <?= uri_string() === 'services' ? 'active' : '' ?>">
                        <?= lang('Main.services') ?>
                    </a>
                    <a href="<?= site_url('portfolio') ?>" 
                       class="nav-link <?= uri_string() === 'portfolio' ? 'active' : '' ?>">
                        <?= lang('Main.projects') ?>
                    </a>
                    <a href="<?= site_url('contact') ?>" 
                       class="nav-link <?= uri_string() === 'contact' ? 'active' : '' ?>">
                        <?= lang('Main.contact') ?>
                    </a>
                </div>
                
                <!-- Desktop Actions -->
                <div class="hidden lg:flex items-center space-x-4">
                    <!-- Language Switcher -->
                    <div class="flex items-center space-x-2 text-sm">
                        <a href="<?= site_url('language/fr') ?>" 
                           class="px-2 py-1 rounded transition-colors <?= service('request')->getLocale() === 'fr' ? 'bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300 font-semibold' : 'text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100' ?>">
                            FR
                        </a>
                        <span class="text-secondary-300 dark:text-secondary-600">|</span>
                        <a href="<?= site_url('language/en') ?>" 
                           class="px-2 py-1 rounded transition-colors <?= service('request')->getLocale() === 'en' ? 'bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300 font-semibold' : 'text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100' ?>">
                            EN
                        </a>
                    </div>
                    
                    <!-- Dark Mode Toggle -->
                    <div x-data="darkMode()">
                        <button @click="toggle()" 
                                class="p-2 rounded-lg text-secondary-600 dark:text-secondary-400 hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors"
                                :aria-label="isDark ? 'Switch to light mode' : 'Switch to dark mode'">
                            <svg x-show="!isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z" />
                            </svg>
                            <svg x-show="isDark" class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z" />
                            </svg>
                        </button>
                    </div>
                    
                    <!-- CTA Button -->
                    <a href="<?= site_url('contact') ?>" class="btn-primary btn-sm">
                        Get Started
                    </a>
                </div>
                
                <!-- Mobile Menu Button -->
                <div class="lg:hidden flex items-center space-x-2">
                    <!-- Mobile Dark Mode Toggle -->
                    <div x-data="darkMode()">
                        <button @click="toggle()" 
                                class="p-2 rounded-lg text-secondary-600 dark:text-secondary-400 hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors">
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
                            class="p-2 rounded-lg text-secondary-600 dark:text-secondary-400 hover:bg-secondary-100 dark:hover:bg-secondary-800 transition-colors"
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
             class="lg:hidden glass border-t border-white/20 dark:border-secondary-700/50">
            <div class="container-custom py-4">
                <div class="space-y-3">
                    <a href="<?= site_url('about') ?>" 
                       @click="close()" 
                       class="block nav-link-mobile <?= uri_string() === 'about' ? 'active' : '' ?>">
                        <?= lang('Main.about') ?>
                    </a>
                    <a href="<?= site_url('services') ?>" 
                       @click="close()" 
                       class="block nav-link-mobile <?= uri_string() === 'services' ? 'active' : '' ?>">
                        <?= lang('Main.services') ?>
                    </a>
                    <a href="<?= site_url('portfolio') ?>" 
                       @click="close()" 
                       class="block nav-link-mobile <?= uri_string() === 'portfolio' ? 'active' : '' ?>">
                        <?= lang('Main.projects') ?>
                    </a>
                    <a href="<?= site_url('contact') ?>" 
                       @click="close()" 
                       class="block nav-link-mobile <?= uri_string() === 'contact' ? 'active' : '' ?>">
                        <?= lang('Main.contact') ?>
                    </a>
                    
                    <!-- Mobile Language Switcher -->
                    <div class="flex items-center space-x-4 pt-4 border-t border-secondary-200 dark:border-secondary-700">
                        <span class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Language:</span>
                        <div class="flex items-center space-x-2">
                            <a href="<?= site_url('language/fr') ?>" 
                               class="px-3 py-1 rounded-md text-sm transition-colors <?= service('request')->getLocale() === 'fr' ? 'bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300 font-semibold' : 'text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100' ?>">
                                Français
                            </a>
                            <a href="<?= site_url('language/en') ?>" 
                               class="px-3 py-1 rounded-md text-sm transition-colors <?= service('request')->getLocale() === 'en' ? 'bg-primary-100 text-primary-700 dark:bg-primary-900 dark:text-primary-300 font-semibold' : 'text-secondary-600 dark:text-secondary-400 hover:text-secondary-900 dark:hover:text-secondary-100' ?>">
                                English
                            </a>
                        </div>
                    </div>
                    
                    <!-- Mobile CTA -->
                    <div class="pt-4">
                        <a href="<?= site_url('contact') ?>" 
                           @click="close()" 
                           class="btn-primary w-full justify-center">
                            Get Started
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </nav>
    
    <!-- Main Content -->
    <main id="main-content" class="pt-16 lg:pt-20">
