<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-header">
            </div>
            <div class="card-body">
                <?php echo $this->session->flashdata('msg'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>ID Penyewa</th>
                        <th>Nama Penyewa</th>
                        <th>Status Penyewa</th>
                        <th>Foto</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($datapenyewa->result_array() as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['id_penyewa'] ?></td>
                                <td><?php echo $d['nama_penyewa'] ?></td>
                                <td><?php echo $d['status'] ?></td>
                                <td><img src="<?php echo base_url() . 'foto/profil/' . $d['foto'] ?>" width="100" height="100"></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-block btn-info" href="<?= site_url('admin/C_penyewa/detail_penyewa/' . $d['id_penyewa']) ?>">
                                        <i class="fa fa-eye" style="color: whitesmoke">Detail</i>
                                    </a>
                                    <a class="btn btn-block btn-danger" href="javascript:void(0)" onclick="hapus( '<?php echo $d['id_penyewa'] ?>',
                                                                                '<?php echo $d['nama_penyewa'] ?>')">
                                        <i class="fa fa-trash" style="color: whitesmoke">Hapus</i>
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

<script>
    function hapus(kode, nama) {
        $('#hkode').val(kode);
        $('#hnama').html(nama);
        $('#hapus_data').modal('show');
    }
</script>


<div class="modal fade" id="hapus_data" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Hapus data</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true"></span>
                </button>
            </div>
            <form method="POST" action="<?php echo site_url('admin/C_penyewa/delete') ?>">
                <div class="modal-body">
                    <input type="hidden" name="kode" id="hkode">
                    Anda yakin hapus data <strong><span id="hnama"></span></strong> ?
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="icon-trash"></i> Hapus</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal"><i class="icon-cross2"></i>Close</button>
                </div>
            </form>
        </div>
    </div>
</div>