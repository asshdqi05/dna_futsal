<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Bukti Penyewaaan Lapangan DNA Futsal</title>
</head>

<body onload="window.print();">
    <div align="center">
        <table style="border-collapse: collapse; width: 70%" border="1">
            <tr>
                <td align="center">
                    <table style="border-collapse: collapse;background-color: darkgoldenrod; width: 90%;" border="0">
                        <tr>
                            <td>
                                <img src="<?php echo base_url('assets/') ?>dist/img/dnalogo.png" style="width: 120 ; height: 80;">
                            </td>
                            <td style="text-align: center;">
                                <span style="font-size: 27pt; font-weight: bold; color: black;">DNA FUTSAL</span><br>
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Bukti Penyewaaan Lapangan</span><br>
                                <span style="font-size: 12pt; font-weight: bold; font-style: italic;">
                                </span>
                                <hr>
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="0">
                        <tr>
                            <td style="width: 20%;">ID Sewa</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 31%;"><?= $id_sewa ?></td>


                            <td style="width: 20%;">Tanggal</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 31%;"><?= $tanggal_bayar ?></td>

                        </tr>

                        <tr>
                            <td style="width: 20%;">Nama Penyewa</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 31%;"><?= $nama_penyewa ?></td>
                        </tr>
                        <tr>
                            <td style="width: 20%;">Status Penyewa</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 31%;"><?= $status_penyewa ?></td>
                        </tr>

                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td align="">
                    <br>

                    <table>
                        <tr>
                            <span style="font-size: 15pt; font-style: underline; font-weight: bold;">Rincian :</span>
                            <td style="width: 20%;">No Transaksi</td>
                            <td style="width: 2%;">:</td>
                            <td style="width: 31%;"><?= $no_transaksi ?></td>
                            <br>
                            <br>
                            <table style="border-collapse: collapse; width: 100%;" border="1">
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
                                            <td><?php echo $d['jam_awal'] ?> - <?php echo $d['jam_akhir'] ?></td>
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
                            <br>
                            <br>
                            *Bukti Sewa jangan sampai hilang.
                            <br>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>