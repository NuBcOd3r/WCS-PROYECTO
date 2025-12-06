<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/CarritoModel.php';
    
    if(session_status() == PHP_SESSION_NONE)
    {
        session_start();
    }

    //Registrar Carrito
    if(isset($_POST["btnAgregarProductoCarrito"]))
    {
        $idProducto = $_POST["idProducto"];
        $idUsuario = $_SESSION["idUsuario"];
        $cantidad = $_POST["cantidad"];
        
        $resultado = RegistrarCarritoModel($idProducto, $idUsuario, $cantidad);

        if($resultado)
        {
            header("Location: ../../View/Productos/Productos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "La información no se agrego correctamente";
        }        
    }  

    //Consultar Carritos
    function ConsultarCarritos()
    {
        $idUsuario = $_SESSION["idUsuario"];
        return ConsultarCarritosModel($idUsuario);
    }

    //Consultar Carritos Resumen
    function ConsultarResumenCarritos()
    {
        $idUsuario = $_SESSION["idUsuario"];
        $resultado = ConsultarResumenCarritosModel ($idUsuario);

        $_SESSION["Cantidad"] = $resultado["Cantidad"];
        $_SESSION["Total"] = $resultado["Total"];
    }
    
    //Remover Producto Carrito
    if(isset($_POST["btnRemoverProductoCarrito"]))
    {
        $idProducto = $_POST["idProducto"];
        $idUsuario = $_SESSION["idUsuario"];
        
        $resultado = RemoverProductoCarritoModel($idProducto, $idUsuario);

        if($resultado)
        {
            ConsultarResumenCarritos();
            header("Location: ../../View/Carrito/Carritos.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "La información no se removió correctamente";
        }        
    }

    //Pagar Carrito
    if(isset($_POST["btnRealizarPagoCarrito"]))
    {
        $idUsuario = $_SESSION["idUsuario"];
        $mediPago = $_POST["MedioPago"];
        
        $resultado = RegistrarPagoCarritoModel($idUsuario, $mediPago);

        if($resultado)
        {
            header("Location: ../../View/Inicio/Home.php");
            exit;
        }
        else
        {
            $_POST["Mensaje"] = "La transacción no se realizo correctamente";
        }        
    }  

    //Consultar Compras
    function ConsultarCompras()
    {
        $idUsuario = $_SESSION["idUsuario"];
        return ConsultarComprasModel($idUsuario);
    }

    //Consultar Detalle Compras
    function ConsultarDetalleCompras($idFactura)
    {
        return ConsultarDetalleComprasModel($idFactura);
    }
?>