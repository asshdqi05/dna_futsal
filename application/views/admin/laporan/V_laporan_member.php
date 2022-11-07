<html>

<head>
    <meta charset="UTF-8">
    <title>Laporan Data Member DNA Futsal</title>
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
                                <span style="font-size: 18pt; font-weight: bold; color: black;">Laporan Data Member</span><br>
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

                        </tr>
                    </table>
                    <br>
                </td>
            </tr>
            <tr>
                <td align="center">
                    <br>
                    <table border="1" align="center" style="width:990px;margin-bottom:10px;font-size: 14px">
                        <thead>

                            <tr style="background-color: #d0cbcb; vertical-align: middle;height: 30px">
                                <th style="width: 30px;">No</th>
                                <th style="width: 130px">Nama</th>
                                <th style="width: 130px">Alamat</th>
                                <th style="width: 120px">No HP</th>
                                <th style="width: 120px">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $no = 0;

                            foreach ($data->result_array() as $i) {
                                $no++;
                            ?>

                                <tr>
                                    <td style="text-align: center;"><?php echo $no; ?></td>
                                    <td><?php echo $i['nama_penyewa'] ?></td>
                                    <td><?php echo $i['alamat_penyewa'] ?></td>
                                    <td><?php echo $i['nohp_penyewa'] ?></td>
                                    <td><?php echo $i['email_penyewa'] ?></td>

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <table align="center" style="width:990px; border:none;margin-top:5px;margin-bottom:20px;font-size: 14px">
                        <tr>
                            <td align="right">Padang, <?php echo date('d-M-Y') ?></td>
                        </tr>
                        <tr>
                            <td align="right"></td>
                        </tr>
                        <tr>
                            <td><br /><br /><br /><br /></td>
                        </tr>
                        <tr>
                            <td align="right">(<?php echo $this->session->userdata('user'); ?>)</td>
                        </tr>
                        <tr>
                            <td align="center"></td>
                        </tr>
                    </table>
                    <br>
                </td>
            </tr>
        </table>
        <table align="center" style="width:800px; border:none;margin-top:5px;margin-bottom:20px;">
            <tr>
                <th><br /><br /></th>
            </tr>
            <tr>
                <th align="left"></th>
            </tr>
        </table>
    </div>
</body>

</html>