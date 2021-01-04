<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <div class="mt-2 header-title"><?= $title ?> </div>
                <br>
                <div class="box-body">
                    <?php echo form_open_multipart('arsip/update/' . $arsip['id_arsip']); ?>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-4 col-form-label">No Arsip</label>
                        <div class="col-sm-4">

                            <input class="form-control" value="<?= $arsip['no_arsip']; ?>" name="no_arsip" readonly>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-4 col-form-label">Nama File </label>
                        <div class="col-sm-4">
                            <input class="form-control" value="<?= $arsip['nama_file']; ?>" name="nama_file">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-4 col-form-label">Description</label>
                        <div class="col-sm-4">
                            <textarea class="form-control" name="deskripsi" rows="4"> <?= $arsip['deskripsi'] ?></textarea>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-4 col-form-label">tanggal Upload</label>
                        <div class="col-sm-4">
                            <input class="form-control" value="<?= $arsip['tgl_upload']; ?>" name="tgl_upload" readonly>
                        </div>
                    </div>


                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-4 col-form-label">Kategori</label>
                        <div class="col-sm-4">
                            <select name="id_kategori" class="form-control">
                                <option value="<?= $arsip['id_kategori'] ?>"><?= $arsip['nama_kategori'] ?></option>
                                <option value="">-Pilih Kategori-</option>
                                <?php foreach ($kategori as $key => $value) { ?>
                                    <option value="<?= $value['id_kategori'] ?>"><?= $value['nama_kategori'] ?>
                                    <?php } ?>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="example-email-input" class="col-sm-4 col-form-label">Ganti File</label>
                        <div class="col-sm-4">
                            <input type="file" name="file_arsip">
                            <label class="text-danger">Note : File harus format PDF</label>
                        </div>
                    </div>


                </div>
                <br><br>
                <div class="form-group row">
                    <div class="col-sm-10">
                        <button type="submit" class="btn btn-xs btn-primary">Update</button>
                        <a href="<?= base_url('arsip') ?>" class="btn btn-xs btn-danger">Back</a>

                    </div>
                </div>

                <?php echo form_close() ?>
            </div>
        </div>

    </div>
</div>