<?php
session_start();

require_once "../../conexion/conn_db.php";

if(isset($_SESSION['nombre_usuario'])){
    $nombre = $_SESSION['nombre'];
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $rol = $_SESSION['rol'];
}else{
    header("Location: ../../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Confirma la habilitacion</title>
</head>
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
<body>
    <div id="cuerpoalert">
    <?php
    if($_POST){
        $id = $_POST['id'];

        $actEstatus = "UPDATE usuarios SET estatus = 1 WHERE id = {$id}";

        if($conexion->query($actEstatus) === TRUE ){
            echo "<p class='fs-2'>Se ha habilitado correctamente al usuario</p>
                    <br>
                    <hr>
                    <a href='../usuarios.php' class='btn btn-outline-success btn-lg'>Regresar a usuarios</a>
                    ";
        }else{
            echo "ERROR: " . $actEstatus . " " . $conexion->error;

        }
        $conexion->close();
    }
    
    
    ?>
    </div>
</body>
</html>