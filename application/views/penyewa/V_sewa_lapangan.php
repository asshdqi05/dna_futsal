<link rel="stylesheet" href="<?php echo base_url('assets/') ?>plugins/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
<link href="<?php echo base_url('assets/') ?>dist/js/moment.js">
<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();

$lap = $this->db->get('jam_lapangan');
$datatemp = $this->db->get('temp_sewa');

$dp = $this->db->get('lapangan')->row_array();

?>

<script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
<script src="<?php echo base_url('assets/') ?>plugins/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script>
    function ambil(jam, harga) {
        $('#jam').val(jam);
        $('#harga').val(harga);
        $('#myModal').modal('hide');
    }

    function hapus(kode) {
        $('#hkode').val(kode);
        $('#hapus_data').modal('show');
    }
</script>


<script>
    function pilihhari() {
        if (document.getElementById('hr').value == "Senin") {
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                startDate: "dateToday",
                format: 'dd-mm-yyyy',
                minDate: new Date(),
                daysOfWeekDisabled: [0, 2, 3, 4, 5, 6],
            });
        } else if (document.getElementById('hr').value == "Selasa") {
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                startDate: "dateToday",
                format: 'dd-mm-yyyy',
                minDate: new Date(),
                daysOfWeekDisabled: [0, 1, 3, 4, 5, 6],
            });
        } else if (document.getElementById('hr').value == "Rabu") {
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                startDate: "dateToday",
                format: 'dd-mm-yyyy',
                minDate: new Date(),
                daysOfWeekDisabled: [0, 1, 2, 4, 5, 6],
            });
        } else if (document.getElementById('hr').value == "Kamis") {
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                startDate: "dateToday",
                format: 'dd-mm-yyyy',
                minDate: new Date(),
                daysOfWeekDisabled: [0, 1, 2, 3, 5, 6],
            });
        } else if (document.getElementById('hr').value == "Jumat") {
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                startDate: "dateToday",
                format: 'dd-mm-yyyy',
                minDate: new Date(),
                daysOfWeekDisabled: [0, 1, 2, 3, 4, 6],
            });
        } else if (document.getElementById('hr').value == "Sabtu") {
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                startDate: "dateToday",
                format: 'dd-mm-yyyy',
                minDate: new Date(),
                daysOfWeekDisabled: [0, 1, 2, 3, 4, 5],
            });
        } else if (document.getElementById('hr').value == "Minggu") {
            $('#datepicker').datepicker({
                autoclose: true,
                changeMonth: true,
                changeYear: true,
                startDate: "dateToday",
                format: 'dd-mm-yyyy',
                minDate: new Date(),
                daysOfWeekDisabled: [1, 2, 3, 4, 5, 6],
            });
        }
    }

    function cariharga() {
        var ja = document.sw.jamawal.value;
        var jw = document.sw.jamakhir.value;
        var th = parseInt(jw) - parseInt(ja);

        if (ja <= "17: 00: 00") {
            document.sw.harga.value = th * 80000;
        } else {
            document.sw.harga.value = th * 120000;
        }

    }
</script>


