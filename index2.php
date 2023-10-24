<?php


include("login\auth.php");

$pagina = isset($_GET['p']) ? strtolower($_GET['p']) : 'homelogin';

// El fragmento de html que contiene la cabecera de nuestra web
require_once 'includes/header.php';


/* Estamos considerando que el parámetro enviando tiene el mismo nombre del archivo a cargar, si este no fuera así
    se produciría un error de archivo no encontrado */
require_once 'pages/' . $pagina . '.php';

// Otra opción es validar usando un switch, de esta manera para el valor esperado le indicamos que página cargar


// El fragmento de html que contiene el pie de página de nuestra web
require_once 'includes/footer.php';
