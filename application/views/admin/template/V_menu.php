<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
  <?php $level = $this->session->userdata('level_akses') ?>
  <?php if ($level == '1') { ?>
    <!-- Add icons to the links using the . class with font-awesome or any other icon font library -->
    <li class="nav-item">
      <a href="<?php echo site_url('C_home_admin') ?>" class="nav-link <?php if (isset($mn_home)) echo $mn_home;
                                                                        else echo ""; ?>">
        <i class="fa fa-tachometer"></i>
        <p>Home</p>
      </a>
    </li>

    <li class="nav-item nav-header">
      <a class="nav-link active">
        <center>
          <b>MENU</b>
        </center>
      </a>
    </li>

    <li class="nav-item user-panel">
      <a href="<?php echo site_url('admin/C_lapangan') ?>" class="nav-link 
        <?php if (isset($mn_lapangan)) echo $mn_lapangan;
        else echo ""; ?>">
        <i class="fa fa-futbol-o"></i>
        <p>Data Lapangan</p>
      </a>
    </li>

    <li class="nav-item user-panel">
      <a href="<?php echo site_url('admin/C_penyewa') ?>" class="nav-link 
        <?php if (isset($mn_penyewa)) echo $mn_penyewa;
        else echo ""; ?>">
        <i class="fa fa-users"></i>
        <p>Data Penyewa</p>
      </a>
    </li>

    <li class=" nav-item user-panel">
      <a href="<?php echo site_url('admin/C_sewa_lapangan') ?>" class="nav-link
        <?php if (isset($mn_sewa_lapangan)) echo $mn_sewa_lapangan;
        else echo ""; ?>">
        <i class="fa fa-desktop"></i>
        <p>Data Penyewaan Lapangan</p>
      </a>
    </li>

    <li class="nav-item user-panel">
      <a href="<?php echo site_url('admin/C_user') ?>" class="nav-link 
        <?php if (isset($mn_user)) echo $mn_user;
        else echo ""; ?>">
        <i class="fa fa-user"></i>
        <p>Data User</p>
      </a>
    </li>

    <li class="nav-item user-panel">
      <a href="<?php echo site_url('admin/C_laporan') ?>" class="nav-link 
        <?php if (isset($mn_laporan)) echo $mn_laporan;
        else echo ""; ?>">
        <i class="fa fa-files-o"></i>
        <p>Laporan</p>
      </a>
    </li>



  <?php } else  if ($level == '2') { ?>


    <li class="nav-item">
      <a href="<?php echo site_url('C_home_admin') ?>" class="nav-link <?php if (isset($mn_home)) echo $mn_home;
                                                                        else echo ""; ?>">
        <i class="fa fa-tachometer"></i>
        <p>Home</p>
      </a>
    </li>

    <li class="nav-item nav-header">
      <a class="nav-link active">
        <center>
          <b>MENU</b>
        </center>
      </a>
    </li>

    <li class="nav-item user-panel">
      <a href="<?php echo site_url('admin/C_laporan') ?>" class="nav-link 
        <?php if (isset($mn_laporan)) echo $mn_laporan;
        else echo ""; ?>">
        <i class="fa fa-files-o"></i>
        <p>Laporan</p>
      </a>
    </li>

  <?php } else  if ($level == '3') { ?>

    <li class="nav-item">
      <a href="<?php echo site_url('C_home_admin') ?>" class="nav-link <?php if (isset($mn_home)) echo $mn_home;
                                                                        else echo ""; ?>">
        <i class="fa fa-tachometer"></i>
        <p>Home</p>
      </a>
    </li>

    <li class="nav-item nav-header">
      <a class="nav-link active">
        <center>
          <b>MENU</b>
        </center>
      </a>
    </li>

    <li class="nav-item user-panel">
      <a href="<?php echo site_url('admin/C_penyewa') ?>" class="nav-link 
      <?php if (isset($mn_penyewa)) echo $mn_penyewa;
      else echo ""; ?>">
        <i class="fa fa-users"></i>
        <p>Data Penyewa</p>
      </a>
    </li>

    <li class=" nav-item user-panel">
      <a href="<?php echo site_url('admin/C_sewa_lapangan') ?>" class="nav-link
      <?php if (isset($mn_sewa_lapangan)) echo $mn_sewa_lapangan;
      else echo ""; ?>">
        <i class="fa fa-desktop"></i>
        <p>Data Penyewaan Lapangan</p>
      </a>
    </li>

  <?php } ?>
</ul>