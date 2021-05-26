<?php

    include_once './connection.php';

    $nom = $_POST["product"];
    $quantitat = $_POST["quantitat"];
    $preu = $_POST["preu"];

    $sql = "INSERT INTO compra (nom, quantitat, preu) VALUES ($nom, $quantitat, $preu)";

    // $conn->connect();
    $conexion = new conn();
    $conexion->query($sql) or die ($conn->error);
    $conexion->close();
    header("location: index.php");
?>