<?php

function ShowHead(){
    echo'
        <head>
        <meta charset="UTF-8">
        <title>Mary´s Sweet Cakes</title>

        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="../../View/css/bootstrap.min.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/flaticon.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/barfiller.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/magnific-popup.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/font-awesome.min.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/elegant-icons.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/nice-select.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/owl.carousel.min.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/slicknav.min.css" type="text/css">
        <link rel="stylesheet" href="../../View/css/style.css" type="text/css">
    </head>
    ';
}

function ShowJS(){
    echo'
        <script src="../../View/js/jquery-3.3.1.min.js"></script>
        <script src="../../View/js/bootstrap.min.js"></script>
        <script src="../../View/js/jquery.nice-select.min.js"></script>
        <script src="../../View/js/jquery.barfiller.js"></script>
        <script src="../../View/js/jquery.magnific-popup.min.js"></script>
        <script src="../../View/js/jquery.slicknav.js"></script>
        <script src="../../View/js/owl.carousel.min.js"></script>
        <script src="../../View/js/jquery.nicescroll.min.js"></script>
        <script src="../../View/js/main.js"></script>
        <script src="../../View/js/funcionesRegistro.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
    ';
}

function ShowToggler(){
    echo'
    <div id="preloder">
        <div class="loader"></div>
    </div>
        <div class="offcanvas-menu-overlay"></div>
            <div class="offcanvas-menu-wrapper">
                <div class="offcanvas__cart">
                    <div class="offcanvas__cart__item">
                        <a href="#"><img src="../../View/img/cart.png" alt=""> <span>0</span></a>
                    <div class="cart__price">Carrito: <span>₡0.00</span></div>
                </div>
            </div>
            <div class="offcanvas__logo">
                <a href="Home.php"><img src="../../View/img/logo.png" alt=""></a>
            </div>
            <div id="mobile-menu-wrap"></div>
            <div class="offcanvas__option">
                <ul>
                    <li><a href="InicioSesion.php">Iniciar Sesión</a></li>
                </ul>
            </div>
        </div>
    ';
}

function ShowHeader(){
    echo'
        <header class="header">
        <div class="header__top">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="header__top__inner">
                            <div class="header__top__left">
                                <ul>
                                    <li>
                                        <a href="InicioSesion.php">
                                            <img src="../../View/img/user.png" alt="" id="user">
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="header__logo">
                                <a href="Home.php" id="logo"><img src="../../View/img/logo.png" alt=""></a>
                            </div>
                            <div class="header__top__right">
                                <!--CARRITO-->
                                <div class="header__top__right__cart">
                                    <a href="#"><img src="../../View/img/cart.png" alt=""> <span>0</span></a>
                                    <div class="cart__price">Carrito: <span>₡0.00</span></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="canvas__open"><i class="fa fa-bars"></i></div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="header__menu mobile-menu">
                        <ul>
                            <li class="active"><a href="#">Inicio</a></li>
                            <li><a href="#">Sobre Nosotros</a></li>
                            <li><a href="../Productos/Categoria.php">Categorias</a></li>
                            <li><a href="../Productos/Productos.php">Productos</a></li>
                            <li><a href="#">Contáctanos</a></li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    ';
}

function ShowFooter(){
    echo'
    <footer class="footer set-bg" data-setbg="../../View/img/footer-bg.jpg">
    <div class="footer__overlay"></div>
    <div class="container">
        <div class="row">
            
            <!-- Horario -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__widget">
                    <h6>Horario</h6>
                    <ul>
                        <li>Lunes - Viernes: 08:00 am – 08:30 pm</li>
                        <li>Sábados: 10:00 am – 04:30 pm</li>
                        <li>Domingos: 10:00 am – 04:30 pm</li>
                    </ul>
                </div>
            </div>

            <!-- Logo y redes -->
            <div class="col-lg-4 col-md-6 col-sm-6 text-center">
                <div class="footer__about">
                    <div class="footer__logo mb-3">
                        <a href="#"><img src="../../View/img/footer-logo.png" alt="Logo"></a>
                    </div>

                    <div class="footer__social">
                        <a href="#"><i class="fa fa-facebook"></i></a>
                        <a href="#"><i class="fa fa-twitter"></i></a>
                        <a href="#"><i class="fa fa-instagram"></i></a>
                        <a href="#"><i class="fa fa-youtube-play"></i></a>
                    </div>
                </div>
            </div>

            <!-- Contacto -->
            <div class="col-lg-4 col-md-6 col-sm-6">
                <div class="footer__about">
                    <h6 style="color: #ffffffff;" class="mb-2">Contáctanos</h6>
                    <ul style="color: #a4a4a4; list-style: none;">
                        <li><i class="fa fa-map-marker"></i> Av. Central 123, San José, Costa Rica</li>
                        <li><i class="fa fa-phone"></i> +506 8888-8888</li>
                        <li><i class="fa fa-envelope"></i> info@marysSweetCakes.com</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>
</footer>
    ';
}
?>