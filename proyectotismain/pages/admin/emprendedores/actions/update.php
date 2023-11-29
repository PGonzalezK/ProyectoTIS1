<?php
include("database/connection.php");

if ($_SESSION['id_rol'] !=='1'){
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];
    $ano_creacion = $_POST["ano_creacion"];
    $descripcion = $_POST["descripcion"];

    // Procesar la nueva imagen (puedes ajustar según tu necesidad)
    $foto = $_FILES["foto"]["name"];
    $ruta_foto = "ruta/donde/guardar/las/fotos/" . $foto;
    move_uploaded_file($_FILES["foto"]["tmp_name"], $ruta_foto);

    $query = "UPDATE emprendedores SET nombre = ?, ano_creacion = ?, descripcion = ?, foto = ? WHERE id = ?";
    $stmt = mysqli_prepare($connection, $query);
    mysqli_stmt_bind_param($stmt, 'sissi', $nombre, $ano_creacion, $descripcion, $foto, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Emprendedor actualizado correctamente.";
    } else {
        echo "Error al actualizar emprendedor: " . mysqli_error($connection);
    }

    mysqli_stmt_close($stmt);
}

mysqli_close($connection);
?>
