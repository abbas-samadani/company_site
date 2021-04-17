const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel applications. By default, we are compiling the CSS
 | file for the application as well as bundling up all the JS files.
 |
 */

 mix.styles([    
    'resources/views/front/lib/bootstrap/css/bootstrap.min.css',
     //'resources/views/front/lib/font-awesome/css/font-awesome.min.css',
     'resources/views/front/lib/animate/animate.min.css',
     'resources/views/front/lib/ionicons/css/ionicons.min.css',
     'resources/views/front/lib/owlcarousel/assets/owl.carousel.min.css',
     'resources/views/front/lib/lightbox/css/lightbox.min.css',
     'resources/views/front/css/style.css'
 ],
  'public/front/css/app.css'
  )

 
mix.scripts([
    'resources/views/front/lib/jquery/jquery.min.js',
    'resources/views/front/lib/jquery/jquery-migrate.min.js',
    'resources/views/front/lib/bootstrap/js/bootstrap.bundle.min.js',
    'resources/views/front/lib/easing/easing.min.js',
    'resources/views/front/lib/mobile-nav/mobile-nav.js',
    'resources/views/front/lib/wow/wow.min.js',
    'resources/views/front/lib/waypoints/waypoints.min.js',
    'resources/views/front/lib/counterup/counterup.min.js',
    'resources/views/front/lib/owlcarousel/owl.carousel.min.js',
    'resources/views/front/lib/isotope/isotope.pkgd.min.js',
    'resources/views/front/contactform/contactform.js',
    'resources/views/front/js/main.js'
],

    'public/front/js/app.js'
);
