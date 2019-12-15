<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pendaftaran Siswa</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <button type="button" data-toggle="modal" data-target="#tambahSiswa" class="btn btn-outline-primary btn-sm btn-icon-text ml-2">
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
                        <th>Alamat</th>
                        <th>Rombel</th>
                        <th>Tanggal Daftar</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($siswa as $key) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#ubahSiswa<?= $key['id_daftar'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('admin/user/delete_user/' . $key['id_daftar']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                            <td><?= $key['active'] == 'yes' ? '<i class="fas fa-circle text-success"></i>' . ' ' . $key['nama'] : '<i class="fas fa-circle text-danger"></i>' . ' ' . $key['nama'] ?></td>
                            <td><?= $key['jekel'] == 'L' ? 'Laki-laki' : 'Perempuan' ?></td>
                            <td><?= $key['alamat'] ?></td>
                            <td><?= $key['nama_rombel'] ?></td>
                            <td><?= tgl_indo($key['tgl_daftar']) ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahSiswa" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Pendaftaran</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/pendaftaran/add_siswa') ?>" method="post" class="pt-3">
                    <div class="form-group row">
                        <div class="col">
                            <label>Nama</label>
                            <input type="text" name="nama" required class="form-control" placeholder="Nama">
                        </div>
                        <div class="col">
                            <label for="">Jenis Kelamin</label>
                            <select required name="jekel" class="form-control">
                                <option value="">-- Pilih --</option>
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
                    <div class="form-group row">
                        <div class="col">
                            <label for="">Rombongan Belajar</label>
                            <select required id="rombel" name="rombel" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($rombel as $data) : ?>
                                    <option value="<?= $data['id'] ?>"><?= $data['nama_rombel'] ?></option>
                                <?php endforeach; ?>
                            </select>
                            <p id="ketkuota" style="font-style: italic; font-size: 10px mt-2"></p>
                        </div>
                        <div class="col">
                            <label for="">Jumlah Bayar</label>
                            <input type="text" name="jumlah" required class="form-control">
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

<?php foreach ($siswa as $key) : ?>
    <div class="modal fade" id="ubahSiswa<?= $key['id_daftar'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Ubah Data Pendaftaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/pendaftaran/edit_siswa') ?>" method="post" class="pt-3">
                        <div class="form-group row">
                            <div class="col">
                                <label>Nama</label>
                                <input type="hidden" name="id_daftar" value="<?= $key['id_daftar'] ?>">
                                <input type="hidden" name="id_user" value="<?= $key['id_user'] ?>">
                                <input type="text" value="<?= $key['nama'] ?>" name="nama" required class="form-control" placeholder="Nama">
                            </div>
                            <div class="col">
                                <label for="">Jenis Kelamin</label>
                                <select name="jekel" class="form-control">
                                    <option <?php if ($key['jekel'] == 'L') {
                                                echo 'selected';
                                            } ?> value="L">Laki-laki</option>
                                    <option <?php if ($key['jekel'] == 'P') {
                                                echo 'selected';
                                            } ?> value="P">Perempuan</option>
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
                                <input type="text" name="no" value="<?= $key['no_hp'] ?>" required class="form-control">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label for="">Tanggal Lahir</label>
                                <input type="date" value="<?= $key['tgl_lahir'] ?>" name="tgl_lahir" required class="form-control">
                            </div>
                            <div class="col">
                                <label for="">Rombongan Belajar</label>
                                <select name="rombel" class="form-control">
                                    <option value="">-- Pilih --</option>
                                    <?php foreach ($rombel as $data) : ?>
                                        <option value="<?= $data['id'] ?>" <?= $key['id_rombel'] == $data['id'] ? 'selected' : null ?>><?= $data['nama_rombel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                                <p id="ketkuota" class="text-danger" style="font-style: italic; font-size: 10px"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col">
                                <label>Is Active?</label>
                                <div class="radio">
                                    <label>
                                        <input type="radio" value="yes" id="raktif" <?php if ($key['active'] == 'yes') {
                                                                                        echo 'checked';
                                                                                    } ?> name="active" value="AKTIF">
                                        <i class="fas fa-circle text-success"></i> AKTIF
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