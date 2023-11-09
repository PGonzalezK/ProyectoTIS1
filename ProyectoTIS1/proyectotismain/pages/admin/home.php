<?php
// Descomentar linea 3 si es que se quiere usar la autenticación para esta página
//session_start();
require("middleware\auth.php");
if ($_SESSION['id_rol'] !== '1') {
    // El usuario no tiene permisos para acceder a esta página, redirigir o mostrar un mensaje de error
    header("Location: index.php");
    exit();
}
?>
<div class="admin-bg text-center">
    <div class="centrado">
        <div class="px-4 py-5 text-center ">
            <img class="d-block mx-auto mb-4"
                src="data:image/svg+xml;base64,PHN2ZyB4bWxucz0iaHR0cDovL3d3dy53My5vcmcvMjAwMC9zdmciIHdpZHRoPSI1MTIiIGhlaWdodD0iNDA4Ij48ZGVmcz48bGluZWFyR3JhZGllbnQgaWQ9ImJzLWxvZ28tYSIgeDE9Ijc2LjA3OSIgeDI9IjUyMy40OCIgeTE9IjEwLjc5OCIgeTI9IjM2NS45NDUiIGdyYWRpZW50VW5pdHM9InVzZXJTcGFjZU9uVXNlIj48c3RvcCBzdG9wLWNvbG9yPSIjOTAxM2ZlIj48L3N0b3A+PHN0b3Agb2Zmc2V0PSIxIiBzdG9wLWNvbG9yPSIjNjYxMGYyIj48L3N0b3A+PC9saW5lYXJHcmFkaWVudD48bGluZWFyR3JhZGllbnQgaWQ9ImJzLWxvZ28tYiIgeDE9IjE5My41MDgiIHgyPSIyOTMuNTE0IiB5MT0iMTA5Ljc0IiB5Mj0iMjc4Ljg3MiIgZ3JhZGllbnRVbml0cz0idXNlclNwYWNlT25Vc2UiPjxzdG9wIHN0b3AtY29sb3I9IiNmZmYiPjwvc3RvcD48c3RvcCBvZmZzZXQ9IjEiIHN0b3AtY29sb3I9IiNmMWU1ZmMiPjwvc3RvcD48L2xpbmVhckdyYWRpZW50PjxmaWx0ZXIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIiBpZD0iYnMtbG9nby1jIiB3aWR0aD0iMTk3IiBoZWlnaHQ9IjI0OSIgeD0iMTYxLjkwMSIgeT0iODMuNDU3IiBjb2xvci1pbnRlcnBvbGF0aW9uLWZpbHRlcnM9InNSR0IiIGZpbHRlclVuaXRzPSJ1c2VyU3BhY2VPblVzZSI+PGZlRmxvb2QgZmxvb2Qtb3BhY2l0eT0iMCIgcmVzdWx0PSJCYWNrZ3JvdW5kSW1hZ2VGaXgiPjwvZmVGbG9vZD48ZmVDb2xvck1hdHJpeCBpbj0iU291cmNlQWxwaGEiIHZhbHVlcz0iMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMTI3IDAiPjwvZmVDb2xvck1hdHJpeD48ZmVPZmZzZXQgZHk9IjQiPjwvZmVPZmZzZXQ+PGZlR2F1c3NpYW5CbHVyIHN0ZERldmlhdGlvbj0iOCI+PC9mZUdhdXNzaWFuQmx1cj48ZmVDb2xvck1hdHJpeCB2YWx1ZXM9IjAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAgMCAwIDAuMTUgMCI+PC9mZUNvbG9yTWF0cml4PjxmZUJsZW5kIGluMj0iQmFja2dyb3VuZEltYWdlRml4IiByZXN1bHQ9ImVmZmVjdDFfZHJvcFNoYWRvdyI+PC9mZUJsZW5kPjxmZUJsZW5kIGluPSJTb3VyY2VHcmFwaGljIiBpbjI9ImVmZmVjdDFfZHJvcFNoYWRvdyIgcmVzdWx0PSJzaGFwZSI+PC9mZUJsZW5kPjwvZmlsdGVyPjwvZGVmcz48cGF0aCBmaWxsPSJ1cmwoI2JzLWxvZ28tYSkiIGQ9Ik01Ni40ODEgNTMuMzJDNTUuNTE1IDI1LjU4IDc3LjEyOCAwIDEwNi4zNDIgMGgyOTkuMzUzYzI5LjIxNCAwIDUwLjgyNyAyNS41OCA0OS44NjEgNTMuMzItLjkyOCAyNi42NDcuMjc3IDYxLjE2NSA4Ljk2NCA4OS4zMSA4LjcxNSAyOC4yMzIgMjMuNDExIDQ2LjA3NyA0Ny40OCA0OC4zN3YyNmMtMjQuMDY5IDIuMjkzLTM4Ljc2NSAyMC4xMzgtNDcuNDggNDguMzctOC42ODcgMjguMTQ1LTkuODkyIDYyLjY2My04Ljk2NCA4OS4zMTEuOTY2IDI3LjczOS0yMC42NDcgNTMuMzE5LTQ5Ljg2MSA1My4zMTlIMTA2LjM0MmMtMjkuMjE0IDAtNTAuODI3LTI1LjU4LTQ5Ljg2LTUzLjMxOS45MjctMjYuNjQ4LS4yNzgtNjEuMTY2LTguOTY2LTg5LjMxMUMzOC44MDIgMjM3LjEzOCAyNC4wNyAyMTkuMjkzIDAgMjE3di0yNmMyNC4wNjktMi4yOTMgMzguODAyLTIwLjEzOCA0Ny41MTYtNDguMzcgOC42ODgtMjguMTQ1IDkuODkzLTYyLjY2MyA4Ljk2NS04OS4zMXoiPjwvcGF0aD48cGF0aCBmaWxsPSJ1cmwoI2JzLWxvZ28tYikiIGZpbHRlcj0idXJsKCNicy1sb2dvLWMpIiBzdHJva2U9IiNmZmYiIGQ9Ik0yNjcuMTAzIDMxMi40NTdjNDcuMjk3IDAgNzUuNzk4LTIzLjE1OCA3NS43OTgtNjEuMzU1IDAtMjguODczLTIwLjMzNi00OS43NzYtNTAuNTMyLTUzLjA4NXYtMS4yMDNjMjIuMTg1LTMuNjA5IDM5LjU5NC0yNC4yMTEgMzkuNTk0LTQ3LjIxOSAwLTMyLjc4My0yNS44ODItNTQuMTM4LTY1LjMyMi01NC4xMzhoLTg4Ljc0djIxN2g4OS4yMDJ6bS01NC42OTItMTg5LjQ4aDQ1LjkxMWMyNC45NTggMCAzOS4xMzEgMTEuMTI4IDM5LjEzMSAzMS4yNzkgMCAyMS41MDUtMTYuNDg0IDMzLjUzNS00Ni4zNzIgMzMuNTM1aC0zOC42N3YtNjQuODE0em0wIDE2MS45NjF2LTcxLjQzMWg0NS42MDJjMzIuNjYxIDAgNDkuNjA4IDEyLjAzIDQ5LjYwOCAzNS40OSAwIDIzLjQ1OS0xNi40ODQgMzUuOTQxLTQ3LjYwNSAzNS45NDFoLTQ3LjYwNXoiPjwvcGF0aD48L3N2Zz4="
                alt="" width="72" height="57">
            <h1 class="display-5 fw-bold" style="color: white;">Bienvenido
                <?php echo $_SESSION['email'] ?? null ?>
            </h1>
            <div class="col-lg-6 mx-auto">
                <p class="lead mb-4" style="color: white;"> este es tu portal de administrador donde puedes agregar ,
                    editar y eliminar dentro de
                    la plataforma</p>
                <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
                    <a href="index.php?p=home" class="btn btn-primary">Ir a Inicio</a>
                    <?php

                    ?>
                </div>
            </div>
        </div>
    </div>
</div>