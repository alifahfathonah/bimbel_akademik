<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">User</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <button type="button" data-toggle="modal" data-target="#tambahUser" class="btn btn-outline-primary btn-sm btn-icon-text ml-2">
            <i class="fas fa-user-plus"></i>
            Tambah Data
        </button>
    </div>
    <div class="card-body">
        <?php $this->view('message') ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th>Aksi</th>
                        <th>Nama</th>
                        <th>Jenis Kelamin</th>
                        <th>No HP</th>
                        <th>Foto</th>
                        <th>Level</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($user as $key) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#ubahUser<?= $key['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('admin/user/delete_user/' . $key['id']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                            <td><?= $key['active'] == 'yes' ? '<i class="fas fa-circle text-success"></i>' . ' ' . $key['nama'] : '<i class="fas fa-circle text-danger"></i>' . ' ' . $key['nama'] ?></td>
                            <td><?= $key['jekel'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                            <td><?= $key['no_hp'] ?></td>
                            <td>
                                <img width="50px" class="img-profile rounded-circle" src="<?= base_url('assets/img/foto/' . $key['foto']) ?>" alt="">
                            </td>
                            <td>
                                <?php if ($key['level'] == 'admin') { ?>
                                    <span class="badge badge-pill badge-info">Admin</span>
                                <?php } else if ($key['level'] == 'tentor') { ?>
                                    <span class="badge badge-pill badge-success">Tentor</span>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data User</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/user/add_user') ?>" enctype="multipart/form-data" method="post" class="pt-3">
                    <div class="form-group row">
                        <div class="col">
                            <label>Nama</label>
                            <input type="text" name="nama" required class="form-control" placeholder="Nama">
                        </div>
                        <div class="col">
                            <label for="">Jenis Kelamin</label>
                            <select name="jekel" class="form-control">
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Alamat</label>
                            <textarea name="alamat" required class="form-control" cols="30" rows="5"></textarea>
                        </div>
                        <div class="col">
                            <label for="">No HP</label>
                            <input type="text" name="no" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" required class="form-control">
                        </div>
                        <div class="col">
                            <label for="">Foto</label>
                            <input type="file" name="foto" class="form-control-file">
                            <p class="text-danger" style="font-style: italic; font-size: 10px">*) kosongi jika tidak ada foto</p>
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Username</label>
                            <input type="text" name="username" required class="form-control">
                        </div>
                        <div class="col">
                            <label for="">Password</label>
                            <input type="password" name="password" required class="form-control">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Level</label>
                            <select name="level" required class="form-control" id="">
                                <option value="admin">Admin</option>
                                <option value="tentor">Tentor</option>
                            </select>
                        </div>
                        <div class="form-check col">
                            <label class="form-check-label">Is Active?</label><br>
                            <div class="radio">
                                <label>
                                    <input type="radio" checked value="yes" id="raktif" name="active" value="AKTIF">
                                    <i class="fas fa-circle text-success"></i> AKTIF
                                </label>
                            </div>
                            <div class="radio">
                                <label>
                                    <input type="radio" value="no" id="rtaktif" name="active" value="NONAKTIF">
                                    <i class="fas fa-circle text-danger"></i> NON AKTIF
                                </label>
                            </div>
                        </div>
                    </div>
                    <div style="float: right">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                        <input type="submit" class="btn btn-primary" value="Simpan">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php foreach ($user as $key) : ?>
    <div class="modal fade" id="ubahUser<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Data User</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/user/edit_user') ?>" enctype="multipart/form-data" method="post" class="pt-3">
                        <div class="form-group row">
                            <div class="col">
                                <label>Nama</label>
                                <input type="hidden" value="<?= $key['id'] ?>" name="id">
                                <input type="text" name="nama" value="<?= $key['nama'] ?>" required class="form-control" placeholder="Nama">
                            </div>
                            <div class="col">
                                <label for="">Jenis Kelamin</label>
                                <select name="jekel" class="form-control">
                                    <option value="L" <?= $key['jekel']  == 'L' ? 'selected' : null ?>>Laki-laki</option>
                                    <option value="P" <?= $key['jekel']  == 'P' ? 'selected' : null ?>>Perempuan</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="">Alamat</label>
                                <textarea name="alamat" required class="form-control" cols="30" rows="5"><?= $key['alamat'] ?></textarea>
                            </div>
                            <div class="col">
                                <label for="">No HP</label>
                                <input type="text" value="<?= $key['no_hp'] ?>" name="no" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" value="<?= $key['tgl_lahir'] ?>" name="tgl_lahir" required class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Foto</label><br>
                                <img class='mb-2' src="<?= base_url('assets/img/foto/' . $key['foto']) ?>" width="50px" >
                                <input type="hidden" name="old_image" value="<?= $key['foto'] ?>">
                                <input type="file" name="foto" class="form-control-file">
                                <p class="text-danger" style="font-style: italic; font-size: 10px">*) kosongi jika tidak ingin diganti</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="">Username</label>
                                <input type="text" value="<?= $key['username'] ?>" name="username" required class="form-control">
                            </div>
                            <!-- <div class="col">
                                <label for="">Password</label>
                                <input type="password" value="<?= $key['password'] ?>" name="password" required class="form-control">
                                </div> -->
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="">Level</label>
                                <select name="level" required class="form-control">
                                    <option <?php if ($key['level'] == 'admin') {
                                                echo 'selected';
                                            } else {
                                                echo null;
                                            } ?> class="form-check-input ml-2" name="active" value="admin">Admin</option>
                                    <option <?php if ($key['level'] == 'tentor') {
                                                echo 'selected';
                                            } else {
                                                echo null;
                                            } ?> value="tentor">Tentor</option>
                                </select>
                            </div>
                            <div class="col">
                                <label>Is Active?</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="yes" id="raktif" <?php if ($key['active'] == 'yes') {
                                                                                        echo 'checked';
                                                                                    } ?> name="active" value="AKTIF">
                                        <i class="fas fa-circle text-success"></i>AKTIF
                                    </label>
                                </div>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="no" id="rtaktif" <?php if ($key['active'] == 'no') {
                                                                                        echo 'checked';
                                                                                    } ?> name="active" value="NONAKTIF">
                                        <i class="fas fa-circle text-danger"></i> NON AKTIF
                                    </label>
                                </div>
                                <p>
                            </div>
                        </div>
                        <div style="float: right">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                            <input type="submit" class="btn btn-primary" value="Simpan">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>