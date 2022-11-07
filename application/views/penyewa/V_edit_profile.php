<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();
?>

<div class="card">
    <form class="form-horizontal" method="POST" enctype="multipart/form-data" action="<?php echo site_url('penyewa/C_penyewa/edit') ?>">
        <div class="modal-body">
            <div class="form-group">
                <label>Username</label>
                <input readonly type="text" name="username" class="form-control" value="<?= $data['username_penyewa'] ?>">
            </div>
            <div class="form-group">
                <label>Nama</label>
                <input type="text" name="nama" class="form-control" value="<?= $data['nama_penyewa'] ?>">
                <?= form_error('nama', '<small class="text-danger">', '</small>'); ?>
            </div>

            <div class="form-group">
                <label>Email</label>
                <input type="text" name="email" class="form-control" value="<?= $data['email_penyewa'] ?>">
                <?= form_error('email', '<small class="text-danger">', '</small>'); ?>
            </div>


            <div class="form-group">
                <label>Telepon</label>
                <input type="text" name="telepon" class="form-control" value="<?= $data['nohp_penyewa'] ?>">
                <?= form_error('telepon', '<small class="text-danger">', '</small>'); ?>
            </div>


            <div class="form-group">
                <label>Alamat</label>
                <textarea rows="5" name="alamat" class="form-control"><?= $data['alamat_penyewa'] ?></textarea>
                <?= form_error('alamat', '<small class="text-danger">', '</small>'); ?>
            </div>


            <label>Foto</label>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-3">
                            <img src="<?php echo base_url('foto/profil/') . $data['foto']; ?>" class="img-thumbnail">
                        </div>
                        <div class="col-sm-9">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Edit</button>
                <a href="<?= site_url('penyewa/C_penyewa/profile') ?>" class="btn btn-danger"><i class="fa fa-close"></i> Batal</a>
            </div>
    </form>
</div>