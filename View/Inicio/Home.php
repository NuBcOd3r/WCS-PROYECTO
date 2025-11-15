<?php
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/View/LayoutExterno.php';
  include_once $_SERVER['DOCUMENT_ROOT'] . '/WCS-PROYECTO/Controller/ProductosController.php';
  $resultado = ConsultarProductosIndex();
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

    <!--Sección #1-->
    <section class="hero">
        <div class="hero__item" style="background-image: url('../../View/img/hero-1.jpg');">
            <div class="container">
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="hero__text">
                            <h2>Endulzando tu vida un postre a la vez!</h2>
                            <a href="#" class="primary-btn">Nuestros Productos</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!--Categorias-->
    <div class="categories">
        <div class="container">
            <div class="row">
                <div class="categories__slider owl-carousel">
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-029-cupcake-3"></span>
                            <h5>Pasteles</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-034-chocolate-roll"></span>
                            <h5>Repostería</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Donas</h5>
                        </div>
                    </div>
                    <div class="categories__item">
                        <div class="categories__item__icon">
                            <span class="flaticon-006-macarons"></span>
                            <h5>Galletas</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--PRODUCTOS-->
    <section class="product spad">
        <div class="container">
            <div class="row">

                <?php foreach ($resultado as $fila): ?>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">

                        <!-- IMAGEN-->
                        <div class="product__item__pic set-bg" data-setbg="<?= htmlspecialchars($fila['imagen']) ?>">

                            <!-- CATEGORÍA -->
                            <div class="product__label">
                                <span><?= htmlspecialchars($fila['nombreCategoria']) ?></span>
                            </div>
                        </div>

                        <div class="product__item__text">

                            <!-- NOMBRE -->
                            <h6>
                                <a href="#">
                                    <?= htmlspecialchars($fila['nombreProducto']) ?>
                                </a>
                            </h6>

                            <!-- PRECIO -->
                            <div class="product__item__price">
                                ₡<?= number_format($fila['precio'], 2) ?>
                            </div>

                            <!-- BOTÓN AÑADIR AL CARRITO -->
                            <div class="cart_add mt-5">

                                <form method="POST" action="AgregarCarrito.php" style="display:flex; gap:20px;">
                                    <input type="hidden" name="idProducto"
                                        value="<?= $fila['idProducto'] ?>">

                                    <input type="number" name="cantidad" min="1" value="1"
                                        style="width:35px; border:1px solid #f08632; padding:1px; margin-top:3px">

                                    <button type="submit"
                                        style="background:none; border:none; color:#f08632;; font-weight:bold; cursor:pointer;">
                                        Añadir al carrito
                                    </button>
                                </form>

                            </div>

                        </div>

                    </div>
                </div>
                <?php endforeach; ?>

            </div>
        </div>
    </section>


    <!--INSTAGRAM-->
    <section class="instagram spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 p-0">
                    <div class="instagram__text">
                        <div class="section-title">
                            <span>Siguenos en Instagram</span>
                            <h2>Momentos dulces que se guardan como recuerdos.</h2>
                        </div>
                        <h5>
                            <a href="https://www.instagram.com/sweet_cakes_marys/" target="_blank"
                                style="text-decoration:none; color:#a4a4a4;">
                                @sweet_cakes_marys
                            </a>
                        </h5>
                    </div>
                </div>
                <div class="col-lg-8">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="../../View/img/instagram-1.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="../../View/img/instagram-2.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="../../View/img/instagram-3.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="../../View/img/instagram-4.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic middle__pic">
                                <img src="../../View/img/instagram-5.png" alt="">
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-4 col-sm-4 col-6">
                            <div class="instagram__pic">
                                <img src="../../View/img/instagram-6.png" alt="">
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