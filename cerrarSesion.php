<?php
session_start();

$_SESSION = [];

header('Location: eventosCRUD/index.php');