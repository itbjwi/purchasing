<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view('auth/head'); ?>
</head>

<body>
    <div class="accountbg"></div>
    <div class="home-btn d-none d-sm-block">
    </div>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none">

            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <a href="index.html" class="logo logo-admin"><img src="assets/images/logo-dark.png" alt="" height="24"></a>
                </div>
                <h5 class="font-18 text-center">Register</h5>

                <?php echo form_open('public/register/save/') ?>
                    <?php if (isset($validation)) : ?>
                        <div class="alert alert-danger"><?= $validation->listErrors() ?></div>
                    <?php endif; ?>
                    <div class="form-group">
                        <div class="col-12">
                            <label>Email</label>
                            <input for="InputForName" class="form-control" name="email" type="email" required="" placeholder="Email">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>Username</label>
                            <input for="InputForUsername" class="form-control" name="nama_user" type="text" required="" placeholder="Username">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>Password</label>
                            <input for="InputForPassword" class="form-control" name="password" type="password" required="" placeholder="Password">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-12">
                            <label>confirmation Password</label>
                            <input for="InputForConfpassword" class="form-control" name="confpassword" type="password" required="" placeholder="confirmation password">
                        </div>
                    </div>

                    <div class="form-group">
                    <div class="col-12">
                        <label for="InputForLevel" >Level</label>
                            <select required=""  name="level" class="form-control">
                                <option value="">= Pilih Level= </option>
                                <option value="2">User</option>
                            </select>
                        </div>
                    </div>
                    

                    <div class="form-group">
                    <div class="col-12">
                        <label>Departement</label>
                            <select name="id_dep" required="" class="form-control">
                                <option value="">= Pilih Departement =</option>
                                <?php foreach ($dep as $key => $value) { ?>
                                    <option value="<?= $value['id_dep'] ?>"><?= $value['nama_dep'] ?>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                </div>



                    <div class="form-group text-center m-t-20">
                        <div class="col-12">
                            <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Register</button>
                        </div>
                  
                </form>

                <div class="form-group mb-0 row">
                    <div class="col-12 m-t-10 text-center">
                        <a href="<?= base_url('auth')?>" class="text-muted">Already have account?</a>
                    </div>
                </div>
                <?php echo form_close() ?>
            </div>

        </div>
    </div>

    <?php echo view('auth/js'); ?>

</body>

</html>