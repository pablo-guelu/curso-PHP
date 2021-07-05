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

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <h1>Employees working as {{$job}}</h1>
    <br>
    <br>

    <div class='container-fluid'>
    @if (count($employees) > 0)
        @foreach ($employees as $employee)
            <h3> {{ $employee->id }}: {{ $employee->name }}  -  {{ $employee->job }}</h3>
            <br>
            <br>
        @endforeach
    @else 
    <h3> There are no employees with that Job</h3>
    @endif
    </div>
</body>
</html>