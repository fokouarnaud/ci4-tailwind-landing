<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Hero Section Portfolio -->
<section class="section bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-secondary-900 dark:via-secondary-900 dark:to-black">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-secondary-900 dark:text-white mb-6 animate-slide-up">
                <?= lang('Main.portfolio_title') ?>
            </h1>
            <p class="text-xl text-secondary-600 dark:text-secondary-300 leading-relaxed animate-fade-in">
                <?= lang('Main.portfolio_intro') ?>
            </p>
        </div>
    </div>
</section>

<!-- Portfolio Grid -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($projects as $project): ?>
            <div class="card card-hover group overflow-hidden">
                <!-- Project Image -->
                <div class="relative h-48 bg-gradient-to-br from-primary-100 to-secondary-100 dark:from-primary-900 dark:to-secondary-800 overflow-hidden">
                    <?php if (file_exists(FCPATH . 'images/projects/' . $project['image'])): ?>
                        <img 
                            src="<?= base_url('images/projects/' . $project['image']) ?>" 
                            alt="<?= $project['title'] ?>"
                            class="w-full h-full object-cover group-hover:scale-110 transition-transform duration-500"
                        >
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center">
                            <div class="text-center">
                                <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-3">
                                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                                    </svg>
                                </div>
                                <p class="text-secondary-600 dark:text-secondary-300 text-sm font-medium">
                                    Aperçu du projet
                                </p>
                            </div>
                        </div>
                    <?php endif; ?>
                    
                    <!-- Overlay on hover -->
                    <div class="absolute inset-0 bg-primary-600 bg-opacity-0 group-hover:bg-opacity-90 transition-all duration-300 flex items-center justify-center">
                        <div class="opacity-0 group-hover:opacity-100 transition-opacity duration-300 text-center">
                            <?php if ($project['url'] !== '#'): ?>
                            <a 
                                href="<?= $project['url'] ?>" 
                                target="_blank"
                                class="inline-flex items-center bg-white text-primary-600 px-6 py-3 rounded-full hover:bg-primary-50 transition-colors duration-300 font-medium"
                            >
                                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                </svg>
                                <?= lang('Main.view_project') ?>
                            </a>
                            <?php else: ?>
                            <div class="bg-white bg-opacity-20 text-white px-6 py-3 rounded-full font-medium">
                                Projet en développement
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
                
                <!-- Project Content -->
                <div class="p-6">
                    <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-3">
                        <?= $project['title'] ?>
                    </h3>
                    <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed mb-4">
                        <?= lang($project['description']) ?>
                    </p>
                    
                    <!-- Technologies/Tags -->
                    <div class="flex flex-wrap gap-2 mb-4">
                        <?php 
                        $technologies = $project['technologies'] ?? ['Web', 'Responsive'];
                        foreach ($technologies as $tech): 
                        ?>
                        <span class="px-3 py-1 text-xs font-medium bg-primary-100 dark:bg-primary-900 text-primary-700 dark:text-primary-300 rounded-full">
                            <?= $tech ?>
                        </span>
                        <?php endforeach; ?>
                    </div>
                    
                    <!-- Project Links -->
                    <div class="flex items-center justify-between">
                        <?php if ($project['url'] !== '#'): ?>
                        <a 
                            href="<?= $project['url'] ?>" 
                            target="_blank"
                            class="inline-flex items-center text-primary-600 dark:text-primary-400 hover:text-primary-800 dark:hover:text-primary-300 font-medium"
                        >
                            <?= lang('Main.view_project') ?>
                            <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                            </svg>
                        </a>
                        <?php else: ?>
                        <span class="text-secondary-500 dark:text-secondary-400 text-sm">
                            En développement
                        </span>
                        <?php endif; ?>
                        
                        <!-- Project Status -->
                        <div class="flex items-center">
                            <div class="w-2 h-2 bg-green-500 rounded-full mr-2"></div>
                            <span class="text-xs text-secondary-500 dark:text-secondary-400">Terminé</span>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section bg-secondary-50 dark:bg-secondary-800">
    <div class="container-custom">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div class="group">
                <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z"/>
                    </svg>
                </div>
                <div class="text-3xl font-bold text-secondary-900 dark:text-white mb-2">15+</div>
                <div class="text-secondary-600 dark:text-secondary-300">Projets réalisés</div>
            </div>
            
            <div class="group">
                <div class="w-16 h-16 bg-gradient-secondary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197m13.5-9a2.5 2.5 0 11-5 0 2.5 2.5 0 015 0z"/>
                    </svg>
                </div>
                <div class="text-3xl font-bold text-secondary-900 dark:text-white mb-2">25+</div>
                <div class="text-secondary-600 dark:text-secondary-300">Clients satisfaits</div>
            </div>
            
            <div class="group">
                <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
                <div class="text-3xl font-bold text-secondary-900 dark:text-white mb-2">3+</div>
                <div class="text-secondary-600 dark:text-secondary-300">Années d'expérience</div>
            </div>
            
            <div class="group">
                <div class="w-16 h-16 bg-gradient-secondary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
                <div class="text-3xl font-bold text-secondary-900 dark:text-white mb-2">24/7</div>
                <div class="text-secondary-600 dark:text-secondary-300">Support disponible</div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 dark:text-white mb-4">
                Technologies Utilisées
            </h2>
            <p class="text-lg text-secondary-600 dark:text-secondary-300 max-w-2xl mx-auto">
                Nous utilisons les technologies les plus récentes et les plus fiables pour vos projets
            </p>
        </div>

        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <!-- PHP/CodeIgniter -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-red-100 dark:bg-red-900 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-red-600 dark:text-red-400 font-bold text-lg">CI</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">CodeIgniter</p>
            </div>
            
            <!-- Tailwind CSS -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-cyan-100 dark:bg-cyan-900 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-cyan-600 dark:text-cyan-400 font-bold text-lg">TW</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Tailwind CSS</p>
            </div>
            
            <!-- Alpine.js -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-blue-600 dark:text-blue-400 font-bold text-lg">⚡</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Alpine.js</p>
            </div>
            
            <!-- Vite -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-purple-100 dark:bg-purple-900 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-purple-600 dark:text-purple-400 font-bold text-lg">⚡</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Vite</p>
            </div>
            
            <!-- MySQL -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-orange-100 dark:bg-orange-900 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-orange-600 dark:text-orange-400 font-bold text-lg">DB</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">MySQL</p>
            </div>
            
            <!-- Docker -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-blue-100 dark:bg-blue-900 rounded-xl flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-blue-600 dark:text-blue-400 font-bold text-lg">🐳</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Docker</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-gradient-to-r from-primary-600 to-secondary-600 text-white">
    <div class="container-custom text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                <?= lang('Main.start_project') ?>
            </h2>
            <p class="text-lg text-primary-100 mb-8">
                <?= lang('Main.start_project_desc') ?>
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= site_url('contact') ?>" class="bg-white text-primary-600 px-8 py-3 rounded-full hover:bg-primary-50 transition-colors duration-300 font-medium">
                    <?= lang('Main.contact') ?>
                </a>
                <a href="<?= site_url('services') ?>" class="border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-primary-600 transition-colors duration-300 font-medium">
                    Voir nos services
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>