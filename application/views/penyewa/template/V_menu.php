<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();

$status = $data['status'];
?>

<nav class="main-header navbar navbar-expand-lg navbar-dark">
    <div class="container">
        <a href="index3.html" class="navbar-brand">
            <img src="<?= base_url('front/') ?>images/logo1.png" alt="DNA Logo" class="brand-image elevation-3" style="opacity: .8">
        </a>

        <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse order-3" id="navbarCollapse">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a href="<?= site_url('penyewa/C_penyewa') ?>" class="nav-link <?php if (isset($mn_home)) echo $mn_home;
                                                                                    else echo ""; ?>">
                        <i class="fa fa-home"></i>Home</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('penyewa/C_penyewa/sewa_lapangan') ?>" class="nav-link <?php if (isset($mn_sewa)) echo $mn_sewa;
                                                                                                    else echo ""; ?>">
                        <i class="fa fa-futbol-o"></i>Sewa Lapangan</a>
                </li>
                <li class="nav-item">
                    <a href="<?= site_url('penyewa/C_penyewa/profile') ?>" class="nav-link <?php if (isset($mn_profil)) echo $mn_profil;
                                                                                            else echo ""; ?>">
                        <i class="fa fa-user"></i>Profile</a>
                </li>
                <li class="nav-item">

                    <?php if ($status == 'Nonmember') { ?>
                        <a href="<?= site_url('penyewa/C_penyewa/daf_member') ?>" class="nav-link <?php if (isset($mn_member)) echo $mn_member;
                                                                                                    else echo ""; ?>">
                            <i class="fa fa-book"></i>Daftar Member</a>
                    <?php } else if ($status == 'Member') { ?>
                        <a href="<?= site_url('penyewa/C_penyewa/member') ?>" class="nav-link <?php if (isset($mn_member)) echo $mn_member;
                                                                                                else echo ""; ?>">
                            <i class="fa fa-book"></i>Member</a>
                    <?php } ?>
                </li>
            </ul>
        </div>
        <!-- Right navbar links -->
        <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto navbar-light">
            <!-- Messages Dropdown Menu -->
            <li class="nav-item dropdown">
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

            <li class="nav-item dropdown">
                <button class="dropdown-toggle btn" data-toggle="dropdown" href="#">
                    <img src="<?php echo base_url('foto/profil/') . $data['foto']; ?>" alt="User Avatar" class="img-circle" width="25" height="25">
                    <span class="hidden-xs"><?= $data['nama_penyewa']; ?></span>
                </button>
                <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
                    <center>
                        <p><b><?= $data['nama_penyewa']; ?></b></p>
                        <p><?= $data['status']; ?></p>
                    </center>

                    <div class="dropdown-divider"></div>
                    <div class="col-sm-12">
                        <a href="<?php echo site_url('penyewa/C_penyewa/edit_password') ?>" class="btn btn-info btn-block btn-flat">
                            <i class="fa fa-gears"></i>Ganti Password</a>
                        <a href="<?php echo site_url('front/C_logreg/logout') ?>" class="btn btn-warning btn-block btn-flat">
                            <i class="fa fa-sign-out"></i>Logout</a>
                    </div>
                </div>
            </li>

    </div>
    </li>
    <!-- Notifications Dropdown Menu -->

    </ul>
</nav>