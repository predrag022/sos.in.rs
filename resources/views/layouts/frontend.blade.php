<!DOCTYPE html>
<html lang="sr" prefix="og: http://ogp.me/ns#">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Besplatan servis za lakše organizovanje volontera">
    <meta name="author" content="Predrag Gajić">
    <title>Volonteri2020</title>
    <meta property="og:title" content="Volonteri2020"/>
    <meta property="og:site_name" content="Volonteri2020"/>
    <meta property="og:description" content="Besplatan servis za lakše organizovanje volontera"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:image" content="{{url('/logo.png')}}"/>

    <link rel="apple-touch-icon" sizes="57x57" href="/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192" href="/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
    <link rel="manifest" href="/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <!-- Bootstrap core CSS -->
    <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="/css/modern-business.css" rel="stylesheet">
    @yield('styles')
</head>

<body>

<!-- Navigation -->
@include('partials.frontend.navigation')

<header>
    @include('partials.frontend.header')
</header>

<!-- Page Content -->
<div class="container">
    @yield('content')

</div>
<!-- /.container -->

<!-- Footer -->
@include('partials.frontend.footer')

<!-- Bootstrap core JavaScript -->
<script src="/vendor/jquery/jquery.min.js"></script>
<script src="/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

@yield('scripts')
</body>

</html>
