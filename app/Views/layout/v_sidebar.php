<div class="left side-menu">
    <div class="slimscroll-menu" id="remove-scroll">
        <div id="sidebar-menu">
            <ul class="metismenu" id="side-menu">
                <?php if (session()->get('level') == 1) { ?>
                    <li class="menu-title">Menu Admin</li>
                <?php } ?>

                <?php if (session()->get('level') == 2) { ?>
                    <li class="menu-title">Menu User</li>
                <?php } ?>

                <?php if (session()->get('level') == 3) { ?>
                    <li class="menu-title">Menu Visitor</li>
                <?php } ?>

                <?php if (session()->get('level') == 7) { ?>
                    <li class="menu-title">Menu Supermin</li>
                <?php } ?>
               

               
                <li>
                    <a href="<?= site_url('home') ?>" class="waves-effect">
                        <i class="icon-accelerator"></i> <span> Dashboard</span>
                    </a>
                </li>

                <li>
                    <a href="<?= site_url('pembelian/all_data_unfinish') ?>" class="waves-effect">
                        <i class="icon-paper-pen"></i> <span> Data P. Pembelian </span>
                    </a>
                </li>

                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-printer"></i><span> Print Data PP<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                            <li><a href="<?= site_url('cetak') ?>"> All Data</a></li>
                            <li><a href="<?= site_url('cetak/unfinish') ?>"> Unfinish</a></li>
                            <li><a href="<?= site_url('cetak/urgent') ?>"> Urgent</a></li>
                            <li><a href="<?= site_url('cetak/finish') ?>"> Finish</a></li>
                            <li><a href="<?= site_url('cetak/pending') ?>"> Pending</a></li>
                            <li><a href="<?= site_url('cetak/today') ?>"> Input Today</a></li>
                            <li><a href="<?= site_url('cetak/gresik') ?>"> Lok. Gresik</a></li>
                            <li><a href="<?= site_url('cetak/gresik_unfinish') ?>"> Gresik Unfinish</a></li>
                            <li><a href="<?= site_url('cetak/luar') ?>"> Lok. Luar</a></li>
                            <li><a href="<?= site_url('cetak/luar_unfinish') ?>"> Luar Unfinish</a></li>
                            
                    </ul>
                </li>
                
                <li>
                    <a href="<?= site_url('log') ?>" class="waves-effect">
                        <i class="icon-todolist"></i> <span> Log</span>
                    </a>
                </li>
                
                <?php if (session()->get('level') == 1 ) { ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-delete"></i><span> Expired OnProgress<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                            <li><a href="<?= site_url('error') ?>"> Cek PP Expired</a></li>
                            
                            <li><a href="<?= site_url('error') ?>"> All PP Expired</a></li>
                    </ul>
                </li>
                <?php } ?>
                
                <?php if (session()->get('level') == 7 ) { ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-delete"></i><span> Data PP Expired<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                            <li><a href="<?= site_url('error') ?>"> Cek PP Expired</a></li>
                            
                            <li><a href="<?= site_url('error') ?>"> All PP Expired</a></li>
                    </ul>
                </li>
                <?php } ?>
                
                <?php if (session()->get('level') == 2 ) { ?>
                <li>
                    <a href="javascript:void(0);" class="waves-effect"><i class="icon-delete"></i><span> Data PP Expired<span class="float-right menu-arrow"><i class="mdi mdi-chevron-right"></i></span> </span></a>
                    <ul class="submenu">
                            
                            <li><a href="<?= site_url('error') ?>"> All PP Expired</a></li>
                    </ul>
                </li>
                <?php } ?>
                
                <?php if (session()->get('level') == 7) { ?>
                <li>
                    <a href="<?= site_url('user') ?>" class="waves-effect">
                        <i class="icon-profile"></i> <span> User Manage</span>
                    </a>
                </li>
                <?php } ?>

                <div class="dropdown-divider mt-3"></div>

                <li>
                    <a class="mt-2" href="<?= site_url('auth/logout') ?>"><i class="mdi mdi-power text-danger"></i><span> Logout</span></a></a>
                </li>
            </ul>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="content-page">
    <div class="content">
        <div class="container-fluid">
            <div class="page-title-box">
                <div class="row align-items-center">
                    <div class="col-sm-10">
                        <h4 class="page-title"><?= $title ?></h4>
                    </div>
                    <div class="col-sm-12">
                        <ol class="breadcrumb float-right">
                            <li class="breadcrumb-item"><a href="<?= site_url('home') ?>">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="javascript:void(0);">Pages</a></li>
                            <li class="breadcrumb-item active"><a href="<?= site_url($title) ?>"> <?= $title ?></a></li>
                        </ol>
                    </div>
                </div>
                </div>
        
  