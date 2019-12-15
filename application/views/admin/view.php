<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pembayaran SPP</h1>
</div>

<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b>Pencarian</b>
            </div>
            <div class="card-body">
                <label for="">Nama Siswa</label>
                <div class="input-group">
                    <!-- Buat sebuah textbox dan beri id keyword -->
                    <form action="<?= base_url('admin/pembayaran/search') ?>" method="GET">
                        <div class="form-group row">
                            <div class="col-sm-11">
                                <input autocomplete="off" type="text" name="keyword" class="form-control" placeholder="Pencarian nama..." id="keyword">
                                <ul class="dropdown-menu txtnama" style="padding:0px 70px 20px 0px;  margin-left:15px;margin-right:0px;" role="menu" aria-labelledby="dropdownMenu" id="DropdownCountry"></ul>
                            </div>
                            <span class="input-group-btn  col-sm-1">
                                <!-- Buat sebuah tombol search dan beri id btn-search -->
                                <button type="submit" class="btn btn-primary ml-2" type="button" id="btn-search">CARI</button>
                            </span>
                        </div>
                    </form>
                    </span>
                </div>
            </div>
        </div>
    </div>
    <div class="col">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Petunjuk</h4>
            <ol type="1">
                <li>Silahkan isikan nama siswa yang ingin diganti status pembayarannya</li>
                <li>Setelah diisi nanti akan muncul suggest nama siswa lalu klik sesuai nama yang dicari</li>
                <li>Kemudian klik cari dan muncul biodata dan tagihan</li>
                <li>Ganti status SPP dengan klik bayar</li>
                <li>Pastikan sesuai dengan bulan yang dibayar</li>
            </ol>
        </div>
    </div>
</div>

<?php if ($siswa) { ?>
    <div id='view'>
        <div class="col-10">
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary"></h6>
                    <b>Hasil</b>
                </div>
                <div class="card-body">
                    <b>
                        <h4>Biodata</h4>
                    </b>
                    <table id="siswa" class="table">
                        <tr>
                            <td width="150px">Nama Siswa</td>
                            <td width="20px">:</td>
                            <td id="namaSiswa"><b><?= $siswa['nama'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Alamat</td>
                            <td>:</td>
                            <td id="alamatSiswa"><b><?= $siswa['alamat'] ?></b></td>
                        </tr>
                        <tr>
                            <td>Rombel</td>
                            <td>:</td>
                            <td id="rombelSiswa"><b><?= $siswa['nama_rombel'] ?></b></td>
                        </tr>
                    </table>

                    <h3>Tagihan SPP</h3>
                    <table id="spp" class="table table-bordered">
                        <thead>
                            <tr>
                                <th>Bulan</th>
                                <th>Tanggal Bayar</th>
                                <th>Jumlah</th>
                                <th>Keterangan</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="bodyku">
                            <?php $no = 1;
                            foreach ($spp as $key) : ?>
                                <tr>
                                    <td><?= $key['bulan'] ?></td>
                                    <td><?= $key['tgl_bayar'] != null ? tgl_indo($key['tgl_bayar']) : '-' ?></td>
                                    <td><?= $key['jumlah'] ?></td>
                                    <td><?= $key['keterangan'] == null ? ' - ' : $key['keterangan'] ?></td>
                                    <td>
                                        <?php if ($key['keterangan'] == null) { ?>
                                            <a href="<?= base_url('admin/pembayaran/bayar/' . $key['id_bayar']) . "/" . $siswa['nama'] ?>" onclick="return confirm('Apakah yakin uang sudah diterima?')" class="btn btn-success">Bayar</a>
                                        <?php } ?>
                                    </td>
                                </tr>
                            <?php endforeach;
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b>Hasil</b>
            </div>
            <div class="card-body">
                <center>
                    <h4>Maaf Siswa yang anda cari tidak ada/ tidak aktif</h4>
                </center>
            </div>
        </div>
    </div>
<?php } ?>