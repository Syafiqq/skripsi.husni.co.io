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
<html class="no-js" lang="">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Atur Kisah</title>
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
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/story/edit/css/user.css') ?>">
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
                        <li>
                            <a href="<?php echo site_url('dashboard') ?>">Daftar Kisah
                            </a>
                        </li>
                        <li class="active">
                            <a href="<?php echo site_url('story/edit') ?>">Lengkapi Kisahmu
                                <span class="sr-only">(current)</span>
                            </a>
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
                                    <b>Kisah yang belum terselesaikan</b>
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
                            <h3 class="box-title">Petunjuk Pengerjaan :</h3>

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
                        </div>
                        <!-- /.box-body -->
                        <div class="box-footer">
                            <h3 style="text-align: center">
                                <strong>Good Luck !</strong>
                            </h3>
                        </div>
                    </div>

                    <?php
                    if (count($story) > 0)
                    {
                        ?>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">Kisahku</h3>
                            </div>
                            <!-- /.box-header -->
                            <form class="form-horizontal" id="edit_story" action="<?php echo site_url('story/do_edit') . '?id=' . $story['id'] ?>" method="post">
                                <!-- form start -->
                                <div>

                                    <h3 style="text-align: center"><?php echo $story['title'] ?></h3>


                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">

                                            </div>
                                            <div class="form-group">
                                                <div style="margin-top: 15px; margin-bottom: 15px" class="col-md-10 col-md-offset-1">
                                                    <p>a. Kejadian apa yang kamu alami ???</p>
                                                    <textarea id="story_main" name="main" class="form-control" rows="10" cols="80" placeholder="Edit your story here ! "><?php echo $story['main'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            </div>
                                            <div class="form-group">
                                                <div style="margin-top: 15px; margin-bottom: 15px" class="col-md-10 col-md-offset-1">
                                                    <p>b. Emosi apa yang kamu rasakan ???</p>
                                                    <textarea id="story_main2" name="main2" class="form-control" rows="10" cols="80" placeholder="Edit your story here ! "><?php echo $story['main2'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            </div>
                                            <div class="form-group">
                                                <div style="margin-top: 15px; margin-bottom: 15px" class="col-md-10 col-md-offset-1">
                                                    <p>c. Apa yang menyebabkan kamu merasakan emosi itu ???</p>
                                                    <textarea id="story_main3" name="main3" class="form-control" rows="10" cols="80" placeholder="Edit your story here ! "><?php echo $story['main3'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-md-12">
                                            </div>
                                            <div class="form-group">
                                                <div style="margin-top: 15px; margin-bottom: 15px" class="col-md-10 col-md-offset-1">
                                                    <p>d. Apa yang kamu lakukan saat merasakan emosi tersebut ???</p>
                                                    <textarea id="story_main4" name="main4" class="form-control" rows="10" cols="80" placeholder="Edit your story here ! "><?php echo $story['main4'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-10">
                                            </div>
                                            <div class="form-group">
                                                <div style="margin-top: 15px; margin-bottom: 15px" class="col-md-10 col-md-offset-1">
                                                    <p>e. Apakah dengan menulis membuat kamu lebih baik ???</p>
                                                    <textarea id="story_main5" name="main5" class="form-control" rows="10" cols="80" placeholder="Edit your story here ! "><?php echo $story['main5'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="box-body">
                                        <div class="row">
                                            <div class="col-sm-10">
                                            </div>
                                            <div class="form-group">
                                                <div style="margin-top: 15px; margin-bottom: 15px" class="col-md-10 col-md-offset-1">
                                                    <p>f. Jika jawaban kamu Ya, maka kamu berhasil mengekspresikan emosimu ...</p>
                                                    <p>g. Jika jawabanmu Tidak, apa yang sebaiknya kamu lakukan agar bisa menjadi lebih baik ??? </p>
                                                    <textarea required="required" id="story_main6" name="main6" class="form-control" rows="10" cols="80" placeholder="Edit your story here ! "><?php echo $story['main6'] ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                    <div style="margin-top: 33px; margin-bottom: 33px" class="col-md-10 col-md-offset-1">
                                        <p>Setelah menulis dan bercerita tadi, bagaimana perasaanmu sekarang ??? Nah, jika diberi skor 1-10, pada skor berapa perasaanmu sekarang ???</p>
                                        <p>(1 menunjukkan skor rendah, 10 menunjukkan skor paling tinggi)</p>

                                        <div class="form-group">
                                            <label for="story_main" class="col-sm-2 control-label">Skor Akhir</label>
                                            <div class="col-sm-10">
                                                <?php echo "<input id=\"generate-rating\" value='" . $story['rating2'] . "' name=\"rating\">" ?>
                                            </div>
                                        </div>
                                    </div>


                                    <div class="box-footer">
                                        <button type="submit" class="btn btn-info pull-right">Selesai</button>
                                    </div>
                            </form>
                            <!-- /.box-body -->
                        </div>

                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box box-danger">
                            <div class="box-body">
                                <h1 style="text-align: center; color: #424242.;">Maaf</h1>
                                <h3 style="text-align: center; color: #424242.;">Kemungkinan Indikasi </h3>
                                <h4 style="text-align: center; color: #424242.;">Anda tidak dapat mengubah kisah ini</h4>
                                <h4 style="text-align: center; color: #424242.;">atau</h4>
                                <h4 style="text-align: center; color: #424242.;">Kisah ini telah
                                    <strong>diselesaikan</strong>
                                </h4>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- /.box -->
                </div>
                <!-- /.row -->

        </section>
        <!-- /.content -->
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
<script type="text/javascript" src="<?php echo base_url('assets/frontend/story/edit/js/user.js') ?>"></script>
</body>
</html>

