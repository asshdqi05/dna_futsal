<!DOCTYPE html>
<html>

<?php
$user = $this->session->userdata('user');
$nama = $this->session->userdata('nama');
$level = $this->session->userdata('level');

?>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Admin | {judul}</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/datatables-bs4/css/dataTables.bootstrap4.css">
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-light navbar-dark">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#"><i class="fa fa-bars"></i></a>
        </li>
      </ul>

      <!-- SEARCH FORM -->

      <!-- Right navbar links -->
      <ul class="navbar-nav ml-auto navbar-warning">
        <!-- Messages Dropdown Menu -->
        <li class="nav-item dropdown">
          <button class="dropdown-toggle btn" data-toggle="dropdown" href="#">
            <img src="<?php echo base_url('assets/') ?>dist/img/avatar5.png" alt="User Avatar" class="img-circle" width="25" height="25">
            <span class="hidden-xs"><?php echo "Hello! $nama"; ?></span>
          </button>
          <div class="dropdown-menu dropdown-menu-sm dropdown-menu-right">
            <a href="#" class="dropdown-item">
              <!-- Message Start -->
              <div class="media">
                <center>
                  <img src="<?php echo base_url('assets/') ?>dist/img/avatar5.png" alt="User Avatar" class="img-circle" width="125">
                </center>
              </div>
              <!-- Message End -->
            </a>
            <!-- Message End -->
            </a>
            <div class="dropdown-divider"></div>
            <center>
              <p><b><?= $nama ?></b></p>
              <p><?= $level ?></p>
              <a href="<?php echo site_url('admin/C_login/logout') ?>" class="btn btn-warning btn-flat">Logout</a>
            </center>
          </div>
        </li>
        <!-- Notifications Dropdown Menu -->

      </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar elevation-4 sidebar-dark-warning">
      <!-- Brand Logo -->
      <a href="../../index3.html" class="brand-link navbar-warning">
        <img src="<?php echo base_url('assets/') ?>dist/img/dnalogo.png" alt="DNA Logo" class="brand-image">
        <span class="brand-text font-weight-dark">DNA Futsal</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="<?php echo base_url('assets/') ?>dist/img/avatar5.png" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block"><?= $nama ?></a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2 ">

          <?php $this->load->view('admin/template/V_menu') ?>
        </nav>
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>{judul}</h1>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">

          {konten}

        </div>
      </section>
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer fixed navbar-warning">
      <div class="float-right d-none d-sm-block">
        <b style="color: black">Version</b> 1.0.0
      </div>
      <strong style="color: black">Copyright &copy; <?= date('Y') ?> <b style="color: black">DNA Futsal</b>.</strong> <small style="color: black"> All rights
        reserved.</small>
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-warning">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="<?php echo base_url('assets/') ?>plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- bs-custom-file-input -->
  <script src="<?php echo base_url('assets/') ?>plugins/bs-custom-file-input/bs-custom-file-input.min.js"></script>
  <!-- AdminLTE App -->
  <script src="<?php echo base_url('assets/') ?>dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="<?php echo base_url('assets/') ?>dist/js/demo.js"></script>

  <script src="<?php echo base_url('assets/') ?>plugins/datatables/jquery.dataTables.js"></script>

  <script src="<?php echo base_url('assets/') ?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>

  <script src="<?php echo base_url('assets/') ?>plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      bsCustomFileInput.init();
    });
  </script>

  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });

    $('#datepicker').datepicker({
      autoclose: true,
      todayHighlight: true
    })
  </script>


</body>

</html>