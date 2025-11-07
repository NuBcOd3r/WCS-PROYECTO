$(function () {

    $("#formRegistrarCategoria").validate({
        rules: {
            nombreCategoria: {
                required: true
            }
        },
        messages: {
            nombreCategoria: {
                required: "* Este campo es obligatorio."
            }
        }
    });
});