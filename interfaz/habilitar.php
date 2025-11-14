<?php
session_start();

require_once "../conexion/conn_db.php";

if(isset($_SESSION['nombre_usuario'])){
    $nombre = $_SESSION['nombre'];
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $rol = $_SESSION['rol'];
}else{
    header("Locattion: ../index.php");
    exit();
}

if($_GET['id']){
    $id = $_GET['id'];

    //CONSULTA SQL
    $sql = "SELECT * FROM usuarios WHERE id = {$id}";
    $resultado = $conexion->query($sql);

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
    <title>Habilitar usuario</title>
</head>
<body>
    <div id="cuerpoalert">
        <h2>¿Quieres habilitar a <?php echo $datos['nombre']; ?>?</h2>
        <h3>Con Rol de: <?php echo $datos['rol']; ?></h3>
        <h5 class="text-muted">Aviso: Este usuario volvera a tener los permisos que se le asignaron y podra iniciar sesion</h5>

        <form action="confirmaciones/confirm_active.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
            <hr>
            <button type="submit" class="btn btn-outline-success">Habilitar</button>
            <a href="usuarios.php" class="btn btn-outline-info">Regresar a usuarios</a>
        </form>
    </div>
</body>
</html>
<?php
}
?>