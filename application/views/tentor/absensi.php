<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Absensi</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <?php
                $hari = date('l');
                $tgl = date('Y-m-d');
                if ($hari == 'Monday') {
                    $hari_ini = 'Senin';
                } else if ($hari == 'Tuesday') {
                    $hari_ini = 'Selasa';
                } else if ($hari == 'Wednesday') {
                    $hari_ini = 'Rabu';
                } else if ($hari == 'Saturday') {
                    $hari_ini = 'Sabtu';
                }
                ?>
                Absen Hari<b> <?= $hari ?></b>
            </div>
            <div class="card-body">
                Silahkan absen siswa anda pada hari <?= $hari_ini ?> tanggal : <?= tgl_indo(date('Y-m-d')) ?> <br>
                Rombel : <b><?= $rombel['nama_rombel'] ?></b>
                <form action="<?= base_url('tentor/absensi/tambah_absen') ?>" method="post">
                    <div class="table-responsive mt-3">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kehadiran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1;
                                $i = 0;
                                foreach ($siswa as $key) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $key['nama'] ?></td>
                                        <td>
                                            <input type="hidden" value="<?= $key['id'] ?>" name="id<?= $i ?>">
                                            <select name="absen<?= $i ?>" class="form-control" id="">
                                                <option value="hadir">Hadir</option>
                                                <option value="tidak">Tidak Hadir</option>
                                            </select>
                                        </td>
                                    </tr>
                                    <?php $i++;
                                endforeach; ?>
                                <tr>
                                    <td colspan="2"></td>
                                    <td>
                                        <input type="hidden" name="iterasi" value="<?php echo $i; ?>">
                                        <input type="hidden" name="hari" value="<?php echo $hari_ini; ?>">
                                        <input type="hidden" name="tgl" value="<?php echo $tgl; ?>">
                                        <button type="submit" class="btn btn-block btn-primary btnSimpan">Simpan</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="col-6" id="viewNilai">

    </div>
</div>