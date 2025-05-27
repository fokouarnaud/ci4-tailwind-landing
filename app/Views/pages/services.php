<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4">
                <?= lang('Main.our_services') ?>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                <?= lang('Main.services_intro') ?>
            </p>
        </div>

        <div class="mt-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Web Development -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:scale-105 duration-300">
                <div class="p-8">
                    <div class="text-blue-600 mb-4">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        <?= lang('Main.web_dev') ?>
                    </h3>
                    <p class="text-gray-600">
                        <?= lang('Main.web_dev_desc') ?>
                    </p>
                </div>
            </div>

            <!-- Mobile Development -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:scale-105 duration-300">
                <div class="p-8">
                    <div class="text-blue-600 mb-4">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 18h.01M8 21h8a2 2 0 002-2V5a2 2 0 00-2-2H8a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        <?= lang('Main.mobile_dev') ?>
                    </h3>
                    <p class="text-gray-600">
                        <?= lang('Main.mobile_dev_desc') ?>
                    </p>
                </div>
            </div>

            <!-- Custom Software -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:scale-105 duration-300">
                <div class="p-8">
                    <div class="text-blue-600 mb-4">
                        <svg class="h-12 w-12" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                        </svg>
                    </div>
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        <?= lang('Main.custom_software') ?>
                    </h3>
                    <p class="text-gray-600">
                        <?= lang('Main.custom_software_desc') ?>
                    </p>
                </div>
            </div>
        </div>

        <!-- Additional Services -->
        <div class="mt-16 grid grid-cols-1 md:grid-cols-2 gap-8">
            <div class="bg-blue-50 p-8 rounded-lg">
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">
                    <?= lang('Main.consulting') ?>
                </h3>
                <p class="text-gray-600 mb-6">
                    <?= lang('Main.consulting_desc') ?>
                </p>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <?= lang('Main.consulting_point_1') ?>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <?= lang('Main.consulting_point_2') ?>
                    </li>
                </ul>
            </div>

            <div class="bg-blue-50 p-8 rounded-lg">
                <h3 class="text-2xl font-semibold text-blue-800 mb-4">
                    <?= lang('Main.maintenance') ?>
                </h3>
                <p class="text-gray-600 mb-6">
                    <?= lang('Main.maintenance_desc') ?>
                </p>
                <ul class="space-y-3 text-gray-600">
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <?= lang('Main.maintenance_point_1') ?>
                    </li>
                    <li class="flex items-center">
                        <svg class="h-5 w-5 text-blue-600 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                        </svg>
                        <?= lang('Main.maintenance_point_2') ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>