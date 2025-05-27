/** @type {import('vite').UserConfig} */
export default {
  server: {
    hmr: {
      host: 'localhost',
    },
  },
  build: {
    outDir: 'public/assets',
    emptyOutDir: true,
    manifest: true,
    rollupOptions: {
      input: {
        app: 'resources/js/app.js',
        style: 'resources/css/app.css'
      },
      output: {
        entryFileNames: '[name].[hash].js',
        chunkFileNames: '[name].[hash].js',
        assetFileNames: (assetInfo) => {
          const info = assetInfo.name.split('.');
          const ext = info[info.length - 1];
          if (/\.(css)$/.test(assetInfo.name)) {
            return `css/[name].[hash][extname]`;
          }
          if (/\.(png|jpe?g|svg|gif|tiff|bmp|ico)$/i.test(assetInfo.name)) {
            return `images/[name].[hash][extname]`;
          }
          if (/\.(woff2?|eot|ttf|otf)$/i.test(assetInfo.name)) {
            return `fonts/[name].[hash][extname]`;
          }
          return `[name].[hash][extname]`;
        }
      }
    },
    sourcemap: true,
    minify: 'esbuild',
  },
  css: {
    devSourcemap: true,
  },
}