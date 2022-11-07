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
                        <a class="navbar-brand" href="#home"><img src="<?= base_url('front/') ?>images/logo1.png" alt="logo"></a>
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
                            <li class="active"><a href="#home">Home</a></li>
                            <li><a href="#about">Tentang Kami</a></li>
                            <li><a href="#works">Jadwal</a></li>
                            <li><a href="#partners">Sewa Lapangan</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                    <!-- #Nav Ends -->

                </div>
            </div>

        </div>
    </div>
    <!-- #Header Starts -->




    <div id="home">
        <!-- Slider Starts -->
        <div id="myCarousel" class="carousel slide banner-slider animated flipInX" data-ride="carousel">
            <div class="carousel-inner">
                <!-- Item 1 -->
                <div class="item active">
                    <img src="<?= base_url('front/') ?>images/bg1.jpg" alt="banner">
                    <div class="carousel-caption">
                        <div class="caption-wrapper">
                            <div class="caption-info">
                                <img src="<?= base_url('front/') ?>images/dnalogo.png" class="animated bounceInUp" alt="logo" width="250">
                                <h1 class="animated bounceInLeft" style="stroke: black; -webkit-text-stroke: 3px black;">DNA Futsal</h1>
                                <p class="animated bounceInRight">Jl. Komp. PGRI Perumnas Belimbing Padang</p>
                                <div class="scroll animated fadeInUp">
                                    <a href="#about" class="btn btn-danger">
                                        <i class="fa fa-globe"></i>Tentang Kami
                                    </a>
                                    <a href="#partners" class="btn btn-danger">
                                        <i class="fa fa-paper-plane-o"></i>Sewa Lapangan
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- #Item 1 -->
            </div>
        </div>
        <!-- #Slider Ends -->
    </div>




    <!-- Cirlce Starts -->
    <div id="about" class="container spacer about">
        <h2 class="text-center wowload fadeInUp">DNA Futsal</h2>
        <div class="row">
            <div class="col-sm-6 wowload fadeInLeft">
                <h4><i class="fa fa-globe"></i>Tentang Kami</h4>
                <p>DNA Futsal Berdiri di tahun 2013. DNA futsal memberikan fasilitas terbaik untuk para pelanggan.
                    DNA futsal memiliki lapangan berstandar internasional yang terbuat dari bahan Vinyl.</p>
            </div>
            <div class="col-sm-6 wowload fadeInRight">
                <h4><i class="fa fa-map"></i>Alamat</h4>
                <p>JL. Komplek PGRI Blok K NO.10 Perumnas Belimbing Padang</p>
            </div>
            <div class="col-sm-12">
                <img src="<?= base_url('front/') ?>images/sampul dna.jpg" alt="">
            </div>
        </div>
    </div>
    <!-- #Cirlce Ends -->


    <!-- works -->
    <div id="works" class=" clearfix grid">
        <h2 class="text-center wowload fadeInUp">Jadwal Lapangan DNA Futsal</h2>
        <div>
            {jadwal}
        </div>

    </div>
    <!-- works -->


    <div id="partners" class="container spacer ">

        <h2 class="text-center  wowload fadeInUp">Penyewaan Lapangan</h2>
        <center>
            <div class="clearfix row">
                <P>Silahkan Login untuk menyewa lapangan. Jika belum punya akun silahkan Registrasi terlebih dahulu :)</P>
            </div>

            <div class="card">
                <div class="card-body">
                    <a href="<?= site_url('front/C_logreg/indexlog') ?>" class="btn btn-info btn-lg" style="font-size: 40px"><i class="fa fa-sign-in"></i>Login</a>
                    <a href="<?= site_url('front/C_logreg/indexreg') ?>" class="btn btn-success btn-lg" style="font-size: 40px"><i class="fa fa-pencil-square"></i>Registrasi</a>
                </div>
            </div>

        </center>
    </div>



    <div id="contact" class="spacer">
        <!--Contact Starts-->
        <div class="container contactform center">
            <h2 class="text-center  wowload fadeInUp">Hubungi Kami:</h2>
            <p class="wowload flipInX">
                <div class="col-sm-4">
                    <i class="fa fa-facebook fa-2x text-primary">: DNA Futsal</i>
                </div>
                <div class="col-sm-4">
                    <i class="fa fa-whatsapp fa-2x text-success">: +62 853-7653-6579</i>
                </div>
                <div class="col-sm-4">
                    <i class="fa fa-phone fa-2x text-warning">: 0823-8143-0082</i>
                </div>
            </p>

        </div>
    </div>
    <!--Contact Ends-->


    <!-- Footer Starts -->
    <div class="footer spacer">
        <center> Copyright <?= date('Y') ?> DNA Futsal. All rights reserved. </center>
        <div class="container">
            <div class="row">
                <div class="col align-self-end">
                    <a href="<?= site_url('admin/C_login') ?>" class="btn btn-warning">
                        <i class="fa fa-pencil-square"></i>Login Admin</a>
                </div>
            </div>
        </div>
    </div>
    <!-- # Footer Ends -->

    <a href="#home" class="gototop "><i class="fa fa-angle-up  fa-3x"></i></a>

    <!-- The Bootstrap Image Gallery lightbox, should be a child element of the document body -->
    <div id="blueimp-gallery" class="blueimp-gallery blueimp-gallery-controls">
        <!-- The container for the modal slides -->
        <div class="slides"></div>
        <!-- Controls for the borderless lightbox -->
        <h3 class="title">title</h3>
        <a class="prev">‹</a>
        <a class="next">›</a>
        <a class="close">×</a>
        <!-- The modal dialog, which will be used to wrap the lightbox content -->
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

    <!-- custom script -->
    <script src="<?= base_url('front/') ?>assets/script.js"></script>
    <script src="<?php echo base_url('assets/') ?>plugins/datatables/jquery.dataTables.js"></script>

    <script src="<?php echo base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>

    <script>
        $(function() {
            $("#example1").DataTable();
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": true,
                "ordering": false,
                "info": true,
                "autoWidth": false,
            });
        });
    </script>
</body>

</html>