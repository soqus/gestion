

function iniciar_sesion(){
    window.location.href= "login.php";
}

function cerrar_sesion(){
    window.location.href = "php/cerrar_sesion.php"
}


//Guardar paciente  nuevo en la BD

document.getElementById('guardar').addEventListener('click', function(event) {
  event.preventDefault(); // Evita el comportamiento predeterminado de navegación

  var rut = document.getElementById("rut").value;
  var nombre = document.getElementById("nombre").value;
  var apellido = document.getElementById("apellido").value;
  var edad = document.getElementById("edad").value;
  var enf_base = document.getElementById("enf_base").value;
  var telefono = document.getElementById("telefono").value;
  var direccion = document.getElementById("direccion").value;
  var email = document.getElementById("email").value;
  var pro_real = document.getElementById("pro_real").value;

  var data = new FormData();
  data.append('rut', rut);
  data.append('nombre', nombre);
  data.append('apellido', apellido);
  data.append('edad', edad);
  data.append('enf_base', enf_base);
  data.append('telefono', telefono);
  data.append('direccion', direccion);
  data.append('email', email);
  data.append('pro_real', pro_real);

  fetch('php/insertar.php', {
    method: 'POST',
    body: data
  })
    .then(response => response.text())
    .then(data => {
      // Procesa la respuesta del servidor
      console.log(data);
      alert ('Paciente guardado exitosamente');
      window.location.href = "pacientes.php"
    })
    .catch(error => console.error('Error en la solicitud Fetch: ', error));
});
  


  //function obtenerDato(rut) {
    //var dato_1 = document.getElementById('dato')
    //console.log(dato_1); // Imprime el valor del RUT en la consola
    //console.log(rut); // Imprime el valor del RUT en la consola
  //}