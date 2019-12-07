<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b>Nilai dari : </b> <?= $siswaPer1['nama'] ?>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <!-- <th>No</th> -->
                                <th>Bulan</th>
                                <th>Nilai</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($siswa as $key) : ?>
                                <tr>
                                    <td><?= $key['bulan'] ?></td>
                                    <td>
                                        <b><?= $key['nilai'] == null ? ' - ' : $key['nilai'] ?></b>
                                    </td>
                                </tr>
                            <?php
                        endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>