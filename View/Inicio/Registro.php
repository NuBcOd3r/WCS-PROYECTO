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
 
 
    <!-- Class Section Begin -->
    <section class="register-section">
        <div class="register-container">
            <div class="register-card">
            <h2 class="register-title">Registro</h2>

            <?php
                if(isset($_POST["Mensaje"]))
                {
                    echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                }
            ?>
            
            <form id="formRegistro" action="" method="post" class="register-form">
                <input type="text" id="cedula" name="cedula" placeholder="Cedula" required class="register-input" onkeyup="ConsultarNombre();"/>
                <input type="text" id="nombreCompleto" name="nombreCompleto" placeholder="Nombre de Usuario" required class="register-input" readonly/>
                <input type="email" name="correo" placeholder="Correo Electrónico" required class="register-input">
                <input type="number" name="telefono" placeholder="Telefono" required class="register-input">
                <input type="password" name="contrasenna" placeholder="****************" required class="register-input">
                <button type="submit" class="register-btn" id="btnRegistro" name="btnRegistro">Registrarse</button>
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
 
</html>