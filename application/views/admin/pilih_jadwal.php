<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b>Pilih Jadwal Mata Pelajaran</b>
            </div>
            <div class="card-body">
                <?php $this->view('message') ?>
                <form method='post' action="<?= base_url('admin/penjadwalan/add_jadwal') ?>">
                    <div class="row mb-2">
                        <div class="col">
                            <div class='form-group'>
                                <label for="">Hari</label>
                                <select required class='form-control' name="hari">
                                    <option value="">-- Pilih Hari --</option>
                                    <?php $days = ['senin', 'selasa', 'rabu'];
                                    foreach ($days as $day) :
                                        ?>
                                        <option value="<?= $day ?>"><?= ucfirst($day) ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-group'>
                                <label for="">Rombongan Belajar</label>
                                <select required class='form-control' name="rombel">
                                    <option value="">-- Pilih Rombel --</option>
                                    <?php foreach ($rombel as $key) :
                                        ?>
                                        <option value="<?= $key['id'] ?>"><?= $key['nama_rombel'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-group'>
                                <label for="">Tentor</label>
                                <select required class='form-control' name="tentor">
                                    <option value="">-- Pilih Tentor --</option>
                                    <?php foreach ($tentor as $key) :
                                        ?>
                                        <option value="<?= $key['id'] ?>"><?= $key['nama'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class='form-group'>
                                <label for="">Ruang</label>
                                <select required class='form-control' name="ruang">
                                    <option value="">-- Pilih Ruang --</option>
                                    <?php foreach ($ruang as $key) :
                                        ?>
                                        <option value="<?= $key['id'] ?>"><?= $key['nama_ruang'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <input type="submit" class="btn btn-primary btn-block" value="Selanjutnya">
                </form>
            </div>
        </div>
    </div>
</div>