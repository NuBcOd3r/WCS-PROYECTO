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
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-1.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Lilo y Stitch</a></h6>
                            <div class="product__item__price">₡9000.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-2.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Kimetsu No Yaiba</a></h6>
                            <div class="product__item__price">₡10000.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-3.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Red Velvet</a></h6>
                            <div class="product__item__price">₡8000.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-4.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Bob Esponja</a></h6>
                            <div class="product__item__price">₡8500.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-5.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Chicas Superpoderosas</a></h6>
                            <div class="product__item__price">₡15000.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-6.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Minecraft</a></h6>
                            <div class="product__item__price">₡12000.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-7.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Sencillo Dulce de Leche</a></h6>
                            <div class="product__item__price">₡11500.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="product__item">
                        <div class="product__item__pic set-bg" data-setbg="../../View/img/product-8.png">
                            <div class="product__label">
                                <span>Queque</span>
                            </div>
                        </div>
                        <div class="product__item__text">
                            <h6><a href="#">Chesse Cake</a></h6>
                            <div class="product__item__price">₡10700.00</div>
                            <div class="cart_add">
                                <a href="#">Añadir al carrito</a>
                            </div>
                        </div>
                    </div>
                </div>
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
                            <i class="fa fa-instagram" style="color:#E1306C; margin-right:6px;"></i>
                            <a href="https://www.instagram.com/sweet_cakes_marys/" target="_blank" style="text-decoration:none; color:#a4a4a4;">
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