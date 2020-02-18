module.exports = {
  // proxy API requests to Valet during development
  devServer: {
    proxy: 'http://mspace.local/admin'
  },

  // output built static files to Laravel's public dir.
  // note the "build" script in package.json needs to be modified as well.
  outputDir: '../public/admin-assets',

  // modify the location of the generated HTML file.
  // make sure to do this only in production.
  indexPath: process.env.NODE_ENV === 'production'
    ? '../../resources/views/admin/index.blade.php'
    : 'index.html',
  publicPath: process.env.NODE_ENV === 'production'
    ? '/admin-assets/'
    : '/'
}
