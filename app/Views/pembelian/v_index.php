<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="mt-2 header-title"><?= $title ?> </div>
                <br>
                <p>
                    <?php if (session()->get('level') == 1) { ?>
                    <button type="button" class="btn btn-success waves-effect waves-light mb-2 mr-5" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"> </i> Add</button>
                    <?php } ?>

                    <a class="btn btn-primary waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/index'); ?>">
                        <i class="fas fa-book"> </i> All</a>  
                    <a class="btn btn-danger waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_unfinish'); ?>">
                        <i class="fas fa-ban"> </i> Unfinish</a>
                    <a class="btn btn-warning waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_urgent'); ?>">
                        <i class="fas fa-exclamation"> </i> Urgent</a>
                    <a class="btn btn-success waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_finish'); ?>">
                        <i class="fas fa-check"> </i> Finish</a>
                    <a class="btn btn-secondary waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_pending'); ?>">
                        <i class="fas fa-pause"> </i> Pending</a>
                    <a class="btn btn-info waves-effect waves-light mb-2 mr-2" href="<?= base_url('pembelian/all_data_today'); ?>">
                        <i class="fas fa-pencil-alt"> </i> Input Today</a>         

                </p>

                <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>


                <table id="datatable" class="table-responsive table-bordered b-0 fixed-solution" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead class="text-center">
                        <tr class="text-center">
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
                            <th>Foto</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($pp as $key => $value) { ?>
                            <tr class="text-center">
                                <td width="5%"><?= $value['op']; ?></td>
                                <td width="5%"><?= $value['kode']; ?></td>
                                <td width="3%"><?= $value['kd']; ?></td>
                                <td width="10%"><?= $value['nama']; ?></td>
                                <td width="7%"><?= $value['mandarin']; ?></td>
                                <td width="10%"><?= $value['spec']; ?></td>
                                <td width="3%"><?= $value['qty']; ?></td>
                                <td width="6%"><?= $value['satuan']; ?></td>
                                <td width="7%">
                                    <?php if($value['lokasi'] == 'Gresik') {
                                        echo "<span class='btn btn-success disabled'>Gresik</span>";
                                    } elseif($value['lokasi'] == 'Luar'){
                                        echo "<span class='btn btn-primary disabled'>Luar</span>";
                                    } else{
                                        echo "-";
                                    } ;?>
                                </td>
                                <td width="10%"><?= $value['note']; ?></td>
                                <td width="5%"><?= $value['po']; ?></td>
                                <td width="10%">
                                    <?php if($value['status'] == 'Unfinish') {
                                        echo "<span class='btn btn-danger disabled'>Unfinish</span>";
                                    } elseif($value['status'] == 'Finish') {
                                        echo "<span class='btn btn-success disabled'>Finish</span>";
                                    } elseif($value['status'] == 'Urgent') {
                                        echo "<span class='btn btn-warning disabled'>Urgent</span>"; 
                                    } elseif($value['status'] == 'Pending') {
                                        echo "<span class='btn btn-secondary disabled'>Pending</span>";
                                    } ;?>
                                </td>
                                <td width="6%"><?= $value['tgl_order']; ?></td>
                                <td width="7%"><?= $value['tgl_selesai']; ?></td>
                                <td class="text-center"><img src="<?= base_url('foto/' . $value['foto']) ?>" width="50px"> </td>
                                <?php if (session()->get('level') == 1) { ?>
                                    <td class="text-center">
                                    <div class="dropdown text-sans-serif">
                                            <button class="btn btn-warning tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span>
                                            </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item text-success Finish" data-toggle="modal" data-target="#finish" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Finish
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-warning Edit" data-toggle="modal" data-target="#edit"  href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Edit
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="dropdown-item text-info Foto" data-toggle="modal" data-target="#foto1" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Detail Foto 
                                                            <i class="far fa-file-image"></i>
                                                        </a>
                                                        <a class="dropdown-item text-secondary Pending" data-toggle="modal" data-target="#pending" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Pending 
                                                            <i class="fa fa-pause"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>		
                                    </td>
                                <?php } ?>
                                
                                <?php if (session()->get('level') == 7) { ?>
                                    <td class="text-center">
                                    <div class="dropdown text-sans-serif">
                                            <button class="btn btn-warning tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span>
                                            </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item text-success Finish" data-toggle="modal" data-target="#finish" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Finish
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-warning Edit" data-toggle="modal" data-target="#edit"  href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Edit
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="dropdown-item text-info Foto" data-toggle="modal" data-target="#foto1" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Detail Foto 
                                                            <i class="far fa-file-image"></i>
                                                        </a>
                                                        <a class="dropdown-item text-secondary Pending" data-toggle="modal" data-target="#pending" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Pending 
                                                            <i class="fa fa-pause"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>		
                                    </td>
                                <?php } ?>

                                <?php if (session()->get('level') == 2) { ?>
                                    <td class="text-center">
                                    <div class="dropdown text-sans-serif">
                                            <button class="btn btn-warning tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span>
                                            </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item text-success Finish" data-toggle="modal" data-target="#finish" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Finish
                                                            <i class="fa fa-check"></i>
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <a class="dropdown-item text-warning Edit_User" data-toggle="modal" data-target="#edit_user"  href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Ubah
                                                            <i class="fa fa-edit"></i>
                                                        </a>
                                                        <a class="dropdown-item text-info Foto" data-toggle="modal" data-target="#foto1" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Detail Foto 
                                                            <i class="far fa-file-image"></i>
                                                        </a>
                                                        <a class="dropdown-item text-secondary Pending" data-toggle="modal" data-target="#pending" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Pending 
                                                            <i class="fa fa-pause"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>		
                                    </td>
                                <?php } ?>
                                
                                <?php if (session()->get('level') == 3) { ?>
                                    <td class="text-center">
                                    <div class="dropdown text-sans-serif">
                                            <button class="btn btn-warning tp-btn-light sharp" type="button" id="order-dropdown-0" data-toggle="dropdown" data-boundary="viewport" aria-haspopup="true" aria-expanded="false">
                                                <span><svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="18px" height="18px" viewBox="0 0 24 24" version="1.1"><g stroke="none" stroke-width="1" fill="none" fill-rule="evenodd"><rect x="0" y="0" width="24" height="24"></rect><circle fill="#000000" cx="5" cy="12" r="2"></circle><circle fill="#000000" cx="12" cy="12" r="2"></circle><circle fill="#000000" cx="19" cy="12" r="2"></circle></g></svg></span>
                                            </button>
                                                <div class="dropdown-menu dropdown-menu-right border py-0" aria-labelledby="order-dropdown-0">
                                                    <div class="py-2">
                                                        <a class="dropdown-item text-info Foto" data-toggle="modal" data-target="#foto1" href="javascript:void(0)" 
                                                            data-id="<?= $value['id_pp'] ?>" >Detail Foto 
                                                            <i class="far fa-file-image"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                        </div>		
                                    </td>
                                <?php } ?>

                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


 <!--**********************************
            Modal Add Start
        ***********************************-->

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Data Permintaan Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('pembelian/add');
                helper('text');
                ?>
                <div class="form-group row">
                    <label for="kode" class="col-sm-4 col-form-label text-danger">Kode *</label>
                    <div class="col-sm-4">
                        <input type="hidden" name="log_user_add" value="<?= session()->get('nama_user') ?>">
                        <input class="form-control mb-2" name="kode" placeholder="A00.." required>
                    </div>
                    <div class="col-sm-3">
                        <input type="number" class="form-control" name="kd" placeholder="00" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="nama" class="col-sm-4 col-form-label text-danger">Nama *</label>
                    <div class="col-sm-7">
                        <input class="form-control" name="nama" placeholder="Barang.." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="qty" class="col-sm-4 col-form-label text-danger">Quantity *</label>
                    <div class="col-sm-3">
                        <input type="number" class="form-control mb-2" name="qty" placeholder="00" required>
                    </div>
                    <div class="col-sm-4">
                        <input class="form-control" name="satuan" placeholder="Satuan.." required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="status" class="col-sm-4 col-form-label text-danger">Status *</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="status" required>
                            <option value="Unfinish"><strong>Unfinish</strong></option>
                            <option value="Urgent"><strong>Urgent</strong></option>
                            <option value="Pending"><strong>Pending</strong></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="po" class="col-sm-4 col-form-label">Nomor PO</label>
                    <div class="col-sm-7">
                        <input class="form-control" name="po" placeholder="Nomor PO...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="spec" class="col-sm-4 col-form-label">Spec</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="spec" rows="4" placeholder="Detail Spec Barang.."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
                    <div class="col-sm-7">
                        <select class="form-control" name="lokasi">
                            <option value="-"><strong>...</strong></option>
                            <option value="Luar"><strong>Luar</strong></option>
                            <option value="Gresik"><strong>Gresik</strong></option>
                        </select>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="op" class="col-sm-4 col-form-label">Nomor OP</label>
                    <div class="col-sm-7">
                        <input class="form-control" name="op" placeholder="Nomor OP...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="mandarin" class="col-sm-4 col-form-label">Mandarin</label>
                    <div class="col-sm-7">
                        <input class="form-control" name="mandarin" placeholder="Mandarin...">
                    </div>
                </div>
                <div class="form-group row">
                    <label for="note" class="col-sm-4 col-form-label">Note</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="note" rows="4" placeholder="Note.."></textarea>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-lg-4 col-form-label" for="foto">Foto
                    </label>
                    <div class="col-lg-6">
                        <div class="input-group">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input"  id="foto" name="foto" onchange="previewimg()">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <label class="text-warning mt-2">Foto max size 6 MB</label>
                    </div>
                    <div class="col-lg-6">
                        <div class="media mt-2">
                            <img src="./foto/default-mimin.png" class="img-preview img-thumbnail rounded img-fluid" width="50%" alt >
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success waves-effect waves-light">Add PP</button>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>
 <!--**********************************
            Modal Add End
        ***********************************-->


 <!--**********************************
            Modal status Finish start
        ***********************************-->
    <div class="modal fade" id="finish" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Mari?</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div>
                                    <div class="swal2-icon swal2-success swal2-animate-success-icon" style="display: flex;">
                                    <div class="swal2-success-circular-line-left" style="background-color: rgb(255, 255, 255);"></div>
                                    <span class="swal2-success-line-tip"></span>
                                    <span class="swal2-success-line-long"></span>
                                    <div class="swal2-success-ring"></div> 
                                    <div class="swal2-success-fix" style="background-color: rgb(255, 255, 255);"></div>
                                    <div class="swal2-success-circular-line-right" style="background-color: rgb(255, 255, 255);"></div>
                                    </div>
                                </div>
                                <form class="form-valide" action="<?= base_url('pembelian/ubah_status_finish'); ?>" method="post" enctype="multipart/form-data">
                                <div class="form-group row">
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" name="kode_status_finish1" id="kode_status_finish1"  readonly>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" name="kd_status_finish1" id="kd_status_finish1" readonly>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" name="nama_status_finish1" id="nama_status_finish1" readonly>
                                    </div>
                                </div>
                                <h5 class="mb-2">Sudah Finish?</h5>
                                    <input type="hidden" name="log_user_finish" id="log_user_finish" value="<?= session()->get('nama_user') ?>">
                                    <input type="hidden" name="id_status_finish1" id="id_status_finish1">
                                    <input type="hidden" name="status_finish" id="status_finish" value="Finish">
                                    <button type="submit" class="btn btn-success text-center mb-2">Finish<span class="btn-icon-right"><i
                                                class="fa fa-check"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Modal status Finish end
        ***********************************-->


 <!--**********************************
            Modal  Edit Start
        ***********************************-->

    <div id="edit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Data Permintaan Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form class="form-valide" action="<?= base_url('pembelian/edit_admin'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        
                        <label for="kode" class="col-sm-4 col-form-label text-danger">Kode *</label>
                        <div class="col-sm-4">
                            <input class="form-control mb-2" name="kode_edit" id="kode_edit" required>
                            <input type="hidden" name="log_user_edit_adm" id="log_user_edit_adm" value="<?= session()->get('nama_user') ?>">
                            <input type="hidden" name="id_edit" id="id_edit">
                        </div>
                        <div class="col-sm-3">
                            <input type="number" class="form-control" name="kd_edit" id="kd_edit"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="nama" class="col-sm-4 col-form-label text-danger">Nama *</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="nama_edit" id="nama_edit" required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="qty" class="col-sm-4 col-form-label text-danger">Quantity *</label>
                        <div class="col-sm-3">
                            <input type="number" class="form-control mb-2" name="qty_edit"  id="qty_edit" required>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" name="satuan_edit" id="satuan_edit"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="status" class="col-sm-4 col-form-label text-danger">Status *</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="status_edit" id="status_edit" required>
                                <option value="Unfinish"><strong>Unfinish</strong></option>
                                <option value="Urgent"><strong>Urgent</strong></option>
                                <option value="Finish"><strong>Finish</strong></option>
                                <option value="Pending"><strong>Pending</strong></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="po" class="col-sm-4 col-form-label">Nomor PO</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="po_edit" id="po_edit" placeholder="Nomor PO...">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="spec" class="col-sm-4 col-form-label">Spec</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="spec_edit"  id="spec_edit" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="lokasi" class="col-sm-4 col-form-label">Lokasi</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="lokasi_edit" id="lokasi_edit">
                                <option value="-"><strong>...</strong></option>
                                <option value="Luar"><strong>Luar</strong></option>
                                <option value="Gresik"><strong>Gresik</strong></option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="op" class="col-sm-4 col-form-label">Nomor OP</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="op_edit"  id="op_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="mandarin" class="col-sm-4 col-form-label">Mandarin</label>
                        <div class="col-sm-7">
                            <input class="form-control" name="mandarin_edit"  id="mandarin_edit">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-4 col-form-label">Note</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="note_edit" id="note_edit" rows="4" ></textarea>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning waves-effect waves-light">Edit PP</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
 <!--**********************************
            Modal Edit End
        ***********************************-->


 <!--**********************************
            Modal status Pending start
        ***********************************-->
      
<div class="modal fade" id="pending" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Apakah Permintaan Pembelian</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div>
                                    <div class="mini-stat-icon float-center">
                                        <i class="mdi mdi-pause bg-secondary text-white mb-3"></i>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" id="kode_pending" readonly>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" id="kd_pending" readonly>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" id="nama_pending" readonly>
                                    </div>
                                </div>
                                <h5 class="mb-2">Mau dipending?</h5>
                                <form class="form-valide" action="<?= base_url('pembelian/pending'); ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="id_pending" id="id_pending">
                                    <input type="hidden" name="status_pending" id="status_pending" value="Pending">
                                    <button type="submit" class="btn btn-secondary text-center mb-2">Pending  <span class="btn-icon-right"><i
                                                class="fa fa-pause"></i></span>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Modal status Pending end
        ***********************************-->

<!--**********************************
            Modal Detail Foto start
        ***********************************-->
        <div class="modal fade" id="foto1" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Detail Foto PP</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="card">
                        <div class="card-body">
                            <div class="text-center">
                                <div class="form-group row">
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" id="kode_foto" readonly>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" id="kd_foto" readonly>
                                    </div>
                                    <div class="col-lg-4 mb-2">
                                        <input type="text" class="form-control d-inline text-center" id="nama_foto" readonly>
                                    </div>
                                </div>
                                <div class="align text-center mb-3">
                                    <div class="media mt-2" id="detail_foto1">
                                        <!-- <img src=""  class="img-preview img-thumbnail rounded img-fluid" width="100%" alt > -->
                                    </div>
                                </div>
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--**********************************
            Detail Foto
        ***********************************-->

        <!--**********************************
            Modal  Edit User Start
        ***********************************-->

    <div id="edit_user" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Data Permintaan Pembelian</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

            <form class="form-valide" action="<?= base_url('pembelian/edit_user'); ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group row">
                        <label for="qty" class="col-sm-4 col-form-label text-danger">Quantity *</label>
                        <div class="col-sm-3">
                            <input type="hidden" name="id_edit_user" id="id_edit_user">
                            <input type="number" class="form-control mb-2" name="qty_edit_user"  id="qty_edit_user" required>
                        </div>
                        <div class="col-sm-4">
                            <input class="form-control" name="satuan_edit_user" id="satuan_edit_user"  required>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="spec" class="col-sm-4 col-form-label">Spec</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="spec_edit_user"  id="spec_edit_user" rows="4"></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="note" class="col-sm-4 col-form-label">Note</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="note_edit_user" id="note_edit_user" rows="4" ></textarea>
                            <input type="hidden" name="log_user_edit_user" id="log_user_edit_user" value="<?= session()->get('nama_user') ?>">
                            <input type="hidden" name="kode_edit_user" id="kode_edit_user">
                            <input type="hidden" name="kd_edit_user" id="kd_edit_user">
                            <input  name="nama_edit_user" id="nama_edit_user">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-warning waves-effect waves-light">Edit PP</button>
                </div>

            </form>
        </div>
    </div>
</div>
</div>
 <!--**********************************
            Modal Edit End
        ***********************************-->