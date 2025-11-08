<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/UsuarioController.php';

  $resultado = ConsultarUsuario();
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


    <!-- FORMULARIO -->
    <section class="login-section py-5">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-md-10 col-lg-8">
                    <div class="card shadow border-0 p-4" id="cardPerfil">
                        <h2 class="login-title text-center">Actualizar Contraseña</h2>

                        <?php
                        if(isset($_POST["Mensaje"])) {
                            echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                        }

                        if(isset($_POST["MensajeBueno"])) {
                            echo '<div class="alert alert-success text-center">' . $_POST["MensajeBueno"] . '</div>';
                        }
                        ?>

                        <form id="formSeguridad" class="mb-3" action="" method="POST">

                            <div class="mb-3">
                                <label class="form-label mt-2" style="color: #f08632;font-weight: 700;">Contraseña</label>
                                <input type="password" class="form-control" id="contrasenna" name="contrasenna" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label mt-2" style="color: #f08632;font-weight: 700;">Confirmar Contraseña</label>
                                <input type="password" class="form-control" id="confirmarContrasenna"
                                    name="confirmarContrasenna" />
                            </div>
                            
                            <div class="d-flex justify-content-center">
                                <button class="btn btn-primary d-grid w-25" id="btnActualizarSeguridad"
                                    name="btnActualizarSeguridad" type="submit" style="background-color: #f08632; border-color: #f08632;"
                                    >Procesar
                                </button>
                            </div>
                        </form>

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

    <script src="../js/Seguridad.js"></script>
</body>

</html>