mix.js('resources/js/app.js', 'public/js')
   .sass('resources/sass/app.scss', 'public/css')
   .copy('node_modules/slick-carousel/slick/slick.css', 'public/css/slick.css')
   .copy('node_modules/slick-carousel/slick/slick-theme.css', 'public/css/slick-theme.css')
   .copy('node_modules/slick-carousel/slick/slick.min.js', 'public/js/slick.min.js');
