<?php

    include './connection.php';

    $id = $_GET['id'];

    $product = new conn();

    $sql = "DELETE FROM compra WHERE id='$id' ";

    $connection = new conn();

    $deleteProduct = $connection->create();

    $deleteProduct->query($sql);

    $connection->close($deleteProduct);
    
    header("location: index.php");

?>