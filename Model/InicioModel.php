<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

    function CrearCuentaModel($cedula,$nombreCompleto,$correo,$telefono,$contrasenna)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL CrearUsuario('$cedula','$nombreCompleto','$correo','$telefono','$contrasenna')";
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

    function ValidarCuentaModel($correo,$contrasenna)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ValidarUsuario('$correo','$contrasenna')";
            $resultado = $context -> query($sentencia);
            //CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function RecuperarCuentaModel($correo)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ValidarCorreo('$correo')";
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

    function ActualizarContrasennaModel($idUsuario,$contrasennaGenerada)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarContrasenna('$idUsuario','$contrasennaGenerada')";
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