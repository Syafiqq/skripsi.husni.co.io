<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 24 February 2017, 1:03 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

?>
<!doctype html>
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Menulis Ekspresif</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="apple-touch-icon" href="<?php echo base_url('apple-touch-icon.png') ?>">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/main.css') ?>">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/welcome/landing_page3/css/full-slider.css') ?>">

    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/components-font-awesome/css/font-awesome.min.css') ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/html5shiv.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/respond.min.js') ?>"></script>
    <![endif]-->
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
    <style>
        ._center {
            position: absolute;
            margin: auto;
            top: 0;
            right: 0;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>

<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo site_url('') ?>">Ekspresikan Dirimu</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav navbar-right">
                <li>
                    <a href="<?php echo site_url('about') ?>">Profil Pengembang</a>
                </li>
                <li>
                    <a href="<?php echo site_url('auth/register') ?>">Daftar Akun</a>
                </li>
                <li>
                    <a href="<?php echo site_url('auth/login') ?>">Masuk Aplikasi</a>
                </li>
            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>

<!-- Full Page Image Background Carousel Header -->
<header id="myCarousel" class="carousel slide">
    <!-- Indicators -->
    <ol class="carousel-indicators">
        <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
        <li data-target="#myCarousel" data-slide-to="1"></li>
        <li data-target="#myCarousel" data-slide-to="2"></li>
        <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for Slides -->
    <div class="carousel-inner">
        <div class="item active">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill">
                <div class="container _center" style="height: 200px">
                    <div class="row" style="margin-bottom: 24px">
                        <div class="col-md-4 col-md-offset-4">
                            <h1 style="color: white; text-align: center; font-size: 40px;">
                                <strong>Emosi</strong>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <p style="color: white; text-align: center; font-size: large; line-height: 32px; letter-spacing: 1px">Emosi adalah luapan perasaan yang sedang dialami oleh seseorang. Emosi itu bukan hanya marah loh, tetapi juga sedih, senang, takut, bahagia juga termasuk emosi. </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <!-- Set the second background image using inline CSS below. -->
            <div class="fill">
                <div class="container _center" style="height: 400px">
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <h1 style="color: white; text-align: center; font-size: 40px;">
                                <strong>Emosi yang Sering Muncul
                                    <br>
                                        Dalam Diri Kita
                                </strong>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6 col-md-offset-3">
                            <img src="<?php echo base_url('assets/emotions.png'); ?>" class="img-responsive" alt="Responsive image" style="margin: auto">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <!-- Set the first background image using inline CSS below. -->
            <div class="fill">
                <div class="container _center" style="height: 200px">
                    <div class="row" style="margin-bottom: 24px">
                        <div class="col-md-6 col-md-offset-3">
                            <h1 style="color: white; text-align: center; font-size: 40px;">
                                <strong>Pengelolaan Emosi</strong>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <p style="color: white; text-align: center; font-size: large; line-height: 32px; letter-spacing: 1px">Pengelolaan emosi adalah cara untuk mengendalikan dan mengekspresikan luapan perasaan yang sedang dialami oleh seseorang.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="item">
            <!-- Set the third background image using inline CSS below. -->
            <div class="fill">
                <div class="container _center" style="height: 300px">
                    <div class="row" style="margin-bottom: 24px">
                        <div class="col-md-6 col-md-offset-3">
                            <h1 style="color: white; text-align: center; font-size: 40px;">
                                <strong>Expressive Writing
                                    <br>
                                        (Menulis Ekspresif)
                                </strong>
                            </h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-8 col-md-offset-2">
                            <p style="color: white; text-align: center; font-size: large; line-height: 32px; letter-spacing: 1px">Expressive writing (menulis ekspresif) adalah kegiatan menulis yang dilakukan untuk mengekspresikan emosi, entah itu emosi senang, sedih, takut, dan marah yang berasal dari pengalaman hidup dimasa lalu dan sekarang.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
        <span class="icon-prev"></span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
        <span class="icon-next"></span>
    </a>

</header>

<!-- Page Content -->
<div class="container">

</div>
<!-- /.container -->

<script src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js')?>"><\/script>')</script>
<script src="<?php echo base_url('assets/frontend/html5boilerplate/js/plugins.js') ?>"></script>
<script src="<?php echo base_url('assets/frontend/html5boilerplate/js/main.js') ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/auth/login/js/jquery.backstretch.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/welcome/landing_page3/js/landing_page.js') ?>"></script>


<!-- Script to Activate the Carousel -->
<script>
    $('.carousel').carousel({
        interval: 5000 //changes the speed
    })
</script>

</body>
</html>
