<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">


                <div class="mt-1 header-title"><?= $title1 ?></div>
                <br>
                <button type="button" class="btn btn-success waves-effect waves-light" data-toggle="modal" data-target="#add">
                    <i class="fa fa-plus"> </i> Add</button>
                </p>

                <div class="swal" data-swal="<?= session()->get('pesan'); ?>"></div>

                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">

                    <thead>
                        <tr>
                            <th width="10px">No</th>
                            <th>Department Name</th>
                            <th width="100px">Action</th>
                        </tr>
                    </thead>


                    <tbody>

                        <?php $no = 1;
                        foreach ($dep as $key => $value) { ?>


                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $value['nama_dep']; ?></td>
                                <td class="text-center"><button class="btn btn-xs btn-warning" data-toggle="modal" data-target="#edit<?= $value['id_dep']; ?>">Edit</button>

                                    <a href="<?= base_url('dep/delete/' . $value['id_dep']) ?>" class="btn btn-xs btn-danger btn-delete">Delete</a>
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
                <h5 class="modal-title mt-0" id="myModalLabel">Add Departement</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <?php echo form_open('dep/add') ?>
                <?= csrf_field() ?>
                <div class="form-group row">
                    <label for="example-email-input" class="col-sm-3 col-form-label">Departement</label>
                    <div class="col-sm">
                        <input class="form-control" name="nama_dep" placeholder="Input your Departement" required unique>
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

<?php foreach ($dep as $key => $value) { ?>


    <div id="edit<?= $value['id_dep']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel">Edit Departement </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <?php echo form_open('dep/edit/' . $value['id_dep']) ?>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-3 col-form-label">Departement </label>
                        <div class="col-sm">
                            <input class="form-control" value="<?= $value['nama_dep']; ?>" name="nama_dep" placeholder="Input your category" required unique>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary waves-effect waves-light">Update</button>
                </div>

                <?php echo form_close() ?>

            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
    </div>

<?php } ?>