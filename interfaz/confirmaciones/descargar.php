<?php
require_once "../../conexion/conn_db.php";
require_once "../confirmaciones/confirm_registro.php";

$id = $_GET['id'];



echo "<div class='d-flex justify-content-center align-items-center full-height'>
<div class='alert alert-success text-center' role='alert'>
  <p>Los datos se han ingresado correctamente</p>
  <hr>
  <div class='d-flex justify-content-between'>
    <a href='../../qR/descargarQR.php?id='" . $id . "' class='btn btn-secondary'>Descargar QR</a>
  </div>
</div>
</div>";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <title>Descargar</title>
</head>
<body>
  
</body>
</html>