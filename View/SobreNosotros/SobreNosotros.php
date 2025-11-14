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


    <section class="about spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 col-md-6">
                    <div class="about__text">
                        <div class="section-title">
                            <span>Sobre Mary's Sweet Cakes</span>
                            <h2>Reposteria hecha con amor</h2>
                        </div>
                        <p>Mi nombre es Marycruz y este emprendimiento nació de mi amor por la repostería y por compartir dulzura en los momentos más especiales.
                            Desde siempre he disfrutado hornear y crear postres que no solo sepan rico, sino que también transmitan cariño y dedicación en cada bocado.</p>
                        <br>
                        <p>Con el tiempo, esa pasión se convirtió en un sueño: llevar a más personas la alegría de disfrutar un buen postre hecho en casa, con ingredientes
                            de calidad y mucho corazón. Así nació Mary’s Sweet Cakes, un proyecto que poco a poco ha ido creciendo y tomando forma.
                            Mary’ Sweet Cakes es mi forma de compartir lo que más me apasiona: endulzar la vida con pequeños detalles que nacen del corazón.</p>
                    </div>
                </div>

                <div class="col-lg-6 col-md-6">
                    <div class="about__list" style="border-left: 3px solid #f08632; padding-left: 50px;">
                        <div class="section-title">
                            <h2 style="margin-bottom: 20px; margin-top:40px; margin-left:50px;">Hoy preparo con mucho amor</h2>
                        </div>


                        <ul class="lista-productos" style="list-style: none; padding-left: 0;">

                            <li style="margin-bottom: 15px; margin-left:50px;">
                                <i class="fa fa-check" style="color: #E75B6C; margin-right: 10px;"></i>
                                Brownies esponjosos y llenos de sabor
                            </li>

                            <li style="margin-bottom: 15px; margin-left:50px;">
                                <i class="fa fa-check" style="color: #E75B6C; margin-right: 10px;"></i>
                                Postres variados para mesas dulces
                            </li>

                            <li style="margin-bottom: 15px; margin-left:50px;">
                                <i class="fa fa-check" style="color: #E75B6C; margin-right: 10px;"></i>
                                Repostería tradicional
                            </li>

                            <li style="margin-bottom: 15px; margin-left:50px;">
                                <i class="fa fa-check" style="color: #E75B6C; margin-right: 10px;"></i>
                                Delicias frías como pie de limón y tiramisú
                            </li>

                            <li style="margin-bottom: 15px; margin-left:50px;">
                                <i class="fa fa-check" style="color: #E75B6C; margin-right: 10px;"></i>
                                Galletas decoradas o kits para decorar
                            </li>

                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="testimonial spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-title">
                        <span>Testimonios</span>
                        <h2>Nuestros clientes dicen</h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="testimonial__slider owl-carousel">
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="../img/yareli.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Yareli Vargas</h5>
                                    <span>Costa Rica</span>
                                </div>
                            </div>
                            <p>Ese queque te quedó delicioso 🤤</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="testimonial__item">
                            <div class="testimonial__author">
                                <div class="testimonial__author__pic">
                                    <img src="../img/lourdes.jpg" alt="">
                                </div>
                                <div class="testimonial__author__text">
                                    <h5>Lourdes Rodríguez</h5>
                                    <span>Costa Rica</span>
                                </div>
                            </div>
                            <p>Muy orgullosa ❤️</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </section>

    <section class="team spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-7 col-md-7 col-sm-7">
                    <div class="section-title">
                        <span>El equipo</span>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4  col-md-6 col-sm-6">
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
                    <div class="team__item set-bg" data-setbg="../img/Marycruz.png">
                        <div class="team__item__text">
                            <h6>Marycruz</h6>
                            <span>Decoradora y cocinera</span>
                            <div class="team__item__social">
                                <a href="#"><i class="fa fa-facebook"></i></a>
                                <a href="#"><i class="fa fa-twitter"></i></a>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                                <a href="#"><i class="fa fa-youtube-play"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4  col-md-6 col-sm-6">
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