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
                            <h2 class="login-title text-center mb-4 mt-2">Actualizar Pedido # <?php echo $idPedido;?></h2>

                            <?php if ($mensaje != ""): ?>
                            <div class="alert alert-info text-center"><?php echo $mensaje; ?></div>
                            <?php endif; ?>

                            <p><strong>Cliente:</strong> <?php echo htmlspecialchars($pedido['Cliente']); ?></p>
                            <p><strong>Correo:</strong> <?php echo htmlspecialchars($pedido['Correo']); ?></p>
                            <p><strong>Telefono:</strong> <?php echo htmlspecialchars($pedido['Telefono']); ?></p>
                            <p><strong>Fecha Pedido:</strong> <?php echo date('d/m/Y H:i', strtotime($pedido['FechaPedido'])); ?></p>

                            <form method="POST" action="" id="formActualizarPedido" name="formActualizarPedido">
                                <input type="hidden" name="idPedido" id="idPedido" value="<?php echo htmlspecialchars($idPedido); ?>">    

                                <div class="mb-3">
                                    <label class="form-label"><strong>Fecha Deseada</strong></label>
                                    <input type="datetime-local" id="fechaDeseada" name="fechaDeseada" class="form-control"
                                        value="<?php echo date('Y-m-d\TH:i', strtotime($pedido['FechaDeseada'])); ?>"
                                        required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><strong>Dirección de Entrega</strong></label>
                                    <input type="text"  id="direccionEntrega" name="direccionEntrega" class="form-control"
                                        value="<?php echo htmlspecialchars($pedido['direccionEntrega']); ?>" required>
                                </div>

                                <div class="mb-3">
                                    <label class="form-label"><strong>Descripción</strong></label>
                                    <textarea id="descripcion" name="descripcion" class="form-control" rows="3" required><?php 
                                        echo htmlspecialchars($pedido['Descripcion']); ?></textarea>
                                </div>

                                <div class="d-flex gap-2 mt-3">
                                    <button type="submit" id="btnActualizarPedido" name="btnActualizarPedido" class="login-btn">Guardar cambios</button>
                                    <a href="Pedidos.php" class="btn btn-secondary">Volver al listado</a>
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