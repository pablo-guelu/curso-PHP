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

        <h1> Editar Partido </h1>

        <h4>  {{ $user->role }} </h4>

        <form action="/partidos/{{ $partido->id }}" method="post">
        @csrf
        @method('PUT')
                <div class="col-sm-3">
                    <label for="inputDate">Fecha</label>
                    <input type="date" class="form-control" aria-label="job" name="fecha" value="{{ \Carbon\Carbon::parse($partido->fecha)->format('Y-m-d') }}">
                </div>
                
                <div class="form-group col-sm-5 my-3">
                    <label for="inputEmail4">Lugar</label>
                    <input type="text" name="lugar" class="form-control" id="" value="{{$partido->lugar}}">
                </div>

                <div class="form-check">
                    <input type="checkbox" name="terminado" class="form-check-input" id="exampleCheck1" value="{{$partido->terminado}}">
                    <label class="form-check-label" for="exampleCheck1">Terminado</label>
                </div>
                
                <div class="row g-3 my-3">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="nombre equipo local" aria-label="name" name="local" value="{{$partido->equipo_local}}">
                    </div>
                    <div class="col-sm-1">
                        <input type="number" class="form-control" placeholder="goles" aria-label="department" name="goles-local" value="{{$partido->goles_local}}">
                    </div>
                </div>

                <div class="row g-3 my-3">
                    <div class="col-sm-3">
                        <input type="text" class="form-control" placeholder="nombre equipo visitante" aria-label="name" name="visita" value="{{$partido->equipo_visita}}">
                    </div>
                    <div class="col-sm-1">
                        <input type="number" class="form-control" placeholder="goles" aria-label="department" name="goles-visita" value="{{$partido->goles_visita}}">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary my-4">Save</button>
                
            <form>
                  
    </div>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>