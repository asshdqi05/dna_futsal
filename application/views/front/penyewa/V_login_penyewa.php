<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <title>DNA Futsal</title>

    <!-- Google fonts -->
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,700' rel='stylesheet' type='text/css'>

    <!-- font awesome -->
    <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/font-awesome/css/font-awesome.min.css" rel="stylesheet">

    <!-- bootstrap -->
    <link rel="stylesheet" href="<?= base_url('front/') ?>assets/bootstrap/css/bootstrap.min.css" />

    <!-- animate.css -->
    <link rel="stylesheet" href="<?= base_url('front/') ?>assets/animate/animate.css" />
    <link rel="stylesheet" href="<?= base_url('front/') ?>assets/animate/set.css" />

    <!-- gallery -->
    <link rel="stylesheet" href="<?= base_url('front/') ?>assets/gallery/blueimp-gallery.min.css">

    <!-- favicon -->
    <link rel="shortcut icon" href="<?= base_url('front/') ?>images/dnalogo.png" type="image/x-icon">
    <link rel="icon" href="<?= base_url('front/') ?>images/dnalogo.png" type="image/x-icon">


    <link rel="stylesheet" href="<?= base_url('front/') ?>assets/style.css">

</head>

<body>
    <div class="topbar animated fadeInLeftBig"></div>

    <!-- Header Starts -->
    <div class="navbar-wrapper">
        <div class="container">

            <div class="navbar navbar-default navbar-fixed-top" role="navigation" id="top-nav">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Logo Starts -->
                        <a class="navbar-brand" href="<?= site_url('C_home_front') ?>"><img src="<?= base_url('front/') ?>images/logo1.png" alt="logo"></a>
                        <!-- #Logo Ends -->


                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target=".navbar-collapse">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>

                    </div>


                    <!-- Nav Starts -->
                    <div class="navbar-collapse  collapse">
                        <ul class="nav navbar-nav navbar-right scroll">
                            <li class="active"><a href="<?= site_url('C_home_front') ?>">Back to Home</a></li>
                        </ul>
                    </div>
                    <!-- #Nav Ends -->
                </div>
            </div>
        </div>
    </div>



    <div id="" class="spacer">
        <div class="container contactform center">
            <h2 class="text-center  wowload fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">Login Penyewa</h2>
            <div class="card wowload fadeInUp animated">
                <div class="card-body col-sm-6 col-sm-offset-3 col-xs-6">
                    <?php echo $this->session->flashdata('msg'); ?>
                    <form class="form-horizontal" method="POST" action="<?php echo site_url('front/C_logreg/login') ?>">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Username" name="username" value="<?= set_value('username') ?>">
                            <span class="input-group-addon"><i class="fa fa-male"></i></span>
                        </div>
                        <?= form_error('username', '<small class="text-danger">', '</small>'); ?>
                        <br>
                        <div class="input-group">
                            <input type="password" class="form-control" placeholder="Password" name="password" value="<?= set_value('password1') ?>">
                            <span class="input-group-addon"><i class="fa fa-key"></i></span>
                        </div>
                        <?= form_error('password', '<small class="text-danger">', '</small>'); ?>
                        <br>
                        <div>
                            <button class="btn btn-primary btn-md btn-block swalDefaultSuccess" type="submit">
                                <i class="fa fa-sign-in"></i>Login
                            </button>

                            <a class="btn btn-danger btn-md btn-block" href="<?= site_url('front/C_logreg/indexreg') ?>">
                                <i class="fa fa-pencil"></i>Registrasi
                            </a>
                        </div>
                </div>
            </div>
        </div>
    </div>

    <!-- jquery -->
    <script src="<?= base_url('front/') ?>assets/jquery.js"></script>

    <!-- wow script -->
    <script src="<?= base_url('front/') ?>assets/wow/wow.min.js"></script>


    <!-- boostrap -->
    <script src="<?= base_url('front/') ?>assets/bootstrap/js/bootstrap.js" type="text/javascript"></script>

    <!-- jquery mobile -->
    <script src="<?= base_url('front/') ?>assets/mobile/touchSwipe.min.js"></script>
    <script src="<?= base_url('front/') ?>assets/respond/respond.js"></script>

    <!-- gallery -->
    <script src="<?= base_url('front/') ?>assets/gallery/jquery.blueimp-gallery.min.js"></script>




</body>