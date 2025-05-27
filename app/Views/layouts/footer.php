    </main>
    
    <!-- Footer -->
    <footer class="bg-secondary-900 dark:bg-black text-white">
        <div class="container-custom">
            <!-- Main Footer Content -->
            <div class="section-sm">
                <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-8">
                    <!-- Company Info -->
                    <div class="lg:col-span-2">
                        <div class="flex items-center space-x-2 mb-4">
                            <div class="w-8 h-8 bg-gradient-primary rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-lg">IT</span>
                            </div>
                            <span class="text-xl font-display font-bold">IT-Innov</span>
                        </div>
                        <p class="text-secondary-300 mb-6 max-w-md">
                            <?= lang('Main.intro') ?>
                        </p>
                        
                        <!-- Social Links -->
                        <div class="flex space-x-4">
                            <a href="#" 
                               class="p-2 bg-secondary-800 hover:bg-primary-600 rounded-lg transition-colors group"
                               aria-label="Follow us on Facebook">
                                <svg class="w-5 h-5 text-secondary-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/>
                                </svg>
                            </a>
                            <a href="#" 
                               class="p-2 bg-secondary-800 hover:bg-primary-600 rounded-lg transition-colors group"
                               aria-label="Follow us on LinkedIn">
                                <svg class="w-5 h-5 text-secondary-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M20.447,20.452H16.893V14.883c0-1.328-.027-3.037-1.852-3.037-1.853,0-2.136,1.445-2.136,2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9,1.637-1.85,3.37-1.85c3.601,0,4.267,2.37,4.267,5.455v6.286ZM5.337,7.433c-1.144,0-2.063-.926-2.063-2.065a2.064,2.064,0,1,1,4.127,0c0,1.139-.919,2.065-2.064,2.065Zm2.033,13.019H3.3V9H7.37Z"/>
                                </svg>
                            </a>
                            <a href="#" 
                               class="p-2 bg-secondary-800 hover:bg-primary-600 rounded-lg transition-colors group"
                               aria-label="Follow us on Twitter">
                                <svg class="w-5 h-5 text-secondary-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M23.953 4.57a10 10 0 01-2.825.775 4.958 4.958 0 002.163-2.723c-.951.555-2.005.959-3.127 1.184a4.92 4.92 0 00-8.384 4.482C7.69 8.095 4.067 6.13 1.64 3.162a4.822 4.822 0 00-.666 2.475c0 1.71.87 3.213 2.188 4.096a4.904 4.904 0 01-2.228-.616v.06a4.923 4.923 0 003.946 4.827 4.996 4.996 0 01-2.212.085 4.936 4.936 0 004.604 3.417 9.867 9.867 0 01-6.102 2.105c-.39 0-.779-.023-1.17-.067a13.995 13.995 0 007.557 2.209c9.053 0 13.998-7.496 13.998-13.985 0-.21 0-.42-.015-.63A9.935 9.935 0 0024 4.59z"/>
                                </svg>
                            </a>
                            <a href="#" 
                               class="p-2 bg-secondary-800 hover:bg-primary-600 rounded-lg transition-colors group"
                               aria-label="Follow us on GitHub">
                                <svg class="w-5 h-5 text-secondary-400 group-hover:text-white transition-colors" fill="currentColor" viewBox="0 0 24 24">
                                    <path d="M12 .297c-6.63 0-12 5.373-12 12 0 5.303 3.438 9.8 8.205 11.385.6.113.82-.258.82-.577 0-.285-.01-1.04-.015-2.04-3.338.724-4.042-1.61-4.042-1.61C4.422 18.07 3.633 17.7 3.633 17.7c-1.087-.744.084-.729.084-.729 1.205.084 1.838 1.236 1.838 1.236 1.07 1.835 2.809 1.305 3.495.998.108-.776.417-1.305.76-1.605-2.665-.3-5.466-1.332-5.466-5.93 0-1.31.465-2.38 1.235-3.22-.135-.303-.54-1.523.105-3.176 0 0 1.005-.322 3.3 1.23.96-.267 1.98-.399 3-.405 1.02.006 2.04.138 3 .405 2.28-1.552 3.285-1.23 3.285-1.23.645 1.653.24 2.873.12 3.176.765.84 1.23 1.91 1.23 3.22 0 4.61-2.805 5.625-5.475 5.92.42.36.81 1.096.81 2.22 0 1.606-.015 2.896-.015 3.286 0 .315.21.69.825.57C20.565 22.092 24 17.592 24 12.297c0-6.627-5.373-12-12-12"/>
                                </svg>
                            </a>
                        </div>
                    </div>
                    
                    <!-- Quick Links -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4">Quick Links</h3>
                        <ul class="space-y-3">
                            <li>
                                <a href="<?= site_url('about') ?>" class="text-secondary-300 hover:text-white transition-colors">
                                    <?= lang('Main.about') ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('services') ?>" class="text-secondary-300 hover:text-white transition-colors">
                                    <?= lang('Main.services') ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('portfolio') ?>" class="text-secondary-300 hover:text-white transition-colors">
                                    <?= lang('Main.projects') ?>
                                </a>
                            </li>
                            <li>
                                <a href="<?= site_url('contact') ?>" class="text-secondary-300 hover:text-white transition-colors">
                                    <?= lang('Main.contact') ?>
                                </a>
                            </li>
                        </ul>
                    </div>
                    
                    <!-- Contact Info -->
                    <div>
                        <h3 class="text-lg font-semibold mb-4"><?= lang('Main.contact') ?></h3>
                        <ul class="space-y-3 text-secondary-300">
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 4.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z" />
                                </svg>
                                <span>contact@it-innov.com</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z" />
                                </svg>
                                <span>+237 123 456 789</span>
                            </li>
                            <li class="flex items-center space-x-2">
                                <svg class="w-4 h-4 text-primary-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z" />
                                </svg>
                                <span>Douala, Cameroun</span>
                            </li>
                        </ul>
                        
                        <!-- Newsletter Signup -->
                        <div class="mt-6">
                            <h4 class="text-sm font-semibold mb-2">Stay Updated</h4>
                            <form class="flex">
                                <input type="email" 
                                       placeholder="Your email" 
                                       class="input bg-secondary-800 border-secondary-700 text-white placeholder-secondary-400 rounded-r-none flex-1">
                                <button type="submit" 
                                        class="btn-primary rounded-l-none px-4">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8" />
                                    </svg>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Bottom Footer -->
            <div class="border-t border-secondary-800 py-6">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-secondary-400 text-sm">
                        &copy; <?= date('Y') ?> IT-Innov. <?= lang('Main.rights') ?>
                    </p>
                    
                    <!-- Footer Links -->
                    <div class="flex items-center space-x-6 text-sm">
                        <a href="#" class="text-secondary-400 hover:text-white transition-colors">Privacy Policy</a>
                        <a href="#" class="text-secondary-400 hover:text-white transition-colors">Terms of Service</a>
                        <a href="#" class="text-secondary-400 hover:text-white transition-colors">Cookie Policy</a>
                    </div>
                    
                    <!-- Back to Top Button -->
                    <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                            class="p-2 bg-secondary-800 hover:bg-primary-600 rounded-lg transition-colors group no-print"
                            aria-label="Back to top">
                        <svg class="w-4 h-4 text-secondary-400 group-hover:text-white transition-colors" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 10l7-7m0 0l7 7m-7-7v18" />
                        </svg>
                    </button>
                </div>
            </div>
        </div>
    </footer>
</body>
</html>