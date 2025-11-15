<?php
    include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Model/UtilitiesModel.php';

    //Registrar Producto
    function RegistrarProductoModel($idCategoria, $nombreProducto, $descripcion, $precio, $cantidad, $imagen)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL RegistrarProducto('$idCategoria', '$nombreProducto', '$descripcion', '$precio', '$cantidad', '$imagen')";
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

    //Consultar Productos
    function ConsultarProductosModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarProductos()";
            $resultado = $context -> query($sentencia);

            $datos = [];
            while($row = $resultado->fetch_assoc()){
                $datos[] = $row;
            }

            $resultado->free();
            CloseConnection($context);
            
            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    //Consultar Productos
    function ConsultarProductosIndexModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarProductosIndex()";
            $resultado = $context -> query($sentencia);

            $datos = [];
            while($row = $resultado->fetch_assoc()){
                $datos[] = $row;
            }

            $resultado->free();
            CloseConnection($context);
            
            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    //Consultar Producto
    function ConsultarProductoModel($id)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarProducto($id)";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
                $datos = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    //Actualizar Producto
    function ActualizarProductoModel($idProducto, $idCategoria, $nombreProducto, $descripcion, $precio, $cantidad, $imagen)
    {
        try
        {
            $context = OpenConnection();
            $sentencia = "CALL ActualizarProducto('$idProducto','$idCategoria', '$nombreProducto', '$descripcion', '$precio', '$cantidad', '$imagen')";
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

    //Registrar Categoria
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

    //Consultar Categoria
    function ConsultarCategoriaModel($id)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarCategoria($id)";
            $resultado = $context -> query($sentencia);

            $datos = null;
            while ($row = $resultado->fetch_assoc()) {
                $datos = $row;
            }

            $resultado->free();
            CloseConnection($context);

            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    //Consultar Categorias
    function ConsultarCategoriasModel()
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ConsultarCategorias()";
            $resultado = $context -> query($sentencia);

            $datos = [];
            while($row = $resultado->fetch_assoc()){
                $datos[] = $row;
            }

            $resultado->free();
            CloseConnection($context);
            
            return $datos;
        }
        catch(Exception $error)
        {
            SaveError($error);
            return null;
        }
    }

    //Actualizar Categoria
    function ActualizarCategoriaModel($idCategoria,$nombreCategoria)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL ActualizarCategoria('$idCategoria', '$nombreCategoria')";
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

    //Cambiar Estado   
    function CambiarEstadoProductoModel($idProducto)
    {
        try
        {
            $context = OpenConnection();

            $sentencia = "CALL CambiarEstadoProducto('$idProducto')";
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