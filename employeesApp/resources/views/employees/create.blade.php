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

        <h1> Crear Registro Empleado </h1>
                
        <form action="/employees" method="post">
        @csrf
            <!-- https://laravel.com/docs/8.x/blade#method-field -->
                <div class="row g-3">
                <div class="col-sm-5">
                    <input type="text" class="form-control" placeholder="Name" aria-label="name" name="name">
                    </div>
                <div class="col-sm">
                    <input type="text" class="form-control" placeholder="Department" aria-label="department" name="department">
                    </div>
                <div class="col-sm">
                    <input type="year" class="form-control" placeholder="Job" aria-label="job" name="job">
                </div>
                </div>
                <div class="form-group col-sm-5 my-3">
                    <label for="inputEmail4">Email</label>
                    <input type="email" name="email" class="form-control" id="">
                </div>
                <div class="form-group col-sm-5 my-3">
                    <label for="inputPassword4">Phone</label>
                    <input type="phone" name="phone" class="form-control" id="">
                </div>
                
                <div class="form-group col-sm-5">
                    <label for="inputAddress">Address</label>
                    <input type="text" name="address" class="form-control" id="">
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