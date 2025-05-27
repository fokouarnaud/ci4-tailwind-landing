import { defineConfig } from 'vite';
import { resolve } from 'path';

export default defineConfig({
  // Configuration des assets statiques
  publicDir: 'resources/static',
  
  // Configuration du build
  build: {
    outDir: 'public/assets',
    emptyOutDir: true,
    manifest: true,
    
    // Optimisations de performance
    cssCodeSplit: false, // Un seul fichier CSS pour éviter FOUC
    assetsInlineLimit: 0, // Pas d'inline pour un contrôle total
    
    rollupOptions: {
      input: {
        // Point d'entrée principal (CSS importé dans JS)
        main: resolve(__dirname, 'resources/js/app.js'),
      },
      output: {
        // Structure de fichiers optimisée
        entryFileNames: 'js/[name].[hash].js',
        chunkFileNames: 'js/chunks/[name].[hash].js',
        assetFileNames: (assetInfo) => {
          const info = assetInfo.name.split('.');
          const ext = info[info.length - 1];
          
          // Organisation par type de fichier
          if (/css/.test(ext)) {
            return 'css/[name].[hash][extname]';
          }
          if (/\.(png|jpe?g|svg|gif|webp|avif)$/i.test(assetInfo.name)) {
            return 'images/[name].[hash][extname]';
          }
          if (/\.(woff2?|eot|ttf|otf)$/i.test(assetInfo.name)) {
            return 'fonts/[name].[hash][extname]';
          }
          if (/\.(mp4|webm|ogg|mp3|wav|flac|aac)$/i.test(assetInfo.name)) {
            return 'media/[name].[hash][extname]';
          }
          return 'assets/[name].[hash][extname]';
        },
        
        // Optimisation des chunks
        manualChunks: {
          // Séparer les vendors pour un meilleur cache
          vendor: ['alpinejs'],
        },
      },
    },
    
    // Configuration du sourcemap
    sourcemap: process.env.NODE_ENV === 'development',
    
    // Optimisations build
    minify: 'esbuild',
    target: 'es2020',
    reportCompressedSize: true,
    
    // Cache busting pour les assets
    assetsDir: '',
  },
  
  // Configuration CSS
  css: {
    devSourcemap: true,
    postcss: './postcss.config.js',
    preprocessorOptions: {
      scss: {
        additionalData: `@import "./resources/css/variables.scss";`,
      },
    },
  },
  
  // Configuration du serveur de développement
  server: {
    host: 'localhost',
    port: 5173,
    strictPort: true,
    hmr: {
      host: 'localhost',
      port: 5173,
    },
    watch: {
      // Surveiller les changements dans les templates CI4
      include: [
        'app/Views/**/*.php',
        'resources/**/*',
      ],
      ignored: ['**/node_modules/**', '**/vendor/**'],
    },
    cors: true,
  },
  
  // Optimisation des dépendances
  optimizeDeps: {
    include: ['alpinejs'],
    exclude: [],
  },
  
  // Configuration de résolution
  resolve: {
    alias: {
      '@': resolve(__dirname, 'resources'),
      '@css': resolve(__dirname, 'resources/css'),
      '@js': resolve(__dirname, 'resources/js'),
      '@images': resolve(__dirname, 'resources/static/images'),
      '@fonts': resolve(__dirname, 'resources/static/fonts'),
    },
  },
  
  // Variables d'environnement
  define: {
    __DEV__: process.env.NODE_ENV === 'development',
    __PROD__: process.env.NODE_ENV === 'production',
  },
  
  // Configuration des plugins (si nécessaire)
  plugins: [],
});
