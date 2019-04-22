var elixir = require('laravel-elixir');

elixir(function (mix) {
    mix.sass('app.scss' )

        .styles([


            'bootstrap.css',
            'bootstrap.min.css',
            'bootstrap.css.map',
            'bootstrap.min.css.map',
            'bootstrap-colorpicker.css',
            'bootstrap-datepicker.css',
            'bootstrap-theme.css',
            'bootstrap-grid.css',
            'bootstrap-grid.css.map',
            'bootstrap-grid.min.css',
            'bootstrap-grid.min.css.map',
            'bootstrap-reboot.css',
            'bootstrap-reboot.css.map',
            'bootstrap-reboot.min.css',
            'bootstrap-reboot.min.css.map',
            'font-awesome.css',
            'font-awesome.min.css',
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
            'xcharts.min.css',
            'aeessui.css'

        ], 'public/css/libs.css')


        .scripts([

            'app.js',
            'bootstrap.js',
            'aeessui.js'

        ], 'public/js/libs.js')


});