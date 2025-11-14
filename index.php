<?php
require_once "conexion/conn_db.php";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!--Link de Bootstrap 5-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!--ICONO DEL TÍTULO-->
    <link rel="shortcut icon" href="imgs/iconozihua.ico">
    <title>Login</title>
</head>
<style>
    .login {
        max-width: 500px;
        width: 100%;
        background-color: #fff;
        padding: 30px;
        margin: 30px auto;
        margin-top: 100px;
        border-radius: 10px;
    }

    body {
        background-image: url(imgs/fondo4.gif);
        background-size: cover;
        background-position: center;
    }
</style>
<body>
<?php
session_start();

// Verifica si se han enviado datos del formulario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Captura los datos del formulario
    $nombreUsuario = $_POST['nombre_usuario'];
    $password = $_POST['password_user'];

    // Incluye el archivo de conexión a la base de datos
    require_once 'conexion/conn_db.php';

    // Consulta SQL para verificar si el usuario existe
    $consultaSQL = "SELECT * FROM usuarios WHERE nombre_usuario = ?";
    $stmt = $conexion->prepare($consultaSQL);

    // Verifica si la preparación de la consulta fue exitosa
    if ($stmt === false) {
        die("ERROR al preparar la consulta " . $conexion->error);
    }

    // Enlaza los parámetros de la sentencia
    $stmt->bind_param("s", $nombreUsuario);

    // Ejecuta la consulta
    $stmt->execute();

    // Obtiene el resultado de la consulta
    $resultado = $stmt->get_result();

    // Verifica si se encontró algún usuario con esas características
    if ($resultado->num_rows === 1) {
        $row = $resultado->fetch_assoc();
        // Verifica que la contraseña sea correcta
        if (password_verify($password, $row['password_user'])) {
            // Si las credenciales son correctas, inicia sesión
            $_SESSION['nombre_usuario'] = $nombreUsuario;
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['rol'] = $row['rol'];
            $_SESSION['estatus'] = $row['estatus'];
            // Redireccion del usuario al dashboard
            header("location: interfaz/dashboard.php");
            exit();
        } else {
            echo "<script>alert('La contraseña es incorrecta');</script>";
        }
    } else {
        echo "<script>alert('No se encontró ningún usuario en la base de datos');</script>";
    }
    $stmt->close();
}
?>

<!--FORMULARIO DE LOGIN-->
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="login">
        <center>
            <img src="imgs/imglogin.png" alt="Logo de Zihuatanejo" class="img-fluid mb-4">
        </center>
        <form action="index.php" method="POST">
            <div class="mb-3">
                <label for="usuario" class="form-label">Usuario: </label>
                <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingresa tu nombre de usuario" required>
            </div>
            <div class="mb-3">
                <label for="password" class="form-label">Contraseña: </label>
                <input type="password" class="form-control" name="password_user" placeholder="Ingrese su contraseña" required>
            </div>
            <br>
            <button type="submit" class="btn btn-primary w-100">Iniciar sesión</button>
        </form>
    </div>
</div>
<!--SCRIPTS DE BOOTSTRAP-->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>

<?php
$conexion->close();
?>
</body>
</html>
