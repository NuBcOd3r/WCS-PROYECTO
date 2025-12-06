<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

function ConsultarPedidosAdminModel()
{
    try {
        $context = OpenConnection();
        $sentencia = "CALL ConsultarPedidosAdmin()";
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

function ConsultarPedidoPorIdModel($idPedido)
{
    try {
        $context = OpenConnection();
        $id = intval($idPedido);
        $sentencia = "SELECT idPedido, nombreCliente, emailCliente, telefonoCliente,
                             direccionEntrega, fechaPedido, fechaDeseada,
                             observaciones, estado, total
                      FROM tbpedidos
                      WHERE idPedido = $id";
        $resultado = $context->query($sentencia);
        $pedido = $resultado->fetch_assoc();

        $resultado->free();
        CloseConnection($context);
        return $pedido;
    } catch (Exception $error) {
        SaveError($error);
        return null;
    }
}

function ActualizarEstadoPedidoModel($idPedido, $nuevoEstado)
{
    try {
        $context = OpenConnection();

        // Protección básica
        $id = intval($idPedido);
        $estado = mysqli_real_escape_string($context, $nuevoEstado);

        $sentencia = "CALL ActualizarEstadoPedido($id, '$estado')";
        $context->query($sentencia);

        CloseConnection($context);
        return true;
    } catch (Exception $error) {
        SaveError($error);
        return false;
    }
}
?>