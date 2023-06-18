// Obtener todos los elementos con la clase "ver_ficha"
var enlaces = document.getElementsByClassName("ver_ficha");

// Iterar sobre los enlaces y agregar un evento onclick a cada uno
for (var i = 0; i < enlaces.length; i++) {
    enlaces[i].onclick = function() {
        // Obtener el elemento padre del enlace (la fila)
        var fila = this.parentNode.parentNode;

        // Obtener el contenido del elemento con el id "rut_paciente"
        var rut = fila.querySelector("#rut_paciente").textContent;

        // Mostrar el contenido en la consola
        console.log(rut);

        // Crear un formulario dinámicamente
        var form = document.createElement("form");
        form.method = "post";
        form.action = "ficha.php";

        // Crear un input oculto para enviar el valor de "rut_paciente"
        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "rut_paciente";
        input.value = rut;

        // Agregar el input al formulario
        form.appendChild(input);

        // Agregar el formulario al documento y enviarlo
        document.body.appendChild(form);
        form.submit();

        // Evitar el comportamiento predeterminado del enlace
        return false;
    };
}
