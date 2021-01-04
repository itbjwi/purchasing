<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">

                <div class="mt-2 header-title"><?= $title1 ?> </div>
                <br>

                <p>
                    <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#add">
                        <i class="fa fa-plus"> </i> Add</button>
                </p>

                <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Category Name</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($kategori as $key => $value) { ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_kategori']; ?></td>
                                <td class="text-center"><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_kategori']; ?>">Edit</button>
                                    <a href="<?= base_url('kategori/delete/' . $value['id_kategori']) ?>" class="btn btn-xs btn-danger btn-delete">Delete</a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
<div id="add" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Add Category</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open('kategori/add') ?>
                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-2 col-form-label">Category</label>
                    <div class="col-sm-10">
                        <input class="form-control" name="nama_kategori" placeholder="Input your category" required unique>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Save changes</button>
            </div>

            <?php echo form_close() ?>

        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
</div>

<?php foreach ($kategori as $key => $value) { ?>
    <div id="edit<?= $value['id_kategori']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Edit Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('kategori/edit/' . $value['id_kategori']) ?>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-2 col-form-label">Category</label>
                        <div class="col-sm-10">
                            <input class="form-control" value="<?= $value['nama_kategori']; ?>" name="nama_kategori" placeholder="Input your category" required unique>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>

                <?php echo form_close() ?>

            </div>
        </div>
    </div>
    </div>
<?php } ?>