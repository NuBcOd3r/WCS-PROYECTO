$(function () {

    $("#formPerfil").validate({
        rules: {
            cedula: {
                required: true
            },
            nombre: {
                required: true
            },
            correo: {
                required: true
            },
            nombrePerfil: {
                required: true
            },
            telefono:{
                required:true
            },
        },
        messages: {
            cedula: {
                required: "* Requerido"
            },
            nombre: {
                required: "* Requerido"
            },
            correo: {
                required: "* Requerido"
            },
            nombrePerfil: {
                required: "* Requerido"
            },
            telefono:{
                required: "* Requerido"
            },
        }
    });
});