<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutExterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/InicioController.php';
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
    <section class="login-section">
        <div class="login-container">
            <div class="login-card">
            <h2 class="login-title">Inicio de Sesión</h2>

            <?php
                if(isset($_POST["Mensaje"]))
                {
                    echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                }
            ?>

            <form action="" class="login-form" method="post" id="formInicioSesion">
                <input type="email" placeholder="Correo Electrónico" id="correo" name="correo" class="login-input">
                <input type="password" placeholder="***************" id="contrasenna" name="contrasenna" class="login-input">
                <button type="submit" class="login-btn" id="btnInicioSesion" name="btnInicioSesion">Iniciar Sesión</button>
                <a href="Registro.php" class="login-link">
                ¿Deseas registrarte?
                </a>
                <a href="RecuperarAcceso.php" class="login-link">
                ¿Haz olvidado tu contraseña?
                </a>
            </form>
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