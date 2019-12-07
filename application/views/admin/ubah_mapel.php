<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Ubah Mata Pelajaran</h1>
</div>

<div class="row">
    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b>Jadwal</b>
            </div>
            <div class="card-body">
                <div class="row mb-2">
                    <div class="col">
                        <div class='form-group'>
                            <label for="">Hari</label>
                            <input readonly type="text" class="form-control" value="<?= ucfirst($jadwal['hari']) ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class='form-group'>
                            <label for="">Rombongan Belajar</label>
                            <input readonly type="text" class="form-control" value="<?= $jadwal['nama_rombel'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class='form-group'>
                            <label for="">Tentor</label>
                            <input readonly type="text" class="form-control" value="<?= $jadwal['nama'] ?>">
                        </div>
                    </div>
                    <div class="col">
                        <div class='form-group'>
                            <label for="">Ruang</label>
                            <input readonly type="text" class="form-control" value="<?= $jadwal['nama_ruang'] ?>">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="card col-8 shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <b>Pilih Mata Pelajaran</b>
    </div>
    <div class="card-body">
        <form method='post' action=<?= base_url('admin/penjadwalan/add_mapel') ?>>
            <div class="table-responsive mt-3">
                <input type="hidden" value="<?= $jadwal['id'] ?>" name="id_jadwal">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>Nama Mapel</th>
                            <th width='20px'>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($mapel as $value) { }
                        foreach ($master_mapel as $jd) : ?>
                            <td><?= $no++; ?></td>
                            <td><?= $jd['nama_mapel'] ?></td>
                            <td><input type="checkbox" name="jadwal[]" value="<?= $jd['id'] ?>" <?= $value['nama_mapel'] == $jd['nama_mapel'] ? 'checked' : null ?>></td>
                            </tr>
                        <?php
                    endforeach; ?>
                    </tbody>
                </table>
            </div>
            <input type="submit" class="btn btn-info btn-block mt-4" value='Simpan'>
        </form>
    </div>
</div>