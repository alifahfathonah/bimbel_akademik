<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <b>Input Nilai</b>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <form action="<?= base_url('tentor/nilai/add_nilai') ?>" method="post" id="form_nilai">
                <table class="table">
                    <thead>
                        <tr>
                            <!-- <th>No</th> -->
                            <th>Bulan</th>
                            <th>Nama Siswa</th>
                            <th>Nilai</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 0;
                        if ($jumlah == 0) { ?>
                            <tr>
                                <td class="text-center" colspan="3">Tidak ada data</td>
                            </tr>
                        <?php }
                    foreach ($rombel_nilai as $key) : ?>
                            <tr>
                                <td><?= $key['bulan'] ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td>
                                    <input id="id_bayar" type="hidden" value="<?= $key['id_bayar']; ?>" name="id_bayar<?= $i ?>">
                                    <input type="text" name="nilai<?= $i ?>" class="form-control nilai">
                                </td>
                            </tr>
                            <?php $i++;
                        endforeach;
                        if ($jumlah > 0) { ?>
                            <tr>
                                <td colspan="2"></td>
                                <td>
                                    <input type="hidden" name="iterasi" value="<?php echo $i; ?>">
                                    <button type="submit" class="btn btn-block btn-primary btnSimpan">Simpan</button>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </form>
        </div>
    </div>
</div>