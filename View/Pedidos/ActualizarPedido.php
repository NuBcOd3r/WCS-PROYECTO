<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
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
                            <h2 class="login-title text-center mb-4 mt-2">Actualizar estado de pedido</h2>

                            <?php if ($mensaje != ""): ?>
                                <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
                            <?php endif; ?>

                            <p><strong>Cliente:</strong> <?php echo htmlspecialchars($pedido['nombreCliente']); ?></p>
                            <p><strong>Fecha:</strong> <?php echo date('d/m/Y H:i', strtotime($pedido['fechaPedido'])); ?></p>
                            <p><strong>Total:</strong> ₡<?php echo number_format($pedido['total'], 2); ?></p>

                            <form method="POST">
                                <div class="mb-3">
                                    <label for="estado" class="form-label mt-2"
                                           style="color:#f08632; font-weight:700;">Estado</label>
                                    <select name="estado" id="estado"
                                            class="form-select border-1 login-input" style="height:55px;" required>
                                        <?php
                                          $estados = ['Solicitado','Aprobado','Listo','Entregado','Cancelado'];
                                          foreach($estados as $estado){
                                              $selected = ($estado == $pedido['estado']) ? 'selected' : '';
                                              echo "<option value=\"$estado\" $selected>$estado</option>";
                                          }
                                        ?>
                                    </select>
                                </div>

                                <button type="submit" class="login-btn mt-0">
                                    Guardar cambios
                                </button>

                                <a href="Pedidos.php" class="btn btn-secondary mt-2">
                                    Volver al listado
                                </a>
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
