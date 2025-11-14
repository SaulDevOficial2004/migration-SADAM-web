<?php
//SEGUIMOS LA SESION
session_start();
//DESTRUIMOS LA SESION
session_destroy();
header('Location: ../index.php');
exit();
?>