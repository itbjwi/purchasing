<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="mt-2 header-title"><?= $title2 ?> </div>
                <br>
                <div class="box-body">
                    <?php echo form_open_multipart('user/update/' . $user['id_user']); ?>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="<?= $user['nama_user'] ?>" name="nama_user" placeholder="Input User">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="<?= $user['email'] ?>" name="email" placeholder="Input Email" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" required name="password" placeholder="Input New Password">
                        </div>
                    </div>
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
                    <div class="row">
                        <div class="col-sm-8">
                            <div class="form-group row">
                                <div class="col-sm-10">
                                    <button type="submit" class="btn btn-xs btn-primary">Update</button>

                                    <a href="<?= base_url('user') ?>" class="btn btn-xs btn-danger">Back</a>

                                </div>
                            </div>
                            <?php echo form_close() ?>
                        </div>
                    </div>

                </div>
            </div>