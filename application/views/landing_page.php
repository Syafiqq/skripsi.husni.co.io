<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 02 December 2016, 8:57 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

?>
<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE HTML>
<html>
<head>
    <title>The Notebook Website Template | Home :: w3layouts</title>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
    <link rel="apple-touch-icon" href="<?php echo base_url('apple-touch-icon.png') ?>">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/main.css') ?>">

    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/html5shiv.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/respond.min.js') ?>"></script>
    <![endif]-->

    <link href="<?php echo base_url('assets/frontend/welcome/landing_page/css/style.css') ?>" rel="stylesheet" type="text/css" media="all"/>
    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/welcome/landing_page/css/magnific-popup.css') ?>">

    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js') ?>"></script>
</head>
<body>
<div class="content" id="home">
    <div class="header">
        <div class="wrap">
            <header id="topnav">
                <h1>
                    <a href="<?php echo site_url('test/notebookweb') ?>">Skripsi</a>
                </h1>
                <a href="#" id="navbtn">Nav Menu</a>
                <div class="clear"></div>
            </header>
        </div>
    </div>
    <script type="text/javascript" src="<?php echo base_url('assets/frontend/welcome/landing_page/js/menu.js') ?>"></script>
    <div class="slider" id="home">
        <div class="wrap">
            <!---start-da-slider----->
            <div id="da-slider" class="da-slider">
                <div class="da-slide">
                    <h2>Best Ideas Start On Paper</h2>
                    <p>Revolvationary notebook with eco-friendly paper,advanced surface technology and degital sharing integration.</p>
                    <a href="<?php echo site_url('auth/register') ?>" class="da-link">Order Now</a>
                </div>
                <div class="da-slide">
                    <h2>Best Ideas Start On Paper</h2>
                    <p>Revolvationary notebook with eco-friendly paper,advanced surface technology and degital sharing integration.</p>
                    <a href="<?php echo site_url('auth/register') ?>" class="da-link">Order Now</a>
                </div>
                <div class="da-slide">
                    <h2>Best Ideas Start On Paper</h2>
                    <p>Revolvationary notebook with eco-friendly paper,advanced surface technology and degital sharing integration.</p>
                    <a href="<?php echo site_url('auth/register') ?>" class="da-link">Order Now</a>

                </div>
                <div class="da-slide">
                    <h2>Best Ideas Start On Paper</h2>
                    <p>Revolvationary notebook with eco-friendly paper,advanced surface technology and degital sharing integration.</p>
                    <a href="<?php echo site_url('auth/register') ?>" class="da-link">Order Now</a>

                </div>
            </div>
            <script type="text/javascript" src="<?php echo base_url('assets/frontend/welcome/landing_page/js/jquery.cslider.js') ?>"></script>
            <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/welcome/landing_page/css/slider.css') ?>"/>
            <script type="text/javascript" src="<?php echo base_url('assets/frontend/welcome/landing_page/js/modernizr.custom.28468.js') ?>"></script>
            <script type="text/javascript">
                $(function ()
                {

                    $('#da-slider').cslider({
                        autoplay: true,
                        bgincrement: 450
                    });

                });
            </script>
        </div>
    </div>
</div>
<div class="footer">
    <div class="wrap">
        <div class="footer-con">
            <div class="footer-left">
                <p> <?php echo $year; ?> &#169; Template by
                    <a href="#">W3layouts</a>
                </p>
            </div>
            <div class="clear"></div>
        </div>
    </div>
</div>
<!-- scroll_top_btn -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/welcome/landing_page/js/move-top.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/welcome/landing_page/js/easing.js') ?>"></script>
<script type="text/javascript">
    $(document).ready(function ()
    {

        var defaults = {
            containerID: 'toTop', // fading element id
            containerHoverID: 'toTopHover', // fading element hover id
            scrollSpeed: 1200,
            easingType: 'linear'
        };


        $().UItoTop({easingType: 'easeOutQuart'});

    });
</script>

<!---smoth-scrlling---->
<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        $(".scroll").click(function (event)
        {
            event.preventDefault();
            $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
        });
    });
</script>

<a href="#" id="toTop" style="display: block;">
    <span id="toTopHover" style="opacity: 1;"></span>
</a>

<script type="text/javascript" src="<?php echo base_url('assets/frontend/html5boilerplate/js/plugins.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/html5boilerplate/js/main.js') ?>"></script>
</body>
</html>


