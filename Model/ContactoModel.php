<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

    function GuardarContactoModel($nombre, $email, $telefono, $asunto, $mensaje)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL GuardarContacto('$nombre', '$email', '$telefono', '$asunto', '$mensaje')";
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