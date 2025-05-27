<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4">
                <?= lang('Main.contact_title') ?>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                <?= lang('Main.contact_intro') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 lg:grid-cols-2 gap-12">
            <!-- Contact Form -->
            <div class="bg-white rounded-lg shadow-lg p-8">
                <?php if (session()->getFlashdata('success')): ?>
                    <div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded mb-6">
                        <?= session()->getFlashdata('success') ?>
                    </div>
                <?php endif; ?>

                <form action="<?= current_url() ?>" method="post" class="space-y-6">
                    <?= csrf_field() ?>
                    
                    <div>
                        <label for="name" class="block text-gray-700 font-medium mb-2">
                            <?= lang('Main.your_name') ?>
                        </label>
                        <input 
                            type="text" 
                            id="name" 
                            name="name" 
                            value="<?= old('name') ?>"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        <?php if ($validation->hasError('name')): ?>
                            <p class="text-red-600 text-sm mt-1"><?= $validation->getError('name') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="email" class="block text-gray-700 font-medium mb-2">
                            <?= lang('Main.your_email') ?>
                        </label>
                        <input 
                            type="email" 
                            id="email" 
                            name="email"
                            value="<?= old('email') ?>"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        <?php if ($validation->hasError('email')): ?>
                            <p class="text-red-600 text-sm mt-1"><?= $validation->getError('email') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="subject" class="block text-gray-700 font-medium mb-2">
                            <?= lang('Main.subject') ?>
                        </label>
                        <input 
                            type="text" 
                            id="subject" 
                            name="subject"
                            value="<?= old('subject') ?>"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        >
                        <?php if ($validation->hasError('subject')): ?>
                            <p class="text-red-600 text-sm mt-1"><?= $validation->getError('subject') ?></p>
                        <?php endif; ?>
                    </div>

                    <div>
                        <label for="message" class="block text-gray-700 font-medium mb-2">
                            <?= lang('Main.your_message') ?>
                        </label>
                        <textarea 
                            id="message" 
                            name="message" 
                            rows="5"
                            class="w-full px-4 py-2 border rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500"
                            required
                        ><?= old('message') ?></textarea>
                        <?php if ($validation->hasError('message')): ?>
                            <p class="text-red-600 text-sm mt-1"><?= $validation->getError('message') ?></p>
                        <?php endif; ?>
                    </div>

                    <button type="submit" class="w-full bg-blue-600 text-white px-6 py-3 rounded-lg hover:bg-blue-700 transition-colors duration-300">
                        <?= lang('Main.send_message') ?>
                    </button>
                </form>
            </div>

            <!-- Contact Information -->
            <div class="bg-blue-50 rounded-lg p-8">
                <h2 class="text-2xl font-semibold text-blue-800 mb-6">
                    <?= lang('Main.contact_info') ?>
                </h2>

                <div class="space-y-6">
                    <div class="flex items-start">
                        <div class="text-blue-600 mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">
                                <?= lang('Main.address') ?>
                            </h3>
                            <p class="text-gray-600">
                                <?= lang('Main.company_address') ?>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="text-blue-600 mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">
                                <?= lang('Main.email') ?>
                            </h3>
                            <p class="text-gray-600">
                                <a href="mailto:contact@it-innov.com" class="hover:text-blue-600">
                                    contact@it-innov.com
                                </a>
                            </p>
                        </div>
                    </div>

                    <div class="flex items-start">
                        <div class="text-blue-600 mr-4">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"/>
                            </svg>
                        </div>
                        <div>
                            <h3 class="text-lg font-medium text-gray-900 mb-1">
                                <?= lang('Main.phone') ?>
                            </h3>
                            <p class="text-gray-600">
                                <a href="tel:+237123456789" class="hover:text-blue-600">
                                    +237 123 456 789
                                </a>
                            </p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 p-6 bg-white rounded-lg">
                    <h3 class="text-lg font-medium text-gray-900 mb-4">
                        <?= lang('Main.business_hours') ?>
                    </h3>
                    <div class="space-y-2 text-gray-600">
                        <p><?= lang('Main.weekdays') ?>: 8:00 - 17:00</p>
                        <p><?= lang('Main.saturday') ?>: 9:00 - 14:00</p>
                        <p><?= lang('Main.sunday') ?>: <?= lang('Main.closed') ?></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>