<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/ProductoModel.php';

    //Registrar Producto
    if(isset($_POST["btnRegistrarProducto"]))
    {
        $idCategoria = $_POST["idCategoria"];
        $nombreProducto = $_POST["nombreProducto"];
        $descripcion = $_POST["descripcion"];
        $precio = $_POST["precio"];
        $imagen = '';

        if($_FILES["imagen"]["name"] != "")
        {
            $imagen = '../img/' . $_FILES["imagen"]["name"];
            $origen = $_FILES["imagen"]["tmp_name"];
            $destino = $_SERVER["DOCUMENT_ROOT"] . '/WCS-PROYECTO/View/img/' . $_FILES["imagen"]["name"];
            copy($origen,$destino);
        }  

        $resultado = RegistrarProductoModel($idCategoria,$nombreProducto,$descripcion,$precio,$imagen);

        if($resultado)
        {
            header("Location: ../../View/Productos/Productos.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido agregar el producto.";
    }

    //Consultar Productos
    function ConsultarProductos()
    {
        return ConsultarProductosModel();
    }

    //Registrar Categoria
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

    //Consultar Categoria
    function ConsultarCategoria($id)
    {
        return ConsultarCategoriaModel($id);
    }

    //Consultar Categorias
    function ConsultarCategorias()
    {
        return ConsultarCategoriasModel();
    }

    //Actualizar Categoria
    if(isset($_POST["btnActualizarCategoria"]))
    {
        $idCategoria = $_POST["idCategoria"];
        $nombreCategoria = $_POST["nombreCategoria"];

        $resultado = ActualizarCategoriaModel($idCategoria,$nombreCategoria);

        if($resultado)
        {
            header("Location: ../../View/Productos/Categoria.php");
            exit;
        }

        $_POST["Mensaje"] = "No se ha podido agregar la categoria.";
    }
?>