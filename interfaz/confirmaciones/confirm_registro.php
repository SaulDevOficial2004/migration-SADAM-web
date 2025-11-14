<?php
session_start();
require_once "../../conexion/conn_db.php";

date_default_timezone_set('America/Mexico_City');
date_default_timezone_get();

if ($_POST) {
    $idDispositivo = $_POST['id_dispositivo'];
    $idDefinida = $_POST['id_definido'];
    $marca = $_POST['marca'];
    $modelo = $_POST['modelo'];
    $caracteristicas = $_POST['caracteristicas'];
    $estatus = $_POST['estatus'];
    $imagenBinaria = null;
    $fechaRegistro = $_POST['fecha_registro'];
    $fechaEdit = $_POST['fecha_edit'];
    $personaCrea = $_POST['persona_crea'];
    $personaEdit = $_POST['persona_edit'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['imagen']) && $_FILES['imagen']['error'] == UPLOAD_ERR_OK) {
        $imagen = $_FILES['imagen']['tmp_name'];
        if (is_uploaded_file($imagen)) {
            $imagenBinaria = file_get_contents($imagen);
            echo "<script>console.log('Imagen cargada correctamente');</script>";
        } else {
            echo "<script>alert('Error: No se pudo cargar la imagen.'); window.location.href = '../form_impresoras.php'</script>";
            exit();
        }
    }

    if (empty($idDispositivo) || empty($marca) || empty($modelo) || empty($caracteristicas) || empty($estatus) || empty($imagenBinaria)) {
        echo "<script>alert('Algunos datos son necesarios'); window.location.href = '../registrar_equipo.php'</script>";
        exit();
    }

    $verificaIDdispositivo = "SELECT COUNT(*) AS total FROM registros WHERE id_definido = ?";
    $stmtExisteImpre = $conexion->prepare($verificaIDdispositivo);
    $stmtExisteImpre->bind_param("i", $idDefinida);
    $stmtExisteImpre->execute();
    $resultImpreExist = $stmtExisteImpre->get_result();
    $filaExist = $resultImpreExist->fetch_assoc();
    $stmtExisteImpre->close();

    if($filaExist['total'] > 0) {
        echo "<script>alert('El ID de dispositivo ya existe'); window.location.href = '../registrar_equipo.php'</script>";
        exit();
    }

    $inSQL = "INSERT INTO registros (id_dispositivo, id_definido, marca, modelo, caracteristicas, estatus, imagen, fecha_registro, fecha_edit,             persona_registra, persona_edit) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $conexion->prepare($inSQL);

    // Cambiamos el tipo de dato bind_param para "b" (blob) en la imagen.
    $stmt->bind_param("iissssbssss", $idDispositivo, $idDefinida, $marca, $modelo, $caracteristicas, $estatus, $imagenBinaria, $fechaRegistro, $fechaEdit, $personaCrea, $personaEdit);

    if ($stmt->execute()) {
        $ultimaID = $conexion->insert_id;
        echo "<script>
                alert('Agregado correctamente'); window.location.href='descargar.php?id=" . $ultimaID . "'
            </script>";
    } else {
        // Agregamos un mensaje de error más detallado.
        echo "<script>alert('Error al ingresar los datos: " . $stmt->error . "'); window.location.href = '../registrar_equipo.php'</script>";
    }
    $stmt->close();
    $conexion->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Confirmar</title>
</head>
<style>
    .full-height {
        height: 100vh;
    }
</style>
<body>
    
</body>
</html>
