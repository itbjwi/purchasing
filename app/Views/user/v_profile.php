<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
                <div class="mt-2 header-title"><?= $title2 ?> </div>
                <br>
                <div class="box-body">
                    <?php echo form_open_multipart('profile/update/' . $user['id_user']); ?>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-5">
                            <input class="form-control" value="<?= $user['nama_user'] ?>" name="nama_user" placeholder="Input User">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-5">
                            <input class="form-control" value="<?= $user['email'] ?>" name="email" placeholder="Input Email" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-5">
                            <input required class="form-control" name="password" placeholder="Input New Password" optional>
                        </div>
                    </div>
                    <?php if (session()->get('level') == 1) { ?>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-sm-2 col-form-label">Level</label>

                            <div class="col-sm-10">
                                <select name="level" class="form-control">
                                    <option value="<?= $user['level'] ?>"><?php if ($user['level'] == 1) {
                                                                                echo 'Admin';
                                                                            } else {
                                                                                echo 'User';
                                                                            } ?>
                                    </option>
                                    <option value="1">Admin</option>
                                    <option value="2">User</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-sm-2 col-form-label">Departement</label>

                            <div class="col-sm-10">
                                <select name="id_dep" class="form-control">
                                    <option value="<?= $user['id_dep'] ?>"><?= $user['nama_dep'] ?></option>
                                    <?php foreach ($dep as $key => $value) { ?>
                                        <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?>
                                        <?php } ?>
                                </select>
                            </div>
                        </div>
                    <?php } ?>




                    <?php if (session()->get('level') == 2) { ?>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-sm-2 col-form-label">Level</label>

                            <div class="col-sm-5">
                                <select name="level" readonly class="form-control">
                                    <option value="<?= $user['level'] ?>"><?php if ($user['level'] == 1) {
                                                                                echo 'Admin';
                                                                            } else {
                                                                                echo 'User';
                                                                            } ?> *Hanya Admin yang dapat mengubah ini*
                                    </option>

                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="example-email-input" class="col-sm-2 col-form-label">Departement</label>

                            <div class="col-sm-5">
                                <select name="id_dep" readonly class="form-control">
                                    <option value="<?= $user['id_dep'] ?>"><?= $user['nama_dep'] ?> *Hanya Admin yang dapat mengubah ini*</option>
                                </select>
                            </div>
                        </div>

                    <?php } ?>

                    <label>User Foto</label>
                    <div class="row">
                        <div class="col-sm-5">

                            <img src="<?= base_url('foto/' . $user['foto']) ?>" width="80px">
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group row">
                                <label for="example-email-input" class="col-sm-2 col-form-label">Change Foto</label>
                                <div class="col-sm-5">
                                    <input type="file" class="form-control" name="foto">
                                    <label class="text-danger">* MAX : 1 Mb</label>

                                </div>

                            </div>

                            <br>
                            <br>
                            <div class="form-group row">
                                <div class="col-sm-3">
                                    <button type="submit" class="btn btn-xs btn-primary">Update</button>

                                    <a href="<?= base_url('arsip') ?>" class="btn btn-xs btn-danger">Back</a>

                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>

                </div>
            </div>