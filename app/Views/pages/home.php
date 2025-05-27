<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Hero Section optimisé -->
<section class="min-h-screen bg-gradient-to-br from-primary-50 via-white to-primary-100 dark:from-secondary-900 dark:via-secondary-900 dark:to-black flex flex-col justify-center items-center text-center animate-fade-in">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto">
            <h1 class="text-4xl md:text-6xl font-bold text-secondary-900 dark:text-white mb-6 animate-slide-up">
                <?= lang('Main.welcome') ?>
            </h1>
            <p class="text-xl md:text-2xl text-secondary-600 dark:text-secondary-300 mb-8 leading-relaxed animate-fade-in" style="animation-delay: 0.2s;">
                <?= lang('Main.intro') ?>
            </p>
            
            <!-- CTA Buttons avec nouveaux styles -->
            <div class="flex flex-wrap gap-6 justify-center animate-slide-up" style="animation-delay: 0.4s;">
                <a href="<?= site_url('portfolio') ?>" class="btn btn-primary btn-lg group">
                    <?= lang('Main.projects') ?>
                    <svg class="w-5 h-5 ml-2 transition-transform group-hover:translate-x-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 8l4 4m0 0l-4 4m4-4H3" />
                    </svg>
                </a>
                <a href="<?= site_url('contact') ?>" class="btn btn-outline btn-lg group">
                    <?= lang('Main.contact') ?>
                    <svg class="w-5 h-5 ml-2 transition-transform group-hover:scale-110" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 12h.01M12 12h.01M16 12h.01M21 12c0 4.418-4.03 8-9 8a9.863 9.863 0 01-4.255-.949L3 20l1.395-3.72C3.512 15.042 3 13.574 3 12c0-4.418 4.03-8 9-8s9 3.582 9 8z" />
                    </svg>
                </a>
            </div>
            
            <!-- Test Configuration Link (en mode dev seulement) -->
            <?php if (ENVIRONMENT === 'development'): ?>
            <div class="mt-8 animate-bounce-gentle">
                <a href="<?= site_url('test') ?>" class="btn btn-sm btn-secondary">
                    🧪 Test Configuration
                </a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 transform -translate-x-1/2 animate-bounce">
        <svg class="w-6 h-6 text-secondary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 14l-7 7m0 0l-7-7m7 7V3" />
        </svg>
    </div>
</section>

