<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/ProductoModel.php';

    if(isset($_POST["btnRegistrarCategoria"]))
    {
        $nombreCategoria = $_POST["nombreCategoria"];

        $resultado = RegistrarCategoriaModel($nombreCategoria);

        if($resultado)
        {
            header("Location: ../../View/Productos/Categoria.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido agregar la categoria.";
    }

    function ConsultarCategorias()
    {
        $resultado = ConsultarCategoriasModel();

        if($resultado && $resultado -> num_rows > 0)
        {
            return $resultado;
        }
    }

    if(isset($_POST["btnRegistrarProducto"]))
    {
        $idCategoria = $_POST["idCategoria"];
        $nombreProducto = $_POST["nombreProducto"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];

        $resultado = RegistrarProductoModel($idCategoria, $nombreProducto, $descripcion, $precio);

        if($resultado)
        {
            header("Location: ../../View/Productos/Productos.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido agregar la categoria.";
    }
?>