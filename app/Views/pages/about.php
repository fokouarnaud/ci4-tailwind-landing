<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Hero Section About -->
<section class="section bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-secondary-900 dark:via-secondary-900 dark:to-black">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-secondary-900 dark:text-white mb-6 animate-slide-up">
                <?= lang('Main.about_title') ?>
            </h1>
            <p class="text-xl text-secondary-600 dark:text-secondary-300 leading-relaxed animate-fade-in">
                <?= lang('Main.about_intro') ?>
            </p>
        </div>
    </div>
</section>

<!-- Mission & Expertise -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Mission -->
            <div class="order-2 lg:order-1">
                <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-secondary-900 dark:text-white mb-4">
                    <?= lang('Main.our_mission') ?>
                </h2>
                <p class="text-lg text-secondary-600 dark:text-secondary-300 leading-relaxed">
                    <?= lang('Main.mission_text') ?>
                </p>
            </div>
            
            <!-- Mission Illustration -->
            <div class="order-1 lg:order-2">
                <div class="bg-gradient-to-br from-primary-100 to-secondary-100 dark:from-primary-900 dark:to-secondary-800 rounded-2xl p-8 text-center">
                    <div class="w-32 h-32 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-6">
                        <svg class="w-16 h-16 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4M7.835 4.697a3.42 3.42 0 001.946-.806 3.42 3.42 0 014.438 0 3.42 3.42 0 001.946.806 3.42 3.42 0 013.138 3.138 3.42 3.42 0 00.806 1.946 3.42 3.42 0 010 4.438 3.42 3.42 0 00-.806 1.946 3.42 3.42 0 01-3.138 3.138 3.42 3.42 0 00-1.946.806 3.42 3.42 0 01-4.438 0 3.42 3.42 0 00-1.946-.806 3.42 3.42 0 01-3.138-3.138 3.42 3.42 0 00-.806-1.946 3.42 3.42 0 010-4.438 3.42 3.42 0 00.806-1.946 3.42 3.42 0 013.138-3.138z" />
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-secondary-900 dark:text-white mb-2">Solutions Certifiées</h3>
                    <p class="text-secondary-600 dark:text-secondary-300">Qualité et excellence garanties</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Expertise -->
<section class="section bg-secondary-50 dark:bg-secondary-800">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-16 items-center">
            <!-- Expertise Illustration -->
            <div>
                <div class="bg-gradient-to-br from-secondary-100 to-primary-100 dark:from-secondary-700 dark:to-primary-900 rounded-2xl p-8">
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Tech Icons -->
                        <div class="bg-white dark:bg-secondary-600 rounded-xl p-4 text-center">
                            <div class="w-12 h-12 bg-red-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <span class="text-white font-bold text-lg">CI</span>
                            </div>
                            <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">CodeIgniter</p>
                        </div>
                        <div class="bg-white dark:bg-secondary-600 rounded-xl p-4 text-center">
                            <div class="w-12 h-12 bg-cyan-500 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <span class="text-white font-bold text-lg">TW</span>
                            </div>
                            <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Tailwind</p>
                        </div>
                        <div class="bg-white dark:bg-secondary-600 rounded-xl p-4 text-center">
                            <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <span class="text-white font-bold text-lg">⚡</span>
                            </div>
                            <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Alpine.js</p>
                        </div>
                        <div class="bg-white dark:bg-secondary-600 rounded-xl p-4 text-center">
                            <div class="w-12 h-12 bg-purple-600 rounded-lg flex items-center justify-center mx-auto mb-2">
                                <span class="text-white font-bold text-lg">⚡</span>
                            </div>
                            <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Vite</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Expertise Content -->
            <div>
                <div class="w-12 h-12 bg-gradient-secondary rounded-lg flex items-center justify-center mb-6">
                    <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19.428 15.428a2 2 0 00-1.022-.547l-2.387-.477a6 6 0 00-3.86.517l-.318.158a6 6 0 01-3.86.517L6.05 15.21a2 2 0 00-1.806.547M8 4h8l-1 1v5.172a2 2 0 00.586 1.414l5 5c1.26 1.26.367 3.414-1.415 3.414H4.828c-1.782 0-2.674-2.154-1.414-3.414l5-5A2 2 0 009 10.172V5L8 4z" />
                    </svg>
                </div>
                <h2 class="text-3xl font-bold text-secondary-900 dark:text-white mb-4">
                    <?= lang('Main.our_expertise') ?>
                </h2>
                <p class="text-lg text-secondary-600 dark:text-secondary-300 leading-relaxed mb-6">
                    <?= lang('Main.expertise_text') ?>
                </p>
                <div class="space-y-3">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300">Développement Full-Stack</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300">Applications Mobiles Natives</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" />
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300">Solutions Cloud & DevOps</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Why Choose Us -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 dark:text-white mb-4">
                <?= lang('Main.why_choose_us') ?>
            </h2>
            <p class="text-lg text-secondary-600 dark:text-secondary-300 max-w-2xl mx-auto">
                Découvrez ce qui nous distingue et pourquoi nos clients nous font confiance
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
            <!-- Quality -->
            <div class="card card-hover p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-4">
                    <?= lang('Main.quality') ?>
                </h3>
                <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed">
                    <?= lang('Main.quality_text') ?>
                </p>
            </div>
            
            <!-- Innovation -->
            <div class="card card-hover p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-secondary rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-4">
                    <?= lang('Main.innovation') ?>
                </h3>
                <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed">
                    <?= lang('Main.innovation_text') ?>
                </p>
            </div>
            
            <!-- Support -->
            <div class="card card-hover p-8 text-center group">
                <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mx-auto mb-6 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-4">
                    <?= lang('Main.support') ?>
                </h3>
                <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed">
                    <?= lang('Main.support_text') ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Stats Section -->
<section class="section bg-gradient-to-r from-primary-600 to-secondary-600 text-white">
    <div class="container-custom">
        <div class="grid grid-cols-2 md:grid-cols-4 gap-8 text-center">
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">3+</div>
                <div class="text-primary-100">Années d'expérience</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">15+</div>
                <div class="text-primary-100">Projets réalisés</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">100%</div>
                <div class="text-primary-100">Clients satisfaits</div>
            </div>
            <div>
                <div class="text-3xl md:text-4xl font-bold mb-2">24/7</div>
                <div class="text-primary-100">Support disponible</div>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 dark:text-white mb-6">
                Prêt à transformer vos idées en réalité ?
            </h2>
            <p class="text-lg text-secondary-600 dark:text-secondary-300 mb-8">
                Contactez-nous dès aujourd'hui pour discuter de votre projet et découvrir comment nous pouvons vous aider à atteindre vos objectifs.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= site_url('contact') ?>" class="btn-primary btn-lg">
                    Démarrer un projet
                </a>
                <a href="<?= site_url('portfolio') ?>" class="btn-outline btn-lg">
                    Voir nos réalisations
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
