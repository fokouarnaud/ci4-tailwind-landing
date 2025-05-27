<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<section class="min-h-screen bg-gradient-to-br from-blue-50 via-white to-blue-100 p-8 flex flex-col justify-center items-center text-center">
    <div class="max-w-4xl mx-auto">
        <h1 class="text-4xl md:text-6xl font-bold text-blue-800 mb-6">
            <?= lang('Main.welcome') ?>
        </h1>
        <p class="text-xl md:text-2xl text-gray-700 mb-8 leading-relaxed">
            <?= lang('Main.intro') ?>
        </p>
        <div class="flex flex-wrap gap-6 justify-center">
            <a href="<?= site_url('portfolio') ?>" class="px-8 py-4 bg-blue-600 text-white rounded-full hover:bg-blue-700 transition-colors duration-300 text-lg">
                <?= lang('Main.projects') ?>
            </a>
            <a href="<?= site_url('contact') ?>" class="px-8 py-4 border-2 border-blue-600 text-blue-600 rounded-full hover:bg-blue-600 hover:text-white transition-colors duration-300 text-lg">
                <?= lang('Main.contact') ?>
            </a>
        </div>
    </div>
</section>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <h2 class="text-3xl md:text-4xl font-bold text-center text-gray-900 mb-12">
            <?= lang('Main.examples') ?>
        </h2>
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- ENAM Project -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:scale-105 duration-300">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2">Concours ENAM</h3>
                    <p class="text-gray-600 mb-4">
                        <?= lang('Main.project_enam') ?>
                    </p>
                    <a href="https://concours.enam.cm" target="_blank" class="inline-flex items-center text-blue-600 hover:text-blue-800">
                        concours.enam.cm
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"></path>
                        </svg>
                    </a>
                </div>
            </div>

            <!-- School Management -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2"><?= lang('Main.school_management') ?></h3>
                    <p class="text-gray-600">
                        <?= lang('Main.school_desc') ?>
                    </p>
                </div>
            </div>

            <!-- HR Solution -->
            <div class="bg-white rounded-lg shadow-lg overflow-hidden">
                <div class="p-6">
                    <h3 class="text-xl font-semibold mb-2"><?= lang('Main.hr_solution') ?></h3>
                    <p class="text-gray-600">
                        <?= lang('Main.hr_desc') ?>
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>