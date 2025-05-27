<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Hero Section Services -->
<section class="section bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-secondary-900 dark:via-secondary-900 dark:to-black">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-secondary-900 dark:text-white mb-6 animate-slide-up">
                <?= lang('Main.our_services') ?>
            </h1>
            <p class="text-xl text-secondary-600 dark:text-secondary-300 leading-relaxed animate-fade-in">
                <?= lang('Main.services_intro') ?>
            </p>
        </div>
    </div>
</section>

<!-- Main Services Grid -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Web Development -->
            <div class="card card-hover group">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-4">
                        <?= lang('Main.web_dev') ?>
                    </h3>
                    <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed mb-6">
                        <?= lang('Main.web_dev_desc') ?>
                    </p>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Sites web responsive
                        </div>
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Applications web complexes
                        </div>
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            E-commerce & CMS
                        </div>
                    </div>
                </div>
            </div>

            <!-- Mobile Development -->
            <div class="card card-hover group">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-secondary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-4">
                        <?= lang('Main.mobile_dev') ?>
                    </h3>
                    <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed mb-6">
                        <?= lang('Main.mobile_dev_desc') ?>
                    </p>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Applications iOS & Android
                        </div>
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Flutter & React Native
                        </div>
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Intégrations API
                        </div>
                    </div>
                </div>
            </div>

            <!-- Custom Software -->
            <div class="card card-hover group">
                <div class="p-8">
                    <div class="w-16 h-16 bg-gradient-primary rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 transition-transform">
                        <svg class="w-8 h-8 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-4">
                        <?= lang('Main.custom_software') ?>
                    </h3>
                    <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed mb-6">
                        <?= lang('Main.custom_software_desc') ?>
                    </p>
                    <div class="space-y-2">
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Logiciels métier
                        </div>
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Systèmes de gestion
                        </div>
                        <div class="flex items-center text-sm text-secondary-500 dark:text-secondary-400">
                            <svg class="w-4 h-4 text-primary-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                            </svg>
                            Automatisation des processus
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Additional Services -->
<section class="section bg-secondary-50 dark:bg-secondary-800">
    <div class="container-custom">
        <div class="text-center mb-12">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 dark:text-white mb-4">
                Services Additionnels
            </h2>
            <p class="text-lg text-secondary-600 dark:text-secondary-300 max-w-2xl mx-auto">
                Des services complémentaires pour accompagner votre transformation digitale
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-8">
            <!-- Consulting -->
            <div class="bg-white dark:bg-secondary-700 rounded-2xl p-8 shadow-lg">
                <div class="flex items-start mb-6">
                    <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.663 17h4.673M12 3v1m6.364 1.636l-.707.707M21 12h-1M4 12H3m3.343-5.657l-.707-.707m2.828 9.9a5 5 0 117.072 0l-.548.547A3.374 3.374 0 0014 18.469V19a2 2 0 11-4 0v-.531c0-.895-.356-1.754-.988-2.386l-.548-.547z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-secondary-900 dark:text-white mb-2">
                            <?= lang('Main.consulting') ?>
                        </h3>
                        <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed">
                            <?= lang('Main.consulting_desc') ?>
                        </p>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300"><?= lang('Main.consulting_point_1') ?></span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300"><?= lang('Main.consulting_point_2') ?></span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300">Audits et optimisations</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300">Architecture et design technique</span>
                    </div>
                </div>
            </div>

            <!-- Maintenance & Support -->
            <div class="bg-white dark:bg-secondary-700 rounded-2xl p-8 shadow-lg">
                <div class="flex items-start mb-6">
                    <div class="w-12 h-12 bg-gradient-secondary rounded-lg flex items-center justify-center mr-4">
                        <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18.364 5.636l-3.536 3.536m0 5.656l3.536 3.536M9.172 9.172L5.636 5.636m3.536 9.192L5.636 18.364M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-5 0a4 4 0 11-8 0 4 4 0 018 0z"/>
                        </svg>
                    </div>
                    <div>
                        <h3 class="text-2xl font-bold text-secondary-900 dark:text-white mb-2">
                            <?= lang('Main.maintenance') ?>
                        </h3>
                        <p class="text-secondary-600 dark:text-secondary-300 leading-relaxed">
                            <?= lang('Main.maintenance_desc') ?>
                        </p>
                    </div>
                </div>
                
                <div class="space-y-4">
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300"><?= lang('Main.maintenance_point_1') ?></span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300"><?= lang('Main.maintenance_point_2') ?></span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300">Monitoring et alertes</span>
                    </div>
                    <div class="flex items-center">
                        <svg class="w-5 h-5 text-primary-600 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <span class="text-secondary-700 dark:text-secondary-300">Backup et récupération</span>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Process Section -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="text-center mb-16">
            <h2 class="text-3xl md:text-4xl font-bold text-secondary-900 dark:text-white mb-4">
                Notre Processus
            </h2>
            <p class="text-lg text-secondary-600 dark:text-secondary-300 max-w-2xl mx-auto">
                Une approche structurée pour garantir le succès de votre projet
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-8">
            <!-- Step 1 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-white font-bold text-xl">1</span>
                </div>
                <h3 class="text-lg font-bold text-secondary-900 dark:text-white mb-2">Analyse</h3>
                <p class="text-secondary-600 dark:text-secondary-300 text-sm">
                    Comprendre vos besoins et objectifs
                </p>
            </div>

            <!-- Step 2 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-gradient-secondary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-secondary-700 font-bold text-xl">2</span>
                </div>
                <h3 class="text-lg font-bold text-secondary-900 dark:text-white mb-2">Conception</h3>
                <p class="text-secondary-600 dark:text-secondary-300 text-sm">
                    Design et architecture technique
                </p>
            </div>

            <!-- Step 3 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-gradient-primary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-white font-bold text-xl">3</span>
                </div>
                <h3 class="text-lg font-bold text-secondary-900 dark:text-white mb-2">Développement</h3>
                <p class="text-secondary-600 dark:text-secondary-300 text-sm">
                    Réalisation avec suivi régulier
                </p>
            </div>

            <!-- Step 4 -->
            <div class="text-center group">
                <div class="w-16 h-16 bg-gradient-secondary rounded-full flex items-center justify-center mx-auto mb-4 group-hover:scale-110 transition-transform">
                    <span class="text-secondary-700 font-bold text-xl">4</span>
                </div>
                <h3 class="text-lg font-bold text-secondary-900 dark:text-white mb-2">Déploiement</h3>
                <p class="text-secondary-600 dark:text-secondary-300 text-sm">
                    Mise en ligne et support continu
                </p>
            </div>
        </div>
    </div>
</section>

<!-- CTA Section -->
<section class="section bg-gradient-to-r from-primary-600 to-secondary-600 text-white">
    <div class="container-custom text-center">
        <div class="max-w-3xl mx-auto">
            <h2 class="text-3xl md:text-4xl font-bold mb-6">
                Prêt à démarrer votre projet ?
            </h2>
            <p class="text-lg text-primary-100 mb-8">
                Contactez-nous dès aujourd'hui pour une consultation gratuite et découvrons comment nous pouvons vous aider à atteindre vos objectifs.
            </p>
            <div class="flex flex-col sm:flex-row gap-4 justify-center">
                <a href="<?= site_url('contact') ?>" class="bg-white text-primary-600 px-8 py-3 rounded-full hover:bg-primary-50 transition-colors duration-300 font-medium">
                    Contactez-nous
                </a>
                <a href="<?= site_url('portfolio') ?>" class="border-2 border-white text-white px-8 py-3 rounded-full hover:bg-white hover:text-primary-600 transition-colors duration-300 font-medium">
                    Voir nos réalisations
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>