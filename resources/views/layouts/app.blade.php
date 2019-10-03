<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests">

        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>BlackHansa - Fleet Management</title>

        <link rel="shortcut icon" href="https://blackhansa.de/icon.png">

        <link href="{{ asset('css/owl/owl.carousel.css') }}" rel="stylesheet">

        <link href="{{ asset('css/style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <!-- Bootstrap 4 -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">
    </head>

    <body>
    <div class="ui" id="app">
        <div id="header">
            @include('partials._header')
        </div>

        <aside id="aside" class="aside--dark">
            @include('partials._aside')
        </aside>

        <div id="content" class="">
            <div class="content-body">
                <div class="ui-container">
                    <div class="content-body">
                        <div class="ui-container">
                            <transition name="fade" mode="out-in">
                                <!-- Content section -->
                                    @yield('content')
                                <!-- End Content -->
                            </transition>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

    <script src="{{ asset('js/app.js') }}" defer></script>

    <script src="{{ asset('js/owl/owl.carousel.js') }}" defer></script>

    <script src="{{ asset('js/main.js') }}" defer></script>

    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyColJ2SXghtrn8OccREfBBwdDPePid5aus&libraries=places"></script>

    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('pickup-address'));
            google.maps.event.addListener(places, 'place_changed', function () {

            });
        });
    </script>
    <script type="text/javascript">
        google.maps.event.addDomListener(window, 'load', function () {
            var places = new google.maps.places.Autocomplete(document.getElementById('dropoff-address'));
            google.maps.event.addListener(places, 'place_changed', function () {

            });
        });
    </script>

    </body>
</html>
