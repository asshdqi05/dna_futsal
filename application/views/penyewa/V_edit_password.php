<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();
?>
<div class="col-md-6">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="card">
        <form class="form-horizontal" method="POST" action="<?php echo site_url('penyewa/C_penyewa/edit_password') ?>">
            <div class="modal-body">
                <div class="form-group">
                    <label>Password Lama</label>
                    <input type="password" name="pas1" class="form-control">
                    <?= form_error('pas1', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Password Baru</label>
                    <input type="password" name="pas2" class="form-control">
                    <?= form_error('pas2', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="form-group">
                    <label>Ulangi Password Baru</label>
                    <input type="password" name="pas3" class="form-control">
                    <?= form_error('pas3', '<small class="text-danger">', '</small>'); ?>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary"><i class="fa fa-save"></i> Simpan</button>
                    <a href="<?= site_url('penyewa/C_penyewa/profile') ?>" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> Batal</a>
                </div>
            </div>
        </form>
    </div>
</div>