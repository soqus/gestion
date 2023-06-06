jQuery.validator.addMethod("lettersOnly", function(value, element) {
    return this.optional(element) || /^[a-z]+$/i.test(value);
  }, ""); 

  $("#formulario").validate({

rules:{

    nombre: {
        required: true,
        minlength: 2,
        maxlength:20,
        lettersOnly: true,

    },
    apellido:{
        required: true,
        minlength: 2,
        maxlength: 30,
        lettersOnly: true,
    },

    EnfermedadBase:{
        required: true,
        minlength: 2,
        maxlength: 50,
        lettersOnly: true,
        
    },

    celular:{
        minlength: 9,
        maxlength: 9,
        required: true,
        digits:true,
        

    },

    direccion:{
        required: true,
        maxlength:30,
    },

    motivo:{
        required: true,
        minlength: 5,
        maxlength:1000,
    },

    fecha:{
        required:true,
    },

    evidencia:{
        required:true,
    },
}

  });



  $("#pagar").click(function(){
    if ($("#form").valid() == false){

        return;
    }


  });