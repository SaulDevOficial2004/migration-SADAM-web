<?php
include "../phpqrcode/qrlib.php";
require_once "../conexion/conn_db.php";

//OBTENER EL ID DEL REGISTRO 
$id = $_GET['id'];
//CONSULTA PARA ENCONTRAR LA INSERCION RECIEN CREADA
$conSQL = 
"SELECT registros.id_dispositivo, dispositivos.descripcion AS tipo_dispositivo, registros.marca, registros.modelo, registros.caracteristicas, registros.imagen 
FROM beta_tecnologias.registros 
JOIN beta_tecnologias.dispositivos ON registros.id_dispositivo = dispositivos.id 
WHERE registros.id = ?";

$stmt = $conexion->prepare($conSQL);
$stmt->bind_param("i", $idDefinido);
$stmt->execute();
$result = $stmt->get_result();
$registroIDh = $result->fetch_assoc();

if($registroIDh){
    //DATOS INCLUIDOS EN EL QR

    $data .= "ID del equipo: {$registroIDh['tipo_dispositivo']}\n";
    $data .= "Marca: {$registroIDh['marca']}\n";
    $data .= "Modelo: {$registroIDh['modelo']}\n";
    $data .= "Caracteristicas: {$registroIDh['caracteristicas']}\n";
    
    //URL PARA VISUALIZAR LOS DATOS
    $url = "http://localhost/ver_equipo.php?id=". $registroIDh;

    //GENERAR EL QR CON LA URL

    $filepath = 'codigosQR/pngs/registro_' . $registroIDh . '.png';
    QRcode::png($url, $filepath, QR_ECLEVEL_L, 4);

    echo "Codigo generado correctamente. <a href='$filepath' download>Descargar QR</a>";
}else{
    echo "No se encontraron datos para la ID proporcionada";
}
?>