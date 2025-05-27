<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-8 text-center">
            <?= lang('Main.about_title') ?>
        </h1>
        
        <div class="prose prose-lg max-w-none">
            <p class="text-xl text-gray-600 mb-8 text-center">
                <?= lang('Main.about_intro') ?>
            </p>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-12 mt-16">
                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                        <?= lang('Main.our_mission') ?>
                    </h2>
                    <p class="text-gray-600">
                        <?= lang('Main.mission_text') ?>
                    </p>
                </div>

                <div>
                    <h2 class="text-2xl font-semibold text-gray-900 mb-4">
                        <?= lang('Main.our_expertise') ?>
                    </h2>
                    <p class="text-gray-600">
                        <?= lang('Main.expertise_text') ?>
                    </p>
                </div>
            </div>

            <div class="mt-16">
                <h2 class="text-2xl font-semibold text-gray-900 mb-6">
                    <?= lang('Main.why_choose_us') ?>
                </h2>
                <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">
                            <?= lang('Main.quality') ?>
                        </h3>
                        <p class="text-gray-600">
                            <?= lang('Main.quality_text') ?>
                        </p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">
                            <?= lang('Main.innovation') ?>
                        </h3>
                        <p class="text-gray-600">
                            <?= lang('Main.innovation_text') ?>
                        </p>
                    </div>
                    <div class="bg-blue-50 p-6 rounded-lg">
                        <h3 class="text-xl font-semibold text-blue-800 mb-3">
                            <?= lang('Main.support') ?>
                        </h3>
                        <p class="text-gray-600">
                            <?= lang('Main.support_text') ?>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>