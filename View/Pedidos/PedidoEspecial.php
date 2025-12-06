<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutExterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/PedidosController.php';

    if(session_status() == PHP_SESSION_NONE){
        session_start();
  }
 
  if(!isset($_SESSION["nombre"])){
    header("Location: ../../View/Inicio/IniciarSesion.php");
  }
?>
<!DOCTYPE html>
<html lang="es">
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
    <!-- SECCIÓN DE CONTACTO -->
    <section class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-10">
                    <h2 class="text-center mb-4" style="color: #f08632; font-weight: 700;" >Pedido Especial</h2>
                   
                    <?php
                        if(isset($_SESSION["MensajeExito"]))
                        {
                            echo '<div class="alert alert-success text-center">' . $_SESSION["MensajeExito"] . '</div>';
                            unset($_SESSION["MensajeExito"]);
                        }
                       
                        if(isset($_POST["Mensaje"]))
                        {
                            echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                        }
                    ?>
                   
                    <div class="row g-4">
                        <div class=col-md-3></div>
                        <div class="col-md-6">
                            <div class="card shadow-lg border-0 rounded-4 h-100" style="background-color: #f8f9fa;">
                                <div class="card-body p-4">
                                    <form action="" method="POST" id="formPedidoEspecial">
                                        <div class="mb-3">
                                            <label for="descripcion" class="form-label" style="color: #f08632; font-weight: 700;">Descripción del Pedido</label>
                                            <textarea class="form-control" id="descripcion" name="descripcion" rows="4" required></textarea>
                                        </div>
                                        <div class="mb-3">
                                            <label for="direccion" class="form-label" style="color: #f08632; font-weight: 700;">Dirección</label>
                                            <input type="text" class="form-control" id="direccion" name="direccion" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="fechaDeseada" class="form-label" style="color: #f08632; font-weight: 700;">Fecha Deseada</label>
                                            <input type="date" class="form-control" id="fechaDeseada" name="fechaDeseada" required>
                                        </div>
                                        <div class="d-grid">
                                            <button type="submit" class="btn text-white py-2"
                                                    style="background-color: #f08632;"
                                                    id="btnEnviarPedido" name="btnEnviarPedido">
                                                <i class="bi bi-send"></i> Enviar Mensaje
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php
        ShowFooter()
    ?>
    <?php
        ShowJS()
    ?>
</body>
</html>