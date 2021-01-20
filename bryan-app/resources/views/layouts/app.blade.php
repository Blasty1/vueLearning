<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Text</title>

   
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
      <link href="{{ asset('css/home/app.css') }}" rel="stylesheet">

      
</head>
<body>
@yield('content')
      <!-- Scripts -->
      <script src="/js/app.js"></script>
</body>
</html>