<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
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
            <h2 class="login-title">Recuperar Contraseña</h2>
            
            <?php
                if(isset($_POST["Mensaje"]))
                {
                    echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                }
            ?>

            <form action="" class="login-form" method="post" id="formRecuperarContraseña">
                <input type="email" placeholder="Correo Electrónico" id="correo" name="correo" class="login-input">
                <button type="submit" class="login-btn" id="btnRecuperarContraseña" name="btnRecuperarContraseña">Recuperar Contraseña</button>
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