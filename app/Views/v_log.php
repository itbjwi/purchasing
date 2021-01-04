<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="mt-2 header-title"><?= $title ?> </div>
                <br>
                <p>
<!-- 
                    <a class="btn btn-primary waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/index'); ?>">
                        <i class="fas fa-book"> </i> All</a>  
                    <a class="btn btn-danger waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_unfinish'); ?>">
                        <i class="fas fa-ban"> </i> Unfinish</a>
                    <a class="btn btn-warning waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_urgent'); ?>">
                        <i class="fas fa-exclamation"> </i> Urgent</a>
                    <a class="btn btn-success waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_finish'); ?>">
                        <i class="fas fa-check"> </i> Finish</a>
                    <a class="btn btn-secondary waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_pending'); ?>">
                        <i class="fas fa-pause"> </i> Pending</a>
                    <a class="btn btn-info waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_today'); ?>">
                        <i class="fas fa-pencil-alt"> </i> Input Today</a>          -->

                </p>


                <table id="datatable" class="table-responsive table table-hover b-0 fixed-solution" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead class="text-center">
                        <tr class="text-center">
                            <th>No.</th>
                            <th>Tgl dan Waktu</th>
                            <th>User</th>
                            <th>Tindakan</th>
                            <th>Kode</th>
                            <th>#</th>
                            <th>Nama Data PP</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($log as $key => $value) { ?>
                            <tr class="text-center">
                                <td width="5%"><?= $no++; ?></td>
                                <td width="25%"><?= $value['tgl_log']; ?></td>
                                <td width="15%"><?= $value['log_user']; ?></td>
                                <td width="20%">
                                    <?php if($value['log_action'] == 'Tambah') {
                                        echo "<span class='btn btn-primary disabled'>Tambah Data PP</span>";
                                    } elseif($value['log_action'] == 'Finish') {
                                        echo "<span class='btn btn-success disabled'>Finish PP</span>";
                                    } elseif($value['log_action'] == 'Edit') {
                                        echo "<span class='btn btn-warning disabled'>Data PP Diedit</span>"; 
                                    } elseif($value['log_action'] == 'Pending') {
                                        echo "<span class='btn btn-secondary disabled'>Pending PP</span>";
                                    } ;?>
                                </td>
                                <td width="15%"><?= $value['log_kode']; ?></td>
                                <td width="5%"><?= $value['log_kd']; ?></td>
                                <td width="20%"><?= $value['log_nama']; ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>