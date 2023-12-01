<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
</script>

<script>
$(document).ready(function() {
    // Mostrar la descripción completa y ocultar el botón "Mostrar más"
    $(".mostrar-mas-btn").click(function() {
        var container = $(this).closest(".descripcion-container");
        container.find(".descripcion-corta").hide();
        container.find(".descripcion-completa").show();
        container.find(".cerrar-btn").show();
        $(this).hide();
    });

    // Ocultar la descripción completa, mostrar el botón "Mostrar más" y ocultar el botón "Cerrar"
    $(document).on("click", ".cerrar-detalles-btn", function() {
        $("#tablaDetalles").hide();
    });

    // Mostrar más detalles en la tabla aparte
    $(".mostrar-mas-btn-acciones").click(function() {
        var fila = $(this).closest("tr");
        var detalles = fila.find(".descripcion-container").html();
        detalles = detalles.replace(/display: none;/g, "");

        var detallesHTML = "<tr>" +
            "<td>" + fila.find("td").eq(0).text() + "</td>" +
            "<td>" + fila.find("td").eq(1).text() + "</td>" +
            "<td>" + fila.find("td").eq(2).text() + "</td>" +
            "<td>" + fila.find("td").eq(3).text() + "</td>" +
            "<td colspan='1' class='descripcion-container'>" + detalles + "</td>" +
            "<td style='max-width: 100px; overflow: hidden; text-overflow: ellipsis;'>" + fila.find("td").eq(6).text() +
            "</td></tr>";

        $("#detallesBody").html(detallesHTML);
        $("#tablaDetalles").show();
        $("#tablaDetalles .mostrar-mas-btn").hide();
    });

    // Realizar la solicitud AJAX para actualizar el estado en la base de datos
    $("select.form-select").change(function() {
        var id = $(this).closest("tr").find("td").eq(0).text();
        var nuevoEstado = $(this).val();

        $.ajax({
            type: "POST",
            url: "index.php?p=admin/participacion/action/update_estado",
            data: { id: id, estado: nuevoEstado },
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
    });

});
</script>
<!-- Scripts de Bootstrap -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL"
    crossorigin="anonymous"></script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/slick/slick.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="js/script.js"></script>

</body>

</html>