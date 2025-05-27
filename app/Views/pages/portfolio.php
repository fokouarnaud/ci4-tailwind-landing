<?= $this->extend('layouts/app') ?>

<?= $this->section('content') ?>

<section class="py-20 bg-white">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h1 class="text-4xl md:text-5xl font-bold text-blue-800 mb-4">
                <?= lang('Main.portfolio_title') ?>
            </h1>
            <p class="text-xl text-gray-600 max-w-3xl mx-auto">
                <?= lang('Main.portfolio_intro') ?>
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php foreach ($projects as $project): ?>
            <div class="bg-white rounded-lg shadow-lg overflow-hidden transition-transform hover:scale-105 duration-300">
                <div class="relative h-48 bg-blue-100">
                    <?php if (file_exists('images/projects/' . $project['image'])): ?>
                        <img 
                            src="<?= base_url('images/projects/' . $project['image']) ?>" 
                            alt="<?= $project['title'] ?>"
                            class="w-full h-full object-cover"
                        >
                    <?php else: ?>
                        <div class="w-full h-full flex items-center justify-center text-blue-600">
                            <svg class="h-20 w-20" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 11H5m14 0a2 2 0 012 2v6a2 2 0 01-2 2H5a2 2 0 01-2-2v-6a2 2 0 012-2m14 0V9a2 2 0 00-2-2M5 11V9a2 2 0 012-2m0 0V5a2 2 0 012-2h6a2 2 0 012 2v2M7 7h10"/>
                            </svg>
                        </div>
                    <?php endif; ?>
                </div>
                <div class="p-6">
                    <h3 class="text-xl font-semibold text-gray-900 mb-2">
                        <?= $project['title'] ?>
                    </h3>
                    <p class="text-gray-600 mb-4">
                        <?= lang($project['description']) ?>
                    </p>
                    <?php if ($project['url'] !== '#'): ?>
                    <a 
                        href="<?= $project['url'] ?>" 
                        target="_blank"
                        class="inline-flex items-center text-blue-600 hover:text-blue-800"
                    >
                        <?= lang('Main.view_project') ?>
                        <svg class="w-4 h-4 ml-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M14 5l7 7m0 0l-7 7m7-7H3"/>
                        </svg>
                    </a>
                    <?php endif; ?>
                </div>
            </div>
            <?php endforeach; ?>
        </div>

        <div class="mt-16 text-center">
            <div class="bg-blue-50 rounded-lg p-8 max-w-3xl mx-auto">
                <h2 class="text-2xl font-semibold text-blue-800 mb-4">
                    <?= lang('Main.start_project') ?>
                </h2>
                <p class="text-gray-600 mb-6">
                    <?= lang('Main.start_project_desc') ?>
                </p>
                <a 
                    href="<?= site_url('contact') ?>" 
                    class="inline-block bg-blue-600 text-white px-8 py-3 rounded-full hover:bg-blue-700 transition-colors duration-300"
                >
                    <?= lang('Main.contact') ?>
                </a>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection() ?>