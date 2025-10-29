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
        <div class="container">
            <div class= row >
                <div class="col-md-12">
                    <h2 class="login-title text-center mb-3 mt-2">Registrar Categorías</h2>

                    <?php
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                        }
                    ?>

                    <form action="" class="login-form" method="post" id="formRegistrarCategoria">
                        <input type="text" placeholder="Ejm: Galletas" id="nombreCategoria" name="nombreCategoria" class="login-input">
                        <button type="submit" class="login-btn" id="btnRegistrarCategoria" name="btnRegistrarCategoria">Registrar</button>
                    </form>

                    <hr>

                    <div class="container mt-4">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover align-middle">
                                        <thead class="table-ligth text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Nombre de Categoría</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            while($fila = mysqli_fetch_array($resultado))
                                            {
                                                echo "<tr>";
                                                echo "<td class='text-center'><strong>" . $fila['idCategoria'] . "</strong></td>";
                                                echo "<td class='text-center'>" . htmlspecialchars($fila['nombreCategoria']) . "</td>";
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
</body>
 
</html>