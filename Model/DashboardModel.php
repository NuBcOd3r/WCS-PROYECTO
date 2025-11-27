<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';


//Productos activos
function ContarProductosActivosModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ContarProductosActivos()";
        $resultado = $context->query($sentencia);

        $total = 0;
        if ($row = $resultado->fetch_assoc()) {
            // alias del SP: totalProductosActivos
            $total = $row['totalProductosActivos'];
        }

        $resultado->free();
        CloseConnection($context);
        return $total;
    } catch (Exception $error) {
        SaveError($error);
        return 0;
    }
}

//Categorías totales
function ContarCategoriasModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ContarCategoriasTotal()";
        $resultado = $context->query($sentencia);

        $total = 0;
        if ($row = $resultado->fetch_assoc()) {
            $total = $row['totalCategorias'];
        }

        $resultado->free();
        CloseConnection($context);
        return $total;
    } catch (Exception $error) {
        SaveError($error);
        return 0;
    }
}

//Pedidos pendientes
function ContarPedidosPendientesModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ContarPedidosPendientes()";
        $resultado = $context->query($sentencia);

        $total = 0;
        if ($row = $resultado->fetch_assoc()) {
            $total = $row['pedidosPendientes'];
        }

        $resultado->free();
        CloseConnection($context);
        return $total;
    } catch (Exception $error) {
        SaveError($error);
        return 0;
    }
}
//Pedidos completados del mes
function ContarPedidosCompletadosMesModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ContarPedidosCompletadosMes()";
        $resultado = $context->query($sentencia);

        $total = 0;
        if ($row = $resultado->fetch_assoc()) {
            $total = $row['pedidosCompletados'];
        }

        $resultado->free();
        CloseConnection($context);
        return $total;
    } catch (Exception $error) {
        SaveError($error);
        return 0;
    }
}

function ConsultarPedidosRecientesModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ConsultarPedidosRecientes()";
        $resultado = $context->query($sentencia);

        $datos = [];
        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }

        $resultado->free();
        CloseConnection($context);
        return $datos;
    } catch (Exception $error) {
        SaveError($error);
        return [];
    }
}

function ConsultarProductosConStockBajoModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ConsultarProductosConStockBajo()";
        $resultado = $context->query($sentencia);

        $datos = [];
        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }

        $resultado->free();
        CloseConnection($context);
        return $datos;
    } catch (Exception $error) {
        SaveError($error);
        return [];
    }
}

function ConsultarContactosRecientesModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ConsultarContactosRecientes()";
        $resultado = $context->query($sentencia);

        $datos = [];
        while ($row = $resultado->fetch_assoc()) {
            $datos[] = $row;
        }

        $resultado->free();
        CloseConnection($context);
        return $datos;
    } catch (Exception $error) {
        SaveError($error);
        return [];
    }
}
