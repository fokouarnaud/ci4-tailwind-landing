<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="min-h-screen">
    <!-- Hero Section pour tester les styles -->
    <section class="section bg-gradient-to-br from-primary-50 to-secondary-100 dark:from-secondary-900 dark:to-black">
        <div class="container-custom">
            <div class="text-center max-w-4xl mx-auto">
                <h1 class="text-4xl lg:text-6xl font-bold text-secondary-900 dark:text-white mb-6 animate-fade-in">
                    🚀 CI4 Tailwind Template
                </h1>
                <p class="text-xl text-secondary-600 dark:text-secondary-300 mb-8 animate-slide-up">
                    Test de la configuration Vite + Tailwind CSS + Alpine.js
                </p>
                
                <!-- Test des boutons -->
                <div class="flex flex-wrap justify-center gap-4 mb-12">
                    <button class="btn btn-primary animate-bounce-gentle">
                        Primary Button
                    </button>
                    <button class="btn btn-secondary">
                        Secondary Button
                    </button>
                    <button class="btn btn-outline">
                        Outline Button
                    </button>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Test Section -->
    <section class="section">
        <div class="container-custom">
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
                <!-- Tests Tailwind CSS -->
                <div class="card card-hover p-8">
                    <h2 class="text-2xl font-bold text-secondary-900 dark:text-white mb-6">
                        ✅ Tests Tailwind CSS
                    </h2>
                    
                    <!-- Test couleurs personnalisées -->
                    <div class="space-y-4 mb-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-8 h-8 bg-primary-500 rounded"></div>
                            <span class="text-sm">Primary Colors</span>
                        </div>
                        <div class="flex items-center space-x-4">
                            <div class="w-8 h-8 bg-secondary-500 rounded"></div>
                            <span class="text-sm">Secondary Colors</span>
                        </div>
                    </div>
                    
                    <!-- Test responsive -->
                    <div class="grid grid-cols-2 md:grid-cols-3 gap-4 mb-6">
                        <div class="bg-primary-100 dark:bg-primary-900 p-4 rounded-lg text-center">
                            <span class="text-xs">Responsive</span>
                        </div>
                        <div class="bg-secondary-100 dark:bg-secondary-800 p-4 rounded-lg text-center">
                            <span class="text-xs">Grid</span>
                        </div>
                        <div class="bg-primary-200 dark:bg-primary-800 p-4 rounded-lg text-center">
                            <span class="text-xs">System</span>
                        </div>
                    </div>
                    
                    <!-- Test formulaire -->
                    <div class="space-y-4">
                        <input type="text" placeholder="Test input field" class="input">
                        <div class="flex space-x-2">
                            <button class="btn btn-sm btn-primary">Small</button>
                            <button class="btn btn-primary">Normal</button>
                            <button class="btn btn-lg btn-primary">Large</button>
                        </div>
                    </div>
                </div>
                
                <!-- Tests Alpine.js -->
                <div class="card card-hover p-8">
                    <h2 class="text-2xl font-bold text-secondary-900 dark:text-white mb-6">
                        ⚡ Tests Alpine.js
                    </h2>
                    
                    <!-- Test compteur -->
                    <div x-data="{ count: 0 }" class="mb-6">
                        <p class="text-lg mb-4">Compteur: <span x-text="count" class="font-bold text-primary-600"></span></p>
                        <div class="flex space-x-2">
                            <button @click="count++" class="btn btn-sm btn-primary">+</button>
                            <button @click="count--" class="btn btn-sm btn-secondary">-</button>
                            <button @click="count = 0" class="btn btn-sm btn-outline">Reset</button>
                        </div>
                    </div>
                    
                    <!-- Test show/hide -->
                    <div x-data="{ show: false }" class="mb-6">
                        <button @click="show = !show" class="btn btn-secondary mb-4">
                            Toggle Panel
                        </button>
                        <div x-show="show" 
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0 transform scale-90"
                             x-transition:enter-end="opacity-100 transform scale-100"
                             x-transition:leave="transition ease-in duration-300"
                             x-transition:leave-start="opacity-100 transform scale-100"
                             x-transition:leave-end="opacity-0 transform scale-90"
                             class="p-4 bg-primary-50 dark:bg-primary-900 rounded-lg">
                            <p class="text-primary-700 dark:text-primary-300">
                                🎉 Alpine.js fonctionne parfaitement !
                            </p>
                        </div>
                    </div>
                    
                    <!-- Test des composants Alpine.js -->
                    <div class="mb-6">
                        <h4 class="font-semibold mb-3">Test Composants Alpine.js:</h4>
                        <div class="space-y-3">
                            <!-- Test DarkMode -->
                            <div x-data="darkMode()" class="p-3 border rounded">
                                <p class="text-sm mb-2">Composant darkMode:</p>
                                <button @click="toggle()" class="btn btn-sm btn-secondary">
                                    Mode: <span x-text="isDark ? 'Sombre' : 'Clair'"></span>
                                </button>
                            </div>
                            
                            <!-- Test Navbar simulation -->
                            <div x-data="navbar()" class="p-3 border rounded">
                                <p class="text-sm mb-2">Composant navbar:</p>
                                <button @click="toggle()" class="btn btn-sm btn-secondary mr-2">
                                    Menu: <span x-text="isOpen ? 'Ouvert' : 'Fermé'"></span>
                                </button>
                                <span class="text-xs text-gray-500">Scroll: <span x-text="isScrolled ? 'Oui' : 'Non'"></span></span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Test des modals -->
                    <div x-data="{ modalOpen: false }">
                            Ouvrir Modal
                        </button>
                        
                        <!-- Modal -->
                        <div x-show="modalOpen" 
                             @click.away="modalOpen = false"
                             x-transition:enter="transition ease-out duration-300"
                             x-transition:enter-start="opacity-0"
                             x-transition:enter-end="opacity-100"
                             x-transition:leave="transition ease-in duration-200"
                             x-transition:leave-start="opacity-100"
                             x-transition:leave-end="opacity-0"
                             class="fixed inset-0 z-50 flex items-center justify-center bg-black bg-opacity-50">
                            <div @click.stop 
                                 x-transition:enter="transition ease-out duration-300"
                                 x-transition:enter-start="opacity-0 transform scale-90"
                                 x-transition:enter-end="opacity-100 transform scale-100"
                                 x-transition:leave="transition ease-in duration-200"
                                 x-transition:leave-start="opacity-100 transform scale-100"
                                 x-transition:leave-end="opacity-0 transform scale-90"
                                 class="bg-white dark:bg-secondary-800 rounded-xl p-6 max-w-md mx-4">
                                <h3 class="text-lg font-bold mb-4">Modal Test</h3>
                                <p class="text-secondary-600 dark:text-secondary-300 mb-6">
                                    Ceci est un modal test utilisant Alpine.js avec des transitions fluides.
                                </p>
                                <div class="flex justify-end space-x-2">
                                    <button @click="modalOpen = false" class="btn btn-secondary btn-sm">
                                        Fermer
                                    </button>
                                    <button @click="modalOpen = false" class="btn btn-primary btn-sm">
                                        OK
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Test Status Section -->
    <section class="section-sm bg-secondary-50 dark:bg-secondary-900">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <h2 class="text-3xl font-bold text-center text-secondary-900 dark:text-white mb-8">
                    📋 Status de Configuration
                </h2>
                
                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Vite Status -->
                    <div class="card p-6 text-center">
                        <div class="w-12 h-12 bg-green-100 dark:bg-green-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-green-600 dark:text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Vite Build</h3>
                        <p class="text-sm text-secondary-600 dark:text-secondary-300">
                            Build system configuré et fonctionnel
                        </p>
                    </div>
                    
                    <!-- Tailwind Status -->
                    <div class="card p-6 text-center">
                        <div class="w-12 h-12 bg-blue-100 dark:bg-blue-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-blue-600 dark:text-blue-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21a4 4 0 01-4-4V5a2 2 0 012-2h4a2 2 0 012 2v12a4 4 0 01-4 4zM21 5a2 2 0 00-2-2h-4a2 2 0 00-2 2v12a4 4 0 004 4h4a2 2 0 002-2V5z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Tailwind CSS</h3>
                        <p class="text-sm text-secondary-600 dark:text-secondary-300">
                            Styles et composants personnalisés
                        </p>
                    </div>
                    
                    <!-- Alpine Status -->
                    <div class="card p-6 text-center">
                        <div class="w-12 h-12 bg-purple-100 dark:bg-purple-900 rounded-full flex items-center justify-center mx-auto mb-4">
                            <svg class="w-6 h-6 text-purple-600 dark:text-purple-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                            </svg>
                        </div>
                        <h3 class="text-lg font-semibold mb-2">Alpine.js</h3>
                        <p class="text-sm text-secondary-600 dark:text-secondary-300">
                            Interactivité et composants JS
                        </p>
                    </div>
                </div>
                
                <!-- Console Output -->
                <div class="mt-8 card p-6">
                    <h3 class="text-lg font-semibold mb-4">Console Output (F12)</h3>
                    <div class="bg-secondary-900 dark:bg-black rounded-lg p-4 font-mono text-sm text-green-400">
                        <div>🚀 CI4 Tailwind Template v2.0 loaded!</div>
                        <div>✅ Tailwind CSS active</div>
                        <div>✅ Alpine.js initialized</div>
                        <div>✅ Dark mode component ready</div>
                        <div>✅ Navbar component ready</div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<?= $this->endSection() ?>
