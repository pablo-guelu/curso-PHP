<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <title>Employees App</title>
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
    <br>
    <br>
    <h1> Employee Information: </h1>
    <br>
    <div>
        <div class="card" style="width: 18rem;">
            <div class="card-body">
                <h4 class="card-title">{{ $employee->name }}</h4>
                <h5 class="card-subtitle mb-2 text-muted">{{ $employee->job }}</h5>
                <h6> {{ $employee->department }}</h6>
                <h6> {{ $employee->email }}</h6>
                <h6> {{ $employee->phone }}</h6>
                <h6> {{ $employee->address }}</h6>
   
            </div>
        </div>
    </div>



</body>
</html>