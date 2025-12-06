<?php
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/PedidosModel.php';

    if(isset($_POST["btnEnviarPedido"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $direccion = $_POST["direccion"];
        $fechaDeseada = $_POST["fechaDeseada"];
        $descripcion = $_POST["descripcion"];
        
        $resultado = RegistrarPedidoModel($idUsuario, $direccion, $fechaDeseada, $descripcion);

        if($resultado)
        {
            header("Location: ../../View/Productos/Productos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "El pedido no se realizo correctamente";
        }        
    }  

    function ConsultarPedidosAdmin() {
    return ConsultarPedidosModel();
}
?>