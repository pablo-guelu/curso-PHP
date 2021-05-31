<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Add Product</title>
  </head>
    <body>

        <div class='container-fluid'>

            <h1>New Product</h1>

            <div class="container-fluid my-5">
                
                <form action="" method="post">  

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

        <?php

        include_once './connection.php';

        if( isset($_POST['product']) && isset($_POST['quantitat']) && isset($_POST["preu"]) ) {

            $nom = $_POST["product"];
            $quantitat = $_POST["quantitat"];
            $preu = $_POST["preu"];

            $sql = "INSERT INTO compra (nom, quantitat, preu) VALUES ('$nom', '$quantitat', '$preu')";

            $connection = new conn();
            $newProduct = $connection->create();
            $newProduct->query($sql);
            $connection->close($newProduct);
            header("location: index.php");

        }        
    ?>


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

