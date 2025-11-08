
$(function () {

    $("#formSeguridad").validate({
        rules: {
            contrasenna: {
                required: true,
                 maxlength: 10
            },
            confirmarContrasenna: {
                required: true,
                equalTo: "#contrasenna",
                 maxlength: 10
            }
        },
        messages: {
            contrasenna: {
                required: "* Requerido",
                maxlength: "* Máximo 10 caracteres"
            },
            confirmarContrasenna: {
                required: "* Requerido",
                equalTo: "* Los valores no coinciden",
                maxlength: "* Máximo 10 caracteres"
            }
        }
    });

});