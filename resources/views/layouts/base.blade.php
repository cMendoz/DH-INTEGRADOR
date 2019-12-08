<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8" name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/css/style.css">
    <link rel="stylesheet" href="/css/<?=$css?>">
    <link href="https://fonts.googleapis.com/css?family=Titillium+Web&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Plaster&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat&display=swap" rel="stylesheet">

    <title>NÓMADE</title>
  </head>
  <body>
    <header>
      @include('layouts.header')
    </header>

    <main>
      <section class="mapa"></section>
      
      @yield('contenido')
    </main>

    <footer>
      @include('layouts.footer')
    </footer>
  </body>

  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <script src="js/animations.js"></script>

  @if (isset($script))
    {!! $script !!}
  @endif
</html>
