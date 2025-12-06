<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

    function RegistrarPedidoModel($idUsuario, $direccion, $fechaDeseada, $descripcion)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarPedido('$idUsuario', '$direccion', '$fechaDeseada', '$descripcion')";
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

    function ConsultarPedidosModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarPedidos()";
            $resultado = $context -> query($sentencia);
 
            $datos = [];
            while($row = $resultado->fetch_assoc()){
                $datos[] = $row;
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


?>