<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<!-- Hero Section Contact -->
<section class="section bg-gradient-to-br from-primary-50 via-white to-secondary-50 dark:from-secondary-900 dark:via-secondary-900 dark:to-black">
    <div class="container-custom">
        <div class="max-w-4xl mx-auto text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-secondary-900 dark:text-white mb-6 animate-slide-up">
                <?= lang('Main.contact_title') ?>
            </h1>
            <p class="text-xl text-secondary-600 dark:text-secondary-300 leading-relaxed animate-fade-in">
                <?= lang('Main.contact_intro') ?>
            </p>
        </div>
    </div>
</section>

<!-- Contact Form & Info -->
<section class="section bg-white dark:bg-secondary-900">
    <div class="container-custom">
        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="card p-8">
                <div class="mb-6">
                    <h2 class="text-2xl font-bold text-secondary-900 dark:text-white mb-2">
                        Envoyez-nous un message
                    </h2>
                    <p class="text-secondary-600 dark:text-secondary-300">
                        Remplissez le formulaire ci-dessous et nous vous répondrons dans les plus brefs délais.
                    </p>
                </div>

                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-green-100 dark:bg-green-900 border border-green-400 dark:border-green-600 text-green-700 dark:text-green-300 px-4 py-3 rounded-lg mb-6 animate-fade-in">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <?= session()->getFlashdata('success') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (session()->getFlashdata('error')): ?>
                    <div class="bg-red-100 dark:bg-red-900 border border-red-400 dark:border-red-600 text-red-700 dark:text-red-300 px-4 py-3 rounded-lg mb-6 animate-fade-in">
                        <div class="flex items-center">
                            <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4c-.77-.833-1.732-.833-2.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
                            </svg>
                            <?= session()->getFlashdata('error') ?>
                        </div>
                    </div>
                <?php endif; ?>

                <form action="<?= current_url() ?>" method="post" class="space-y-6">
                    <?= csrf_field() ?>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                        <div>
                            <label for="name" class="block text-secondary-700 dark:text-secondary-300 font-medium mb-2">
                                <?= lang('Main.your_name') ?> <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="name" 
                                name="name" 
                                value="<?= old('name') ?>"
                                class="w-full px-4 py-3 border border-secondary-300 dark:border-secondary-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-secondary-800 dark:text-white transition-colors"
                                required
                            >
                            <?php if ($validation->hasError('name')): ?>
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1"><?= $validation->getError('name') ?></p>
                            <?php endif; ?>
                        </div>

                        <div>
                            <label for="email" class="block text-secondary-700 dark:text-secondary-300 font-medium mb-2">
                                <?= lang('Main.your_email') ?> <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="email" 
                                id="email" 
                                name="email"
                                value="<?= old('email') ?>"
                                class="w-full px-4 py-3 border border-secondary-300 dark:border-secondary-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-secondary-800 dark:text-white transition-colors"
                                required
                            >
                            <?php if ($validation->hasError('email')): ?>
                                <p class="text-red-600 dark:text-red-400 text-sm mt-1"><?= $validation->getError('email') ?></p>
                            <?php endif; ?>
                        </div>
                    </div>

                    <div>
                        <label for="subject" class="block text-secondary-700 dark:text-secondary-300 font-medium mb-2">
                            <?= lang('Main.subject') ?> <span class="text-red-500">*</span>
                        </label>
                        <input 
                            type="text" 
                            id="subject" 
                            name="subject"
                            value="<?= old('subject') ?>"
                            class="w-full px-4 py-3 border border-secondary-300 dark:border-secondary-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-secondary-800 dark:text-white transition-colors"
                            required
                        >
                        <?php if ($validation->hasError('subject')): ?>
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1"><?= $validation->getError('subject') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="message" class="block text-secondary-700 dark:text-secondary-300 font-medium mb-2">
                            <?= lang('Main.your_message') ?> <span class="text-red-500">*</span>
                        </label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="5"
                            class="w-full px-4 py-3 border border-secondary-300 dark:border-secondary-600 rounded-lg focus:ring-2 focus:ring-primary-500 focus:border-primary-500 dark:bg-secondary-800 dark:text-white transition-colors resize-none"
                            required
                            placeholder="Décrivez votre projet ou votre demande..."
                        ><?= old('message') ?></textarea>
                        <?php if ($validation->hasError('message')): ?>
                            <p class="text-red-600 dark:text-red-400 text-sm mt-1"><?= $validation->getError('message') ?></p>
                        <?php endif; ?>
                    </div>

                    <button 
                        type="submit" 
                        class="w-full bg-gradient-primary text-white px-8 py-4 rounded-lg hover:opacity-90 transition-all duration-300 font-medium flex items-center justify-center group"
                    >
                        <svg class="w-5 h-5 mr-2 group-hover:translate-x-1 transition-transform" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                        </svg>
                        <?= lang('Main.send_message') ?>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="space-y-8">
                <div class="card p-8">
                    <h2 class="text-2xl font-bold text-secondary-900 dark:text-white mb-6">
                        <?= lang('Main.contact_info') ?>
                    </h2>

                    <div class="space-y-6">
                        <div class="flex items-start group">
                            <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-secondary-900 dark:text-white mb-1">
                                    <?= lang('Main.address') ?>
                                </h3>
                                <p class="text-secondary-600 dark:text-secondary-300">
                                    <?= lang('Main.company_address') ?>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="w-12 h-12 bg-gradient-secondary rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-secondary-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-secondary-900 dark:text-white mb-1">
                                    <?= lang('Main.email') ?>
                                </h3>
                                <p class="text-secondary-600 dark:text-secondary-300">
                                    <a href="mailto:contact@it-innov.com" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                        contact@it-innov.com
                                    </a>
                                </p>
                            </div>
                        </div>

                        <div class="flex items-start group">
                            <div class="w-12 h-12 bg-gradient-primary rounded-lg flex items-center justify-center mr-4 group-hover:scale-110 transition-transform">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                                </svg>
                            </div>
                            <div>
                                <h3 class="text-lg font-medium text-secondary-900 dark:text-white mb-1">
                                    <?= lang('Main.phone') ?>
                                </h3>
                                <p class="text-secondary-600 dark:text-secondary-300">
                                    <a href="tel:+237123456789" class="hover:text-primary-600 dark:hover:text-primary-400 transition-colors">
                                        +237 123 456 789
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card p-8">
                    <h3 class="text-xl font-bold text-secondary-900 dark:text-white mb-6 flex items-center">
                        <svg class="w-6 h-6 mr-2 text-primary-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        <?= lang('Main.business_hours') ?>
                    </h3>
                    <div class="space-y-3">
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-600 dark:text-secondary-300"><?= lang('Main.weekdays') ?></span>
                            <span class="font-medium text-secondary-900 dark:text-white">8:00 - 17:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-600 dark:text-secondary-300"><?= lang('Main.saturday') ?></span>
                            <span class="font-medium text-secondary-900 dark:text-white">9:00 - 14:00</span>
                        </div>
                        <div class="flex justify-between items-center">
                            <span class="text-secondary-600 dark:text-secondary-300"><?= lang('Main.sunday') ?></span>
                            <span class="font-medium text-red-600 dark:text-red-400"><?= lang('Main.closed') ?></span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>