var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.sass('resources/sass/app.scss','public/css' )
        .styles([


            'bootstrap.min.css',
            'bootstrap-colorpicker.css',
            'bootstrap-datepicker.css',
            'bootstrap-theme.css',
            'font-awesome.css',
            'daterangepicker.css',
            'elegant-icons-style.css',
            'fullcalendar.css',
            'jquery-jvectormap-1.2.2.css',
            'jquery-ui-1.10.4.min.css',
            'line-icons.css',
            'owl.carousel.css',
            'style.css',
            'style-responsive.css',
            'widgets.css',
            'xcharts.min.css'

        ], 'public/css')


        .scripts([

            'bootstrap.js'

        ], 'public/js')


});