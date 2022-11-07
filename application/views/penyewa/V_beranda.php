<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();
?>


<div class="col-sm-12">
    <div class="card">
        <div class="card-header" style="background-color: #ffc107">
            <h1>Hallo <?= $data['nama_penyewa'] ?></h1>
            <h3 class="card-title">Welcome to DNA Futsal!!</h3>
        </div>

        <!-- /.card-header -->
        <div class="card-body">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="1" class=""></li>
                    <li data-target="#carouselExampleIndicators" data-slide-to="2" class=""></li>
                </ol>
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="d-block w-100" src="<?php echo base_url('assets/') ?>dist/img/sampul dna.jpg" height="350">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url('assets/') ?>dist/img/lapangan1.jpg" height="350" alt="Second slide">
                    </div>
                    <div class="carousel-item">
                        <img class="d-block w-100" src="<?php echo base_url('assets/') ?>dist/img/lapangan2.jpg" height="350" alt="Third slide">
                    </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="sr-only">Previous</span>
                </a>
                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="sr-only">Next</span>
                </a>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
    <!-- /.card -->
</div>
<div class="container">
    <div class="row">
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="card text-white bg-success" style="max-width: 40rem;">
                        <div class="card-header">Tarif DNA Futsal</div>
                        <div class="card-body">
                            <p>
                                <h3 class="card-title">Siang : Pukul 08.00 - 18.00 => Rp.80.000</h3>
                            </p>
                            <p>
                                <h3 class="card-title">Malam : Pukul 18.00 - 00.00 => Rp.120.000</h3>
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="card">
                <div class="card-body">
                    <div class="card text-white bg-black" style="max-width: 40rem;">
                        <div class="card-header">Hubungi Kami</div>
                        <div class="card-body">
                            <h5 class="card-title">
                                <p><i class="fa fa-facebook text-primary">:</i> DNA Futsal</p>
                                <p><i class="fa fa-whatsapp text-success">:</i> +62 853-7653-6579</p>
                                <i class="fa fa-phone text-warning">:</i> 0823-8143-0082
                            </h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>