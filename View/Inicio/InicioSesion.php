<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
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
            <form action="" class="login-form">
                <input type="text" placeholder="Nombre de Usuario" class="login-input">
                <input type="text" placeholder="Correo Electrónico" class="login-input">
                <button type="submit" class="login-btn">Iniciar Sesión</button>
                <a href="Registro.php" class="login-link">
                ¿Deseas registrarte?
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