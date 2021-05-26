<?php
    //https://www.youtube.com/watch?v=PHiu0JA9eqE
    include './connection.php';
    include './table.php';
    include './insereix.php';
    // include 'viewproducts.php';

    $table = new table();
    $products = $table->getProducts();
    // $table->close();
?>



<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Hello, world!</title>
  </head>
  <body>

    <div class='container-fluid'>

    <h1>Table of Products</h1>

      <table class="table table-dark table-striped">
        <thead>
          <tr>
            <th scope="col">ID</th>
            <th scope="col">Nom</th>
            <th scope="col">Quantitat</th>
            <th scope="col">Preu</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
        <!-- https://www.php.net/manual/en/control-structures.alternative-syntax.php -->
          <?php foreach($products as $product): ?>
          <tr>
            <th scope="row"><?php echo $product['id'] ?></th>
            <td><?php echo $product['nom'] ?></td>
            <td><?php echo $product['quantitat'] ?></td>
            <td><?php echo $product['preu'] ?></td>
            <td><?php echo $product['preu']*$product['quantitat'] ?></td>
          </tr>
          <?php endforeach; ?>
        </tbody> 
      </table>

      <div class="container-fluid my-5">
          
        <form action="insereix.php" method="post">  

          <div class="row g-3">
            <div class="col-sm-5">
              <input type="text" class="form-control" placeholder="Product" aria-label="product" name="product">
            </div>
            <div class="col-sm">
              <input type="number" class="form-control" placeholder="Quantitat" aria-label="quantitat" name="quantitat">
            </div>
            <div class="col-sm">
              <input type="number" class="form-control" placeholder="Preu" aria-label="preu" name="preu">
            </div>
          </div>

          <button type="submit" class="btn btn-primary my-4">Add Product</button>
        
        <form>

        
        
      </div>
    
    </div>

    

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.min.js" integrity="sha384-Atwg2Pkwv9vp0ygtn1JAojH0nYbwNJLPhwyoVbhoPwBhjQPR5VtM2+xf0Uwh9KtT" crossorigin="anonymous"></script>
    -->
  </body>
</html>