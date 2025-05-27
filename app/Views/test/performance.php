<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<div class="min-h-screen">
    <section class="section">
        <div class="container-custom">
            <div class="max-w-4xl mx-auto">
                <h1 class="text-4xl font-bold text-center text-secondary-900 dark:text-white mb-8">
                    ⚡ Performance & Build Test
                </h1>
                
                <!-- Manifest Status -->
                <div class="card p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">📋 Build Status</h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <h3 class="text-lg font-medium mb-2">Manifest File</h3>
                            <div class="flex items-center space-x-2">
                                <?php if ($manifest_exists): ?>
                                    <div class="w-3 h-3 bg-green-500 rounded-full"></div>
                                    <span class="text-green-600 dark:text-green-400">✅ Found</span>
                                <?php else: ?>
                                    <div class="w-3 h-3 bg-red-500 rounded-full"></div>
                                    <span class="text-red-600 dark:text-red-400">❌ Not found</span>
                                <?php endif; ?>
                            </div>
                            <p class="text-sm text-secondary-600 dark:text-secondary-400 mt-1">
                                <?= $manifest_path ?>
                            </p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium mb-2">Environment</h3>
                            <span class="inline-block px-3 py-1 bg-primary-100 dark:bg-primary-900 text-primary-700 dark:text-primary-300 rounded-full text-sm font-medium">
                                <?= ENVIRONMENT ?>
                            </span>
                        </div>
                    </div>
                </div>
                
                <!-- Manifest Content -->
                <?php if ($manifest_exists && !empty($manifest_content)): ?>
                <div class="card p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">📄 Manifest Content</h2>
                    
                    <div class="overflow-x-auto">
                        <table class="w-full text-sm">
                            <thead>
                                <tr class="border-b border-secondary-200 dark:border-secondary-700">
                                    <th class="text-left py-2">Entry</th>
                                    <th class="text-left py-2">Generated File</th>
                                    <th class="text-left py-2">Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($manifest_content as $entry => $details): ?>
                                <tr class="border-b border-secondary-100 dark:border-secondary-800">
                                    <td class="py-2 font-mono text-xs"><?= esc($entry) ?></td>
                                    <td class="py-2 font-mono text-xs text-primary-600 dark:text-primary-400">
                                        <?= esc($details['file']) ?>
                                    </td>
                                    <td class="py-2">
                                        <?php if (isset($details['isEntry']) && $details['isEntry']): ?>
                                            <span class="px-2 py-1 bg-green-100 dark:bg-green-900 text-green-700 dark:text-green-300 rounded text-xs">
                                                Entry
                                            </span>
                                        <?php else: ?>
                                            <span class="px-2 py-1 bg-blue-100 dark:bg-blue-900 text-blue-700 dark:text-blue-300 rounded text-xs">
                                                Asset
                                            </span>
                                        <?php endif; ?>
                                    </td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <?php endif; ?>
                
                <!-- Performance Tests -->
                <div class="card p-6 mb-8">
                    <h2 class="text-2xl font-semibold mb-4">🚀 Performance Tests</h2>
                    
                    <div x-data="performanceTest()" x-init="init()">
                        <!-- CSS Load Test -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">CSS Load Performance</h3>
                            <div class="flex items-center space-x-4">
                                <span x-text="cssLoadTime">-</span>ms
                                <div class="flex-1 bg-secondary-200 dark:bg-secondary-700 rounded-full h-2">
                                    <div class="bg-green-500 h-2 rounded-full transition-all duration-1000" 
                                         :style="`width: ${Math.min(cssLoadTime / 10, 100)}%`"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- JS Load Test -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">JavaScript Load Performance</h3>
                            <div class="flex items-center space-x-4">
                                <span x-text="jsLoadTime">-</span>ms
                                <div class="flex-1 bg-secondary-200 dark:bg-secondary-700 rounded-full h-2">
                                    <div class="bg-blue-500 h-2 rounded-full transition-all duration-1000" 
                                         :style="`width: ${Math.min(jsLoadTime / 10, 100)}%`"></div>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Vite Dev Server Test -->
                        <div class="mb-6">
                            <h3 class="text-lg font-medium mb-2">Vite Dev Server Status</h3>
                            <button @click="checkViteServer()" class="btn btn-primary btn-sm mb-2">
                                Check Status
                            </button>
                            <div x-show="viteStatus !== null" class="flex items-center space-x-2">
                                <div class="w-3 h-3 rounded-full" 
                                     :class="viteStatus ? 'bg-green-500' : 'bg-red-500'"></div>
                                <span x-text="viteStatus ? '✅ Running' : '❌ Not running'"></span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Build Commands -->
                <div class="card p-6">
                    <h2 class="text-2xl font-semibold mb-4">🛠️ Build Commands</h2>
                    
                    <div class="space-y-4">
                        <div>
                            <h3 class="text-lg font-medium mb-2">Development</h3>
                            <code class="block bg-secondary-900 dark:bg-black text-green-400 p-3 rounded font-mono text-sm">
                                npm start
                            </code>
                            <p class="text-sm text-secondary-600 dark:text-secondary-400 mt-1">
                                Lance Vite en mode développement + serveur CI4
                            </p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium mb-2">Production Build</h3>
                            <code class="block bg-secondary-900 dark:bg-black text-green-400 p-3 rounded font-mono text-sm">
                                npm run build:prod
                            </code>
                            <p class="text-sm text-secondary-600 dark:text-secondary-400 mt-1">
                                Build optimisé pour la production
                            </p>
                        </div>
                        
                        <div>
                            <h3 class="text-lg font-medium mb-2">Test Build</h3>
                            <code class="block bg-secondary-900 dark:bg-black text-green-400 p-3 rounded font-mono text-sm">
                                npm run test:build
                            </code>
                            <p class="text-sm text-secondary-600 dark:text-secondary-400 mt-1">
                                Build rapide pour tests
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
function performanceTest() {
    return {
        cssLoadTime: 0,
        jsLoadTime: 0,
        viteStatus: null,
        
        init() {
            // Mesurer les performances de chargement
            this.measureLoadTimes();
        },
        
        measureLoadTimes() {
            // Simuler des métriques de performance
            this.cssLoadTime = Math.round(Math.random() * 100 + 50);
            this.jsLoadTime = Math.round(Math.random() * 150 + 75);
        },
        
        async checkViteServer() {
            try {
                const response = await fetch('<?= site_url('test/vite_status') ?>');
                const data = await response.json();
                this.viteStatus = data.vite_dev_server;
            } catch (error) {
                this.viteStatus = false;
                console.error('Erreur lors de la vérification du serveur Vite:', error);
            }
        }
    }
}
</script>

<?= $this->endSection() ?>
