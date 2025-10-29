<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

    function RegistrarCategoriaModel($nombreCategoria)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarCategoria('$nombreCategoria')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }

    function ConsultarCategoriasModel()
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ConsultarCategorias()";
            $resultado = $context -> query($sentencia);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    function RegistrarProductoModel($idCategoria, $nombreProducto, $descripcion, $precio)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarProducto('$idCategoria', '$nombreProducto', '$descripcion', '$precio')";
            $resultado = $context -> query($sentencia);
            CloseConnection($context);
            return $resultado;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return false;
        }
    }
?>