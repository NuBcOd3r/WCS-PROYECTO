function ConsultarNombre()
{
    let cedula = document.getElementById("cedula").value;
    document.getElementById("nombreCompleto").value = "";

    if(cedula.length >= 9)
    {
        $.ajax({
            type: 'GET',
            url: 'https://apis.gometa.org/cedulas/' + cedula,
            dataType: 'json',
            success: function(data){
                if(data.resultcount > 0)
                {
                    document.getElementById("nombreCompleto").value = data.nombre;
                }
            }
        });
    }    
}

$(function () {

    $("#formRegistro").validate({
        rules: {
            cedula: {
                required: true
            },
            nombreCompleto: {
                required: true
            },
            correo: {
                required: true
            },
            telefono: {
                required: true
            },
            contrasenna: {
                required: true
            },
        },
        messages: {
            cedula: {
                required: "*Campo Obligatorio"
            },
            nombreCompleto: {
                required: "*Campo Obligatorio"
            },
            correo: {
                required: "*Campo Obligatorio"
            },
            telefono: {
                required: "*Campo Obligatorio"
            },
            contrasenna: {
                required: "*Campo Obligatorio"
            }
        }
    });

});