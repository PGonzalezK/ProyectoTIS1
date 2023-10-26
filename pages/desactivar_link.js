document.getElementById('emprendedores-link').addEventListener('click', function(event) {
    // Evitar el comportamiento predeterminado del enlace
    event.preventDefault();
    
    // Desactivar el enlace
    this.classList.add('disabled');
    this.removeAttribute('href'); // Elimina el atributo "href"

    console.log('El enlace fue clicado.');
});

document.getElementById('participacion-link').addEventListener('click', function(event) {
    // Evitar el comportamiento predeterminado del enlace
    event.preventDefault();
    
    // Desactivar el enlace
    this.classList.add('disabled');
    this.removeAttribute('href'); // Elimina el atributo "href"

    console.log('El enlace fue clicado.');
});