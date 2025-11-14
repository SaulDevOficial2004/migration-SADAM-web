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

.formulario{
    width: 500px;
    height: 650px;
    background-color: #fff;
    border-radius: 20px;
    padding: 30px;
    margin-bottom: 100px;
    margin-top: 40px;
    box-shadow: 1px 2px 3px;
  }
    /* Estilo personalizado para la sidebar */
    #sidebar {
      position: fixed;
      top: 0;
      left: 0;
      height: 100%;
      width: 250px;
      background-color: #333;
      z-index: 1000;
      transition: all 0.3s ease;
    }
    #content {
      margin-left: 250px; /* Ancho de la barra lateral */
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
      align-items: flex-start;
      top: 0;
      bottom: 0;
      left: 0;
      right: 0;
      overflow: hidden;
      transition: all 0.3s ease;
    }

    #logout-btn {
      margin-bottom: 10px; 
      width: calc(100% - 20px);
      margin-top:50px;
    }

    .nav-item:hover {
        background-color: #666666;
    }
    body {
      background-color: #F2F3ED;
    }

    .card {
      width: 17rem;
      margin: 20px;
      transition-duration: 0.5s;
    }

    .card:hover {
      width: 17.5rem;
    }

    /* Estilos para hacer la sidebar responsiva */
    @media (max-width: 768px) {
      #sidebar {
        width: 100%;
        height: auto;
        position: relative;
      }
      #content {
        margin-left: 0;
      }
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
  <div id="content">
  <center>
<section class="formulario">
  <img src="../imgs/iconos/iconoeditaruser.png" alt="Icono de agrega a un usuario" width="100px">
  <br></br>
  <?php
  if($_SERVER['REQUEST_METHOD'] == "GET" && isset($_GET['id'])){
    $id = $_GET['id'];
    $consultaSQL = "SELECT * FROM usuarios WHERE id = $id";
    //PREPARACION SQL 
    $result = $conexion->query($consultaSQL);

    if($result->num_rows == 1) {
        $datos = $result->fetch_assoc();
  ?>
<form action="confirmaciones/confirma_edit.php" method="POST">
  <div class="mb-3">
    <label for="nombre" class="form-label">Nombre: </label>
    <input type="text" class="form-control" name="nombre" aria-describedby="emailHelp" value="<?php echo $datos['nombre']; ?>" placeholder="Ingresa el nombre completo del usuario">
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
    <label for="nombre" class="form-label">Nombre de usuario: </label>
    <input type="text" class="form-control" name="nombre_usuario" placeholder="Ingresa el nombre se usuario" value="<?php echo $datos['nombre_usuario']; ?>">
    <div class="mb-3">
    <label for="nombre" class="form-label">Contraseña del usuario: </label>
    <input type="text" class="form-control" name="password_user" placeholder="Ingresa una Contraseña">
    <input type="hidden" name="id" value="<?php echo $datos['id']; ?>">
  </div>
  </div>
  <br>
  <button type="submit" class="btn btn-primary">Actualiza</button>

</form>
<?php
    }else{
      echo "<script>
                alert('Usuario no encontrado')
            </script>";
    }
}else{
  echo "<script>
            alert('ID de usuario no encontrada')
        </script>";
}
?>
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
