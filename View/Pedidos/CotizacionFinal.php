<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutExterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/PedidosController.php';

  if(session_status() == PHP_SESSION_NONE){
      session_start();
  }

  if(!isset($_SESSION["nombre"]) || $_SESSION["idRol"] != "1"){
      header("Location: ../Inicio/Home.php");
      exit;
  }

  if (!isset($_GET['id'])) {
      header("Location: Pedidos.php");
      exit;
  }

 $idPedido = $_GET['id'];
 $pedido = ConsultarCotizacionPorId($idPedido);

  $mensaje = "";

  if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['estado'])) {
      $nuevoEstado = $_POST['estado'];
      if (ActualizarEstadoPedido($idPedido, $nuevoEstado)) {
          $mensaje = "Estado actualizado correctamente.";
          $pedido['estado'] = $nuevoEstado;
      } else {
          $mensaje = "Ocurrió un error al actualizar el estado.";
      }
  }
?>

<!DOCTYPE html>
<html lang="es">

<?php ShowHead(); ?>

<body>
    <?php ShowToggler(); ?>
    <?php ShowHeader(); ?>

    <section class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-4">
                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                        <div class="card-body">
                            <h2 class="login-title text-center mb-4 mt-2">Cotización Final del Pedido #
                                <?php echo $idPedido;?></h2>

                            <?php if ($mensaje != ""): ?>
                            <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
                            <?php endif; ?>

                            <form method="POST" action="">
                                <input type="hidden" name="idPedido" value="<?php echo htmlspecialchars($idPedido); ?>">

                                <p><strong>Cliente:</strong> <?php echo htmlspecialchars($pedido['Cliente']); ?></p>
                                <p><strong>Correo:</strong> <?php echo htmlspecialchars($pedido['Correo']); ?></p>
                                <p><strong>Telefono:</strong> <?php echo htmlspecialchars($pedido['Telefono']); ?></p>
                                <p><strong>Fecha Pedido:</strong>
                                    <?php echo date('d/m/Y H:i', strtotime($pedido['FechaPedido'])); ?></p>
                                <p><strong>Fecha Deseada:</strong>
                                    <?php echo date('d/m/Y H:i', strtotime($pedido['FechaDeseada'])); ?></p>
                                <p><strong>Dirección de Entrega:</strong>
                                    <?php echo htmlspecialchars($pedido['DireccionEntrega']); ?></p>
                                <p><strong>Descripción:</strong> <?php echo htmlspecialchars($pedido['Descripcion']); ?>
                                </p>
                                <p><strong>Cantidad:</strong> <?php echo htmlspecialchars($pedido['Cantidad']); ?></p>
                                <p><strong>PrecioUnitario:</strong>
                                    ₡<?php echo number_format($pedido['PrecioUnitario'],2); ?></p>
                                <p><strong>Subtotal:</strong> ₡<?php echo number_format($pedido['Subtotal'],2); ?></p>
                                <p><strong>Impuesto:</strong> ₡<?php echo number_format($pedido['Impuesto'],2); ?></p>
                                <p><strong>Total:</strong> ₡<?php echo number_format($pedido['Total'],2); ?></p>

                                <div class="container mt-4">
                                    <div class="row g-3">
                                        <div class="col-12 col-md-5">
                                            <button type="submit" class="btn w-100"
                                                style="background-color:#f08632; color: #ffffff;"
                                                id="btnEnviarCotizacion" name="btnEnviarCotizacion">
                                                Enviar Cotización
                                            </button>

                                        </div>
                                        <div class="col-12 col-md-3">
                                            <button type="submit" class="btn btn-success w-100" id="btnFinalizar"
                                                name="btnFinalizar">
                                                Finalizar
                                            </button>
                                        </div>
                                        <div class="col-12 col-md-4">
                                            <a href="Pedidos.php" class="btn btn-secondary w-100">
                                                Volver al listado
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <?php ShowFooter(); ?>
    <?php ShowJS(); ?>
</body>

</html>