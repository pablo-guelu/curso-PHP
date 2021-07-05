<!doctype html>
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

        <h1> Editar información Empleado {{$employee->id}}</h1>
                
        <form action="/employees/{{ $employee -> id}}" method="post">
        @csrf
        @method('PUT')
            <!-- https://laravel.com/docs/8.x/blade#method-field -->
                <div class="row g-3">
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Name" aria-label="name" name="name" value="{{ $employee->name }}">
                    </div>
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="Department" aria-label="department" name="department" value="{{ $employee->department }}">
                    </div>
                <div class="col-sm">
                    <input type="year" class="form-control" placeholder="Job" aria-label="job" name="job" value="{{ $employee->job }}">
                </div>
                </div>
                <div class="form-group col-sm-5 my-3">
                    <label for="inputEmail4">Email</label>
                    <input name="email" type="email" class="form-control" id="" value="{{ $employee->email }}">
                </div>
                <div class="form-group col-sm-5 my-3">
                    <label for="inputPassword4">Phone</label>
                    <input name="phone" type="phone" class="form-control" id="" value="{{ $employee->phone }}">
                </div>
                
                <div class="form-group col-sm-5">
                    <label for="inputAddress">Address</label>
                    <input name="address" type="text" class="form-control" id="" value="{{ $employee->address }}">
                </div>

                <button type="submit" class="btn btn-primary my-4">Update</button>
                
            <form>
                            
    </div>