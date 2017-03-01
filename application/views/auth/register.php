<?php
/**
 * This <emosi.ekspresif> project created by :
 * Name         : syafiq
 * Date / Time  : 04 December 2016, 1:18 AM.
 * Email        : syafiq.rezpector@gmail.com
 * Github       : syafiqq
 */
?>
<!DOCTYPE html>
<!--suppress HtmlFormInputWithoutLabel -->
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Daftar Akun</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="apple-touch-icon" href="<?php echo base_url('apple-touch-icon.png') ?>">

    <!-- CSS -->
    <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Roboto:400,100,300,500">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/bootstrap/dist/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/bower_components/animate.css/animate.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/normalize.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/html5boilerplate/css/main.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/auth/register/font-awesome/css/font-awesome.min.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/auth/register/css/form-elements.css') ?>">
    <link rel="stylesheet" href="<?php echo base_url('assets/frontend/auth/register/css/style.css') ?>">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/html5shiv.min.js') ?>"></script>
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/respond.min.js') ?>"></script>
    <![endif]-->
    <script src="<?php echo base_url('assets/frontend/html5boilerplate/js/vendor/modernizr-2.8.3.min.js') ?>"></script>
</head>

<body>

<!-- Top content -->
<div class="top-content">
    <div class="inner-bg">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-md-offset-3">
                    <div class="form-box">
                        <div class="form-top">
                            <div class="form-top-left">
                                <h3>Daftarkan Diri Anda</h3>
                            </div>
                            <div class="form-top-right">
                                <i class="fa fa-pencil"></i>
                            </div>
                        </div>
                        <div class="form-bottom">
                            <form id="register" role="form" action="<?php echo site_url('auth/do_register') ?>" method="post" class="registration-form">
                                <div class="form-group">
                                    <label class="sr-only" for="form-first-name">Nama</label>
                                    <input type="text" name="username" placeholder="Nama Lengkap" class="form-first-name form-control" id="form-first-name">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-email">Email</label>
                                    <input type="text" name="email" placeholder="Email " class="form-email form-control" id="form-email">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-select">Role...</label>
                                    <select name="role" class="form-select form-control" id="form-select_role">
                                        <option value="">Status</option>
                                        <option value="student">Siswa</option>
                                        <option value="counselor">Konselor</option>
                                    </select>
                                </div>
                                <div id="class_layout" style="display: none" class="form-group">
                                    <label class="sr-only" for="form-kelas">Kelas</label>
                                    <input type="text" name="kelas" placeholder="Kelas" class="form-kelas form-control" id="form-kelas">
                                </div>
                                <div class="form-group" id="choosen_counselor" style="display: none">
                                    <label class="sr-only" for="form-select">Pilih Counselor Anda</label>
                                    <select name="choosen_counselor" class="form-select form-control" id="form-select_choosen_counselor">
                                        <option value="">Pilih Konselor Anda</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-select">Jenis Kelamin</label>
                                    <select name="gender" class="form-select form-control" id="form-select_gender">
                                        <option value="">Jenis Kelamin...</option>
                                        <option value="m">Laki-Laki</option>
                                        <option value="w">Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-password">Password</label>
                                    <input type="password" name="password" placeholder="Password..." class="form-password form-control" id="form-password">
                                </div>
                                <div class="form-group">
                                    <label class="sr-only" for="form-about-yourself">Data Diri Saya (Gambaran Singkat diri Anda)</label>
                                    <textarea name="status" placeholder="Data Diri Saya (Gambaran Singkat diri Anda)..."
                                              class="form-about-yourself form-control" id="form-about-yourself"></textarea>
                                </div>
                                <button type="submit" class="btn">Daftar Sekarang</button>
                            </form>

                        </div>
                    </div>
                    <div class="social-login">
                        <div class="social-login-buttons">
                            <a class="btn btn-link-1" href="<?php echo site_url('dashboard') ?>">
                                Kembali ke Halaman Depan
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Javascript -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js') ?>"></script>
<script>window.jQuery || document.write('<script src="<?php echo base_url('assets/frontend/bower_components/jquery/dist/jquery.min.js')?>"><\/script>')</script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/html5boilerplate/js/plugins.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/html5boilerplate/js/main.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/jquery-serialize-object/dist/jquery.serialize-object.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/tether/dist/js/tether.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/bootstrap/dist/js/bootstrap.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/auth/register/js/jquery.backstretch.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/auth/register/js/scripts.js') ?>"></script>

<!--[if lt IE 10]>
<script src="<?php echo base_url('assets/frontend/auth/register/js/placeholder.js')?>"></script>
<![endif]-->

</body>

</html>
