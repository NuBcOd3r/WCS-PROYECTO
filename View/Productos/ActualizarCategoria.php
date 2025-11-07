<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutInterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarCategoria($_GET["id"]);
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
                <div class="col-md-10">

                    <div class="card shadow-lg border-0 rounded-4" style="background-color: #f8f9fa;">
                        <div class="card-body">

                            <h2 class="login-title text-center mb-4 mt-2">Actualizar Categorías</h2>

                            <?php
                                if(isset($_POST["Mensaje"]))
                                {
                                    echo '<div class="alert alert-primary centrado">' . $_POST["Mensaje"] . '</div>';
                                }
                            ?>

                            <form id="formActualizarCategoria" class="mb-3" action="" method="POST"
                                enctype="multipart/form-data">

                                <input type="hidden" id="idCategoria" name="idCategoria"
                                    value="<?php echo $resultado["idCategoria"]?>">


                                <div class="mb-3">
                                    <label class="form-label mt-2" style="color: #f08632;font-weight: 700;">Nombre de la
                                        Categoría</label>
                                    <input type="text" class="form-control" id="nombreCategoria" name="nombreCategoria"
                                        value="<?php echo $resultado['nombreCategoria']; ?>" />
                                </div>

                                <div class="d-flex justify-content-center">
                                    <button class="btn d-grid w-25" id="btnActualizarCategoria"
                                        name="btnActualizarCategoria" type="submit"
                                        style="background-color: #f08632; color: white; border: none;">
                                        Actualizar
                                    </button>
                                </div>


                            </form>

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