<?php
session_start();

require_once "../conexion/conn_db.php";

// Verificar si la sesión del usuario ya está iniciada
if(isset($_SESSION['nombre_usuario'])) {
    // Si la sesión existe, obtener los datos del usuario desde la sesión
    $nombreUsuario = $_SESSION['nombre_usuario'];
    $nombre = $_SESSION['nombre'];
    $rol = $_SESSION['rol'];
    $estatus = $_SESSION['estatus'];

    if($estatus === 2){
            header("Location: ../nopermission.php");
            exit();
    }

}else{
  header("Location: ../index.php");
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
      left: -250px; /* Oculta inicialmente la sidebar */
      height: 100vh;
      width: 250px;
      background-color: #333;
      z-index: 1000;
      transition: all 0.3s ease;
      overflow-y: auto;
    }
    #content {
      margin-left: 0;
      transition: all 0.3s ease;
      padding: 20px; /* Asegura que el contenido tenga algo de espacio alrededor */
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
    /* Flexbox para centrar el contenido principal */
    .content-wrapper {
      display: flex;
      flex-wrap: wrap;
      justify-content: center;
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
        <li class="nav-item"><a class="nav-link text-light" href="registrar_dispo.php"><i class="fas fa-laptop"></i> Agregar dispositivo</a></li>
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
        <li class="nav-item"><a class="nav-link text-light" href="registrar_user.php"><i class="fas fa-user"></i> Usuarios</a></li>
        <br>
        <li class="nav-item"><a class="nav-link text-light" href="registrar_equipo.php"><i class="fas fa-user"></i> Agregar dispositivo</a></li>
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
      <h3 class="text-light">Usuario: <?php echo $nombre; ?></h6>
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
        <li class="nav-item"><a class="nav-link text-light" href="#"><i class="fas fa-cog"></i> Cambiar contraseña </a></li>
        <br>
      </ul>
    </div>
    <!-- Botón para cerrar sesión -->
    <a href="../conexion/cerrar_sesion.php"><button id="logout-btn" class="btn btn-danger">Cerrar sesión</button></a>
  </div>
  <?php } ?>

  <!-- Contenido principal -->
  <div id="content">
    <div class="content-wrapper">
      <!-- Contenedor de QR -->
      <a href="escanearQR.php" style="text-decoration: none; color: #000;">
        <div class="card" style="box-shadow: 1px 2px 3px;">
          <img src="../imgs/imgmenu/imgQR.png" class="card-img-top" alt="Imagen QR" style="max-width: 100%; height: auto;">
          <div class="card-body">
            <p class="card-text text-center" style="font-weight: bold;">Escaneo de QR</p>
          </div>
        </div>
      </a>
      <!-- Contenedor de Inhabilitados -->
      <a href="inhabilitados.php" style="text-decoration: none; color:#000;">
        <div class="card" style="box-shadow: 1px 2px 3px;">
          <img src="../imgs/imgmenu/imgInhabilitados.png" class="card-img-top" alt="Imagen Inhabilitados" style="max-width: 100%; height: auto;">
          <div class="card-body">
            <p class="card-text text-center" style="font-weight: bold;">Inhabilitados</p>
          </div>
        </div>
      </a>
      <!-- Otros contenedores aquí -->
      <a href="impresoras.php" style="text-decoration: none; color:#000;">
        <div class="card" style="box-shadow: 1px 2px 3px;">
          <img src="../imgs/imgmenu/imgImpresoras.png" class="card-img-top" alt="Imagen Impresoras">
          <div class="card-body">
            <p class="card-text text-center" style="font-weight: bold;">Impresoras</p>
          </div>
        </div>
      </a>
      <a href="pc.php" style="text-decoration: none; color:#000;">
        <div class="card" style="box-shadow: 1px 2px 3px;">
          <img src="../imgs/imgmenu/imgPc.png" class="card-img-top" alt="Imagen PC">
          <div class="card-body">
            <p class="card-text text-center" style="font-weight: bold;">PC</p>
          </div>
        </div>
      </a>
      <a href="laptops.php" style="text-decoration: none; color:#000;">
        <div class="card" style="box-shadow: 1px 2px 3px;">
          <img src="../imgs/imgmenu/imgLaptop.png" class="card-img-top" alt="Imagen Laptop">
          <div class="card-body">
            <p class="card-text text-center" style="font-weight: bold;">Laptops</p>
          </div>
        </div>
      </a>
    </div>
  </div>

  <!-- Bootstrap JS y script para controlar la sidebar -->
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
  <script>
    function toggleSidebar() {
      var sidebar = document.getElementById('sidebar');
      var content = document.getElementById('content');
      if (sidebar.style.left === '0px') {
        sidebar.style.left = '-250px';
        content.style.marginLeft = '0';
      } else {
        sidebar.style.left = '0px';
        content.style.marginLeft = '250px';
      }
    }
  </script>

  <script>
    function mostrarBotones(){
      document.getElementById("botonMos").style.display = 'block';
    }
  </script>
</body>
</html>