<!-- Projects Section optimisé -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 dark:text-white mb-4">
                <?= lang('Main.examples') ?>
            </h2>
            <p class="text-lg text-secondary-600 dark:text-secondary-300 max-w-2xl mx-auto">
                Découvrez quelques-unes de nos réalisations récentes
            </p>
        </div>
        
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- ENAM Project -->
            <div class="card card-hover p-6 group">
                <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.746 0 3.332.477 4.5 1.253v13C19.832 18.477 18.246 18 16.5 18c-1.746 0-3.332.477-4.5 1.253" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-secondary-900 dark:text-white">
                    Concours ENAM
                </h3>
                <p class="text-secondary-600 dark:text-secondary-300 mb-6">
                    <?= lang('Main.project_enam') ?>
                </p>
                <a href="https://concours.enam.cm" target="_blank" 
                   class="inline-flex items-center text-primary-600 hover:text-primary-700 dark:text-primary-400 dark:hover:text-primary-300 font-medium group-hover:translate-x-1 transition-transform">
                    concours.enam.cm
                    <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14" />
                    </svg>
                </a>
            </div>

            <!-- School Management -->
            <div class="card card-hover p-6 group">
                <div class="w-12 h-12 bg-gradient-secondary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-secondary-900 dark:text-white">
                    <?= lang('Main.school_management') ?>
                </h3>
                <p class="text-secondary-600 dark:text-secondary-300 mb-6">
                    <?= lang('Main.school_desc') ?>
                </p>
                <div class="flex items-center text-primary-600 dark:text-primary-400 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    En développement
                </div>
            </div>

            <!-- HR Solution -->
            <div class="card card-hover p-6 group">
                <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center mb-4">
                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                    </svg>
                </div>
                <h3 class="text-xl font-semibold mb-2 text-secondary-900 dark:text-white">
                    <?= lang('Main.hr_solution') ?>
                </h3>
                <p class="text-secondary-600 dark:text-secondary-300 mb-6">
                    <?= lang('Main.hr_desc') ?>
                </p>
                <div class="flex items-center text-amber-600 dark:text-amber-400 font-medium">
                    <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                    </svg>
                    Planifié
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Technologies Section -->
<section class="section-sm bg-secondary-50 dark:bg-secondary-800">
    <div class="container-custom">
        <div class="text-center mb-12">
            <h2 class="text-2xl md:text-3xl font-bold text-secondary-900 dark:text-white mb-4">
                Technologies Utilisées
            </h2>
            <p class="text-secondary-600 dark:text-secondary-300">
                Stack moderne pour des applications performantes
            </p>
        </div>
        
        <div class="grid grid-cols-2 md:grid-cols-4 lg:grid-cols-6 gap-6">
            <!-- CodeIgniter 4 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white dark:bg-secondary-700 rounded-xl shadow-md flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-2xl font-bold text-red-600">CI</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">CodeIgniter 4</p>
            </div>
            
            <!-- Tailwind CSS -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white dark:bg-secondary-700 rounded-xl shadow-md flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-cyan-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M12.001,4.8c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C13.666,10.618,15.027,12,18.001,12c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C16.337,6.182,14.976,4.8,12.001,4.8z M6.001,12c-3.2,0-5.2,1.6-6,4.8c1.2-1.6,2.6-2.2,4.2-1.8c0.913,0.228,1.565,0.89,2.288,1.624 C7.666,17.818,9.027,19.2,12.001,19.2c3.2,0,5.2-1.6,6-4.8c-1.2,1.6-2.6,2.2-4.2,1.8c-0.913-0.228-1.565-0.89-2.288-1.624 C10.337,13.382,8.976,12,6.001,12z"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Tailwind CSS</p>
            </div>
            
            <!-- Alpine.js -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white dark:bg-secondary-700 rounded-xl shadow-md flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-lg font-bold text-blue-600">⚡</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Alpine.js</p>
            </div>
            
            <!-- Vite -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white dark:bg-secondary-700 rounded-xl shadow-md flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <span class="text-lg font-bold text-purple-600">⚡</span>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Vite</p>
            </div>
            
            <!-- MySQL -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white dark:bg-secondary-700 rounded-xl shadow-md flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-blue-800" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M16.405 5.501c-.115 0-.193.014-.274.033v.013h.014c.054.104.146.18.214.273.054.107.1.214.154.32l.014-.015c.094-.066.14-.172.14-.333-.04-.047-.046-.094-.08-.14-.04-.067-.126-.1-.18-.153z"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">MySQL</p>
            </div>
            
            <!-- Docker -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-white dark:bg-secondary-700 rounded-xl shadow-md flex items-center justify-center mx-auto mb-3 group-hover:scale-110 transition-transform">
                    <svg class="w-8 h-8 text-blue-500" fill="currentColor" viewBox="0 0 24 24">
                        <path d="M13.983 11.078h2.119a.186.186 0 00.186-.185V9.006a.186.186 0 00-.186-.186h-2.119a.185.185 0 00-.185.185v1.888c0 .102.083.185.185.185m-2.954-5.43h2.118a.186.186 0 00.186-.186V3.574a.186.186 0 00-.186-.185h-2.118a.185.185 0 00-.185.185v1.888c0 .102.082.185.185.186"/>
                    </svg>
                </div>
                <p class="text-sm font-medium text-secondary-700 dark:text-secondary-300">Docker</p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-gradient-to-r from-primary-600 to-primary-700 text-white">
    <div class="container-custom text-center">
        <h2 class="text-3xl md:text-4xl font-bold mb-4">
            Prêt à démarrer votre projet ?
        </h2>
        <p class="text-xl text-primary-100 mb-8 max-w-2xl mx-auto">
            Contactez-nous dès aujourd'hui pour discuter de vos besoins et obtenir un devis personnalisé.
        </p>
        <div class="flex flex-col sm:flex-row gap-4 justify-center">
            <a href="<?= site_url('contact') ?>" class="btn bg-white text-primary-600 hover:bg-primary-50 btn-lg">
                Demander un devis
            </a>
            <a href="<?= site_url('portfolio') ?>" class="btn border-2 border-white text-white hover:bg-white hover:text-primary-600 btn-lg">
                Voir nos réalisations
            </a>
        </div>
    </div>
</section>

<?= $this->endSection() ?>
