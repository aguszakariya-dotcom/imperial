<?php
require_once 'koneksi.php';
?>

<!DOCTYPE HTML>
<html>

<head>
    <title>Helios by HTML5 UP</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>
<link rel="stylesheet" href="assets/css/main.css" />
<noscript>
    <link rel="stylesheet" href="assets/css/noscript.css" />
</noscript>
</head>

<body class="homepage is-preload">
    <div id="page-wrapper">

        <!-- Header -->
        <div id="header">

            <!-- Inner -->
            <div class="inner">
                <header>
                    <!-- <h1><a href="index.html" id="logo">Helios</a></h1> -->
                    <img src="images/logo.png" alt="" class="">
                    <hr />
                    <p>POJOK MEDIA</p>
                </header>
                <footer>
                    <a href="#banner" class="button circled scrolly">Start</a>
                </footer>
            </div>

            <!-- Nav -->
            <nav id="nav">
                <ul>
                    <li><a href="index.html">Home</a></li>
                    <li>
                        <a href="sample.php">Sample</a>

                    </li>
                    <li><a href="produksi.php">Produksi</a></li>
                    <li><a href="#">Salary</a>

                        <ul>
                            <li><a href="breakdownsovana.php">Breakdown Sovana</a></li>
                            <li><a href="#">Breakdown Pojok Media</a></li>
                            <li><a href="#"></a></li>
                            <li>
                                <a href="#">Salary Karyawan &hellip;</a>
                                <ul>
                                    <li><a href="#">Salary Penjahit</a></li>
                                    <li><a href="#">Salary Tk Potong</a></li>
                                    <li><a href="#">Salary Handyman</a></li>
                                    <li><a href="#">Cashflow</a></li>
                                </ul>
                            </li>
                            <li><a href="#">Tahapan</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>

        </div>

        <!-- Banner -->
        <section id="banner">
            <header>
                <h2>Hi. You're looking at <strong>POJOK MEDIA</strong>.</h2>
                <p class="container">
                    We provide a range of high-quality services to meet your needs. Our team is dedicated to delivering exceptional results and exceeding your expectations. Take a look at the services we offer:
                </p>
            </header>
        </section>

        <!-- Carousel -->
        <section class="carousel">
            <div class="reel">
                <?php
                $sql = mysqli_query($koneksi, "SELECT DISTINCT nama_customer, style, gambar FROM produksi ORDER BY ID desc LIMIT 50");
                while ($row = mysqli_fetch_assoc($sql)) :
                ?>

                    <article class=" shadow">
                        <a href="#" class="image featured"><img src="img/<?= $row['gambar']; ?>" alt="" height="360px" width="200px" /></a>
                        <header>
                            <h3><a href="#"><?= $row['nama_customer']; ?></a></h3>
                        </header>
                        <p><?= $row['style']; ?></p>
                    </article>
                <?php endwhile; ?>
            </div>
        </section>

        <!-- Main -->
        <div class="wrapper style2 mt-2">

            <article id="main" class="container special">
                <div class="row no-gutters">

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up">
                        <div class="count-box">
                            <i class="bi bi-emoji-smile"></i>
                            <span data-purecounter-start="0" data-purecounter-end="232" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Happy Clients</strong> consequuntur quae</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="100">
                        <div class="count-box">
                            <i class="bi bi-journal-richtext"></i>
                            <span data-purecounter-start="0" data-purecounter-end="521" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Projects</strong> adipisci atque cum quia aut</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="200">
                        <div class="count-box">
                            <i class="bi bi-headset"></i>
                            <span data-purecounter-start="0" data-purecounter-end="1453" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Hours Of Support</strong> aut commodi quaerat</p>
                        </div>
                    </div>

                    <div class="col-lg-3 col-md-6 d-md-flex align-items-md-stretch" data-aos="fade-up" data-aos-delay="300">
                        <div class="count-box">
                            <i class="bi bi-people"></i>
                            <span data-purecounter-start="0" data-purecounter-end="32" data-purecounter-duration="1" class="purecounter"></span>
                            <p><strong>Hard Workers</strong> rerum asperiores dolor</p>
                        </div>
                    </div>

                </div>
            </article>

        </div>

        <!-- Features -->
        <div class="wrapper style1">

            <section id="features" class="container special">
                <header>
                    <h2>Morbi ullamcorper et varius leo lacus</h2>
                    <p>Ipsum volutpat consectetur orci metus consequat imperdiet duis integer semper magna.</p>
                </header>
                <div class="row">
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="images/pic07.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Gravida aliquam penatibus</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor
                            etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat
                            integer interdum.
                        </p>
                    </article>
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="images/pic08.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Sed quis rhoncus placerat</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor
                            etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat
                            integer interdum.
                        </p>
                    </article>
                    <article class="col-4 col-12-mobile special">
                        <a href="#" class="image featured"><img src="images/pic09.jpg" alt="" /></a>
                        <header>
                            <h3><a href="#">Magna laoreet et aliquam</a></h3>
                        </header>
                        <p>
                            Amet nullam fringilla nibh nulla convallis tique ante proin sociis accumsan lobortis. Auctor
                            etiam
                            porttitor phasellus tempus cubilia ultrices tempor sagittis. Nisl fermentum consequat
                            integer interdum.
                        </p>
                    </article>
                </div>
            </section>

        </div>

        <!-- Footer -->
        <div id="footer">
            <div class="container">
                <div class="row">

                    <!-- Tweets -->


                    <!-- Posts -->


                    <!-- Photos -->


                </div>
                <hr />
                <div class="row">
                    <div class="col-12">

                        <!-- Contact -->
                        <section class="contact">
                            <header>
                                <h3>Nisl turpis nascetur interdum?</h3>
                            </header>
                            <p>Urna nisl non quis interdum mus ornare ridiculus egestas ridiculus lobortis vivamus
                                tempor aliquet.</p>
                            <ul class="icons">
                                <li><a href="#" class="icon brands fa-twitter"><span class="label">Twitter</span></a>
                                </li>
                                <li><a href="#" class="icon brands fa-facebook-f"><span class="label">Facebook</span></a></li>
                                <li><a href="#" class="icon brands fa-instagram"><span class="label">Instagram</span></a></li>
                                <li><a href="#" class="icon brands fa-pinterest"><span class="label">Pinterest</span></a></li>
                                <li><a href="#" class="icon brands fa-dribbble"><span class="label">Dribbble</span></a>
                                </li>
                                <li><a href="#" class="icon brands fa-linkedin-in"><span class="label">Linkedin</span></a></li>
                            </ul>
                        </section>

                        <!-- Copyright -->
                        <div class="copyright">
                            <ul class="menu">
                                <li>&copy; POJOK MEDIA. All rights reserved.</li>
                                <li>Design: <a href="http://fb.me/aguszakariya">ZACK77</a></li>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/jquery.dropotron.min.js"></script>
    <script src="assets/js/jquery.scrolly.min.js"></script>
    <script src="assets/js/jquery.scrollex.min.js"></script>
    <script src="assets/js/browser.min.js"></script>
    <script src="assets/js/breakpoints.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
</body>

</html>