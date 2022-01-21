<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="CONFIGURATOR Multipurpose Working Configurator Wizard">
    <meta name="author" content="Ansonika">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>CONFIGURATOR | Multipurpose Working Configurator Wizard</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114"
          href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144"
          href="img/apple-touch-icon-144x144-precomposed.png">
{{--    <link href="{{ asset('css/app.css') }}" rel="stylesheet">--}}
<!-- GOOGLE WEB FONT -->
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed:300,300,400,400i,700" rel="stylesheet">
    <!-- Scripts -->
{{--    <script src="{{ asset('js/app_org.js') }}" defer></script>--}}
<!-- BASE CSS -->
    {{--	<link href= "{{ asset('css/bootstrap.css') }}" rel="stylesheet">--}}

    <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/newstyle.css') }}" rel="stylesheet">
    <link href="{{ asset('css/menu.css') }}" rel="stylesheet">
    <link href="{{ asset('css/vendors.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/icon_fonts/css/all_icons.css') }} " rel="stylesheet">
    <link href="{{ asset('css/skins/square/grey.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <!-- Fonts -->

    <!-- YOUR CUSTOM CSS -->
    {{--	<link href= "/css/custom.css " rel="stylesheet">--}}

    <script src="{{ asset('js/modernizr.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <style>
        body {
            font-family: 'Source Sans Pro', sans-serif;
            /*font-family: 'Nunito', sans-serif;*/
        }
    </style>
    <!-- Modernizr -->
</head>
<body id="background_5">
<div id="app">
    @include('flash-message')
    @yield('content')
</div>

<header>
    <div class="block">

            @include('layouts.navigation')
{{--            <div class="col-6 ml-4">--}}
{{--                <span>Support Design AB | Konfigurator</span>--}}
{{--            </div>--}}

{{--            <div class="col-6">--}}
{{--            </div>--}}

    </div>
    <!-- /container -->
</header>
<main>
    <div class="container">
        <div id="wizard_container">
            <form name="example-1" id="wrapped" method="POST">
                @csrf
                <input id="website" name="website" type="text" value="">
                <!-- Leave for security protection, read docs for details -->
                <div class="row">
                    <div class="col-lg-7">
                        <div class="theiaStickySidebar">
                        <div id="middle-wizard">
                            <div id="modelval" class="step">
                                <div class="question_title">
                                    <h3>Steg 1 - Välj modell  </h3>
                                    <p>Välj önskad modell - i nästa steg gör du materialval</p>
                                </div>
                                @yield('model')
                            </div>
                            <div id="colorval" class="step">
                                <div class="question_title">
                                    <h3>Steg 2 - Välj önskad färg </h3>
                                    <p>Ett val är möjligt - tillbehör väljs i nästa steg</p>
                                </div>
                                @yield('colors')
                            </div>
                            <div id="pillarval" class="step">
                                <div class="question_title">
                                    <h3>Steg 3 - Välj önskad pelare</h3>
                                    <p>Ett val är möjligt - tillbehör väljs i nästa steg</p>
                                </div>
                                @yield('pillar')
                            </div>
                            <div id="gadgetval" class="step">
                                <div class="question_title">
                                    <h3>Steg 4 - Välj tillbehör</h3>
                                    <p>Flera val är möjligt. Klicka igen för att bocka av.</p>
                                </div>
                                @yield('gadgets')
                            </div>

                            <div class="submit step">
                                <div class="question_title">
                                    <h3>Vänligen fyll i dina kontaktuppgifter</h3>
                                    <p>Lorem ipsum dolor sit amet.</p>
                                </div>
                                @yield('laststep')
                            </div>
                        </div>
                        <!-- /Wizard container -->
                    </div>
                    </div>
{{--                    class log8--}}
                    <div class="col-lg-5" id="sidebar">
                        <div class="theiaStickySidebar">
                        <div id="bottom-wizard">
                            {{--                            todo check order summary for next step?--}}
                            <div id="order_summary"></div>
                            <div class="clearfix buttons">
                                <button type="button" name="backward" class="backward">Tillbaka</button>
                                <button type="button" name="forward" class="forward">N&auml;sta</button>
                                <button type="submit" name="process" class="submit">Beställ</button>
                            </div>
                        </div>
                        <!-- /bottom-wizard -->
                        <input type="hidden" id="hidden_total" name="hidden_total">
                        <!-- /Hidden total input -->
                        </div>
                    </div>
                </div>
{{--            row--}}
            </form>
{{--            formend--}}
        </div>
{{--            end wizard container--}}
    </div>
    <!-- /Container -->
</main>
{{--                    main--}}
@yield('footer')
{{--<div class="cd-overlay-nav">--}}
{{--    <span></span>--}}
{{--</div>--}}
{{--<!-- /cd-overlay-nav -->--}}

{{--<div class="cd-overlay-content">--}}
{{--    <span></span>--}}
{{--</div>--}}
{{--<!-- /cd-overlay-content -->--}}

{{--<a href="#0" class="cd-nav-trigger">Menu<span class="cd-icon"></span></a>--}}
<!-- /cd-nav-trigger -->

<!-- Modal terms -->
<div class="modal fade" id="terms-txt" tabindex="-1" role="dialog" aria-labelledby="termsLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="termsLabel">Terms and conditions</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in <strong>nec quod novum accumsan</strong>, mei
                    ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne
                    quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                    dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                    sensibus. Lorem ipsum dolor sit amet, <strong>in porro albucius qui</strong>, in nec quod novum
                    accumsan, mei ludus tamquam dolores id. No sit debitis meliore postulant, per ex prompta alterum
                    sanctus, pro ne quod dicunt sensibus.</p>
                <p>Lorem ipsum dolor sit amet, in porro albucius qui, in nec quod novum accumsan, mei ludus tamquam
                    dolores id. No sit debitis meliore postulant, per ex prompta alterum sanctus, pro ne quod dicunt
                    sensibus.</p>
            </div>
        </div>
    </div>
</div>
<!-- /Modal terms -->

<!-- COMMON SCRIPTS -->

                    <!-- COMMON SCRIPTS -->

                <script src="{{ asset('js/jquery-3.6.0.min.js') }}"></script>
                <script src= "{{ asset('js/order.js') }}"></script>
                <script src="{{ asset('js/common_scripts.js') }}"></script>

                <script src="{{ asset('js/menu.js') }}"></script>
                <script src="{{ asset('js/main.js') }}"></script>
                <script src="{{ asset('js/wizard_func_1.js') }}"></script>
                <script src="{{ asset('js/theia-sticky-sidebar.js') }}"></script>
                    <script type="text/javascript">
                        jQuery(document).ready(function() {
                            jQuery("#sidebar").theiaStickySidebar({
                                // Settings
                                additionalMarginTop: 30
                            });
                        });
                    </script>
              {{--  <script type="text/javascript">

                    let theiaStickySidebar = jQuery('#sidebar').theiaStickySidebar({
                        additionalMarginTop: 0
                    });
                </script>--}}
</body>
</html>
