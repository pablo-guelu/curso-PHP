<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">

    <title>Modify Product</title>
  </head>
    <body>

        <?php

            include './connection.php';
        
            $id = $_GET['id'];

            $product = new conn();

            $sql = 'SELECT * from compra WHERE id=' . $id;

            $result = $product->create()->query($sql);

            $data = $result -> fetch_assoc();

        ?>

        <div class='container-fluid'>

            <h1>Selected Product</h1>

            <div class="container-fluid my-5">
                
                <form action="" method="post">  

                <div class="row g-3">
                    <div class="col-sm-5">
                    <input type="text" class="form-control" value="<?php echo $data['nom'] ?>" aria-label="product" name="product" required="true">
                    </div>
                    <div class="col-sm">
                    <input type="number" class="form-control" value="<?php echo $data['quantitat'] ?>" aria-label="quantitat" name="quantitat" required="true">
                    </div>
                    <div class="col-sm">
                    <input type="number" class="form-control" value="<?php echo $data['preu'] ?>" aria-label="preu" name="preu" required="true">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary my-4">Save Changes</button>
                
                <form>
                
            </div>
            
        </div>

        <?php

        include_once './connection.php';

        if( isset($_POST['product']) && isset($_POST['quantitat']) && isset($_POST["preu"]) ) {

            $nom = $_POST["product"];
            // echo $nom . "<br>";
            $quantitat = $_POST["quantitat"];
            // echo $quantitat . "<br>";
            $preu = $_POST["preu"];
            // echo $preu . "<br>";

            $sql = "UPDATE compra SET nom = '$nom', quantitat = '$quantitat', preu = '$preu' WHERE id='$id' ";
            // echo $sql . "<br>";

            $connection = new conn();
            $editProduct = $connection->create();
            $editProduct->query($sql);
            $connection->close($editProduct);
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