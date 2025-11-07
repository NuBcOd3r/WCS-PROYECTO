<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarProductos();
?>

<!DOCTYPE html>
<html lang="en">

<?php
    ShowHead()
?>

<body>

    <?php
      ShowToggler()
   ?>

    <?php
        ShowHeader()
    ?>


    <!-- FORMULARIO -->
    <section class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                        <div class="card-body">

                            <h2 class="login-title text-center mb-4 mt-2">Listado de Productos</h2>

                            <div class="mb-3">
                                <a class="btn text-white px-4" style="background-color: #f08632;"
                                    href="RegistroProductos.php">
                                    Registrar Producto
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table id="tbProductos" class="table table-striped table-hover align-middle">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Categoría</th>
                                            <th>Producto</th>
                                            <th>Precio</th>
                                            <th>Imagen</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($resultado as $fila) 
                                            {
                                                echo "<tr>";
                                                echo "<td class='text-center'><strong>" . $fila['idProducto'] . "</strong></td>";
                                                echo "<td class='text-center'>" . htmlspecialchars($fila['nombreCategoria']) . "</td>";
                                                echo "<td class='text-center'>" . htmlspecialchars($fila['nombreProducto']) . "</td>";
                                                echo "<td class='text-center'>" . htmlspecialchars($fila['precio']) . "</td>";
                                                echo "<td class='text-center'><img src='" . htmlspecialchars($fila['imagen']) . "' width='85' height='85' class='rounded shadow-sm'></td>";
                                                echo "<td><a href='ActualizarProducto.php?id=" . $fila["idProducto"] . "'> Actualizar </td>";
                                                echo "</tr>";
                                            }
                                        ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>


    <?php
        ShowFooter()
    ?>

    <?php
        ShowJS()
    ?>

    <script src="../js/VerProductos.js"></script>
</body>

</html>