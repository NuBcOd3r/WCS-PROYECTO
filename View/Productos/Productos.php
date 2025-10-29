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
    <section class="mt-3">
        <h2 class="login-title text-center mb-3 mt-2">Registrar Productos</h2>
        <div class="container">
            <div class="row">

                <div class="col-md-6 mb-3">
                    <img class="img-fluid rounded border shadow-sm"src="../img/Queque.jpg">
                </div>

                <div class="col-md-6 mb-3">

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
                                <option value="">Seleccione una categoría</option>
                                <?php
                                    if ($resultado && mysqli_num_rows($resultado) > 0) {
                                        while ($fila = mysqli_fetch_assoc($resultado)) {
                                            echo "<option value='" . $fila['idCategoria'] . "'>" . $fila['nombreCategoria'] . "</option>";
                                        }
                                    } else {
                                        echo "<option value=''>No hay categorías disponibles</option>";
                                    }
                                ?>
                            </select>
                        </div>

                        <!-- Nombre del producto -->
                        <label for="nombreProducto" class="form-label mt-2" style="color: #f08632;font-weight: 700;">Nombre del producto</label>
                        <input type="text" placeholder="Ejm: Pastel de Chocolate" id="nombreProducto" name="nombreProducto" class="login-input" required>

                        <!-- Descripción -->
                        <label for="descripcion" class="form-label mt-2" style="color: #f08632;font-weight: 700;">Descripción</label>
                        <input type="text" placeholder="Ingrese una breve descripción" id="descripcion" name="descripcion" class="login-input" required>

                        <!-- Precio -->
                        <label for="precio" class="form-label mt-1" style="color: #f08632;font-weight: 700;">Precio</label>
                        <input type="number" placeholder="Ejm: 2500" id="precio" name="precio" class="login-input" required>

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
</body>
 
</html>