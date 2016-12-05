<?php
/**
 * This <skripsi.husni.co.io> project created by :
 * Name         : syafiq
 * Date / Time  : 04 December 2016, 4:28 AM.
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
    <title>Detail Story</title>
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

        <!-- Logo -->
        <a href="<?php echo site_url('dashboard') ?>" class="logo">
            <!-- mini logo for sidebar mini 50x50 pixels -->
            <span class="logo-mini"><b>A</b>LT</span>
            <!-- logo for regular state and mobile devices -->
            <span class="logo-lg"><b>Admin</b>LTE</span>
        </a>

        <!-- Header Navbar -->
        <nav class="navbar navbar-static-top" role="navigation">
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
                                    <a id="sign-out" href="<?php echo site_url('auth/do_signout') ?>" class="btn btn-default btn-flat">Sign out</a>
                                </div>
                            </li>
                        </ul>
                    </li>
                </ul>
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
                                    <b>Story Stored</b>
                                    <a class="pull-right"><?php echo number_format(isset($storyTotal['stored']) ? $storyTotal['stored'] : 0, 0, ',', '.') ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Story Unfinished</b>
                                    <a class="pull-right"><?php echo number_format(isset($storyTotal['unfinished']) ? $storyTotal['unfinished'] : 0, 0, ',', '.') ?></a>
                                </li>
                                <li class="list-group-item">
                                    <b>Story Shared</b>
                                    <a class="pull-right"><?php echo number_format(isset($storyTotal['shared']) ? $storyTotal['shared'] : 0, 0, ',', '.') ?></a>
                                </li>
                            </ul>
                            <a href="<?php echo site_url('story') ?>" class="btn btn-primary btn-block">
                                <b>Tell a new story</b>
                            </a>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->

                    <!-- About Me Box -->
                    <div class="box box-primary">
                        <div class="box-header with-border">
                            <h3 class="box-title">About Me</h3>
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
                                <i class="fa fa-envelope margin-r-5"></i>
                                Email
                            </strong>

                            <p class="text-muted"><?php echo $user['email'] ?></p>

                            <hr>

                            <strong>
                                <i class="fa fa-eye<?php echo $user['role'] == 'counselor' ? '' : '-slash' ?> margin-r-5"></i>
                                Role
                            </strong>

                            <p class="text-muted"><?php echo $user['role'] == 'counselor' ? ucfirst($user['role']) : 'Student' ?></p>

                            <hr>

                            <strong>
                                <i class="fa fa-pencil-square-o margin-r-5"></i>
                                Status
                            </strong>

                            <p><?php echo $user['status'] ?></p>
                        </div>
                        <!-- /.box-body -->
                    </div>
                    <!-- /.box -->
                </div>
                <!-- /.col -->
                <div class="col-md-9">
                    <?php
                    if (count($story) > 0)
                    {
                        ?>
                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">My Story</h3>
                            </div>
                            <!-- /.box-header -->
                            <div class="box-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <h3 style="text-align: center"><?php echo $story['title'] ?></h3>
                                    </div>
                                    <div style="margin-top: 32px; margin-bottom: 32px" class="col-md-10 col-md-offset-1">
                                        <?php echo $story['main'] ?>
                                    </div>
                                </div>
                            </div>
                            <!-- /.box-body -->
                        </div>

                        <div class="box box-primary">
                            <div class="box-header with-border">
                                <h3 class="box-title">My Story Additional Information</h3>
                            </div>
                            <!-- /.box-header -->
                            <form class="form-horizontal" id="null">
                                <div class="box-body">
                                    <div class="form-group">
                                        <label for="story_title" class="col-sm-2 control-label">Title</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $story['title'] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="story_information" class="col-sm-2 control-label">Additional Information</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $story['information'] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="story_main" class="col-sm-2 control-label">Created</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $story['created'] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="story_main" class="col-sm-2 control-label">Updated</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $story['update'] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="story_main" class="col-sm-2 control-label">Total Modification</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $story['count'] ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="story_main" class="col-sm-2 control-label">Counselor</label>
                                        <div class="col-sm-10">
                                            <p class="form-control-static"><?php echo $story['counselor'] == null ? 'None' : $story['counselor']['username'] . ' ( ' . $story['counselor']['email'] . ' )'
                                                ?></p>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="story_main" class="col-sm-2 control-label">Rating</label>
                                        <div class="col-sm-10">
                                            <?php echo "<input id=\"generate-rating\" value=\"${story['rating']}\" method='post' action='" . site_url('story/do_updaterating') . '?id=' . $story['id'] . "'>" ?>
                                        </div>
                                    </div>
                                </div>
                                <!-- /.box-footer -->
                            </form>

                            <?php
                            if ($story['published'] == 0)
                            {
                                ?>
                                <form class="form-horizontal" action="<?php echo site_url('story/do_mark') . '?id=' . $story['id'] ?>" method="post" id="mark_story">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <label for="story_title" class="col-sm-2 control-label">Finished ?</label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-success">Mark As Finished</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <form class="form-horizontal" action="<?php echo site_url('story/edit') ?>" method="get" id="update_story">
                                    <div class="box-body">
                                        <div class="form-group">
                                            <input type="hidden" name="id" value="<?php echo $story['id'] ?>">
                                            <label for="story_title" class="col-sm-2 control-label">Update Story</label>
                                            <div class="col-sm-10">
                                                <button type="submit" class="btn btn-info">Click to Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <?php
                            }
                            else
                            {
                                if ($story['counselor'] == null)
                                {
                                    ?>
                                    <form class="form-horizontal" action="<?php echo site_url('story/share') ?>" method="get" id="share_story">
                                        <div class="box-body">
                                            <div class="form-group">
                                                <input type="hidden" name="id" value="<?php echo $story['id'] ?>">
                                                <label for="story_title" class="col-sm-2 control-label">Share Story</label>
                                                <div class="col-sm-10">
                                                    <button type="submit" class="btn btn-success">Click to Share</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                    <?php
                                }
                            }
                            ?>

                            <!-- /.box-body -->
                        </div>
                        <?php
                    }
                    else
                    {
                        ?>
                        <div class="box box-danger">
                            <div class="box-body">
                                <h1 style="text-align: center; color: #424242.;">Sorry</h1>
                                <h4 style="text-align: center; color: #424242.;">You do not have permission to read this story.</h4>
                            </div>
                        </div>
                        <?php
                    }
                    ?>
                </div>
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
            <a href="<?php echo site_url('dashboard') ?>">Skripsi</a>
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
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/remarkable-bootstrap-notify/dist/bootstrap-notify.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/bootstrap-star-rating/js/star-rating.min.js') ?>"></script>
<!-- AdminLTE App -->
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/AdminLTE/dist/js/app.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/jquery-slimscroll/jquery.slimscroll.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/bower_components/fastclick/lib/fastclick.js') ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/frontend/story/detail/js/user.js') ?>"></script>
</body>
</html>

