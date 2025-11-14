<?php
//INICIAR SESION
session_start();

if(isset($_SESSION['nombre_usuario'])){
    $nombre = $_SESSION['nombre'];
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $rol = $_SESSION['rol'];
}else{
    header("Location: ../../index.php");
    exit();
}

//REQUERICION DE LA BASE DE DATOS
require_once "../../conexion/conn_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Confirma Edicion</title>
</head>
<body>
    <style>

        body {
            background-color: #F2F3ED;
        }
        #alerta{
            width: 400px;
            height: 200px;
            box-shadow: 1px 2px 3px;
            margin: auto;
            margin-top: 250px;
            margin-bottom: auto;
            text-align: center;
            padding: 20px;
            border-radius: 10px;
        }
        a{
            text-decoration: none;
        }

    </style>
<?php
if ($_POST) {
    $nombreEdit = $_POST['nombre'];
    $rolEdit = $_POST['rol'];
    $estatusEdit = $_POST['estatus'];
    $nombreUserEdit = $_POST['nombre_usuario'];
    $id = $_POST['id'];
    $passwordEdit = $_POST['password_user'];

    // Corrigiendo el orden de los argumentos en password_hash
    $passwordEditCifrada = password_hash($passwordEdit, PASSWORD_DEFAULT);

    $actSQL = "UPDATE usuarios SET nombre = '$nombreEdit', rol = '$rolEdit', estatus = '$estatusEdit', nombre_usuario = '$nombreUserEdit', password_user = '$passwordEditCifrada' WHERE id = {$id}";

    if ($conexion->query($actSQL) === TRUE) {
        echo "<div id='alerta' class='alert alert-success'>
                    <p id='eco'>Los datos se han actualizado correctamente.</p>
                    <br>
                    <a href='../usuarios.php' class='btn btn-outline-info'>Regresar a usuarios</a>
                </div>";
    } else {
        echo "ERROR: " . $conexion->error;
    }
    $conexion->close();
}
?>

</body>
</html>