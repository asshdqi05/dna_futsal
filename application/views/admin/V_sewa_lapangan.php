<div class="row">
    <div class="col-sm-12">
        <div class="card">
            <div class="card-body">
                <?php echo $this->session->flashdata('msg'); ?>
                <table id="example1" class="table table-bordered table-striped">
                    <thead>
                        <th class="text-center">No</th>
                        <th>ID Sewa</th>
                        <th>Nama Penyewa</th>
                        <th>Status Penyewa</th>
                        <th>Status Sewa</th>
                        <th class="text-center">Aksi</th>
                    </thead>

                    <tbody>
                        <?php $no = 1;
                        foreach ($datasewa->result_array() as $d) { ?>
                            <tr>
                                <td width="50px" class="text-center"><?php echo $no . '.'; ?></td>
                                <td><?php echo $d['id_sewa'] ?></td>
                                <td><?php echo $d['penyewa_nama'] ?></td>
                                <td><?php echo $d['penyewa_status'] ?></td>
                                <td><?php echo $d['status'] ?></td>
                                <td class="text-center" width="100px">
                                    <a class="btn btn-block btn-info" href="<?= site_url('admin/C_sewa_lapangan/detail_sewa/' . $d['id_sewa']) ?>">
                                        <i class="fa fa-eye" style="color: whitesmoke">Detail</i>
                                    </a>
                                </td>
                            </tr>
                        <?php $no++;
                        } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div>
</div>