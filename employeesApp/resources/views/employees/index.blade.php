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
        <h2>HOME</h2>
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
        <a href="/employees/create">
            <button type="button" class="btn btn-success mb-5">Add New Employee</button>
        </a>
        <form action="/employees/search" class="form-inline col-sm-5" method="post">
        @csrf
            <label for="job">Search Employees by Job</label>
            <input name="job" class="form-control mt-2" type="search" placeholder="Search Employees by Job" aria-label="Search">
            <button class="btn btn-outline-success mt-2" type="submit">Search</button>
        </form>
    </div>

    <br>
    <br>

    <h1>Employees List</h1>
    <br>
    <br>

    <div class='container-fluid'>
        @foreach ($employees as $employee)
            <h3> {{ $employee->id }}: {{ $employee->name }}  -  {{ $employee->job }}</h3>
            <br>
            <div class='container-fluid flex-row mb-2'>
                <a href="/employees/{{$employee->id}}/edit" style="text-decoration: none">
                    <button type="button" class="btn btn-info">Edit employee</button>
                </a>
                <a href="/employees/{{$employee->id}}">
                    <button type="button" class="btn btn-secondary" style="text-decoration: none">Employee Information</button>
                </a>
            </div>
            <div class='container-fluid mb-4'>
                <form action="/employees/{{$employee->id}}" method="post">
                    @csrf
                    @method('delete')
                    <button type="submit" class="btn btn-danger">Delete employee</button>
                </form>
            </div>
            
        @endforeach
    </div>
</body>
</html>