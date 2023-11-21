
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {
    $(".mostrar-mas-btn").click(function() {
        // Mostrar la descripción completa y ocultar el botón "Mostrar más"
        var container = $(this).closest(".descripcion-container");
        container.find(".descripcion-corta").hide();
        container.find(".descripcion-completa").show();
        container.find(".cerrar-btn").show();
        $(this).hide();
    }});

    $(document).addEventListener("DOMContentLoaded", function() {
        // Manejar el cambio en el menú desplegable
        document.getElementById("filtroDepartamento").addEventListener("change", function() {
            // Obtener el valor seleccionado
            var filtroDepartamento = this.value;

            // Obtener la acción actual del formulario
            var formAction = document.getElementById("filtroForm").getAttribute("action");

            // Construir la nueva acción con los parámetros del filtro
            var nuevaAccion = formAction + "&filtroDepartamento=" + filtroDepartamento;

            // Actualizar la acción del formulario
            document.getElementById("filtroForm").setAttribute("action", nuevaAccion);
            
            // Enviar el formulario
            document.getElementById("filtroForm").submit();
        });

    $(".cerrar-btn").click(function() {
        // Ocultar la descripción completa, mostrar el botón "Mostrar más" y ocultar el botón "Cerrar"
        var container = $(this).closest(".descripcion-container");
        container.find(".descripcion-corta").show();
        container.find(".descripcion-completa").hide();
        container.find(".mostrar-mas-btn").show();
        $(this).hide();
    });

    $(".mostrar-mas-btn-acciones").click(function() {
        // Mostrar más detalles en la tabla aparte
        var fila = $(this).closest("tr");
        var detalles = fila.find(".descripcion-container")
    .html(); // Cambiado para incluir la descripción corta
        detalles = detalles.replace(/display: none;/g, ""); // Mostrar la descripción completa

        var detallesHTML = "<tr>" +
            "<td>" + fila.find("td").eq(0).text() + "</td>" +
            "<td>" + fila.find("td").eq(1).text() + "</td>" +
            "<td>" + fila.find("td").eq(2).text() + "</td>" +
            "<td>" + fila.find("td").eq(3).text() + "</td>" +
            "<td colspan='1' class='descripcion-container'>" + detalles + "</td>" +

            "<td style='max-width: 100px; overflow: hidden; text-overflow: ellipsis;'>" + fila.find(
                "td").eq(6).text() +
            "</td></tr>";
        $("#detallesBody").html(detallesHTML);
        $("#tablaDetalles").show();
        $("#tablaDetalles .mostrar-mas-btn").hide();
    });

    $("select.form-select").change(function() {
        var id = $(this).closest("tr").find("td").eq(0).text(); // Obtener el ID de la fila
        var nuevoEstado = $(this).val(); // Obtener el nuevo estado de revisión

        // Realizar la solicitud AJAX para actualizar el estado en la base de datos
        $.ajax({
            type: "POST",
            url: "index.php?p=admin/participacion/action/update_estado", // Ajusta la ruta al archivo PHP que manejará la actualización
            data: { id: id, estado: nuevoEstado },
            success: function(response) {
                console.log(response); // Puedes mostrar la respuesta en la consola para depurar
            },
            error: function(error) {
                console.error(error);
            }
        });
    });
});

</script>


</body>

</html>