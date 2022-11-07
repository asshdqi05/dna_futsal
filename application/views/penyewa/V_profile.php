<?php
$data = $this->db->get_where('penyewa', ['username_penyewa' =>
$this->session->userdata('username')])->row_array();
?>

<div class="col-md-12">
    <?php echo $this->session->flashdata('msg'); ?>
    <div class="card card-primary card-outline">
        <div class="card-body box-profile">
            <div class="text-center">
                <img class="img-circle" width="200" height="200" style="border:10px double gray;" src="<?php echo base_url('foto/profil/') . $data['foto']; ?>" alt="User profile picture">
            </div>

            <h3 class="profile-username text-center"><?= $data['nama_penyewa'] ?></h3>

            <p class="text-muted text-center"><?= $data['status'] ?></p>

            <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                    <b>Email</b> <a class="float-right"><?= $data['email_penyewa'] ?></a>
                </li>
                <li class="list-group-item">
                    <b>Telepon</b> <a class="float-right"><?= $data['nohp_penyewa'] ?></a>
                </li>
                <li class="list-group-item">
                    <b>Alamat</b> <a class="float-right"><?= $data['alamat_penyewa'] ?></a>
                </li>
                <li class="list-group-item">
                    <b>Bergabung Sejak</b> <a class="float-right"><?= date('d F Y', $data['tanggal_daftar']) ?></a>
                </li>
            </ul>

            <a href="<?= site_url('penyewa/C_penyewa/edit_profile') ?>" class="btn btn-primary btn-block"><b>Edit Profil</b></a>
        </div>
        <!-- /.card-body -->
    </div>
</div>