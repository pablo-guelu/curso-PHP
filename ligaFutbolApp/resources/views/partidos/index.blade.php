<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>LigaFutbol App</title>
  </head>
  <body>

    <x-navbar/>

    <div class="container-fluid my-5">
        <a href="/">
            <h2>HOME</h2>
        </a>
        
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

    <div class='container-fluid'>
        <a href="/partidos/create">
            <button type="button" class="btn btn-success mb-5">Agregar Partido</button>
        </a>
    </div>

    <br>
    <br>

    <h1>Lista de Partidos</h1>
    <br>
    <br>

    <div class='container-fluid'>
        @foreach ($partidos as $partido)
            <h3>{{ $partido->fecha }} {{ $partido->equipo_local }} vs {{ $partido->equipo_visita }}</h3>
            <br>
            <div class='container-fluid flex-row mb-2'>
                @can ('update', $partido)
                <a href="/partidos/{{$partido->id}}/edit" style="text-decoration: none">
                    <button type="button" class="btn btn-info">Editar Partido</button>
                </a>
                @endcan
                <a href="/partidos/{{$partido->id}}">
                    <button type="button" class="btn btn-secondary" style="text-decoration: none">Detalle Partido</button>
                </a>
            </div>
            <div class='container-fluid mb-4'>
            @can ('delete', $partido)
                <form action="/partidos/{{$partido->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Borrar Partido</button>
                </form>
            @endcan  
            </div>     
        @endforeach
    </div>
</body>
</html>