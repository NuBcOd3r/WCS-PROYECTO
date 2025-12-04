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

                                    <a href="HistorialCompras.php" class="primary-btn">
                                        Historial de Compras
                                    </a>

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

                                                            <form method='POST' action='' style='margin: 0; padding: 0;'>
                                                                <input type='hidden' name='idProducto' value='" . $fila['idProducto'] . "'>
                                                                <button type='submit' name='btnRemoverProductoCarrito'
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
                                        <div class="row mt-5">
                                            <div class="col-4">
                                                <p class="mt-2">El monto a cancelar es de: <b>₡'.number_format($_SESSION["Total"], 2).'IVI</b></p>
                                            </div>
                                            <div class="col-8">';
                                                
                                                    if($_SESSION["Cantidad"] != 0)
                                                    {
                                                        echo '<button type="button" class="primary-btn" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                                        Realizar Pago
                                                        </button>';
                                                    }
                                        echo'
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                    <!-- Modal -->
                    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                        aria-labelledby="staticBackdropLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="staticBackdropLabel">Confirmación de Pago</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>

                                <form id="formRealizarPago" action="" method="POST">
                                    <div class="modal-body">

                                        <label class="form-label">Medio de Pago</label>
                                        <input type="text" class="form-control" id="MedioPago" name="MedioPago" />

                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" id="btnRealizarPagoCarrito" name="btnRealizarPagoCarrito"
                                            class="primary-btn">Procesar</button>
                                    </div>
                                </form>

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