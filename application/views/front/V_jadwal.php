<div class="container">
    <div class="col-sm-12">
        <div class="card">
            <?php
            $a = $tgla->row_array();
            $b = $tglb->row_array();
            ?>
            <div class="card-header">
                <h4><b>Jadwal Tanggal :<?= date('d F Y', strtotime($a['ta'])) ?> S/D <?= date('d F Y', strtotime($b['tk'])) ?></b></h4>
            </div>
            <div class="card-body">
                <table id="example2" border="2" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>Hari</th>
                        <th>Jam</th>
                        <th>Nama Penyewa</th>
                        <th class="text-center">Keterangan</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($d->result_array() as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['hari_sewa'] ?></td>
                                <td><?php echo $d['jam_awal'] ?> - <?php echo $d['jam_akhir'] ?></td>
                                <td><?php echo $d['nama_penyewa'] ?></td>
                                <td><?php echo $d['ket'] ?></td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>