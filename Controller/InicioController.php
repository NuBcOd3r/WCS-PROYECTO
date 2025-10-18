<?php
    //include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/UtilitiesController.php';
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/InicioModel.php';

    if(isset($_POST["btnRegistro"]))
    {
        $cedula = $_POST["cedula"];
        $nombreCompleto = $_POST["nombreCompleto"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = CrearCuentaModel($cedula,$nombreCompleto,$correo,$telefono,$contrasenna);

        if($resultado)
        {
            header("Location: ../../View/Inicio/InicioSesion.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido crear la cuenta solicitada";
    }

    if(isset($_POST["btnInicioSesion"]))
    {
        $correo = $_POST["correo"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = ValidarCuentaModel($correo,$contrasenna);

        if($resultado)
        {
            header("Location: ../../View/Inicio/Home.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido iniciar sesión, verifique sus credenciales.";
    }

    if(isset($_POST["btnRecuperarContraseña"]))
    {
        $correo = $_POST["correo"];

        $resultado = RecuperarCuentaModel($correo);

        if($resultado != null && $resultado -> num_rows > 0)
        {
            $datos = mysqli_fetch_array($resultado);
            $contrasennaGenerada = GenerarContrasenna();
            $resultadoActualizar = ActualizarContrasennaModel($datos['idUsuario'],$contrasennaGenerada);
            
            if($resultadoActualizar)
                EnviarCorreo('Recuperar Acceso', $contrasennaGenerada, $correo);
                
                {header("Location: ../../View/Inicio/InicioSesion.php");
                exit;
            }
        }

        $_POST["Mensaje"] = "No se ha podido procesar.";
    }
?>