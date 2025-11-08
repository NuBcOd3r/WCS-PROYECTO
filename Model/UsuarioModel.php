<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

    //CONSULTAR USUARIO
    function ConsultarUsuarioModel($idUsuario)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarUsuario('$idUsuario')";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
                $datos = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    //ACTUALIZAR PERFIL
    function ActualizarPerfilModel($idUsuario,$cedula,$nombre,$correo,$telefono)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ActualizarPerfil('$idUsuario', '$cedula', '$nombre', '$correo', '$telefono')";
            $resultado = $context -> query($sentencia);

            CloseConnection($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    //ACTUALIZAR SEGURIDAD
    function ActualizarSeguridadModel($idUsuario,$contrasenna)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ActualizarContrasenna('$idUsuario', '$contrasenna')";
            $resultado = $context -> query($sentencia);

            CloseConnection($context);

            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

?>