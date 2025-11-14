<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
<style>
            body {
       background-color: #F2F3ED;
    }

    #cuerpoalert{
            width: 400px;
            height: 300px;
            box-shadow: 1px 2px 3px;
            margin: auto;
            margin-top: 150px;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
        }
</style>

<div id="cuerpoalert">
<?php
require_once "../../conexion/conn_db.php";
$id = $_POST['id'];
$dispositivo = $_POST['dispositivo'];

$inSQL = "INSERT INTO dispositivos (id ,descripcion) VALUES (?,?)";

$stmt = $conexion->prepare($inSQL);
$stmt->bind_param("is",$id, $dispositivo);

if($stmt->execute()){
    echo "<p class='fs-2'>Se agregó un nuevo dispositivo exitosamente</p>
                    <br>
                    <hr>
                    <a href='../registrar_dispo.php' class='btn btn-outline-success btn-lg'>Regresar a agregar equipos</a>
                    ";
}

?>
    </div>
</body>
</html>