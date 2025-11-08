<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UsuarioModel.php';

    //SESSION NONE
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    //CONSULTAR USUARIO
    function ConsultarUsuario()
    {
        $idUsuario = $_SESSION["idUsuario"];
        return ConsultarUsuarioModel($idUsuario);
    }

    //BTN ACTUALIZAR PERFIL
    if(isset($_POST["btnActualizarPerfil"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $cedula = $_POST["cedula"];
        $nombre = $_POST["nombre"];
        $correo = $_POST["correo"];
        $telefono = $_POST["telefono"];  

        $resultado = ActualizarPerfilModel($idUsuario, $cedula,$nombre,$correo,$telefono);

        if($resultado)
        {
            $_SESSION["nombre"] = $nombre;
            $_POST["MensajeBueno"] = "La información se actualizó correctamente";
        }
        else
        {
            $_POST["Mensaje"] = "La información no se actualizó correctamente";
        }        
    }

    //BTN ACTUALIZAR SEGURIDAD
    if(isset($_POST["btnActualizarSeguridad"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $contrasenna = $_POST["contrasenna"];

        $resultado = ActualizarSeguridadModel($idUsuario, $contrasenna);

        if($resultado)
        {
            $_POST["MensajeBueno"] = "La información se actualizó correctamente";
        }
        else
        {
            $_POST["Mensaje"] = "La información no se actualizó correctamente";
        }        
    }   
?>