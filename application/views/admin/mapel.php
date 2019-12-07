<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Mata Pelajaran</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <button type="button" data-toggle="modal" data-target="#tambahMapel" class="btn btn-outline-primary btn-sm btn-icon-text ml-2">
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
                        <th>Kode Mapel</th>
                        <th>Nama Mapel</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($mapel as $key) : ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td>
                                <button data-toggle="modal" data-target="#ubahMapel<?= $key['id'] ?>" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></button>
                                <a href="<?= base_url('admin/mapel/delete_mapel/' . $key['id']) ?>" onclick="return confirm('Apakah anda yakin untuk dihapus?')" title="hapus" class="btn btn-sm btn-icon btn-danger"><i class="fas fa-trash"></i></a>
                            </td>
                            <td><?= $key['kode_mapel'] ?></td>
                            <td><?= $key['nama_mapel'] ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="modal fade" id="tambahMapel" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="exampleModalLabel">Tambah Data Mapel</h4>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('admin/mapel/add_mapel') ?>" method="post" class="pt-3">
                    <div class="form-group row">
                        <span for="kode" class="col-sm-4 col-form-label">Kode Mapel</span>
                        <div class="col-sm-8">
                            <input required placeholder="cth: MTK" class="form-control" type="text" name="kode" />
                        </div>
                    </div>
                    <div class="form-group row">
                        <span for="nama" class="col-sm-4 col-form-label">Nama Mapel</span>
                        <div class="col-sm-8">
                            <input required class="form-control" type="text" name="nama" />
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

<?php foreach ($mapel as $key) : ?>
    <div class="modal fade" id="ubahMapel<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Tambah Data Mapel</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="<?= base_url('admin/mapel/edit_mapel') ?>" enctype="multipart/form-data" method="post" class="pt-3">
                        <div class="form-group row">
                            <span for="kode" class="col-sm-4 col-form-label">Kode Mapel</span>
                            <div class="col-sm-8">
                                <input required value="<?= $key['kode_mapel'] ?>" class="form-control" type="text" name="kode" />
                            </div>
                        </div>
                        <div class="form-group row">
                            <span for="nama" class="col-sm-4 col-form-label">Nama Mapel</span>
                            <div class="col-sm-8">
                                <input type="hidden" value="<?= $key['id'] ?>" name="id">
                                <input required value="<?= $key['nama_mapel'] ?>" class="form-control" type="text" name="nama" />
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