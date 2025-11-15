<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarProductos();
  $resultadoUsuario = ConsultarProductosIndex();

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

    if ($perfil == "1") {
        echo '
        <section class="mt-5 mb-5">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-md-10">

                        <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                            <div class="card-body">

                                <h2 class="login-title text-center mb-4 mt-2">Listado de Productos</h2>

                                <div class="mb-3">
                                    <a class="btn text-white px-4" style="background-color: #f08632;"
                                        href="RegistroProductos.php">
                                        Registrar Producto
                                    </a>
                                </div>

                                <div class="table-responsive">
                                    <table id="tbProductos" class="table table-striped table-hover align-middle">
                                        <thead class="table-light text-center">
                                            <tr>
                                                <th>#</th>
                                                <th>Categoría</th>
                                                <th>Producto</th>
                                                <th>Precio</th>
                                                <th>Cantidad</th>
                                                <th>Estado</th>
                                                <th>Imagen</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>';

                                            foreach ($resultado as $fila) {
                                                echo "<tr>";
                                                echo "<td class='text-center align-middle'><strong>" . $fila['idProducto'] . "</strong></td>";
                                                echo "<td class='text-center align-middle'>" . $fila['nombreCategoria'] . "</td>";
                                                echo "<td class='text-center align-middle'>" . $fila['nombreProducto'] . "</td>";
                                                echo "<td class='text-center align-middle'>₡" . $fila['precio'] . "</td>";
                                                echo "<td class='text-center align-middle'>" . $fila['cantidad'] . "</td>";
                                                echo "<td class='text-center align-middle'>" . $fila['estado'] . "</td>";
                                                echo "<td class='text-center align-middle'><img src='" . $fila['imagen'] . "' width='85' height='85' class='rounded shadow-sm'></td>";

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


    <!-- SECCIÓN PARA USUARIOS -->
    <?php
        $perfil = "";

        if(isset($_SESSION["nombre"])){
            $perfil = $_SESSION["idRol"];
        }

        if($perfil == "2"){
            echo '
            <section class="mt-5 mb-5">
                <div class="container p-4" style="background:white; border-radius:20px; box-shadow:0 4px 12px rgba(0,0,0,0.1);">

                    <h2 style="color:#f08632; font-weight:bold; text-align:center; margin-bottom:30px;">
                        ¿Y qué vas a elegir hoy?
                    </h2>

                    <div class="row">
            ';

            foreach ($resultadoUsuario as $fila) {

                echo '
                    <div class="col-lg-3 col-md-6 col-sm-6 mt-3">
                        <div class="product__item" 
                            style="border-radius:18px; overflow:hidden; box-shadow:0 2px 10px rgba(0,0,0,0.1); background:white; display:flex; flex-direction:column; height:100%;">

                            <!-- IMAGEN -->
                            <div class="product__item__pic set-bg" 
                                data-setbg="' . htmlspecialchars($fila['imagen']) . '" 
                                style="height:200px;">
                                <div class="product__label">
                                    <span>' . htmlspecialchars($fila['nombreCategoria']) . '</span>
                                </div>
                            </div>

                            <!-- TEXTO -->
                            <div class="product__item__text" style="padding:15px; flex-grow:1;">
                                <h6>
                                    <a href="#">' . htmlspecialchars($fila['nombreProducto']) . '</a>
                                </h6>

                                <div class="product__item__price">
                                    ₡' . number_format($fila['precio'], 2) . '
                                </div>
                            </div>

                            <!-- RECUADRO FIJO ADENTRO DE LA CARD -->
                            <div style="background:white; padding:12px; border-top:2px solid #f08632; border-radius:0 0 18px 18px;">
                                <form method="POST" action="AgregarCarrito.php" 
                                    style="display:flex; justify-content:space-between; align-items:center;">

                                    <input type="hidden" name="idProducto" value="' . $fila['idProducto'] . '">

                                    <input type="number" name="cantidad" min="1" value="1"
                                        style="width:45px; border:1px solid #f08632; padding:3px; border-radius:8px;">

                                    <button type="submit"
                                        style="background:none; border:2px solid #f08632; color:#f08632; 
                                            padding:4px 8px; border-radius:8px; font-weight:bold; cursor:pointer; transition:0.2s;">
                                        Añadir al carrito
                                    </button>
                                </form>
                            </div>

                        </div>
                    </div>
                ';
            } 
            echo '
                    </div>
                </div>
            </section>
            ';
        }
    ?>


    <?php
        ShowFooter()
    ?>

    <?php
        ShowJS()
    ?>

    <script src="../js/VerProductos.js"></script>
</body>

</html>