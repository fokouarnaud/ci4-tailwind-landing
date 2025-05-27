</main>
    <footer class="bg-gray-800 text-white">
        <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-8">
                <div>
                    <h3 class="text-xl font-bold mb-4">IT-Innov</h3>
                    <p class="text-gray-300">
                        <?= lang('Main.intro') ?>
                    </p>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4"><?= lang('Main.contact') ?></h3>
                    <ul class="text-gray-300 space-y-2">
                        <li>Email: contact@it-innov.com</li>
                        <li>Tel: +237 123 456 789</li>
                        <li>Douala, Cameroun</li>
                    </ul>
                </div>
                <div>
                    <h3 class="text-xl font-bold mb-4"><?= lang('Main.follow_us') ?></h3>
                    <div class="flex space-x-4">
                        <a href="#" class="text-gray-300 hover:text-white">
                            <span class="sr-only">Facebook</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M18.77,7.46H14.5v-1.9c0-.9.6-1.1,1-1.1h3V.5h-4.33C10.24.5,9.5,3.44,9.5,5.32v2.15h-3v4h3v12h5v-12h3.85l.42-4Z"/>
                            </svg>
                        </a>
                        <a href="#" class="text-gray-300 hover:text-white">
                            <span class="sr-only">LinkedIn</span>
                            <svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M20.447,20.452H16.893V14.883c0-1.328-.027-3.037-1.852-3.037-1.853,0-2.136,1.445-2.136,2.939v5.667H9.351V9h3.414v1.561h.046c.477-.9,1.637-1.85,3.37-1.85c3.601,0,4.267,2.37,4.267,5.455v6.286ZM5.337,7.433c-1.144,0-2.063-.926-2.063-2.065a2.064,2.064,0,1,1,4.127,0c0,1.139-.919,2.065-2.064,2.065Zm2.033,13.019H3.3V9H7.37Z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>
            <div class="mt-8 pt-8 border-t border-gray-700 text-center text-gray-400">
                <p>&copy; <?= date('Y') ?> IT-Innov. <?= lang('Main.rights') ?></p>
            </div>
        </div>
    </footer>
    <script>
        // Mobile menu toggle
        document.getElementById('mobile-menu-button').addEventListener('click', function() {
            document.getElementById('mobile-menu').classList.toggle('hidden');
        });
    </script>
</body>
</html>