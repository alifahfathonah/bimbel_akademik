<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
</div>

<div class="row">
    <div class="col-4">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col">
                            <div class='form-group'>
                                <label for="">Pilih Hari</label>
                                <select class='form-control' name="hari">
                                    <option value="">-- Pilih Hari --</option>
                                    <?php $days = ['senin', 'selasa', 'rabu'];
                                        foreach($days as $day) :
                                            ?>
                                    <option value="<?= $day ?>"><?= ucfirst($day) ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-group'>
                                <label for="">Rombonagn Belajar</label>
                                <select class='form-control' name="hari">
                                    <option value="">-- Pilih Rombel --</option>
                                    <?php foreach($rombel as $key) :
                                    ?>
                                    <option value="<?= $key['id'] ?>"><?= $key['nama_rombel'] ?></option>
                                        <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
    </div>
<div class="card-body">
    <form action="">
        <div class="row">
            <div class="col">
                <div class='form-group'>
                    <label for="">Pilih Hari</label>
                    <select class='form-control' name="hari">
                        <option value="">-- Pilih Hari --</option>
                        <?php $days = ['senin', 'selasa', 'rabu'];
                            foreach($days as $day) :
                                ?>
                        <option value="<?= $day ?>"><?= ucfirst($day) ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>
            <div class="col">
                <div class='form-group'>
                    <label for="">Rombonagn Belajar</label>
                    <select class='form-control' name="hari">
                        <option value="">-- Pilih Rombel --</option>
                        <?php foreach($rombel as $key) :
                        ?>
                        <option value="<?= $key['id'] ?>"><?= $key['nama_rombel'] ?></option>
                            <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
</div>

<!-- <div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
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
</div> -->
