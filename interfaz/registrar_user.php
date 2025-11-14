<?php
session_start();

require_once "../conexion/conn_db.php";

// Verificar si la sesión del usuario ya está iniciada
if(isset($_SESSION['nombre_usuario'])) {
    // Si la sesión existe, obtener los datos del usuario desde la sesión
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];

} else {
    // Si la sesión no existe, redirigir al usuario al inicio de sesión
    header('Location: ../index.php');
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Dashboard</title>
  <!-- Bootstrap CSS -->
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <style>
    /* Estilo personalizado para la sidebar */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0; /* Asegura que la sidebar esté en el borde izquierdo */
      height: 100vh;
      width: 250px;
      background-color: #333;
      z-index: 1000;
      transition: all 0.3s ease;
      overflow-y: auto;
      margin-left: -250px; /* Oculta inicialmente la sidebar */
    }
    #content {
      margin-left: 250px; /* Asegura que el contenido no se sobreponga con la sidebar */
      transition: all 0.3s ease;
      padding: 20px;
    }
    #logout-btn {
      margin: 10px 10px 10px 0; 
      width: calc(100% - 20px);
    }
    .nav-item:hover {
      background-color: #666666;
    }
    body {
      background-color: #F2F3ED;
      overflow-x: hidden;
    }
    .card {
      width: 17rem;
      margin: 20px;
      transition-duration: 0.5s;
    }
    .card:hover {
      width: 17.5rem;
    }
    .toggle-btn {
      position: fixed;
      top: 15px;
      left: 15px;
      z-index: 1100;
      background-color: #333;
      color: #fff;
      border: none;
      padding: 10px 15px;
      cursor: pointer;
    }
    .content-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
    }
    /* Estilos para hacer la sidebar responsiva */
    @media (max-width: 768px) {
      #sidebar {
        width: 100%;
        height: auto;
        position: relative;
        margin-left: 0; /* Asegura que la sidebar esté visible en dispositivos pequeños */
      }
      #content {
        margin-left: 0; /* Asegura que el contenido se ajuste correctamente */
      }
    }
    .formulario {
      width: 500px;
      height: 650px;
      background-color: #fff;
      border-radius: 20px;
      padding: 30px;
      margin-bottom: 100px;
      margin-top: 40px;
      box-shadow: 1px 2px 3px;
    }
  </style>
</head>
<body>
  <button class="toggle-btn" onclick="toggleSidebar()">☰</button>

  <?php if($rol === 'superadmin'){ ?>
  <!-- Sidebar CASO SUPERADMIN -->
  <div id="sidebar">
    <div id="sidebar-content">
        <br><br><br>
      <h3 class="text-light">Usuario: <?php echo $nombre; ?></h3>
      <h6 class="text-light">&nbsp; Rol: <?php echo $rol; ?></h6>
      <h6 class="text-light">&nbsp; Username: <?php echo $nombreUsuario; ?></h6>
      <ul class="nav flex-column">
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="dashboard.php"><i class="fas fa-home"></i> Home</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="opciones.php"><i class="fas fa-cog"></i> Cambiar contraseña</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="registrar_user.php"><i class="fas fa-user-plus"></i> Agregar usuario</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="usuarios.php"><i class="fas fa-user"></i> Usuarios</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="registrar_equipo.php"><i class="fas fa-laptop"></i> Agregar dispositivo</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="registrar_equipo.php"><i class="fas fa-laptop"></i> Agregar equipo</a></li>
      </ul>
    </div>
    <!-- Botón para cerrar sesión -->
    <a href="../conexion/cerrar_sesion.php"><button id="logout-btn" class="btn btn-danger">Cerrar sesión</button></a>
  </div>
  <?php } elseif($rol === 'admin'){ ?>
  <!-- Sidebar CASO ADMIN -->
  <div id="sidebar">
    <div id="sidebar-content">
    <br><br><br>
      <h3 class="text-light">Usuario: <?php echo $nombre; ?></h3>
      <h6 class="text-light">&nbsp; Rol: <?php echo $rol; ?></h6>
      <h6 class="text-light">&nbsp; Username: <?php echo $nombreUsuario; ?></h6>
      <ul class="nav flex-column">
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="dashboard.php"><i class="fas fa-home"></i> Home</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="#"><i class="fas fa-cog"></i> Opciones</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="#"><i class="fas fa-user"></i> Usuarios</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="#"><i class="fas fa-user"></i> Agregar dispositivo</a></li>
      </ul>
    </div>
    <!-- Botón para cerrar sesión -->
    <a href="../conexion/cerrar_sesion.php"><button id="logout-btn" class="btn btn-danger">Cerrar sesión</button></a>
  </div>
  <?php } elseif($rol === 'subadmin'){ ?>
  <!-- Sidebar CASO SUBADMIN -->
  <div id="sidebar">
    <div id="sidebar-content">
    <br><br><br>
      <h3 class="text-light">Usuario: <?php echo $nombre; ?></h3>
      <h6 class="text-light">&nbsp; Rol: <?php echo $rol; ?></h6>
      <h6 class="text-light">&nbsp; Username: <?php echo $nombreUsuario; ?></h6>
      <ul class="nav flex-column">
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="dashboard.php"><i class="fas fa-home"></i> Home</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="#"><i class="fas fa-cog"></i> Opciones</a></li>
      </ul>
    </div>
    <!-- Botón para cerrar sesión -->
    <a href="../conexion/cerrar_sesion.php"><button id="logout-btn" class="btn btn-danger">Cerrar sesión</button></a>
  </div>
  <?php } elseif($rol === 'visualizador'){ ?>
  <!-- Sidebar CASO VISUALIZADOR -->
  <div id="sidebar">
    <div id="sidebar-content">
    <br><br><br>
      <h3 class="text-light">Usuario: <?php echo $nombre; ?></h3>
      <h6 class="text-light">&nbsp; Rol: <?php echo $rol; ?></h6>
      <h6 class="text-light">&nbsp; Username: <?php echo $nombreUsuario; ?></h6>
      <ul class="nav flex-column">
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="dashboard.php"><i class="fas fa-home"></i> Home</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="#"><i class="fas fa-cog"></i> Opciones </a></li>
        <br>
      </ul>
    </div>
    <!-- Botón para cerrar sesión -->
    <a href="../conexion/cerrar_sesion.php"><button id="logout-btn" class="btn btn-danger">Cerrar sesión</button></a>
  </div>
  <?php } ?>
  <!-- Contenido principal -->
  <div id="content" class="content-wrapper">
    <!-- Empieza la pagina -->
    <center>
      <section class="formulario">
        <img src="../imgs/iconos/iconoagregaruser.png" alt="Icono de agrega a un usuario" width="100px">
        <br></br>
        <form action="registrar_user.php" method="POST">
          <div class="mb-3">
            <label for="nombre" class="form-label">Nombre: </label>
            <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" placeholder="Ingresa el nombre completo del usuario">
          </div>
          <div class="mb-3">
            <label for="rol" class="form-label">Rol</label>
            <select name="rol" id="rol" class="form-control">
              <option value="#">Seleccione una opcion...</option>
              <option value="superadmin">Superadministrador</option>
              <option value="admin">Administrador</option>
              <option value="subadmin">Subadministrador</option>
              <option value="visualizador">Visualizador</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="estatus" class="form-label">Estatus</label>
            <select name="estatus" id="estatus" class="form-control">
              <option value="#">Seleccione una opcion...</option>
              <option value="1">Activo</option>
              <option value="0">Inactivo</option>
            </select>
          </div>
          <div class="mb-3">
            <label for="nombre_usuario" class="form-label">Nombre de usuario: </label>
            <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingresa el nombre se usuario">
          </div>
          <div class="mb-3">
            <label for="password_user" class="form-label">Contraseña del usuario: </label>
            <input type="text" class="form-control" name="password_user" placeholder="Ingresa una Contraseña">
          </div>
          <br>
          <button type="submit" class="btn btn-primary">Crear</button>
        </form>
      </section>
    </center>
  </div>

  <!-- Bootstrap JS y script para controlar la sidebar -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById('sidebar');
      var content = document.getElementById('content');
      if (sidebar.style.marginLeft === '-250px') {
        sidebar.style.marginLeft = '0';
        content.style.marginLeft = '250px';
      } else {
        sidebar.style.marginLeft = '-250px';
        content.style.marginLeft = '0';
      }
    }
  </script>
