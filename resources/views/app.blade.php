<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
    <link href="{{ mix('/css/app.css') }}" rel="stylesheet" />
    <script src="{{ mix('/js/app.js') }}" defer></script>
  
    <link rel="stylesheet" href="{{ asset('assets/css/styles.css') }}">

  </head>
  <body>
    @inertia

    {{-- JavaScript --}}

    <script src="{{ asset('assets/js/main.js') }}"></script>
    
  </body>
</html>