<!DOCTYPE html>
<html lang="en">

<head>
    <?php echo view('auth/head'); ?>

</head>
<title><?= $title ?></title>

<body>

    <!-- Begin page -->
    <div class="error-bg"></div>
    <div class="home-btn d-none d-sm-block">
    </div>
    <div class="account-pages">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-5 col-md-8">
                    <div class="card shadow-none">
                        <div class="card-block">
                            <div class="text-center p-3">

                                <h1 class="error-page mt-4"><span>500!</span></h1>
                                <h4 class="mb-4 mt-5">Sorry, page not found</h4>
                                <p class="mb-4">It will be as simple as Occidental in fact, it will Occidental <br> to an English person</p>
                                <a class="btn btn-primary mb-4 waves-effect waves-light" href="<?= base_url('auth') ?>"><i class="mdi mdi-home"></i> Back to Dashboard</a>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
    <!-- END wrapper -->

    <!-- jQuery  -->
    <?php echo view('auth/js'); ?>

</body>




</html>