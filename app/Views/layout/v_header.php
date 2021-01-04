<body>
    <div id="wrapper">
        <div class="topbar">
            <div class="topbar-left">
                <a href="<?= site_url('home/index') ?>" class="logo">
                    <span class="logo-light">
                        <i class="mdi mdi-shopping"></i> Purchasing
                    </span>
                    <span class="logo-sm">
                        <i class="mdi mdi-refresh"></i>
                    </span>
                </a>
            </div>
            <nav class="navbar-custom">
                <ul class="navbar-right list-inline float-right mb-0">
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a class="nav-link waves-effect" href="#" id="btn-fullscreen">
                            <i class="mdi mdi-arrow-expand-all noti-icon"></i>
                        </a>
                    </li>

                    <!-- full screen -->
                    <li class="dropdown notification-list list-inline-item d-none d-md-inline-block">
                        <a>
                            <a><?= date('d-m-Y G:i:s'); ?></a>
                        </a>
                        <a class="ml-2"> Hello, <?= session()->get('nama_user') ?></a>
                    </li>
                    <li class="dropdown notification-list list-inline-item">
                        <div class="dropdown notification-list nav-pro-img">
                            <a class="dropdown-toggle nav-link arrow-none nav-user" data-toggle="dropdown" href="#" role="button" aria-haspopup="false" aria-expanded="false">
                                <img src="<?= base_url(); ?>/foto/user.png.png" class="user-image" alt="user image">
                            </a>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown ">
                                
                                <!-- <a class="dropdown-item" href="<?= base_url('profile/akun') ?>"><i class="mdi mdi-account-circle"></i>Profile</a>
                                <div class="dropdown-divider"></div> -->
                                <a class="dropdown-item text-danger" href="<?= site_url('auth/logout') ?>"><i class="mdi mdi-power text-danger btn-logout"></i> Logout</a>
                            </div>
                        </div>
                    </li>
                </ul>
                <ul class="list-inline menu-left mb-0">
                    <li class="float-left">
                        <button class="button-menu-mobile open-left waves-effect">
                            <i class="mdi mdi-menu"></i>

                        </button>
                    </li>


                </ul>
            </nav>
        </div>