<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rombel</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <button type="button" data-toggle="modal" data-target="#tambahRombel" class="btn btn-outline-primary btn-sm btn-icon-text ml-2">
            <i class="fas fa-plus"></i>
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
                        <th>Nama Rombel</th>
                        <th>Kelas</th>
                        <th>Kuota</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($rombel as $key) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#ubahRombel<?= $key['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('admin/rombel/delete_rombel/' . $key['id']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                            <td><?= $key['nama_rombel'] ?></td>
                            <td><?= $key['kelas'] ?></td>
                            <td><?= $key['kuota'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahRombel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Rombel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/rombel/add_rombel') ?>" method="post" class="pt-3">
                    <div class="form-group row">
                        <span for="nama" class="col-sm-4 col-form-label">Nama Rombel</span>
                        <div class="col-sm-8">
                            <input required class="form-control" placeholder="cth: SD1A" type="text" name="nama" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="kelas" class="col-sm-4 col-form-label">Kelas</span>
                        <div class="col-sm-8">
                            <input required class="form-control" type="number" name="kelas" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="kuota" class="col-sm-4 col-form-label">Kuota</span>
                        <div class="col-sm-8">
                            <input required class="form-control" type="text" name="kuota" />
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

<?php foreach ($rombel as $key) : ?>
    <div class="modal fade" id="ubahRombel<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Data Rombel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/rombel/edit_rombel') ?>" enctype="multipart/form-data" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="nama" class="col-sm-4 col-form-label">Nama Rombel</span>
                            <div class="col-sm-8">
                                <input type="hidden" value="<?= $key['id'] ?>" name="id">
                                <input required value="<?= $key['nama_rombel'] ?>" class="form-control" type="text" name="nama" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="kelas" class="col-sm-4 col-form-label">Kelas</span>
                            <div class="col-sm-8">
                                <input required value="<?= $key['kelas'] ?>" class="form-control" type="number" name="kelas" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="kuota" class="col-sm-4 col-form-label">Kuota</span>
                            <div class="col-sm-8">
                                <input required value="<?= $key['kuota'] ?>" class="form-control" type="text" name="kuota" />
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