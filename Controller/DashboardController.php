<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/DashboardModel.php';


function ContarProductosActivos() {
    return ContarProductosActivosModel();
}

function ContarCategorias() {
    return ContarCategoriasModel();
}

function ContarPedidosPendientes() {
    return ContarPedidosPendientesModel();
}

function ContarPedidosCompletadosMes() {
    return ContarPedidosCompletadosMesModel();
}

function ConsultarPedidosRecientes() {
    return ConsultarPedidosRecientesModel();
}

function ConsultarProductosConStockBajo() {
    return ConsultarProductosConStockBajoModel();
}

function ConsultarContactosRecientes() {
    return ConsultarContactosRecientesModel();
}
