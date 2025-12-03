<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/CarritoController.php';

  $resultado = ConsultarCarritos();

  if(session_status() == PHP_SESSION_NONE){
        session_start();
  }

  if(!isset($_SESSION["nombre"])){
    header("Location: ../../View/Inicio/IniciarSesion.php");
    exit;
  }
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


    <!-- SECCIÓN PARA ADMINISTRADORES -->
    <?php
        $perfil = "";

        if (isset($_SESSION["nombre"])) {
            $perfil = $_SESSION["idRol"];
        }

        if ($perfil == "2") {
            echo '
            <section class="mt-5 mb-5">
                <div class="container-fluid">
                    <div class="row justify-content-center">
                        <div class="col-md-10">

                            <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                                <div class="card-body">

                                    <h2 class="login-title text-center mb-4 mt-2">Mi Carrito</h2>

                                    <div class="table-responsive">
                                        <table id="tbCarritos" class="table table-striped table-hover align-middle">
                                            <thead class="table-light text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Producto</th>
                                                    <th>Precio</th>
                                                    <th>Cantidad</th>
                                                    <th>Subtotal</th>
                                                    <th>Impuesto</th>
                                                    <th>Total</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>';

                                                foreach ($resultado as $fila) {
                                                    echo "<tr>";
                                                    echo "<td class='text-center align-middle'><strong>" . $fila['idProducto'] . "</strong></td>";
                                                    echo "<td class='text-center align-middle'>" . $fila['nombreProducto'] . "</td>";
                                                    echo "<td class='text-center align-middle'>₡" . number_format((float)$fila['precio'],2) . "</td>";
                                                    echo "<td class='text-center align-middle'>" . $fila['Cantidad'] . "</td>";
                                                    echo "<td class='text-center align-middle'>₡" . number_format((float)$fila['Subtotal'],2). "</td>";
                                                    echo "<td class='text-center align-middle'>₡" . number_format((float)$fila['Impuesto'],2) . "</td>";
                                                    echo "<td class='text-center align-middle'>₡" . number_format((float)$fila['Total'],2) . "</td>";

                                                    echo "
                                                    <td class='text-center align-middle'>
                                                        <div style='display: flex; justify-content: center; gap: 20px; align-items: center;'>

                                                            <a href='ActualizarProducto.php?id=" . $fila['idProducto'] . "'
                                                                style='color: #0d6efd; font-size: 26px;'>
                                                                <i class=\"fa-regular fa-pen-to-square\"></i>
                                                            </a>

                                                            <form method='POST' action='' style='margin: 0; padding: 0;'>
                                                                <input type='hidden' name='idProducto' value='" . $fila['idProducto'] . "'>
                                                                <button type='submit' name='btnEliminar'
                                                                        style='background: none; border: none; padding: 0; margin: 0; cursor: pointer; color: #dc3545; font-size: 26px;'>
                                                                    <i class=\"fa-solid fa-eraser\"></i>
                                                                </button>
                                                            </form>

                                                        </div>
                                                    </td>
                                                    ";

                                                    echo "</tr>";
                                                }

                                            echo '
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </section>';
        }
    ?>

    <?php
        ShowFooter()
    ?>

    <?php
        ShowJS()
    ?>

    <script src="../js/VerCarritos.js"></script>
</body>

</html>