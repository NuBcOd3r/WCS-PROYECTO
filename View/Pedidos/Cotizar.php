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
 $pedido = ConsultarPedidoPorId($idPedido);

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
                <div class="col-md-8">
                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                        <div class="card-body">
                            <h2 class="login-title text-center mb-4 mt-2">Pedido # <?php echo $idPedido;?></h2>

                            <?php if ($mensaje != ""): ?>
                            <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
                            <?php endif; ?>

                            <p><strong>Cliente:</strong> <?php echo htmlspecialchars($pedido['Cliente']); ?></p>
                            <p><strong>Correo:</strong> <?php echo htmlspecialchars($pedido['Correo']); ?></p>
                            <p><strong>Telefono:</strong> <?php echo htmlspecialchars($pedido['Telefono']); ?></p>
                            <p><strong>Fecha Pedido:</strong>
                                <?php echo date('d/m/Y H:i', strtotime($pedido['FechaPedido'])); ?></p>
                            <p><strong>Fecha Deseada:</strong>
                                <?php echo date('d/m/Y H:i', strtotime($pedido['FechaDeseada'])); ?></p>
                            <p><strong>Dirección de Entrega:</strong>
                                <?php echo htmlspecialchars($pedido['direccionEntrega']); ?></p>
                            <p><strong>Descripción:</strong> <?php echo htmlspecialchars($pedido['Descripcion']); ?></p>
                            <div class="d-flex gap-2 mt-2">
                                <button type="button" class="login-btn" data-bs-toggle="modal"
                                    data-bs-target="#modalCotizar">
                                    Cotizar
                                </button>
                                <a href="Pedidos.php" class="btn btn-secondary">
                                    Volver al listado
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Modal Cotizar -->
    <div class="modal fade" id="modalCotizar" tabindex="-1" aria-labelledby="modalCotizarLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">

                <div class="modal-header">
                    <h5 class="modal-title" id="modalCotizarLabel">Cotización del Pedido</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>

                <form method="post" action="" id="formCotizar" name="formCotizar">
                    <div class="modal-body">
                        <input type="hidden" name="idPedido" id="idPedido"
                            value="<?php echo htmlspecialchars($idPedido); ?>">
                        <div class="mb-3">
                            <label class="form-label"><strong>Precio Unitario: </strong></label>
                            <input type="text" id="precioUnitario" name="precioUnitario" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label"><strong>Cantidad: </strong></label>
                            <input type="number" id="cantidad" name="cantidad" class="form-control" required>
                        </div>
                    </div>

                    <div class="modal-footer d-flex justify-content-center">
                        <button type="submit" class="btn btn-primary" id="btnCotizar" name="btnCotizar">
                            Calcular
                        </button>
                    </div>
                </form>

            </div>
        </div>
    </div>


    <?php ShowFooter(); ?>
    <?php ShowJS(); ?>
</body>

</html>