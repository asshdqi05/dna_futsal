<!DOCTYPE>
<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Pemakaian Lapangan</title>
</head>

<body onload="window.print();">
    <div align="center">
        <table style="border-collapse: collapse; width: 96%" border="1">
            <tr>
                <td align="center">
                    <table style="border-collapse: collapse; width: 90%;" border="0">
                        <tr>
                            <td>
                                <img src="<?php echo base_url('assets/') ?>dist/img/dnalogo.png" style="width: 130 ; height: 80;">
                            </td>
                            <td style="text-align: center;">
                                <span style="font-size: 27pt; font-weight: bold; color: black;">DNA FUTSAL PADANG</span><br>
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Pemakaian Lapangan</span><br>
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
                    <table style="border-collapse: collapse; width: 90%; font-weight: bold;" border="0">
                        <tr>
                            <th colspan="7" style="text-align:left;">Tanggal : <?php
                                                                                $tgl = date('d-m-Y');
                                                                                echo $tgl;
                                                                                ?>
                            </th>
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <br>
                    <table style="border-collapse: collapse; width: 90%;" border="1">
                        <tr>
                            <th>No</th>
                            <th>ID Sewa</th>
                            <th>Nama Penyewa</th>
                            <th>Status Penyewa</th>
                            <th>Jam Sewa</th>

                        </tr>
                        <tbody>
                            <?php
                            $no = 0;

                            foreach ($data->result_array() as $i) {
                                $no++;
                            ?>
                                <tr>
                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                    <td><?php echo $i['id_sewa'] ?></td>
                                    <td><?php echo $i['nama_penyewa'] ?></td>
                                    <td><?php echo $i['status_penyewa'] ?></td>
                                    <td><?php echo $i['jam_awal'] ?> - <?= $i['jam_akhir'] ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td>
                    <div align="center">
                        <table style="border-collapse: collapse; width: 90%;" border="0">
                            <tr>
                                <td width="70%"></td>
                                <td width="26%">Padang,
                                    <?php echo date('d-m-Y'); ?>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <br>
                                    <strong><?php echo $this->session->userdata('user'); ?></strong>
                                </td>
                            </tr>
                        </table>
                    </div>
                </td>
            </tr>
        </table>
    </div>
</body>

</html>