</body>
</html>

<?php
    //VERIFICAMOS SI EL USUARIO MANDO EL FORMULARIO
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    //OBTENEMOS LOS DATOS DEL FORMULARIO
    $nombre = $_POST['nombre'];
    $rol = $_POST['rol'];
    $estatus = $_POST['estatus'];
    $nombreUsuario = $_POST['nombre_usuario'];
    $password_user = $_POST['password_user'];

    if(empty($_POST['nombre']) || (empty($_POST['rol'])) || (empty($_POST['estatus'])) || (empty($_POST['nombre_usuario'])) || (empty($_POST['password_user']))){
      echo "<script>
                alert('Todos los campos son necesarios')
            </script>";
            exit();
    }
    //CIFRAR CONTRASEÑA
    $passwordCifrada = password_hash($passwordCifrada, PASSWORD_DEFAULT);

    //VERIFICACION DE QUE EL USUARIO YA ESTA REGISTRADO
    $verificaExistencia = "SELECT COUNT(*) as total FROM usuarios WHERE nombre_usuario = ?";

    //SEGURIDAD ANTIINYECCIONES SQL
    $stmtUserExist = $conexion->prepare($verificaExistencia);
    $stmtUserExist->bind_param("s", $nombreUsuario);
    $stmtUserExist->execute();
    $resultUserExist = $stmtUserExist->get_result();
    $filaExist = $resultUserExist->fetch_assoc();

    if($filaExist['total'] > 0){
      //SIGINIFICA QUE EL USUARIO YA EXISTE
      echo "<script>
                alert('El usuario ya existe')
            </script>";
            exit();
    }else{
      //PREPARA LA SENTENCIA SQL PARA INSERTAR LOS DATOS

      $insertSQL = "INSERT INTO usuarios (nombre, rol, estatus, nombre_usuario, password_user) VALUES (?,?,?,?,?)";

      //PREPARAMOS LA CONSULTA CON STMT STATEMENT SE ENCARGARA DE HACER LA INSERCION CORRECTAMENTE
      $stmt = $conexion->prepare($insertSQL);
      //VERIFICACION DE QUE LA PREPARACION ES CORRECTA
      if($stmt === false){
        die("Error en la preparacion de la insercion: " . $conexion->error);
      }

      //SE ENLAZAN LOS PARAMETROS PARA LA SENTENCIA
      $stmt->bind_param("sssss", $nombre, $rol, $estatus, $nombreUsuario, $passwordCifrada);

      //EJECUTAMOS LA SENTENCIA
      if($stmt->execute()){
        echo "<script>
                  alert('Los datos se guardaron correctamente')
              </script>";
      }else{
        echo "ERROR al guardar los datos " . $stmt->error;
      }
      //CERRAR SENTENCIA STMT
      $stmt->close();
    }
    //CERRAR SENTENCIA DE EXISTENCIA
    $stmtUserExist->close();
  }
  //CERRAR LA CONEXION
  $conexion->close();
?>