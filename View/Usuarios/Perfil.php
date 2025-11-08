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
                        <h2 class="login-title text-center">Actualizar Información</h2>

                        <?php
                        if(isset($_POST["Mensaje"])) {
                            echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                        }

                        if(isset($_POST["MensajeBueno"])) {
                            echo '<div class="alert alert-success text-center">' . $_POST["MensajeBueno"] . '</div>';
                        }
                        ?>

                        <form id="formPerfil" action="" method="POST" class="row g-3">
                            <!-- Cédula -->
                            <div class="col-12 col-md-12">
                                <label for="cedula"  class="form-label mt-2" style="color: #f08632;font-weight: 700;">Cédula</label>
                                <input type="text" class="form-control" id="cedula" name="cedula"
                                    value="<?php echo $resultado['cedula']?>" onkeyup="ConsultarNombre();" />
                            </div>

                            <!-- Nombre -->
                            <div class="col-12 col-md-12">
                                <label for="nombre"  class="form-label mt-2" style="color: #f08632;font-weight: 700;">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" readonly
                                    value="<?php echo $resultado['nombre']?>" />
                            </div>

                            <!-- Correo -->
                            <div class="col-12 col-md-12">
                                <label for="correo"  class="form-label mt-2" style="color: #f08632;font-weight: 700;">Correo Electrónico</label>
                                <input type="email" class="form-control" id="correo" name="correo"
                                    value="<?php echo $resultado['correoElectronico']?>" />
                            </div>

                            <!-- Teléfono -->
                            <div class="col-12 col-md-12">
                                <label for="telefono"  class="form-label mt-2" style="color: #f08632;font-weight: 700;">Teléfono</label>
                                <input type="text" class="form-control" id="telefono" name="telefono"
                                    value="<?php echo $resultado['telefono']?>" />
                            </div>

                            <!-- Perfil -->
                            <div class="col-12">
                                <label for="nombrePerfil"  class="form-label mt-2" style="color: #f08632;font-weight: 700;">Perfil</label>
                                <input type="text" class="form-control" id="nombrePerfil" name="nombrePerfil" readonly
                                    value="<?php echo $resultado['NombrePerfil']?>" />
                            </div>

                            <!-- Botón -->
                            <div class="col-12 text-center mt-4">
                                <button class="btn w-50 text-white fw-bold" id="btnActualizarPerfil"
                                    name="btnActualizarPerfil" type="submit"
                                    style="background-color: #f08632; border-color: #f08632;">
                                    Procesar
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

    <script src="../js/Perfil.js"></script>
</body>

</html>