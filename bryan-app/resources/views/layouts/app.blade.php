<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Text</title>
    <link rel="stylesheet" href="css/home/app.css">
      <!-- Scripts -->
      <script src="{{ asset('js/app.js') }}" defer></script>
   
      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>
<body>
<div class="container-l">
    <div class="row">
    
    <div class="col-xl">
    <div class="containter">
<ul class="nav justify-content-end">
  <li class="nav-item">
    <a class="nav-link active" aria-current="page" href="#">Active</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link" href="#">Link</a>
  </li>
  <li class="nav-item">
    <a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Disabled</a>
  </li>
</ul>
</div>
</div>
    <div class="col-xl">gdgf</div>
    <div class="col-xl">gffgf</div>

    </div>


</div>
</div>
<div class="container-md test">
<h1>Test22</h1>
</div>

<div class="container">
    <div class="row test2 justify-content-center">
      <div class="col-2 col-md-5-">Texesd</div>
      <div class="col-2">sdaasd</div>
      <div class="col-2">sdasdasd</div>
      <div class="col-2">sdasfdsakl</div>
      <div class="col-12 justify-content-center">
      <button class='btn btn-outline-primary btn-sm'>Invia</button>
    </div>
    </div>
  </div>
</div>
@yield('content')
</body>
</html>