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
            header("Location: ../../View/Inicio/Home.php");
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
    
?>