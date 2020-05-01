<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Sona Template">
    <meta name="keywords" content="Sona, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    @include('user/partials/link')
</head>

<body>
    @include('user/partials/menusection')

    <!-- Header Section Begin -->
    <header class="header-section">
        @include('user/partials/header')
    </header>
    <!-- Header End -->


    @yield('content')

     <!-- Footer Section Begin -->
    <footer class="footer-section">
        @include('user/partials/footer')
    </footer>
    <!-- Footer End -->

   @include('user/partials/script')
</body>

</html>
