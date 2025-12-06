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

  $resultado = ConsultarPedidosAdmin();
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
                <div class="col-md-10">

                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                        <div class="card-body">

                            <h2 class="login-title text-center mb-4 mt-2">Gestión de Pedidos</h2>

                            <div class="table-responsive">
                                <table id="tbPedidos" class="table table-striped table-hover align-middle">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Cliente</th>
                                            <th>Correo</th>
                                            <th>Teléfono</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Fecha Solicitada</th>
                                            <th>Descripcion</th>
                                            <th>Estado</th>
                                            <th>Acciones</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach($resultado as $fila): ?>
                                            <tr>
                                                <td><?php echo $fila['idPedido']; ?></td>
                                                <td><?php echo htmlspecialchars($fila['Cliente']); ?></td>
                                                <td><?php echo htmlspecialchars($fila['Correo']); ?></td>
                                                <td><?php echo htmlspecialchars($fila['Telefono']); ?></td>
                                                <td><?php echo date('d/m/Y H:i', strtotime($fila['FechaPedido'])); ?></td>
                                                <td><?php echo date('d/m/Y H:i', strtotime($fila['FechaDeseada'])); ?></td>
                                                <td><?php echo htmlspecialchars($fila['Descripcion']); ?></td>
                                                <td><?php echo htmlspecialchars($fila['Estado']); ?></td>
                                                <td>
                                                    <a class="btn btn-sm" style="color:#f08632;"
                                                       href="ActualizarPedido.php?id=<?php echo $fila['idPedido']; ?>">
                                                        <i class="fa-solid fa-pen-to-square"></i>
                                                    </a>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <?php ShowFooter(); ?>
    <?php ShowJS(); ?>


    <script>
      $(document).ready(function() {
          $('#tbPedidos').DataTable({
              language: {
                url: 'https://cdn.datatables.net/plug-ins/1.13.7/i18n/es-ES.json'
              }
          });
      });
    </script>
</body>
</html>
