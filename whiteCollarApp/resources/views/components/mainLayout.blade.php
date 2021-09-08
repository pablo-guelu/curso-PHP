<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.80.0">
    <title>WhiteCollar App</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.6/examples/album/">

    

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">



    <!-- Favicons -->
<link rel="apple-touch-icon" href="/docs/4.6/assets/img/favicons/apple-touch-icon.png" sizes="180x180">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-32x32.png" sizes="32x32" type="image/png">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon-16x16.png" sizes="16x16" type="image/png">
<link rel="manifest" href="/docs/4.6/assets/img/favicons/manifest.json">
<link rel="mask-icon" href="/docs/4.6/assets/img/favicons/safari-pinned-tab.svg" color="#563d7c">
<link rel="icon" href="/docs/4.6/assets/img/favicons/favicon.ico">
<meta name="msapplication-config" content="/docs/4.6/assets/img/favicons/browserconfig.xml">
<meta name="theme-color" content="#563d7c">


    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>

    
    <!-- Custom styles for this template -->
    <link href="album.css" rel="stylesheet">
  </head>
  <body>
    
        <header>
            <div>
                <!-- No surplus words or unnecessary actions. - Marcus Aurelius -->
                <nav class="navbar navbar-light m-4">

                    <div class="container-fluid ">

                    @if (Auth::user())
                        <span class="navbar-brand mb-0 h1">Logged in as {{ Auth::user()->name }}</span>
                        <span>
                            <a href="/stores"> <button class="btn btn-success btn-lg">Stores</button></a>
                            <a href="/"> <button class="btn btn-success btn-lg">Home</button></a>
                            <a href="/paints"> <button class="btn btn-success btn-lg">Paints</button></a>
                        </span>
                        <div class="row">
                            <!-- <div class="col-sm">
                            <a href="/login" style="text-decoration: none">
                                <button type="button" class="btn btn-primary">Login</button>
                            </a>
                            </div> -->
                            <div class="col-sm">
                                <form action="/logout" method='post'>
                                @csrf
                                    <button type="submit" class="btn btn-primary">Logout</button>
                                </form>
                            </div>
                        </div>
                    @else
                        <div class="row">
                            <div class="col-sm">
                                <a href="/login" style="text-decoration: none">
                                    <button type="button" class="btn btn-primary">Login</button>
                                </a>
                            </div>
                            <div class="col-sm">
                                <a href="/register" style="text-decoration: none">
                                    <button type="button" class="btn btn-primary">Register</button>
                                </a>
                            </div>
                        </div>
                    @endif

                    </div>
                </nav>
            </div>
        </header>

        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


        {{ $slot }}

        <footer class="text-muted">
            <div class="container">
            
            </div>
        </footer>

        <script src="{{ mix('js/app.js') }}"></script>
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

        <script>
            // let thisUrl = window.location.href;
            // let url = new URL(thisUrl);
            // let storeDefaultId = url.searchParams.get('id');
            // console.log(storeDefaultId);

            // let storeSelect = document.getElementById('storeId');
            // console.log(storeSelect.value);

            // $(function(){
            //     storeSelect.value = storeDefaultId;
            // });
            
            // console.log(storeSelect.value);
        </script>
    </body>
</html>