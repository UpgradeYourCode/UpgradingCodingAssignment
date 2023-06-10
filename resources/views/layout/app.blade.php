<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Viga&display=swap" rel="stylesheet">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
    <!-- <link rel="stylesheet" href="{{ asset('css/style.css') }}"> -->

    <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script> -->

    <script src="{{ asset('js/jquery-3.5.1.min.js') }}"></script>
    <!-- <script src="{{ asset('js/booststrap.js') }}"></script> -->
    <script src="{{ asset('js/bootstrap.min.js') }}"></script>
    <!-- <script type="text/javascript" src="{{ asset('js/script.js') }}"></script> -->

    <link href="{{ asset('lightbox2/dist/css/lightbox.min.css') }}" rel="stylesheet" />
    <!-- <link href="{{ asset('lightbox/dist/js/lightbox-plus-jquery.min.js') }}" rel="stylesheet" /> -->
    <title>@yield('title')</title>

</head>
@include('layout.navbar')
@yield('content')

</html>