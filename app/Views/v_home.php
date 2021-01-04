<p> Hallo Selamat Datang <b><?= session()->get('nama_user') ?></b></p>
<div class="row">
    <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>
         <div class="col-sm-4 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-alert-octagon bg-warning text-white"></i>
                    </div>
                    <div>
                        <a href="<?= base_url('pembelian') ?>" class="font-16">Urgent</a>
                    </div>
                    <h3 class="mt-4"><?= $tot_urgent?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-4 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-close-box-multiple bg-danger text-white"></i>
                    </div>
                    <div>
                        <a href="<?= base_url('pembelian') ?>" class="font-16">Unfinish</a>
                    </div>
                    <h3 class="mt-4"><?= $tot_unfinish ?></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-check-bold bg-success text-white"></i>
                    </div>
                    <div>
                        <a href="<?= base_url('pembelian') ?> " class="font-16">Finish</a>
                    </div>
                    <h3 class="mt-4"><?= $tot_finish ?></h3>
                </div>
            </div>
        </div>
        <div class="col-sm-4 col-xl-3">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-pause-circle bg-secondary text-white"></i>
                    </div>
                    <div>
                        <a href="<?= base_url('pembelian') ?> " class="font-16">Pending</a>
                    </div>
                    <h3 class="mt-4"><?= $tot_pending ?></h3>
                </div>
            </div>
        </div>
</div>

<div class="row">
        <div class="col-sm-6 col-xl-6">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-notebook-multiple bg-primary  text-white"></i>
                    </div>
                    <div>
                        <a href="<?= base_url('pembelian') ?>" class="font-16">All Data PP</a>
                    </div>
                    <h3 class="mt-4"><?= $tot_pp ?></h3>
                </div>
            </div>
        </div>

        <div class="col-sm-6 col-xl-6">
            <div class="card">
                <div class="card-heading p-4">
                    <div class="mini-stat-icon float-right">
                        <i class="mdi mdi-database-plus bg-primary text-white"></i>
                    </div>
                    <div>
                        <a href="<?= base_url('pembelian') ?> " class="font-16">New <?= $tgl ?></a>
                    </div>
                    <h3 class="mt-4"><?= $tot_today ?></h3>
                </div>
            </div>
        </div>
</div>

<div class="row align-items-center">
                                <div class="col-sm-6">
                                    <h4 class="page-title">Calendar</h4>
                                </div>
                            </div> <!-- end row -->
                        </div>
                        <!-- end page-title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card m-b-30">
                                    <div class="card-body">
        
                                        <div class="row">
                                            <div class="col-xl-2 col-lg-3 col-md-4">
        
                                                <h4 class="m-t-5 m-b-15 font-14">Agenda</h4>
                                                <form method="post" id="add_event_form" class="m-t-5 m-b-20">
                                                    <input type="text" class="form-control new-event-form" placeholder="Add new event..." />
                                                </form>
        
                                            </div>
        
                                            <div id='calendar' class="col-xl-10 col-lg-9 col-md-8"></div>
        
                                        </div>
                                        <!-- end row -->