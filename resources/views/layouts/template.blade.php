<!doctype html>
<html lang="es">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @yield('css')

    <title>@yield('title')</title>
  </head>
  <body>

    @include('partials.header')

    <div class="container">
        @yield('content')
    </div>

    @yield('js')

  </body>

</html>
