<!DOCTYPE html>
<html lang="sr" prefix="og: http://ogp.me/ns#">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Predrag Gajić">

    <title>Volonteri2020</title>
    <meta property="og:title" content="Volonteri2020"/>
    <meta property="og:description" content="Besplatan servis za lakše organizovanje volontera"/>
    <meta property="og:type" content="website"/>
    <meta property="og:url" content="{{url('/')}}"/>
    <meta property="og:image" content="{{url('/logo.png')}}"/>
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
