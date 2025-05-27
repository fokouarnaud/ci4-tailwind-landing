import { defineConfig } from 'vite';

export default defineConfig({
  // Assets statiques
  publicDir: 'resources/static',
  
  css: {
    devSourcemap: true,
    postcss: './postcss.config.js',
  },
  
  build: {
    outDir: 'public/assets',
    emptyOutDir: true,
    manifest: true,
    assetsInlineLimit: 0,
    
    rollupOptions: {
      input: {
        app: 'resources/js/app.js',
      },
      output: {
        entryFileNames: '[name].[hash].js',
        chunkFileNames: '[name].[hash].js',
        assetFileNames: (assetInfo) => {
          const ext = assetInfo.name.split('.').pop();
          if (/css/.test(ext)) {
            return 'css/[name].[hash][extname]';
          }
          if (/\.(png|jpe?g|svg|gif|webp|avif)$/i.test(assetInfo.name)) {
            return 'images/[name].[hash][extname]';
          }
          if (/\.(woff2?|eot|ttf|otf)$/i.test(assetInfo.name)) {
            return 'fonts/[name].[hash][extname]';
          }
          return '[name].[hash][extname]';
        }
      }
    },
    
    sourcemap: process.env.NODE_ENV === 'development',
    minify: 'esbuild',
    target: 'es2020',
    reportCompressedSize: true,
  },
  
  server: {
    hmr: {
      host: 'localhost',
    },
    watch: {
      include: ['app/Views/**/*.php'],
    },
  },
  
  optimizeDeps: {
    include: ['alpinejs'],
  },
});