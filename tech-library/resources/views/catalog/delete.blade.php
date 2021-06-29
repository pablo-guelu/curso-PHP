<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <x-navbar/>

    <div class="container-fluid my-5">
        <h2>Today is: {{$date}}</h2>
    </div>
    
    <div class="container-fluid my-5">

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

        <h1> Borrar Libro {{$id}}</h1>
                
            <form action="{{ route('catalog.deletePost', ['id' => $id ]) }}" method="post">
            <!-- https://laravel.com/docs/8.x/blade#method-field -->
                @method('DELETE') 

                <button type="submit" class="btn btn-primary my-4">Delete</button>
                
            <form>
                            
    </div>