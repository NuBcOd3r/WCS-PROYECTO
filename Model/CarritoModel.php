<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

    //Registrar Carrito  
    function RegistrarCarritoModel($idProducto, $idUsuario, $cantidad)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL RegistrarCarrito('$idProducto', '$idUsuario', '$cantidad')";
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

    //Consultar Carritos
    function ConsultarCarritosModel($idUsuario)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarCarritos('$idUsuario')";
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

    //Consultar Carritos Resumen
    function ConsultarResumenCarritosModel($idUsuario)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarResumenCarritos('$idUsuario')";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while($row = $resultado->fetch_assoc()){
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
?>