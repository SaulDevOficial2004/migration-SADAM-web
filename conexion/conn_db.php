<?php
$servername = "localhost";
$usuario = "root";
$password = "";
$dbname = "beta_tecnologias";

$conexion = new mysqli($servername, $usuario, $password, $dbname);

if($conexion->connect_error){
    die;
}else{
    //echo "Conexion establecida";
}
?>