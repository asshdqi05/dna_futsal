<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();

$lap = $this->db->get('jam_lapangan');
$ip = $data['id_penyewa'];
$st = $data['status'];

$dp = $this->db->get('lapangan')->row_array();
$dt = $da->row_array();

?>


<div class="col-12 col-sm-8 col-md-8 align-items-stretch">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="card bg-light">
        <div class="card-header text-muted border-bottom-0">
            Data Member
        </div>
        <div class="card-body pt-0">
            <div class="row">
                <div class="col-sm">
                    <h2 class="lead"><b><?= $data['nama_penyewa'] ?></b></h2>
                    <p class="text-muted text-sm"><b><?= $data['status'] ?></b></p>
                    <div class="card-body">
                        <table id="example2" class="table table-bordered table-striped">
                            <thead>
                                <th class="text-center">No</th>
                                <th>Hari</th>
                                <th>Jam</th>
                                <th colspan="2">Aksi</th>
                            </thead>

                            <tbody>
                                <?php $no = 1;
                                foreach ($dat->result_array() as $d) { ?>
                                    <tr>
                                        <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                        <td><?php echo $d['hari_sewa'] ?></td>
                                        <td><?php echo $d['jam_awal'] ?> - <?php echo $d['jam_akhir'] ?> </td>
                                        <td>
                                            <a href="javascript:void(0)" onclick="hapus_jadwal('<?= $d['id_jadwal'] ?>')" class="btn btn-block bg-danger">
                                                <i class="fa fa-trash">Hapus Jadwal</i>
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
        <div class="card-footer">
            <div class="text-right">
                <a href="javascript:void(0)" onclick="hapus('<?= $dt['id_sewa'] ?>')" class="btn btn-sm btn-danger">
                    <i class="fa fa-trash"></i> Hapus Member
                </a>
            </div>
        </div>
    </div>
</div>

<script>
    function edit(id_jadwal, hari_sewa, jam_sewa) {
        $('#eid').val(id_jadwal);
        $('#ehari').val(hari_sewa);
        $('#ejam').val(jam_sewa);
        $('#edit_data').modal('show');
    }

    function hapus(kode, nama) {
        $('#hkode').val(kode);
        $('#hapus_data').modal('show');
    }

    function hapus_jadwal(kode) {
        $('#hkodej').val(kode);
        $('#hapus_data_jadwal').modal('show');
    }

    function ambil(jam_sewa, harga) {
        $('#ejam').val(jam_sewa);
        $('#harga').val(harga);
        $('#myModal').modal('hide');
    }
</script>

<div class="modal fade" id="edit_data">
    <div class="modal-dialog modal-md">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Ganti Jadwal Member</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
            </div>
            <form role="form" method="POST" action="<?php echo site_url('penyewa/C_penyewa/ganti_jadwal_member') ?>">
                <div class="form-group">
                    <div class="form">
                        <input type="hidden" name="id_jadwal" id="eid" class="form-control">
                        <div class="form-group col-md-6">
                            <label>Pilih Hari</label>
                            <select class="form-control" id="ehari" name="hari_sewa" required>
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
                            <label>Pilih Jam</label>
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-xs btn-flat btn-primary fa fa-plus">
                                        Pilih Jam
                                    </button>
                                </div>
                                <input type="text" id="ejam" name="jam_sewa" class="form-control" readonly required>
                            </div>
                        </div>

                        <div class="col-auto">
                            <label>Harga</label>
                            <div class="input-group">
                                <div class="input-group-prepend">
                                    <span class="input-group-text"><i class="fa fa-money"></i></span>
                                </div>
                                <input type="text" id="harga" name="harga" class="form-control" readonly required>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-pencil"></i> Ganti Jadwal</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</button>
                </div>
            </form>
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
            <form method="POST" action="<?php echo site_url('penyewa/C_penyewa/hapus_member') ?>">
                <div class="modal-body">
                    <input type="hidden" name="kode" id="hkode">
                    Anda yakin hapus Member? ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>

<div class="modal fade" id="hapus_data_jadwal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data Jadwal Member</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('penyewa/C_penyewa/hapus_jadwal_member') ?>">
                <div class="modal-body">
                    <input type="hidden" name="kode" id="hkodej">
                    Anda yakin hapus Jadwal?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>