<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/CarritoController.php';

  $resultado = ConsultarCompras();

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

                                    <h2 class="login-title text-center mb-4 mt-2">Historial de Compras</h2>

                                    <div class="table-responsive">
                                        <table id="tbCarritos" class="table table-striped table-hover align-middle">
                                            <thead class="table-light text-center">
                                                <tr>
                                                    <th>#</th>
                                                    <th>Fecha de Compra</th>
                                                    <th>Unidades</th>
                                                    <th>Total Pagado</th>
                                                    <th>Medio de Pago</th>
                                                    <th>Acciones</th>
                                                </tr>
                                            </thead>
                                            <tbody>';

                                                foreach ($resultado as $fila) {
                                                    echo "<tr>";
                                                    echo "<td class='text-center align-middle'><strong>" . $fila['idFactura'] . "</strong></td>";
                                                    echo "<td class='text-center align-middle'>" . $fila['Fecha'] . "</td>";
                                                    echo "<td class='text-center align-middle'>" . $fila['CantidadUnidades']. "</td>";
                                                    echo "<td class='text-center align-middle'>₡" . number_format((float)$fila['TotalUnidades'],2) . "</td>";
                                                    echo "<td class='text-center align-middle'>" . $fila['MedioPago']. "</td>";
                                                    echo "<td class='text-center align-middle'>
                                                                <a href='DetalleCompra.php?id=" . $fila['idFactura'] . "' 
                                                                style='color: #0d6efd; font-size: 26px;'>
                                                                <i class=\"fa-regular fa-pen-to-square\"></i>
                                                                </a>
                                                            </td>";
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