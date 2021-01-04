<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="mt-2 header-title"><?= $title ?> </div>
                <br>
                <?php if (session()->get('level') == 2) { ?>
                    <h5 class="text-center">Harap Isi data dengan benar dan teliti ,jika ingin update data harap hubungi admin</h5>

                <?php } ?>
                <p>
                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"> </i> Add</button>
                </p>

                <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>


                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead class="text-center">
                        <tr class="text-center">
                            <th>No</th>
                            <th>Category</th>
                            <th>Departement</th>
                            <th>Archive No</th>
                            <th>Filename</th>
                            <th>Desc</th>
                            <th>Upload</th>
                            <th>Update</th>
                            <th>File</th>
                            <th>User</th>

                            <?php if (session()->get('level') == 1) { ?>
                                <th>Action</th>

                            <?php } ?>

                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($arsip as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_kategori']; ?></td>
                                <td><?= $value['nama_dep']; ?></td>
                                <td><?= $value['no_arsip']; ?></td>
                                <td><?= $value['nama_file']; ?></td>
                                <td width="50px"><?= $value['deskripsi']; ?></td>
                                <td><?= $value['tgl_upload']; ?></td>
                                <td><?= $value['tgl_update']; ?></td>
                                <td class="text-center"> <a href="<?= base_url('arsip/viewpdf/' . $value['id_arsip']) ?>"> <i mdi-pdf-box class="mdi mdi-pdf-box fa-2x label-danger"></i></a><br><?= number_format($value['ukuran_file'], 0) ?> Byte</td>
                               
                                <td><?= $value['nama_user']; ?></td>

                                <?php if (session()->get('level') == 1) { ?>
                                    <td class="text-center">
                                        <a href="<?= base_url('arsip/edit/' . $value['id_arsip']) ?>" class="btn btn-xs btn-warning">Edit</a>

                                        <a href="<?= base_url('arsip/delete/' . $value['id_arsip']) ?>" class="btn btn-xs btn-danger btn-delete">Delete</a>
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

<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add arsip</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('arsip/add');
                helper('text');
                $no_arsip = date('Ymds') . '-' . random_string('alnum', 4);
                ?>

                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-4 col-form-label">No Arsip</label>
                    <div class="col-sm-7">

                        <input class="form-control" value="<?= $no_arsip ?>" name="no_arsip" readonly>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-4 col-form-label">Nama Arsip</label>
                    <div class="col-sm-7">
                        <input class="form-control" name="nama_file" placeholder="Input Nama Arsip" required>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-4 col-form-label">Description</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="deskripsi" rows="4" placeholder="Input your deskripsi" required></textarea>
                    </div>
                </div>

                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-4 col-form-label">File</label>
                    <div class="col-sm-7">
                        <input type="file" name="file_arsip" required>
                        <label class="text-danger">Note : File harus format PDF</label>
                    </div>
                </div>
                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-4 col-form-label">Kategori</label>
                    <div class="col-sm-7">
                        <select name="id_kategori" class="form-control" required>
                            <option value="">-Pilih Kategori-</option>
                            <?php foreach ($kategori as $key => $value) { ?>
                                <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?>
                                <?php } ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>

            <?php echo form_close() ?>
        </div>
    </div>
</div>
</div>

<!--  -->