<div class="row">
    <div class="col-sm-12">
        <table class="table table-bordered">
            <tr>
                <th width="100px">No arsip</th>
                <th width="20px">:</th>
                <th> <?= $arsip['no_arsip'] ?></th>
                <th width="120px">Tanggal Upload</th>
                <th width="20px">:</th>
                <th> <?= $arsip['tgl_upload'] ?></th>
            </tr>
            <tr>
                <th width="100px">Nama Arsip</th>
                <th width="20px">:</th>
                <th> <?= $arsip['nama_file'] ?></th>
                <th width="120px">Tanggal Update</th>
                <th width="20px">:</th>
                <th> <?= $arsip['tgl_update'] ?></th>
            </tr>
            <tr>
                <th width="100px">deskripsi</th>
                <th width="20px">:</th>
                <th> <?= $arsip['deskripsi'] ?></th>
                <th width="120px">Nama User</th>
                <th width="20px">:</th>
                <th> <?= $arsip['nama_user'] ?></th>
            </tr>
            <tr>
                <th width="100px">Departement</th>
                <th width="20px">:</th>
                <th> <?= $arsip['nama_dep'] ?></th>
                <th width="120px">Ukuran FIle</th>
                <th width="20px">:</th>
                <th> <?= $arsip['ukuran_file'] ?> Byte</th>
            </tr>
        </table>
    </div>
    <tr>

    </tr>

    <div class="col-sm-12">
        <iframe src="<?= base_url('file_arsip/' . $arsip['file_arsip']) ?>" width="100%" height="600px"></iframe>
    </div>






</div>