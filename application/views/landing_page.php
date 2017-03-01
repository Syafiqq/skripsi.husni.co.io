<?php
/**
 * This <emosi.ekspresif> project created by :
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
    <title>Menulis Ekspresif</title>
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

    <link rel="stylesheet" type="text/css" href="<?php echo base_url('assets/frontend/welcome/landing_page/css/slider.css') ?>"/>
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
                <nav>
                    <ul>
                        <li>
                            <a href="<?php echo site_url('auth/profile_page') ?>" class="scroll">Profil Pengembang</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('auth/register') ?>" class="scroll">Daftar Akun</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('auth/login') ?>" class="scroll">Masuk Aplikasi</a>
                        </li>
                        <div class="clear"></div>
                    </ul>
                </nav>
                <h1>
                    <a href="<?php echo site_url('test/notebookweb') ?>">Ekspresikan Dirimu</a>
                </h1>
                <a href="#" id="navbtn">Menu Navigasi</a>
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
                    <h2>Emosi</h2>
                    <p>Emosi adalah luapan perasaan yang sedang dialami oleh seseorang. Emosi itu bukan hanya marah loh, tetapi juga sedih, senang, takut, bahagia juga termasuk emosi. </p>
                </div>
                <div class="da-slide">
                    <h2>Emosi yang Sering Muncul dalam Diri Kita</h2>
                    <p>
                        <img width="" height="" alt="" src="<?php echo base_url('assets/emotions.png'); ?>" class="">
                    </p>

                </div>

                <div class="da-slide">
                    <h2>Pengelolaan Emosi</h2>
                    <p>Pengelolaan emosi adalah cara untuk mengendalikan dan mengekspresikan luapan perasaan yang sedang dialami oleh seseorang. </p>
                </div>
                <div class="da-slide">
                    <h2>Expressive Writing (Menulis Ekspresif)</h2>
                    <p>Expressive writing (menulis ekspresif) adalah kegiatan menulis yang dilakukan untuk mengekspresikan emosi, entah itu emosi senang, sedih, takut, dan marah yang berasal dari pengalaman hidup dimasa lalu dan sekarang.</p>

                </div>
                <nav class="da-arrows">
                    <span class="da-arrows-prev"></span>
                    <span class="da-arrows-next"></span>
                </nav>
            </div>
            <script type="text/javascript" src="<?php echo base_url('assets/frontend/welcome/landing_page/js/jquery.cslider.js') ?>"></script>
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
                    <a href="https://w3layouts.com/">W3layouts</a>
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
        $('a.scroll').on('click', function (event)
        {
            event.preventDefault();
            location.href = $(this).attr('href');
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


