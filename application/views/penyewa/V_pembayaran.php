<?= $this->session->flashdata('msg') ?>
<div class="alert alert-info alert-dismissible col-sm-10">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <h5><i class="icon fa fa-info"></i> Info Pembayaran</h5>
    <h3> Silahkan Melakukan Pembayaran ke:
        <p>BNI : 083498xxx</p>
        <p>Atas Nama : Yusril</p>
        <p>Kemudian Upload Bukti Pembayaran pada Form dibawah.</p>
    </h3>
</div>

<div class="invoice col-sm-10 p-3 mb-3">
    <!-- title row -->
    <div class="row">
        <div class="col-12">
            <h1>
                <i class=""><img src="<?php echo base_url('assets/') ?>dist/img/dnalogo.png" width="50" height="50" alt=""></i> DNA Futsal
            </h1>
            <small class="float-right"><?= date('d/m/Y') ?></small>
        </div>
        <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row">
        <div class="col-sm-2">
            <div class="col-sm">
                <p>ID sewa </p>
                <p>Nama Penyewa </p>
                <p>Status Penyewa </p>
            </div>
        </div>
        <div class="col-sm-1">
            <div class="col-sm">
                <p>:</p>
                <p>:</p>
                <p>:</p>
            </div>
        </div>
        <div class="col-sm">
            <div class="col-sm">
                <strong>
                    <p><?= $id_sewa ?> </p>
                    <p><?= $nama_penyewa ?></p>
                    <p><?= $status_penyewa ?></p>
                </strong>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th width="50" align="center">NO</th>
                        <th>Tanggal Sewa</th>
                        <th>Jam Sewa</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $nomor = 1;
                    $total = 0;
                    foreach ($db->result_array() as $d) {
                        $subtotal = ($d['jumlah_bayar']);
                        $total = $total + $subtotal; ?>
                        <tr>
                            <td align="center"><?php echo $nomor ?></td>
                            <td><?php echo date($d['tanggal_sewa']); ?></td>
                            <td><?php echo $d['jam_awal'] ?> - <?php echo $d['jam_akhir'] ?> </td>
                            <td><?php echo $d['jumlah_bayar'] ?></td>
                        </tr>

                    <?php $nomor++;
                    }
                    ?>

                </tbody>
                <tfoot>
                    <tr>
                        <th colspan="3">TOTAL</th>
                        <th colspan="2"><?php echo "Rp " . number_format($total) ?>
                            <input type="hidden" id="totalbayar" name="totalbayar" value="<?php echo $total ?>" />
                        </th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
        <form class="horizontal" method="POST" enctype="multipart/form-data" action="<?= site_url('penyewa/C_penyewa/bayar') ?>">
            <label>Upload Bukti</label>
            <div class="row">
                <div class="col-sm-12">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="custom-file">
                                <input type="file" name="foto" class="custom-file-input" id="customFile">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <?= form_error('foto', '<small class="text-danger">', '</small>'); ?>
                </div>
                <input type="hidden" name="sewaid" value="<?= $id_sewa ?>">
                <input type="hidden" name="nama" value="<?= $nama_penyewa ?>">
                <input type="hidden" name="status" value="<?= $status_penyewa ?>">
                <input type="hidden" name="bayar" value="<?= $total ?>">

                <br>
                <br>
                <br>
                <div class="col-sm-12">
                    <button type="submit" class="btn btn-success btn-block"><i class="fa fa-credit-card"></i>
                        Konfirmasi Pembayaran
                    </button>
                </div>
            </div>

        </form>


    </div>