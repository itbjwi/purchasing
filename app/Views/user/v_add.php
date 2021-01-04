<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="mt-2 header-title"><?= $title2 ?> </div>
                <br>


                <div class="box-body">
                    <?= form_open_multipart('user/insert'); ?>
                    <?= csrf_field(); ?>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Nama User</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="nama_user" placeholder="Input User">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input class="form-control" name="email" placeholder="Input Email">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="password" placeholder="Input Password">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Level</label>

                        <div class="col-sm-10">
                            <select name="level" class="form-control">
                                <option value="">= Pilih Level = </option>
                                <option value="1">Admin</option>
                                <option value="2">User</option>
                                <option value="3">Visitor</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Departement</label>

                        <div class="col-sm-10">
                            <select name="id_dep" class="form-control">
                                <option value="">= Pilih Departement =</option>
                                <?php foreach ($dep as $key => $value) { ?>
                                    <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-sm-10">
                            <button type="submit" class="btn btn-xs btn-primary">Save</button>
                            <a href="<?= base_url('user') ?>" class="btn btn-xs btn-danger">Back</a>

                        </div>
                    </div>
                </div>




                <?php echo form_close() ?>
            </div>
        </div>

    </div>
</div>