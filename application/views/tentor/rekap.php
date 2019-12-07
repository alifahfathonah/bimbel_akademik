<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Rekap Absen</h1>
</div>

<div class="row">
    <div class="col-12">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <?php
                $hari = date('l');
                if ($hari == 'Monday') {
                    $hari_ini = 'Senin';
                } else if ($hari == 'Tuesday') {
                    $hari_ini = 'Selasa';
                } else if ($hari == 'Wednesday') {
                    $hari_ini = 'Rabu';
                }
                ?>
                <!-- Pencarian Rekap -->
            </div>
            <div class="card-body">
                <?php $this->view('message') ?>
                <div class="table-responsive">
                    Jumlah Rekapan kehadiran selama mengikuti les
                    <table class="table mt-3">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Hadir</th>
                                <th>Tidak Hadir</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php $no = 1;
                            foreach ($rekap as $key) : ?>
                                <tr>
                                    <td><?= $no++ ?></td>
                                    <td><?= $key['nama'] ?></td>
                                    <td><?= $key['hadir'] ?></td>
                                    <td><?= $key['tidak_hadir'] ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6" id="viewNilai">

    </div>
</div>