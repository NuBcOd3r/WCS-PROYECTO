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

    function ConsultarPedidoPorIdModel($idPedido)
    {
        try {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarPedidoPorId('$idPedido')";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
                $datos = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        } catch (Exception $error) {
            SaveError($error);
            return null;
        }
    }

    function ActualizarPedidoModel($idPedido,$fechaDeseada, $direccionEntrega, $descripcion)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarPedido('$idPedido','$fechaDeseada', '$direccionEntrega', '$descripcion')";
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

    function CotizarPedidoModel($idPedido,$precioUnitario,$cantidad)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL CotizarPedido('$idPedido','$precioUnitario','$cantidad')";
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

    function ConsultarCotizacionPorIdModel($idPedido)
    {
        try {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarCotizacionPorId('$idPedido')";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
                $datos = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        } catch (Exception $error) {
            SaveError($error);
            return null;
        }
    }

    function FinalizarPedidoModel($idPedido)
    {
        try {

            $context = OpenConnection();
            $sentencia = "CALL FinalizarPedido('$idPedido')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;

        } catch (Exception $error) {
            SaveError($error);
            return null;
        }
    }

    
?>