<div class="container">
    <div class="row">
        <div class="card col-sm-12">
            <div class="card-header">
                <h3 class="card-title">Laporan DNA Futsal</h3>
            </div>
            <div class="card-body">
                <div class="row no-gutters">
                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('admin/C_laporan/cetak_member') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Data Member</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('admin/C_laporan/cetak_penyewaan_perhari') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Penyewaan Perhari</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <span class="input-group-text"><i class="fa fa-calendar"></i></span>
                                                    </div>
                                                    <input type="text" name="tanggal" id="datepicker" class="form-control" placeholder="Pilih Tanggal" value="<?= set_value('tgl_sewa') ?>">
                                                </div>
                                                <br>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('admin/C_laporan/cetak_penyewaan_perbulan') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Penyewaan Perbulan</div>
                                            </div>
                                            <div class="card-body">
                                                <div>
                                                    <select class="chosen-select form-control" name="bulan">
                                                        <option disabled selected>Pilih Bulan</option>
                                                        <?php
                                                        $nama_bln = array(1 => "Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
                                                        for ($bln = 1; $bln <= 12; $bln++) {
                                                            echo "<option value=$bln>$nama_bln[$bln]</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class=""></div>
                                                <br>
                                                <div>
                                                    <select class="chosen-select form-control" name="tahun">
                                                        <option disabled selected>Pilih Tahun</option>
                                                        <?php
                                                        $now = date('Y');
                                                        for ($a = 2016; $a <= $now; $a++) {
                                                            echo "<option value='$a'>$a</option>";
                                                        } ?>
                                                    </select>
                                                </div>
                                                <br>
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                    <div class="col-md-3">
                        <form method="POST" action="<?php echo site_url('admin/C_laporan/cetak_pemakaian_lapangan') ?>" target="_blank">
                            <table>
                                <tr>
                                    <div class="col-md">
                                        <div class="card card-solid">
                                            <div class="card-header" style="background-color: #ffc107">
                                                <div class="card-title">Laporan Pemakaian Lapangan</div>
                                            </div>
                                            <div class="card-body">
                                                <div class="col-xs">
                                                    <button type="submit" class="btn btn-block btn-primary"><i class="fa fa-print"></i> Cetak</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </tr>
                            </table>
                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>