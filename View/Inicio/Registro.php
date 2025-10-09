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
 
 
    <!-- Class Section Begin -->
    <section class="register-section">
        <div class="register-container">
            <div class="register-card">
            <h2 class="register-title">Registro</h2>
            <form action="Registro.php" method="post" class="register-form">
                <input type="text" name="usuario" placeholder="Nombre de Usuario" required class="register-input">
                <input type="email" name="correo" placeholder="Correo Electrónico" required class="register-input">
                <input type="password" name="password" placeholder="Contraseña" required class="register-input">
                <input type="password" name="confirmar_password" placeholder="Confirmar Contraseña" required class="register-input">
                <button type="submit" class="register-btn">Registrarse</button>
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