<!DOCTYPE html>
<html lang="<?= service('request')->getLocale() ?>">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>IT-Innov - <?= $title ?? 'Web & Mobile Solutions' ?></title>
    <link href="<?= base_url('assets/app.css') ?>" rel="stylesheet">
</head>
<body class="min-h-screen bg-gray-50">
    <nav class="bg-white shadow-lg">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex justify-between h-16">
                <div class="flex">
                    <a href="<?= site_url() ?>" class="flex items-center">
                        <span class="text-xl font-bold text-blue-600">IT-Innov</span>
                    </a>
                </div>
                <div class="hidden md:flex items-center space-x-4">
                    <a href="<?= site_url('about') ?>" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.about') ?></a>
                    <a href="<?= site_url('services') ?>" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.services') ?></a>
                    <a href="<?= site_url('portfolio') ?>" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.projects') ?></a>
                    <a href="<?= site_url('contact') ?>" class="text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.contact') ?></a>
                    <div class="flex items-center space-x-2 ml-4">
                        <a href="<?= site_url('language/fr') ?>" class="<?= service('request')->getLocale() === 'fr' ? 'font-bold' : '' ?>">FR</a>
                        <span class="text-gray-300">|</span>
                        <a href="<?= site_url('language/en') ?>" class="<?= service('request')->getLocale() === 'en' ? 'font-bold' : '' ?>">EN</a>
                    </div>
                </div>
                <div class="md:hidden flex items-center">
                    <button id="mobile-menu-button" class="text-gray-700 hover:text-blue-600">
                        <svg class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"/>
                        </svg>
                    </button>
                </div>
            </div>
        </div>
        <div id="mobile-menu" class="hidden md:hidden">
            <div class="px-2 pt-2 pb-3 space-y-1">
                <a href="<?= site_url('about') ?>" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.about') ?></a>
                <a href="<?= site_url('services') ?>" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.services') ?></a>
                <a href="<?= site_url('portfolio') ?>" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.projects') ?></a>
                <a href="<?= site_url('contact') ?>" class="block text-gray-700 hover:text-blue-600 px-3 py-2 rounded-md"><?= lang('Main.contact') ?></a>
                <div class="flex items-center space-x-2 px-3 py-2">
                    <a href="<?= site_url('language/fr') ?>" class="<?= service('request')->getLocale() === 'fr' ? 'font-bold' : '' ?>">FR</a>
                    <span class="text-gray-300">|</span>
                    <a href="<?= site_url('language/en') ?>" class="<?= service('request')->getLocale() === 'en' ? 'font-bold' : '' ?>">EN</a>
                </div>
            </div>
        </div>
    </nav>
    <main class="flex-grow">