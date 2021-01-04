<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view('auth/head'); ?>
</head>

<body>
    <?= csrf_field(); ?>
    <!-- Begin page -->
    <div class="accountbg"></div>
    <div class="wrapper-page">
        <div class="card card-pages shadow-none align-center">

            <div class="card-body">
                <div class="text-center m-t-0 m-b-15">
                    <!-- <a href="<?= base_url() ?>" class="logo logo-admin"><img src="<?= base_url() ?>/assets/images/logo-dark.png" alt="" height="24"></a> -->
                </div>
                <h5 class="font-18 text-center">Login to Purchasing System</h5>
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

                <?php
                if (session()->getFlashdata('pesan')) {
                    echo '<div class="alert alert-danger alert-dismissible text-center">';
                    echo session()->getFlashdata('pesan');
                    echo ' </div>';
                }
                ?>

                <div class="swal" data-swal="<?= session()->get('logout'); ?>"></div>
                <div class="swalfail" data-swalfail="<?= session()->get('fail'); ?>"></div>

                <?php echo form_open('auth/login') ?>

                <div class="form-group">
                    <div class="col-12">
                        <label>Username</label>
                        <input class="form-control" type="text" name="username" placeholder="Username" required>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-12">
                        <label>Password</label>
                        <input class="form-control" type="password" name="password" id="hide" placeholder="Password" data-toggle="password" required>

                    </div>
                </div>


                <div class="form-group">
                    <div class="col-12">
                        <input type="checkbox" onclick="myFunction()">Show Password
                    </div>
                </div>

                <div class="form-group text-center m-t-20">
                    <div class="col-12">
                        <button class="btn btn-primary btn-block btn-lg waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>

                <!-- <div class="form-group row m-t-30 m-b-0">
                    <div class="col-sm-5 text-right">
                        <a href="<?= base_url('register') ?>" class="text-muted">Create an account</a>
                    </div>
                </div> -->
                <?php echo form_close() ?>
                <!-- </form> -->
            </div>

        </div>
    </div>
    <!-- END wrapper -->
    <?php echo view('auth/js'); ?>

</body>

<script>
    function myFunction() {
        var x = document.getElementById("hide");
        if (x.type === "password") {
            x.type = "text";
        } else {
            x.type = "password";
        }
    }
</script>

</script>

</html>