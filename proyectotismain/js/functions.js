// functions.js

function mostrarPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "block";
}

function cerrarPopup() {
    var popup = document.getElementById("popup");
    popup.style.display = "none";
}

function mostrarModalIniciarSesion() {
    $('#iniciarSesionModal').modal('show');
}

function cerrarModalIniciarSesion() {
    $('#iniciarSesionModal').modal('hide');
}
// Función para mostrar el modal de denunciar
function mostrarDenunciarModal(commentId) {
    $('#denunciarModal').modal('show');

    document.getElementById('commentIdToReport').value = commentId;
}

function reportComment() {
        var commentIdToReport = document.getElementById('commentIdToReport').value;

        $.ajax({
            type: 'POST',
            url: 'procesar_denuncia.php', // Reemplaza con la ruta correcta a tu script PHP
            data: { comment_id: commentIdToReport },
            success: function (response) {
                // Puedes manejar la respuesta del servidor aquí si es necesario
                alert(response);
            },
            error: function (error) {
                console.error('Error al procesar la denuncia: ', error);
            }
        });

        // Cierra el modal después de enviar la denuncia
        $('#denunciarModal').modal('hide');
}


function configurarDenuncia(commentId) {
    document.getElementById('commentIdToReport').value = commentId;
    $('#denunciarModal').modal('show');
}

function confirmarDenuncia() {
    // Envía el formulario cuando se confirma la denuncia
    document.getElementById('denunciaForm').submit();
}