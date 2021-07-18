<!DOCTYPE html>
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
        <a href="/">
        <h2>HOME</h2>
        </a>
    </div>

    <div class='container-fluid'>
        <a href="/equipos/create">
            <button type="button" class="btn btn-success mb-5">Agregar Equipo</button>
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

    <h1>Lista Equipos</h1>
    <br>
    <br>

    <div class='container-fluid'>
        @foreach ($equipos as $equipo)
            <h3> {{ $equipo->id }}: {{ $equipo->nombre }}</h3>
            <br>
            <div class='container-fluid flex-row mb-2'>
                @can ('update', $equipo)
                <a href="/equipos/{{$equipo->id}}/edit" style="text-decoration: none">
                    <button type="button" class="btn btn-info">Editar equipo</button>
                </a>
                @endcan
                <a href="/equipos/{{$equipo->id}}">
                    <button type="button" class="btn btn-secondary" style="text-decoration: none">Equipo Info</button>
                </a>
            </div>
            <div class='container-fluid mb-4'>
                @can ('delete', $equipo)
                <form action="/equipos/{{$equipo->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Borrar equipo</button>
                </form>
                @endcan
            </div>
            
        @endforeach
    </div>
</body>
</html>