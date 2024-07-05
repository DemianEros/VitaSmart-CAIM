document.addEventListener("DOMContentLoaded", function() {
    // Usar el evento DOMContentLoaded para cuando el DOM esté completamente cargado
    window.addEventListener('load', function() {
        // Agregar un retraso de 2 segundos (2000 ms)
        setTimeout(function() {
            // Ocultar el loader
            document.getElementById('loader-wrapper').style.display = 'none';
            // Mostrar el contenido
            document.getElementById('content').style.display = 'block';
        }, 2000); // 2000 milisegundos = 2 segundos
    });
});
