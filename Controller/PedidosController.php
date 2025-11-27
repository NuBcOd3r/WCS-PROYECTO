<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/PedidosModel.php';

function ConsultarPedidosAdmin() {
    return ConsultarPedidosAdminModel();
}

function ConsultarPedidoPorId($id) {
    return ConsultarPedidoPorIdModel($id);
}

function ActualizarEstadoPedido($id, $estado) {
    return ActualizarEstadoPedidoModel($id, $estado);
}
