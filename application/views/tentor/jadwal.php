<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Jadwal Mengajar</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
    </div>
    <div class="card-body">
        <?php $this->view('message') ?>
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th scope="col">Rombel</th>
                        <th>Senin</th>
                        <th>Selasa</th>
                        <th>Rabu</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($senin as $key) : ?>
                        <tr>
                            <td><?= $key['nama_rombel'] ?></td>
                            <td>
                                <?= $key['nama_mapel'] ?> <br>
                                Ruang : <b><?= $key['nama_ruang'] ?></b><br>
                                Jam : <b>15.00 - 17.00 WIB</b>
                            </td>
                            <td>-</td>
                            <td>-</td>
                        </tr>
                    <?php endforeach; ?>
                    <?php
                    foreach ($selasa as $key) : ?>
                        <tr>
                            <td><?= $key['nama_rombel'] ?></td>
                            <td>-</td>
                            <td>
                                <?= $key['nama_mapel'] ?> <br>
                                Ruang : <b><?= $key['nama_ruang'] ?></b><br>
                                Jam : <b>15.00 - 17.00 WIB</b>
                            </td>
                            <td>-</td>
                        </tr>
                    <?php endforeach; ?>
                    <?php
                    foreach ($rabu as $key) : ?>
                        <tr>
                            <td><?= $key['nama_rombel'] ?></td>
                            <td>-</td>
                            <td>-</td>
                            <td>
                                <?= $key['nama_mapel'] ?> <br>
                                Ruang : <b><?= $key['nama_ruang'] ?></b><br>
                                Jam : <b>15.00 - 17.00 WIB</b>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>