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

?>