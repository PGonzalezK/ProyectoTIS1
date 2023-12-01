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

// Función para enviar la denuncia
function reportComment(commentId) {
  
    document.getElementById('commentId').value = commentId;
    document.forms[0].submit(); // Asegúrate de que este sea el formulario correcto
}