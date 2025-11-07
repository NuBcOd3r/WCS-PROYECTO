<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarCategorias();
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
        <div class="container">
            <h2 class="login-title text-center mb-3 mt-2">Registrar Productos</h2>
            <div class="row border rounded border border-5">

                <div class="col-md-12 mb-3">

                    <?php
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                        }
                    ?>

                    <form action="" class="login-form" method="post" id="formRegistrarProducto">
                        
                        <!-- Categoría -->
                        <div>
                            <label for="idCategoria" class="form-label mt-2" style="color: #f08632;font-weight: 700;">Categoría</label>
                            <select name="idCategoria" id="idCategoria" class="form-select border-1 login-input" required style="height: 55px;">
                                <option value="">Seleccione una Categoría</option>
                                <?php
                                    if (!empty($resultado)) {
                                        foreach ($resultado as $fila) {
                                            echo "<option value='" . $fila['idCategoria'] . "'>" . htmlspecialchars($fila['nombreCategoria']) . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay categorías disponibles</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Nombre del producto -->
                        <div>
                        <label for="nombreProducto" class="form-label mt-2" style="color: #f08632;font-weight: 700;">Nombre del producto</label>
                        <input type="text" placeholder="Ejm: Pastel de Chocolate" id="nombreProducto" name="nombreProducto" class="login-input" required>
                        </div>     

                        <!-- Descripción -->
                        <div>
                        <label for="descripcion" class="form-label mt-2" style="color: #f08632;font-weight: 700;">Descripción</label>
                        <input type="text" placeholder="Ingrese una breve descripción" id="descripcion" name="descripcion" class="login-input" required>
                        </div>

                        <!-- Precio -->
                        <div>                         
                        <label for="precio" class="form-label mt-1" style="color: #f08632;font-weight: 700;">Precio</label>
                        <input type="number" placeholder="Ejm: 2500" id="precio" name="precio" class="login-input" required>
                        </div>

                        <!-- Imagen -->
                        <div>
                        <label for="imagen" class="form-label mt-1" style="color: #f08632;font-weight: 700;">Imagen</label>
                        <input type="file" placeholder="Ejm: 2500" id="imagen" name="imagen" class="login-input" required>
                        </div>

                        <!-- Botón -->
                        <button type="submit" class="login-btn mt-0" id="btnRegistrarProducto" name="btnRegistrarProducto">Registrar</button>
                    </form>
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