<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <?php
                $errors = session()->getFlashdata('errors');
                if (!empty($errors)) { ?>
                    <div class="alert alert-danger alert-dismissible">
                        <ul>
                            <?php foreach ($errors as $key => $value) { ?>
                                <li><?= esc($value) ?></li>
                            <?php } ?>
                        </ul>
                    </div>

                <?php } ?>

                <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>

                <div class="mt-2 header-title"><?= $title2 ?> </div>
                <br>
                <p> <a href="<?= base_url('user/add') ?>" class="btn btn-success waves-effect waves-light">
                        <i class="fa fa-plus"> </i> Add</a> </p>



                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Username</th>
                            <th>Email</th>

                            <th>Level</th>
                            <th>Department</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($user as $key => $value) { ?>
                            <tr>
                                <td class="text-center"><?= $no++ ?></td>
                                <td><?= $value['nama_user']; ?></td>
                                <td><?= $value['email']; ?></td>

                                <td class="text-center"><?php if ($value['level'] == 1) {
                                        echo 'Admin';
                                    } elseif ($value['level'] == 2) {
                                        echo 'User';
                                    } elseif ($value['level'] == 3) {
                                        echo 'Visitor';
                                    } elseif ($value['level'] == 7) {
                                        echo 'Super';
                                    }

                                    ?></td>
                                <td><?= $value['nama_dep']; ?></td>
                                <td class="text-center">
                                    <a href="<?= base_url('user/edit/' . $value['id_user']) ?>" class="btn btn-xs btn-warning">Edit</a>

                                    <a href="<?= base_url('user/delete/' . $value['id_user']) ?>" class="btn btn-xs btn-danger btn-delete">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>