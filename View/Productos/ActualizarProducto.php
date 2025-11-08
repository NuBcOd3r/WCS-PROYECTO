<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarProducto($_GET["id"]);
  $resultados = ConsultarCategorias();
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
                            <h2 class="login-title text-center mb-4 mt-2">Actualizar Producto</h2>

                            <?php
                        if (isset($_POST["Mensaje"])) {
                            echo '<div class="alert alert-primary centrado">' . $_POST["Mensaje"] . '</div>';
                        }
                        ?>

                            <form id="formActualizarProducto" class="mb-3" action="" method="POST"
                                enctype="multipart/form-data">
                                <input type="hidden" id="idProducto" name="idProducto"
                                    value="<?php echo $resultado["idProducto"]?>">

                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="idCategoria" class="form-label mt-2"
                                                style="color: #f08632; font-weight: 700;">
                                                Categoría
                                            </label>
                                            <select name="idCategoria" id="idCategoria"
                                                class="form-select border-1 login-input" required style="height: 55px;">
                                                <option value="">Seleccione una Categoría</option>
                                                <?php
                                                    foreach ($resultados as $fila) {
                                                        $selected = ($fila['idCategoria'] == $resultado['idCategoria']) ? 'selected' : '';
                                                        echo "<option value='" . $fila['idCategoria'] . "' $selected>" . htmlspecialchars($fila['nombreCategoria']) . "</option>";
                                                    }
                                                ?>
                                            </select>
                                        </div>


                                        <div class="mb-3">
                                            <label class="form-label mt-2" style="color: #f08632;font-weight: 700;">
                                                Nombre del Producto
                                            </label>
                                            <input type="text" class="form-control" id="nombreProducto"
                                                name="nombreProducto"
                                                value="<?php echo $resultado['nombreProducto']; ?>" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label mt-2" style="color: #f08632;font-weight: 700;">
                                                Descripción
                                            </label>
                                            <input type="text" class="form-control" id="descripcion" name="descripcion"
                                                value="<?php echo $resultado['descripcion']; ?>" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label mt-2" style="color: #f08632;font-weight: 700;">
                                                Precio
                                            </label>
                                            <input type="text" class="form-control" id="precio" name="precio"
                                                value="<?php echo $resultado['precio']; ?>" />
                                        </div>

                                        <div class="mb-3">
                                            <label class="form-label mt-2" style="color: #f08632;font-weight: 700;">
                                                Nueva imagen (opcional)
                                            </label>
                                            <input type="file" class="form-control" id="imagen" name="imagen">
                                        </div>
                                    </div>

                                    <div class="col-md-6 d-flex flex-column align-items-center justify-content-center">
                                        <label class="form-label mt-2 text-center"
                                            style="color: #f08632;font-weight: 700;">
                                            Imagen actual
                                        </label>
                                        <img src="../img/<?php echo $resultado['imagen']; ?>" alt="Imagen del producto"
                                            class="img-fluid rounded shadow-sm"
                                            style="height: 400px; width: 400px; object-fit: cover;">
                                    </div>
                                </div>

                                <div class="d-flex justify-content-center mt-4">
                                    <button class="btn d-grid w-25" id="btnActualizarProducto"
                                        name="btnActualizarProducto" type="submit"
                                        style="background-color: #f08632; color: white; border: none;">
                                        Actualizar
                                    </button>
                                </div>
                            </form>

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

    <script src="../js/AgregarProducto.js"></script>
</body>

</html>