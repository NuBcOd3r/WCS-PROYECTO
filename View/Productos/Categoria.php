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
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">

                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                        <div class="card-body">

                            <h2 class="login-title text-center mb-4 mt-2">Listado de Categorías</h2>

                            <div class="mb-3">
                                <a class="btn text-white px-4" style="background-color: #f08632;" href="RegistroCategoria.php">
                                    Registrar Categoría
                                </a>
                            </div>

                            <div class="table-responsive">
                                <table id="tbCategorias" class="table table-striped table-hover align-middle">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Nombre de Categoría</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            foreach($resultado as $fila) 
                                            {
                                                echo "<tr>";
                                                echo "<td class='text-center'><strong>" . $fila['idCategoria'] . "</strong></td>";
                                                echo "<td class='text-center'>" . htmlspecialchars($fila['nombreCategoria']) . "</td>";
                                                echo "<td class='text-center align-middle'>
                                                    <div style='display: flex; justify-content: center; gap: 20px; align-items: center;'>

                                                        <a href='ActualizarCategoria.php?id=" . $fila['idCategoria'] . "'
                                                        style='color: #0d6efd; font-size: 26px;'>
                                                            <i class='fa-regular fa-pen-to-square'></i>
                                                        </a>

                                                    </div>
                                                </td>";
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

    <script src="../js/VerCategorias.js"></script>
</body>

</html>