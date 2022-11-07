<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();

$lap = $this->db->get('jam_lapangan');
$datatemp = $this->db->get('temp_sewa');

$dp = $this->db->get('lapangan')->row_array();

?>

<script src="<?php echo base_url('assets/') ?>plugins/jquery/jquery.min.js"></script>
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
        <div class="card col-sm-10">
            <div class="card-header">
                <h3 class="card-title">Pendaftaran Member</h3>
            </div>
            <div class="card-body">
                <?= $this->session->flashdata('msg');
                ?>
                <form method="POST" name="sw" action="<?php echo site_url('penyewa/C_penyewa/daftar_member2') ?>">
                    <div class="form-group">
                        <div class="col-sm-6">
                            <label>Nama Penyewa</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="nama" class="form-control" readonly value="<?= $data['nama_penyewa'] ?>">
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <label>Status Penyewa</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-user"></i></span>
                                </div>
                                <input type="text" name="status" class="form-control" readonly value="<?= $data['status'] ?>">
                            </div>
                        </div>

                    </div>
                    <div class="form-row">
                        <div class="form-group col-sm-3">
                            <label>Pilih Hari</label>
                            <select class="form-control" name="hari" required>
                                <option value="">-Pilih-</option>
                                <option value="Senin">Senin</option>
                                <option value="Selasa">Selasa</option>
                                <option value="Rabu">Rabu</option>
                                <option value="Kamis">Kamis</option>
                                <option value="Jumat">Jumat</option>
                                <option value="Sabtu">Sabtu</option>
                                <option value="Minggu">Minggu</option>
                            </select>
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

                    </div>
                    <div class="col-auto">
                        <hr>
                        <button type="submit" class="btn btn-primary btn-lg">Daftar Member</button>
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
                                <td><?php echo $r['jam'] ?></td>
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

<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('penyewa/C_penyewa/hapus_temp_member') ?>">
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