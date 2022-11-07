<div class="col-md-12">
    <?php $d = $ambildata->row_array(); ?>
    <div class="card card-primary card-outline">
        <div class="card-header">
            <a href="<?= site_url('penyewa/C_penyewa/sewa_lapangan') ?>" class="btn btn-warning btn-flat">
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
                                    <td><?php echo $d['jam_awal'] ?> - <?php echo $d['jam_akhir'] ?></td>
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


            <div class="row no-print">
                <a href="<?php echo site_url('penyewa/C_penyewa/cetak_bukti2/' . $d['id_sewa']) ?>" class="btn btn-primary <?php if ($d['status'] == 'Belum Bayar') { ?> disabled <?php   } ?>" target="_blank">
                    <i class="fa fa-print"></i>
                    Cetak Bukti Sewa Lapangan
                </a>
            </div>

        </div>
    </div>
</div>