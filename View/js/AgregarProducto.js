$(function () {

    $("#formRegistrarProducto").validate({
        rules: {
            idCategoria: {
                required: true
            },
            nombreProducto: {
                required: true
            },
            descripcion: {
                required: false
            },
            precio: {
                required: true,
                number: true,
                min: 0.01
            },
            imagen: {
                required: true,
                extension: "jpg|jpeg|png",
                filesize: 2 * 1024 * 1024
            }
        },
        messages: {
           idCategoria: {
                required: "* Seleccione una categoría."
            },
            nombreProducto: {
                required: "* El nombre del producto es obligatorio."
            },
            precio: {
                required: "* El precio es obligatorio.",
                number: "* Ingrese solo números válidos.",
                min: "* El precio debe ser mayor que 0."
            },
            imagen: {
                required: "* Debe subir una imagen del producto.",
                extension: "* Solo se permiten imágenes JPG o PNG.",
                filesize: "* La imagen no debe superar los 2 MB."
            }
        },
    });

    $.validator.addMethod("filesize", function(value, element, param) {
        if (element.files.length === 0) {
            return true;
        }
        return element.files[0].size <= param;
    },"El archivo no debe superar los 2 MB.");

      $.validator.addMethod("extension", function(value, element, param) {
        if (value === "") return true;
        var extension = value.split('.').pop().toLowerCase();
        var allowed = param.split('|');
        return allowed.includes(extension);
    }, "Formato de archivo no permitido.");

});