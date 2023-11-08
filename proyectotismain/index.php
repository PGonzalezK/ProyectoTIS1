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


    require_once 'pages/' . $pagina . '.php';


    // Otra opción es validar usando un switch, de esta manera para el valor esperado le indicamos que página cargar


    // El fragmento de html que contiene el pie de página de nuestra web
    if(strtok($pagina, "/") == "admin"){
        require_once 'includes/admin/footer.php';
    }else{
        require_once 'includes/users/footer.php';
    }

?>



