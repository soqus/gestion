$(document).ready(function() {
    $('.menu_lateral a').on('click', function(e) {
      e.preventDefault(); // Evita la acción predeterminada del enlace
      
      var target = $(this).data('target'); // Obtiene el valor del atributo data-target
      var url = target + '.php'; // Asigna la URL del archivo a cargar
      
      // Realiza la petición Ajax para obtener el contenido
      $.ajax({
        url: url,
        success: function(data) {
          $('#contenido').html(data); // Actualiza el contenido en la sección
        },
        error: function() {
          $('#contenido').html('<p>Error al cargar el contenido.</p>'); // Muestra un mensaje de error en caso de falla
        }
      });
    });
  });
