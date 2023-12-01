$(document).ready(function () {
    // Manejar cambios en el selector de categorías
    $('#categoria').change(function () {
        var categoriaSeleccionada = $(this).val();

        // Realizar solicitud AJAX para obtener noticias filtradas
        $.ajax({
            type: 'GET',
            url: 'index.php?p=actualidad/noticias/action/filtrar_noticia',
            data: { categoria: categoriaSeleccionada },
            dataType: 'json',
            success: function (response) {
                // Actualizar el contenido del contenedor de noticias filtradas
                var noticiasFiltradasContainer = $('#noticias-filtradas');
                noticiasFiltradasContainer.empty();

                // Agregar noticias al contenedor
                $.each(response, function (index, noticia) {
                    var html = '<div class="col-md-6">';
                    html += '<div class="tn-img">';
                    // Agregar el resto de la estructura HTML para mostrar la noticia (similar a mainNoticias.php)
                    // ...

                    html += '</div>';
                    html += '</div>';

                    noticiasFiltradasContainer.append(html);
                });
            },
            error: function (error) {
                console.log('Error en la solicitud AJAX:', error.responseText);
            }
        });
    });
});