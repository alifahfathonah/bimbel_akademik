<h2>Jadwal Pelajaran</h2>

<?php $this->view('message'); ?>

<div class="row">
    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
            </div>
            <div class="card-body">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width='20px'>No</th>
                            <th>Hari</th>
                            <th>Tentor</th>
                            <th>Rombel</th>
                            <th>Ruang</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 1;
                        foreach ($jadwal as $key) : ?>
                            <tr>
                                <td><?= $no++; ?></td>
                                <td><?= ucfirst($key['hari']) ?></td>
                                <td><?= $key['nama'] ?></td>
                                <td><?= $key['nama_rombel'] ?></td>
                                <td><?= $key['nama_ruang'] ?></td>
                                <td>
                                    <?php
                                    $q = "SELECT a.id, a.hari, b.nama, c.nama_rombel, d.nama_ruang, f.nama_mapel FROM tb_jadwal a INNER JOIN tb_users b ON a.id_user=b.id INNER JOIN tb_rombel c ON a.id_rombel=c.id INNER JOIN tb_ruang d ON a.id_ruang=d.id INNER JOIN tb_detail_jadwal e ON a.id=e.id_jadwal INNER JOIN tb_mapel f ON e.id_mapel=f.id WHERE a.id = $key[id]";
                                    $cek = $this->db->query($q)->num_rows(); ?>
                                    <a class="btn btn-warning btn-sm <?= $cek > 0 ? 'disabled' : null ?>" href="<?= base_url('admin/penjadwalan/mapel/' . $key['id']) ?>">Pilih Mapel</a>
                                    <button data-toggle="modal" data-target="#lihatMapel<?= $key['id'] ?>" class="btn btn-info btn-sm">Lihat Mapel</button>
                                    <!-- <a class="btn btn-success btn-sm" href="<?= base_url('admin/penjadwalan/ubah_mapel/' . $key['id']) ?>">Ubah Mapel</a> -->
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<?php foreach ($jadwal as $key) : ?>
    <div class="modal fade" id="lihatMapel<?= $key['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="exampleModalLabel">Mapel Hari : <b><?= ucfirst($key['hari']) ?></b>, Rombel <b><?= $key['nama_rombel'] ?></b></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group row">
                        <?php
                        $q = "SELECT a.id, a.hari, b.nama, c.nama_rombel, d.nama_ruang, f.nama_mapel FROM tb_jadwal a INNER JOIN tb_users b ON a.id_user=b.id INNER JOIN tb_rombel c ON a.id_rombel=c.id INNER JOIN tb_ruang d ON a.id_ruang=d.id INNER JOIN tb_detail_jadwal e ON a.id=e.id_jadwal INNER JOIN tb_mapel f ON e.id_mapel=f.id WHERE a.id = $key[id]";

                        $mapel_terpilih = $this->db->query($q)->result_array();
                        $cek = $this->db->query($q)->num_rows();

                        if ($cek > 0) {
                            ?>
                            <ol style="margin-left:140px;" type="1">
                                <?php
                                foreach ($mapel_terpilih as $mapel) : ?>
                                    <li class="p-1"><?= $mapel['nama_mapel'] ?></li>
                                <?php endforeach; ?>
                            </ol>
                        <?php
                    } else {
                        echo "<b class='ml-4'>Mata Pelajaran belum ada, Silhkan pilih mapel!</b>";
                    }
                    ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php endforeach; ?>