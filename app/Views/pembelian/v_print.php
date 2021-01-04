<!DOCTYPE html>
<html>

<head>
  <link rel="stylesheet" href="<?= base_url();?>/assets/css/my-css/template_print.css" />
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
        <title><?= $title?></title>
        <meta content="Responsive admin theme build on top of Bootstrap 4" name="description" />
        <meta content="Themesdesign" name="author" />
        <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/favicon.png">


        <!-- Responsive datatable examples -->
        <link href="<?= base_url() ?>/assets/plugins/datatables/responsive.bootstrap4.min.css" rel="stylesheet" type="text/css" />


        <!-- <link href="<?= base_url() ?>/assets/css/bootstrap.min.css" rel="stylesheet" type="text/css"> -->
        <link href="<?= base_url() ?>/assets/css/icons.css" rel="stylesheet" type="text/css">
        <link href="<?= base_url() ?>/assets/css/style.css" rel="stylesheet" type="text/css">

        
</head>
<body onload='window.print()'style="font-size: 12px;margin-top:70px;position:absolute;">


        <!-- <div class="topbar">
            <div class="topbar-left">
                <a href="<?= site_url('home/index') ?>" class="logo">
                    <span class="logo-light">
                        <i class="mdi mdi-shopping"></i> Purchasing System - Print Data All
                    </span>
                </a>
            </div>
            <nav class="navbar-custom">
            </nav>
        </div> -->
        
        <div class="page-header" style="text-align: center">
           <h6><button type="button" onClick="window.print()">Print</button>
           <input type="button" value="Kembali" onclick="location.href='<?= base_url('pembelian/index'); ?>'" />
           PT Brilliant Jaya Wood<br> Purchasing System - <?= $title; ?> - <?= $tgl; ?></h6>
        </div>
    <div class="row">
        <div class="col">
            <div class="card m-b-30">
                <div class="card-body">
                    <table id="datatable" class="table-bordered b-0 fixed-solution" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                        <thead class="text-center">
                            <tr class="text-center">
                                <th>No.</th>
                                <th>OP</th>
                                <th>Kode</th>
                                <th>#</th>
                                <th>Nama</th>
                                <th>Mandarin</th>
                                <th>Spec</th>
                                <th>QTY</th>
                                <th>Satuan</th>
                                <th>Lokasi</th>
                                <th>Note</th>
                                <th>PO</th>
                                <th>Status</th>
                                <th>Tgl Order</th>
                                <th>Tgl Selesai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($pp as $key => $value) { ?>
                                <tr class="text-center">
                                    <td><?= $no++; ?></td>
                                    <td width="5%"><?= $value['op']; ?></td>
                                    <td width="5%"><?= $value['kode']; ?></td>
                                    <td width="3%"><?= $value['kd']; ?></td>
                                    <td width="10%"><?= $value['nama']; ?></td>
                                    <td width="7%"><?= $value['mandarin']; ?></td>
                                    <td width="10%"><?= $value['spec']; ?></td>
                                    <td width="3%"><?= $value['qty']; ?></td>
                                    <td width="6%"><?= $value['satuan']; ?></td>
                                    <td width="7%"><?= $value['lokasi']; ?></td>
                                    <td width="10%"><?= $value['note']; ?></td>
                                    <td width="5%"><?= $value['po']; ?></td>
                                    <td width="10%"><?= $value['status']; ?></td>
                                    <td width="6%"><?= $value['tgl_order']; ?></td>
                                    <td width="7%"><?= $value['tgl_selesai']; ?></td>
                                    
                                

                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</body>

</html>