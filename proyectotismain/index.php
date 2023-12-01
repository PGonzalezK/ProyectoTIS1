<?php

    // Pequeña lógica para capturar la pagina que queremos abrir
    $pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'home';

    session_start();
    

    if(strtok($pagina, "/") == "admin"){
        require_once 'includes/admin/header.php';
    }else{
        require_once 'includes/users/header.php';
    }

    if(strtok($pagina, "/") == "admin"){
        require_once 'pages/' . $pagina . '.php';
    }else{
        require_once 'includes/users/header.php';
    }

    // Incluir el archivo de funciones
    require_once 'includes/funciones/funciones.php';

    require_once 'pages/' . $pagina . '.php';





    // El fragmento de html que contiene el pie de página de nuestra web
    if(strtok($pagina, "/") == "admin"){
        require_once 'includes/admin/footer.php';
    }else{
        require_once 'includes/users/footer.php';
    }

?>



