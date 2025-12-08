<?php

include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutExterno.php';
include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/DashboardController.php';


    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    if (!isset($_SESSION["idRol"]) || $_SESSION["idRol"] != 1) {
        header("Location: ../Inicio/Home.php");
        exit;
    }

    $totalProductos       = ContarProductosActivos();
    $totalCategorias      = ContarCategorias();
    $pedidosPendientes   = ContarPedidosPendientes();
    $pedidosCompletados  = ContarPedidosCompletadosMes();


    $ultimosPedidos       = ConsultarPedidosRecientes();
    $productosStockBajo   = ConsultarProductosConStockBajo();
    $contactosRecientes   = ConsultarContactosRecientes();

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

    <section class="mt-5 mb-5">
        <div class="container">
            <div class="row mb-4">
                <div class="col-12 text-center">
                    <h2 class="login-title" style="color:#f08632; font-weight:bold;">
                        Dashboard de Administración
                    </h2>
                    <p class="text-muted mb-0">
                        Panel de control general del sistema Mary´s Sweet Cakes
                    </p>
                </div>
            </div>
            <div class="row mb-4">
                <!-- Productos activos -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card shadow-sm border-0 rounded-4"
                        style="background:linear-gradient(135deg,#667eea 0%,#764ba2 100%);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 opacity-75">Productos activos</h6>
                                    <h2 class="mb-0 mt-2 fw-bold">
                                        <?php echo $totalProductos; ?>
                                    </h2>
                                </div>
                                <div style="font-size:2.8rem; opacity:0.3;">
                                    <i class="fa-solid fa-cake-candles"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Categorías -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card shadow-sm border-0 rounded-4"
                        style="background:linear-gradient(135deg,#f093fb 0%,#f5576c 100%);">
                        <div class="card-body text-white">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 opacity-75">Categorías</h6>
                                    <h2 class="mb-0 mt-2 fw-bold">
                                        <?php echo $totalCategorias; ?>
                                    </h2>
                                </div>
                                <div style="font-size:2.8rem; opacity:0.3;">
                                    <i class="fa-solid fa-list"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pedidos pendientes -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card shadow-sm border-0 rounded-4"
                        style="background:linear-gradient(135deg,#fad0c4 0%,#ffd1ff 100%);">
                        <div class="card-body text-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>
                                    <h6 class="mb-0 opacity-75">Pedidos pendientes</h6>
                                    <h2 class="mb-0 mt-2 fw-bold">
                                        <?php echo $pedidosPendientes; ?>
                                    </h2>
                                </div>
                                <div style="font-size:2.8rem; opacity:0.3;">
                                    <i class="fa-solid fa-clock"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Pedidos completados (mes) -->
                <div class="col-lg-3 col-md-6 mb-3">
                    <div class="card shadow-sm border-0 rounded-4"
                        style="background:linear-gradient(135deg,#a8edea 0%,#fed6e3 100%);">
                        <div class="card-body text-dark">
                            <div class="d-flex justify-content-between align-items-center">
                                <div>

                                    <h6 class="mb-0 opacity-75">
                                        Pedidos Completados
                                    </h6>


                                    <h2 class="mb-0 mt-2 fw-bold">
                                        <?php echo $pedidosCompletados; ?>
                                    </h2>
                                </div>
                                <div style="font-size:2.8rem; opacity:0.3;">
                                    <i class="fa-solid fa-check-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mb-4">
                <!-- Últimos pedidos -->
                <div class="col-lg-6 mb-3">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header text-white"
                            style="background-color:#f08632; border-radius:1rem 1rem 0 0;">
                            <h5 class="mb-0">
                                <i class="fa-solid fa-shopping-bag me-2"></i> Últimos pedidos
                            </h5>
                        </div>
                        <div class="card-body" style="max-height:400px; overflow-y:auto;">
                            <div class="table-responsive">
                                <table id="tbPedidos" class="table table-sm table-hover">
                                    <thead class="table-light text-center">
                                        <tr>
                                            <th>#</th>
                                            <th>Cliente</th>
                                            <th>Fecha de Ingreso</th>
                                            <th>Fecha Solicitada</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        <?php foreach($ultimosPedidos as $fila): ?>
                                        <tr>
                                            <td><?php echo $fila['idPedido']; ?></td>
                                            <td><?php echo htmlspecialchars($fila['Cliente']); ?></td>
                                            <td><?php echo date('d/m/Y H:i', strtotime($fila['FechaPedido'])); ?></td>
                                            <td><?php echo date('d/m/Y H:i', strtotime($fila['FechaDeseada'])); ?></td>
                                        </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Productos con stock bajo -->
                <div class="col-lg-6 mb-3">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header text-white"
                            style="background-color:#dc3545; border-radius:1rem 1rem 0 0;">
                            <h5 class="mb-0">
                                <i class="fa-solid fa-exclamation-triangle me-2"></i> Productos con stock bajo
                            </h5>
                        </div>
                        <div class="card-body" style="max-height:400px; overflow-y:auto;">
                            <?php if (count($productosStockBajo) > 0): ?>
                            <table id="tablaStockBajo" class="table table-sm table-hover">
                                <thead class="table-light">
                                    <tr>
                                        <th>Producto</th>
                                        <th>Categoría</th>
                                        <th>Cantidad</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productosStockBajo as $prod): ?>
                                    <tr>
                                        <td><?php echo htmlspecialchars($prod['nombreProducto']); ?></td>
                                        <td><?php echo htmlspecialchars($prod['nombreCategoria']); ?></td>
                                        <td>
                                            <span class="badge bg-danger">
                                                <?php echo $prod['cantidad']; ?>
                                            </span>
                                        </td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <?php else: ?>
                            <p class="text-muted text-center mb-0">
                                Todos los productos tienen stock adecuado.
                            </p>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            </div>
            <!--ACCESOS RÁPIDOS -->
            <div class="row">
                <div class="col-12">
                    <div class="card shadow-sm border-0 rounded-4">
                        <div class="card-header text-white"
                            style="background-color:#f08632; border-radius:1rem 1rem 0 0;">
                            <h5 class="mb-0">
                                <i class="fa-solid fa-tools me-2"></i> Accesos rápidos
                            </h5>
                        </div>
                        <div class="card-body">
                            <div class="row text-center">
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <a href="../Productos/Productos.php" class="btn btn-outline-primary w-100 py-3">
                                        Gestionar productos
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <a href="../Productos/Categoria.php" class="btn btn-outline-primary w-100 py-3">
                                        Gestionar categorías
                                    </a>
                                </div>
                                <div class="col-lg-4 col-md-6 mb-3">
                                    <a href="../Pedidos/Pedidos.php" class="btn btn-outline-primary w-100 py-3">
                                        Gestionar pedidos
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section>
    <script>
    $(document).ready(function() {
        try {
            if ($.fn.DataTable) {
                $('#tablaPedidos').DataTable({
                    paging: true,
                    searching: false,
                    lengthChange: false,
                    info: false
                });
                $('#tablaStockBajo').DataTable({
                    paging: false,
                    searching: false,
                    lengthChange: false,
                    info: false
                });
                $('#tablaContactos').DataTable({
                    paging: false,
                    searching: false,
                    lengthChange: false,
                    info: false
                });
                $('#tablaErrores').DataTable({
                    paging: false,
                    searching: false,
                    lengthChange: false,
                    info: false
                });
            }
        } catch (e) {
            console.log("DataTables no disponible o error:", e);
        }
    });
    </script>

    <style>
    .card.rounded-4 {
        border-radius: 1rem !important;
    }

    .card.rounded-4:hover {
        transform: translateY(-3px);
        box-shadow: 0 12px 20px rgba(0, 0, 0, 0.08) !important;
        transition: all 0.2s ease-in-out;
    }
    </style>

    <?php
        ShowFooter()
    ?>

    <?php
        ShowJS()
    ?>


</body>

</html>