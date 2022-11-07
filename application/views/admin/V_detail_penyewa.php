<div class="col-md-12">
    <?php $d = $ambildata->row_array(); ?>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="<?= site_url('admin/C_sewa_lapangan') ?>" class="btn btn-warning btn-flat">
                <span class="fa fa-arrow-circle-left"></span>
                Kembali
            </a>
        </div>

        <div class="invoice col-sm-12 p-3 mb-3">
            <!-- title row -->
            <div class="row">
                <div class="col-12">
                    <h1>
                        <i class=""><img src="<?php echo base_url('assets/') ?>dist/img/dnalogo.png" width="50" height="50" alt=""></i> DNA Futsal
                    </h1>
                    <small class="float-right"><?php echo $d['tanggal_bayar'] ?></small>
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
                        <p>Status Sewa </p>
                    </div>
                </div>
                <div class="col-sm-1">
                    <div class="col-sm">
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                        <p>:</p>
                    </div>
                </div>
                <div class="col-sm">
                    <div class="col-sm">
                        <strong>
                            <p><?php echo $d['id_sewa'] ?></p>
                            <p><?php echo $d['nama_penyewa'] ?></p>
                            <p><?php echo $d['status_penyewa'] ?></p>
                            <p><?php echo $d['status'] ?></p>
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
                                <th>Hari</th>
                                <th>Jam Sewa</th>
                                <th>Harga</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $nomor = 1;
                            $total = 0;
                            foreach ($ambildetail->result_array() as $dt) {
                                $subtotal = ($d['jumlah_bayar']);
                                $total = $total + $subtotal; ?>
                                <tr>
                                    <td align="center"><?php echo $nomor ?></td>
                                    <td><?php echo date($dt['tanggal_sewa']); ?></td>
                                    <td><?php echo $dt['hari_sewa'] ?></td>
                                    <td><?php echo $dt['jam_awal'] ?> - <?php echo $dt['jam_akhir'] ?></td>
                                    <td><?php echo $dt['jumlah_bayar'] ?></td>
                                </tr>

                            <?php $nomor++;
                            }
                            ?>

                        </tbody>
                        <tfoot>
                            <tr>
                                <th colspan="4">TOTAL</th>
                                <th colspan="1"><?php echo "Rp " . number_format($total) ?>
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
                <label>Bukti Pembayaran</label>
                <div class="col-sm-12">
                    <div class="col-sm-6">
                        <img src="<?php echo base_url('foto/bukti_pembayaran/') . $d['bukti_pembayaran']; ?>" class="img-thumbnail">
                    </div>
                </div>
            </div>

            <form class="horizontal" method="POST" action="<?= site_url('admin/C_sewa_lapangan/konfirmasi') ?>">
                <div class="row">
                    <input type="hidden" name="sewaid" value="<?php echo $d['id_sewa'] ?>">
                    <input type="hidden" name="penyewaid" value="<?php echo $d['id_penyewa'] ?>">
                    <input type="hidden" name="nama" value="<?php echo $d['nama_penyewa'] ?>">
                    <input type="hidden" name="status" value="<?php echo $d['status_penyewa'] ?>">
                    <input type="hidden" name="tgl" value="<?php echo $d['tanggal_sewa'] ?>">
                    <input type="hidden" name="hari" value="<?php echo $d['hari_sewa'] ?>">
                    <input type="hidden" name="jamawal" value="<?php echo $d['jam_awal'] ?>">
                    <input type="hidden" name="jamakhir" value="<?php echo $d['jam_akhir'] ?>">
                    <input type="hidden" name="biaya" value="<?php echo $d['jumlah_bayar'] ?>">
                    <input type="hidden" name="sts" value="<?php echo $d['status'] ?>">

                </div>
                <div class="row no-print">
                    <div class="col-sm">
                        <button type="submit" class="btn btn-info float-right" <?php if ($d['status'] == 'Dikonfirmasi' || $d['status'] == 'Dikonfirmasi(Pendaftaran Member)') { ?> disabled <?php   } ?>><i class="fa fa-check-square-o"></i>Konfirmasi Penyewaan
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>