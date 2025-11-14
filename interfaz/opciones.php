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
      justify-content: center;
      align-items: center;
      min-height: 100vh;
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

    /* Estilos para el contenedor blanco centrado */
    .password-container {
      background-color: #fff;
      padding: 40px;
      border-radius: 8px;
      box-shadow: 0px 0px 15px rgba(0, 0, 0, 0.1);
      width: 100%;
      max-width: 500px;
    }

    .password-container h2 {
      text-align: center;
      margin-bottom: 20px;
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
    <div class="password-container">
      <h2>Cambiar Contraseña</h2>
      <form action="cambiar_contrasena.php" method="POST">
        <div class="mb-3">
          <label for="currentPassword" class="form-label">Contraseña Actual</label>
          <input type="password" class="form-control" id="currentPassword" name="currentPassword" required>
        </div>
        <div class="mb-3">
          <label for="newPassword" class="form-label">Nueva Contraseña</label>
          <input type="password" class="form-control" id="newPassword" name="newPassword" required>
        </div>
        <div class="mb-3">
          <label for="confirmPassword" class="form-label">Confirmar Nueva Contraseña</label>
          <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" required>
        </div>
        <button type="submit" class="btn btn-primary w-100">Cambiar Contraseña</button>
      </form>
    </div>
  </div>

  <!-- Bootstrap JS y dependencias -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.7/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    function toggleSidebar() {
      const sidebar = document.getElementById('sidebar');
      const content = document.getElementById('content');
      sidebar.classList.toggle('active');
      if (sidebar.classList.contains('active')) {
        content.style.marginLeft = '0';
      } else {
        content.style.marginLeft = '250px';
      }
    }
  </script>
</body>
</html>
