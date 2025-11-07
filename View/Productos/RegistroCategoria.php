<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarCategorias();
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
    <section class="mt-5 mb-5">
        <div class="container-fluid">
            <div class="row justify-content-center">
                <div class="col-md-8">

                    <!-- Card -->
                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                        <div class="card-body">

                            <h2 class="login-title text-center mb-4 mt-2">Registrar Categorías</h2>

                            <?php
                            if (isset($_POST["Mensaje"])) {
                                echo '<div class="alert alert-danger text-center">' . $_POST["Mensaje"] . '</div>';
                                }
                            ?>

                            <form action="" class="login-form" method="post" id="formRegistrarCategoria">
                                <div class="mb-3">
                                    <input type="text" placeholder="Ejm: Galletas" id="nombreCategoria"
                                        name="nombreCategoria" class="form-control text-center rounded-3">
                                </div>

                                <div class="text-center">
                                    <button type="submit" class="btn text-white px-4"
                                        style="background-color: #f08632; border-color: #f08632;"
                                        id="btnRegistrarCategoria" name="btnRegistrarCategoria">
                                        Registrar
                                    </button>
                                </div>
                            </form>

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

    <script src="../js/AgregarCategoria.js"></script>
</body>

</html>