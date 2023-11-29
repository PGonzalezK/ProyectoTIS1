<?php
include("middleware/auth.php");
include("database/connection.php");

// Obtener datos del formulario
$email = $_SESSION["email"];
$nombre = $_POST["nombre"];
$ano_creacion = $_POST["ano_creacion"];
$descripcion = $_POST["descripcion"];
$direccion = $_POST["direccion"];
$fecha = date("Y-m-d H:i:s");

// Verificar si se subió una imagen
if (isset($_FILES['foto']) && $_FILES['foto']['error'] == 0) {
    $foto = $_FILES['foto'];

    // Validar por peso de imagen
    $medida = 1000000; // 1 MB
    if ($foto['size'] > $medida) {
        $errores[] = "La foto es muy pesada";
    }

    // Carpeta donde se guardarán las imágenes
    $carpetafoto = 'pages/admin/emprendedores/imagenes/';

    // Generar nombre único para la imagen
    $nombrefoto = md5(uniqid(rand(), true)) . ".jpg";

    // Subir imagen
    move_uploaded_file($foto['tmp_name'], $carpetafoto . $nombrefoto);

    // Consulta preparada para evitar inyección SQL
    $insert = $connection->prepare("INSERT INTO `emprendedores` (email, nombre, ano_creacion, descripcion, direccion, foto, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert->bind_param("sssssss", $email, $nombre, $ano_creacion, $descripcion, $direccion, $nombrefoto, $fecha);
} else {
    // No se subió una imagen, puedes manejar esto de acuerdo a tus requerimientos
    $nombrefoto = ''; // o asignar un valor por defecto
    // Consulta preparada para evitar inyección SQL
    $insert = $connection->prepare("INSERT INTO `emprendedores` (email, nombre, ano_creacion, descripcion, direccion, foto, fecha) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $insert->bind_param("sssssss", $email, $nombre, $ano_creacion, $descripcion, $direccion, $nombrefoto, $fecha);
}


// Ejecutar consulta
if ($insert->execute()) {
    // Envío de correo electrónico
    $to = $email;
    $subject = "Confirmación del envio de su Emprendimiento";
    $message = "Gracias por subir tu emprendimiento a nuestra pagina, Se revisara:\n\n";
    $message .= "Emprendimiento: $nombre\n";
    $message .= "Direccion: $direccion\n";
    $message .= "Descripción: $descripcion\n";
    $message .= "Fecha: $fecha\n";
    $message .= "Cuando este aprobado tu emprendimiento se enviara un correo\n";

    // Ajusta los encabezados según sea necesario
    $headers = "From: pruebaemailtis1@gmail.com"; // Reemplaza con tu dirección de correo

    // Envía el correo
    mail($to, $subject, $message, $headers);

    // Redirigir con mensaje de éxito
    header("Location: index.php?p=emprendimiento/create&mensajeExito=1");
} else {
    // Manejar errores si la consulta falla
    die("Error en la consulta: " . $insert->error);
}

// Cerrar la consulta preparada
$insert->close();

// Cerrar la conexión a la base de datos
$connection->close();
?>