<div class="container">
    <div class="row">
        <div class="card text-white bg-info col-sm-12">
            <div class="card-header">
                <h3 class="card-title">Lapangan DNA Futsal</h3>
            </div>
            <div class="card-body">

                <div class="row no-gutters">
                    <div class="col-md-6">
                        <img src="<?php echo base_url('foto/') . $dp['foto_lapangan']; ?>" class="img-fluid" alt="Responsive image">
                    </div>
                    <div class="col-md-6">
                        <div class="card-body">
                            <h2><?= $dp['nama_lapangan']; ?></h2>
                            <p class="card-text">Deskripsi :</p>
                            <p class="card-text"><?= $dp['deskripsi_lapangan']; ?></p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="row">
        <div class="card col-sm">
            <div class="card-header">
                <h3 class="card-title">Sewa Lapangan</h3>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg'); ?>
                <form method="POST" name="sw" action="<?php echo site_url('penyewa/C_penyewa/proses_sewa2') ?>">
                    <div class="form-row">
                        <div class="col-sm-2">
                            <label>Status Penyewa</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="status" class="form-control" readonly value="<?= $data['status'] ?>">
                            </div>
                        </div>

                        <div class="form-group">
                            <label>Pilih Hari</label>
                            <select required class="chosen-select form-control" name="hari" id="hr" onchange="pilihhari()">
                                <option value="">-Pilih-</option>
                                <option id="sen" value="Senin">Senin</option>
                                <option id="sel" value="Selasa">Selasa</option>
                                <option id="rab" value="Rabu">Rabu</option>
                                <option id="kam" value="Kamis">Kamis</option>
                                <option id="jum" value="Jumat">Jumat</option>
                                <option id="sab" value="Sabtu">Sabtu</option>
                                <option id="min" value="Minggu">Minggu</option>
                            </select>
                        </div>

                        <div class="col-sm-2">
                            <label>Tanggal Sewa</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                </div>
                                <input type="text" name="tgl_sewa" id="datepicker" class="form-control" placeholder="YYYY/MM/DD" value="<?= set_value('tgl_sewa') ?>">
                            </div>
                            <?= form_error('tgl_sewa', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-auto">
                            <label>Jam Awal</label>
                            <select name="jamawal" required class="chosen-select form-control">
                                <option>-PILIH-</option>
                                <?php
                                $dt = $this->db->query("select * from jam_lapangan");
                                foreach ($dt->result_array() as $j) { ?>
                                    <option value="<?= $j['jam'] ?>"><?= $j['jam'] ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('jam', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-auto">
                            <label>Jam Akhir</label>
                            <select name="jamakhir" required class="chosen-select form-control" onchange="cariharga()">
                                <option>-PILIH-</option>
                                <?php
                                $dt = $this->db->query("select * from jam_lapangan");
                                foreach ($dt->result_array() as $j) { ?>
                                    <option value="<?= $j['jam'] ?>"><?= $j['jam'] ?></option>
                                <?php } ?>
                            </select>
                            <?= form_error('jam', '<small class="text-danger">', '</small>'); ?>
                        </div>

                        <div class="col-auto">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-money"></i></span>
                                </div>
                                <input type="text" id="harga" name="harga" class="form-control" readonly>
                            </div>
                            <?= form_error('harga', '<small class="text-danger">', '</small>'); ?>
                        </div>
                        <button type="submit" class="col-sm-4 btn btn-success btn-block fa fa-circle-o-notch">Proses</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>




<div class="modal fade bs-example-modal-md" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel">Pilih Jam</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <div class="box-body table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead>
                        <tr>
                            <th width="5">No</th>
                            <th>Jam</th>
                            <th>Harga</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($lap->result_array() as $r) {
                        ?>
                            <tr>
                                <td><?php echo $no ?></td>
                                <td><?php echo $r['detail'] ?></td>
                                <td><?php echo "Rp " . number_format($r['harga']) ?></td>
                                <td><button class="btn btn-primary btn-xs" type="button" onClick="return ambil('<?php echo $r['jam'] ?>','<?php echo $r['harga'] ?>')"><span class='fa fa-check'></span> Pilih</button>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php
$idpen = $data['id_penyewa'];
$datasewa = $this->db->query("SELECT * FROM sewa_lapangan JOIN detail_sewa ON sewa_lapangan.id_sewa = detail_sewa.id_sewa where penyewa_id='$idpen'");
?>

<div class="container">
    <div class="row">
        <div class="card col-sm">
            <div class="card-header">
                <h3 class="card-title">Log Sewa Lapangan</h3>
            </div>
            <div class="card-body">
                <?php echo $this->session->flashdata('msg'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Tanggal Sewa</th>
                        <th>ID Sewa</th>
                        <th>Nama Penyewa</th>
                        <th>Status Penyewa</th>
                        <th>Status Sewa</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($datasewa->result_array() as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['tanggal_sewa'] ?></td>
                                <td><?php echo $d['id_sewa'] ?></td>
                                <td><?php echo $d['penyewa_nama'] ?></td>
                                <td><?php echo $d['penyewa_status'] ?></td>
                                <td><?php echo $d['status'] ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-block btn-info <?php if ($d['status'] == 'Belum Bayar') { ?> disabled <?php   } ?>" href="<?= site_url('penyewa/C_penyewa/detail_sewa/' . $d['id_sewa']) ?>">
                                        <i class="fa fa-eye" style="color: whitesmoke">Detail</i>
                                    </a>
                                    <a class="btn btn-block btn-success <?php if ($d['status'] == 'Dikonfirmasi' or $d['status'] == 'Dikonfirmasi(Pendaftaran Member)') { ?> disabled <?php   } ?>" href="<?= site_url('penyewa/C_penyewa/pembayaran2/' . $d['id_sewa']) ?>">
                                        <i class="fa fa-money" style="color: whitesmoke">Pembayaran</i>
                                    </a>
                                    <a class="btn btn-block btn-danger <?php if ($d['status'] == 'Dikonfirmasi' or $d['status'] == 'Dikonfirmasi(Pendaftaran Member)') { ?> disabled <?php   } ?>" href="<?= site_url('penyewa/C_penyewa/batal_sewa/' . $d['id_sewa']) ?>">
                                        <i class="fa fa-close" style="color: whitesmoke">Batal Sewa</i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('penyewa/C_penyewa/hapus_temp') ?>">
                <div class="modal-body">
                    <input type="hidden" name="kode" id="hkode">
                    Anda yakin hapus Item ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>