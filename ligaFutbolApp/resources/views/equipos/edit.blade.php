<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Liga Futbol App</title>
  </head>
  <body>

    <x-navbar/>
    
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

        <h1> Editar Equipo {{$equipo->id}}</h1>
                
        <form action="/equipos/{{ $equipo -> id}}" method="post">
        @csrf
        @method('PUT')
            <!-- https://laravel.com/docs/8.x/blade#method-field -->
            <div class="row g-3">
                <label for="name">Nombre Equipo</label>
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Name" aria-label="name" name="name" value="{{$equipo->nombre}}">
                </div>
            </div>

                <button type="submit" class="btn btn-primary my-4">Update</button>
                
            <form>
                            
    </div>