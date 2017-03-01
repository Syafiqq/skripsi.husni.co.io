<?php
/**
 * This <emosi.ekspresif> project created by :
 * Name         : syafiq
 * Date / Time  : 04 December 2016, 2:02 PM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */

$_avatar = base_url('assets/frontend/avatar/' . ($user['gender'] == 'm' ?
        'm/boy-' . $user['avatar'] . '.png' :
        'w/girl-' . $user['avatar'] . '.png'));
?>

<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<!doctype html>
<!--suppress HtmlFormInputWithoutLabel -->
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Sampaikan Kisahmu</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <link rel="apple-touch-icon" href="<?php echo base_url('apple-touch-icon.png') ?>">
    <!-- Place favicon.ico in the root directory -->

    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/main.css') ?>">

    <!-- Bootstrap 3.3.6 -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/bootstrap-star-rating/css/star-rating.min.css') ?>">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/components-font-awesome/css/font-awesome.min.css') ?>">
    <!-- Ionicons -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/Ionicons/css/ionicons.min.css') ?>">
    <!-- Theme style -->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/AdminLTE/dist/css/AdminLTE.min.css') ?>">
    <!-- AdminLTE Skins.-->
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/AdminLTE/dist/css/skins/skin-blue.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/story/index/css/user.css') ?>">
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/html5shiv.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/respond.min.js') ?>"></script>
    <![endif]-->
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>
<body class="hold-transition skin-blue layout-top-nav layout-boxed  ">
<div class="wrapper">

    <!-- Main Header -->
    <header class="main-header">


        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <a href="<?php echo site_url('dashboard') ?>" class="navbar-brand">
                        <b>Menulis Ekspresif</b>
                    </a>
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
                        <i class="fa fa-bars"></i>
                    </button>
                </div>
                <div class="collapse navbar-collapse pull-left" id="navbar-collapse">
                    <ul class="nav navbar-nav">
                        <li class="active">
                            <a href="<?php echo site_url('dashboard') ?>">Daftar Kisah
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('story/edit') ?>">Lengkapi Kisahmu</a>
                        </li>
                        <li>
                            <a href="<?php echo site_url('story/share') ?>">Bagikan Kisahmu</a>
                        </li>
                    </ul>
                </div>
            <!-- Navbar Right Menu -->
            <div class="navbar-custom-menu">
                <ul class="nav navbar-nav">
                    <!-- User Account Menu -->
                    <li class="dropdown user user-menu">
                        <!-- Menu Toggle Button -->
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                            <!-- The user image in the navbar-->
                            <img src="<?php echo $_avatar ?>" class="user-image" alt="User Image">
                            <!-- hidden-xs hides the username on small devices so only the image appears. -->
                            <span class="hidden-xs"><?php echo $user['username'] ?></span>
                        </a>
                        <ul class="dropdown-menu">
                            <!-- The user image in the menu -->
                            <li class="user-header">
                                <img src="<?php echo $_avatar ?>" class="img-circle" alt="User Image">

                                <p>
                                    <?php echo $user['username'] ?>
                                    <small><?php echo ucfirst($user['role']) ?></small>
                                </p>
                            </li>
                            <!-- Menu Footer-->
                            <li class="user-footer">
                                <div class="pull-right">
                                    <a id="sign-out" href="<?php echo site_url('auth/do_signout') ?>" onclick="location.href='<?php echo base_url(); ?>dashboard'" class="btn btn-default btn-flat">Keluar Akun</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
            </div>
            </div>
        </nav>
    </header>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
        <!-- Main content -->
        <section class="content">

            <!-- Your Page Content Here -->


            <div class="row">
                <div class="col-md-3">

                    <!-- Profile Image -->
                    <div class="box box-primary">
                        <div class="box-body box-profile">
                            <img class="profile-user-img img-responsive img-circle" src="<?php echo $_avatar ?>" alt="User profile picture">

                            <h3 class="profile-username text-center"><?php echo $user['username'] ?></h3>

                            <p class="text-muted text-center"><?php echo ucfirst($user['role']) ?></p>

                            <ul class="list-group list-group-unbordered">
                                <li class="list-group-item">
                                    <b>Kisah Tersimpan</b>
                                    <a class="pull-right"><?php echo number_format(isset($storyTotal['stored']) ? $storyTotal['stored'] : 0, 0, ',', '.') ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kisah yang belum
                                        <br>
                                       terselesaikan
                                    </b>
                                    <a class="pull-right"><?php echo number_format(isset($storyTotal['unfinished']) ? $storyTotal['unfinished'] : 0, 0, ',', '.') ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Kisah yang dibagikan</b>
                                    <a class="pull-right"><?php echo number_format(isset($storyTotal['shared']) ? $storyTotal['shared'] : 0, 0, ',', '.') ?></a>
                                </li>
                            </ul>

                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Tentang Saya</h3>
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <strong>
                                <i class="fa fa-id-card margin-r-5"></i>
                                Username
                            </strong>

                            <p class="text-muted">
                                <?php echo $user['username'] ?>
                            </p>

                            <hr>

                            <strong>
                                <i class="fa fa-id-card margin-r-5"></i>
                                Kelas
                            </strong>

                            <p class="text-muted">
                                <?php echo $user['kelas'] ?>
                            </p>

                            <hr>

                            <strong>
                                <i class="fa fa-envelope margin-r-5"></i>
                                Akun
                            </strong>

                            <p class="text-muted"><?php echo $user['email'] ?></p>

                            <hr>

                            <strong>
                                <i class="fa fa-eye<?php echo $user['role'] == 'counselor' ? '' : '-slash' ?> margin-r-5"></i>
                                Status
                            </strong>

                            <p class="text-muted"><?php echo $user['role'] == 'counselor' ? ucfirst($user['role']) : 'Student' ?></p>

                            <hr>

                            <strong>
                                <i class="fa fa-pencil-square-o margin-r-5"></i>
                                Data Diri Saya
                            </strong>

                            <p><?php echo $user['status'] ?></p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">Petunjuk Penggunaan</h3>

                            <div class="box-tools pull-right">
                                <button type="button" class="btn btn-box-tool" data-widget="collapse">
                                    <i class="fa fa-minus"></i>
                                </button>
                            </div>
                            <!-- /.box-tools -->
                        </div>
                        <!-- /.box-header -->
                        <div class="box-body">
                            <p> 1. Baca dan pahami pertanyaan dengan seksama.</p>
                            <p> 2. Isilah sesuai dengan keadaanmu.</p>
                            <p> 3. Karena ini tidak berpengaruh pada nilai mata pelajaran kalian, jadi jangan saling menyontoh yaa !!!</p>
                            <p> 4. Kerjakan dengan santai dan jangan terburu-buru.</p>
                            <div style="margin-top: 32px"></div>
                            <p>Setiap orang pasti memiliki pengalaman menarik atau berkesan. Baik itu pengalaman yang berkaitan dengan emosi, maupun pengalaman yang lainnya. Mari kita belajar dari pengalaman kita dengan melalui tulisan.</p>
                            <p>Tahukah kamu bahwa mengekspresikan emosi bisa dilakukan dengan cara menulis loh !!! Belum pernah tau kan sebelumnya ???.</p>
                            <p>Mari kita mulai !!! sekarang coba tuliskan pengalaman yang membuatmu merasakan emosi (sedih, senang, takut, marah, bahagia, dll).</p>

                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <h3 style="text-align: center">
                                <strong>Good Luck !</strong>
                            </h3>
                        </div>
                    </div>
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 style="bold" class="box-title">Sampaikan Kisahmu</h3>
                        </div>
                        <!-- /.box-header -->
                        <!-- form start -->
                        <form class="form-horizontal" id="tell_story" action="<?php echo site_url('story/do_publish') ?>" method="post">
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="story_title" class=" control-label" style="font-size: medium;margin-bottom: 8px;">Kisahku ini tentang emosi...</label>
                                            <input type="text" name="title" class="form-control" id="story_title" placeholder="Emosi apa yang muncul dalam kisahmu??">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="story_title" class=" control-label" style="font-size: medium;margin-bottom: 8px; text-align: left">
                                                <span>Jika kekuatan emosimu pada kisah ini diberi skor 1-10, pada nilai berapa kamu berada.</span>
                                                <br>
                                                <span>1 skor paling rendah, 10 skor paling tinggi</span>
                                            </label>
                                            <input required id="generate-rating" name="rating">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-10 col-sm-offset-1">
                                        <div class="form-group">
                                            <label for="story_information" class="control-label" style="font-size: medium; margin-bottom: 8px">Singkatnya, Kisah ini berisi...</label>
                                            <textarea id="story_information" style="max-height: 160px" name="information" class="form-control" rows="3" placeholder="Sampaikan secara singkat tentang kisahmu..."></textarea>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                            <div class="box-footer">
                                <button type=
                                        "submit" class="btn btn-primary btn-block">
                                    <span class="glyphicon glyphicon-pencil" aria-hidden="true" style="margin-right: 8px"></span>
                                    Sampaikan Kisah ini
                                </button>
                            </div>

                            <!-- /.box-footer -->
                        </form>
                    </div>
                    <!-- /.box -->
                </div>
            </div>
            <!-- /.row -->

        </section>
        <!-- /. Main content -->
    </div>
    <!-- /.content-wrapper -->

    <!-- Main Footer -->
    <footer class="main-footer">
        <!-- Default to the left -->
        <strong>Copyright &copy; <?php echo $year ?>
            <a href="<?php echo site_url('dashboard') ?>">Menulis Ekspresif</a>
                .
        </strong>
        All rights reserved.
    </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->
<script src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js')?>"><\/script>')</script>
<script src="<?php echo base_url('assets/frontend/html5boilerplate/js/plugins.js') ?>"></script>
<script src="<?php echo base_url('assets/frontend/html5boilerplate/js/main.js') ?>"></script>
<!-- Bootstrap 3.3.6 -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/tether/dist/js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/jquery-serialize-object/dist/jquery.serialize-object.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/bootstrap-star-rating/js/star-rating.min.js') ?>"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/AdminLTE/dist/js/app.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/emojione/lib/js/emojione.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/ckeditor/ckeditor.js') ?>"></script>
<script type="text/javascript">
    CKEDITOR.plugins.addExternal('emojione', '<?php echo base_url('assets/frontend/bower_components/ckeditor-emojione/')?>', 'plugin.js');
    CKEDITOR.config.extraPlugins = 'emojione';
</script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/story/index/js/user.js') ?>"></script>
</body>
</html>


