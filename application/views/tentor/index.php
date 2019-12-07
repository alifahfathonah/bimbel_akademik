<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard

    </h1>
</div>

<img src="<?= base_url('assets/img/foto/' . $bimbel['gambar']) ?>" width="1000px" height="300px" alt="">

<div class="row mt-3">
    <div class="col-11">
        <div class="card bg-primary text-white shadow">
            <div class="card-body">
                <h2 class="text-center"> Selamat Datang di Aplikasi <?= $bimbel['nama_bimbel'] ?></h2>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-11">
        <div class="card bg-info text-white shadow">
            <div class="card-body">
                <h2>MISI</h2>
                <?= $bimbel['misi'] ?>
                <br><br>
                <h2>VISI</h2>
                <?= $bimbel['visi'] ?>
            </div>
        </div>
    </div>
</div>