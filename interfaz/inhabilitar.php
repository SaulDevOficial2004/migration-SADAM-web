<?php
//INICIAR SESSION
session_start();

//REQUIRE ONCE
require_once "../conexion/conn_db.php";
//SECURYTY URL
if(isset($_SESSION['nombre_usuario'])){
    $nombre = $_SESSION['nombre'];
    $nombreUsusario = $_SESSION['nombre_usuario'];
    $rol = $_SESSION['rol'];
}else{
    header("Location: ../index.php");
    exit();
}
//TOMAMOS EL ID
if($_GET['id']){
    $id = $_GET['id'];
    //SE CONSULTA EN CON LA VARIABLE SQL
    $busSQL = "SELECT * FROM usuarios WHERE id = {$id}";
    $resultado = $conexion->query($busSQL);

    $datos = $resultado->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Inhabilitar</title>
</head>
<style>
    body {
       background-color: #F2F3ED;
    }

    #cuerpoalert{
            width: 400px;
            height: 350px;
            box-shadow: 1px 2px 3px;
            margin: auto;
            margin-top: 150px;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
            background-color: #fff;
        }
        h5{
            font-family: Verdana, Geneva, Tahoma, sans-serif;
        }
</style>
<body>
    <div class="#" id="cuerpoalert">
        <h2>¿Quieres inhabilitar a <?php echo $datos['nombre']; ?>?</h2>
        <h3>Su rol es: <?php echo $datos['rol']; ?></h3>
        <h5 class="text-muted">Advertencia: Este usuario no podra ingresar por medio de sus credenciales hasta que usted habilite sus permisos.</h5>

        <form action="confirmaciones/confirm_off.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
            <hr>
            <button type="submit" class="btn btn-outline-danger">Eliminar</button>
            <a href="usuarios.php" class="btn btn-outline-info">Regresar</a>
        </form>
    </div>
    
</body>
</html>
<?php
}
?>