<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Data Bimbel</h1>
</div>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary"></h6>
        <b>Silakan diubah jika ada kesalahan</b>
    </div>
    <div class="card-body">
        <?php $this->view('message') ?>
        <form action="<?= base_url('admin/bimbel/edit') ?>" method="post" enctype="multipart/form-data">
            <div class="form-group">
                <label for="">Nama Bimbel</label>
                <input value="<?= $bimbel['nama_bimbel'] ?>" type="text" name="nama" class="form-control">
            </div>
            <div class="form-group">
                <label for="">Visi</label>
                <textarea name="visi" id="" class="form-control" cols="30" rows="8"><?= $bimbel['visi'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Misi</label>
                <textarea name="misi" id="" class="form-control" cols="30" rows="8"><?= $bimbel['misi'] ?></textarea>
            </div>
            <div class="form-group">
                <label for="">Foto</label><br>
                <img class='mb-2' src="<?= base_url('assets/img/foto/' . $bimbel['gambar']) ?>" width="50px">
                <input type="hidden" name="old_image" value="<?= $bimbel['gambar'] ?>">
                <input type="file" name="foto" class="form-control-file">
                <p class="text-danger" style="font-style: italic; font-size: 10px">*) kosongi jika tidak ingin diganti</p>
            </div>
            <button type="submit" class="btn btn-info float-right">Edit</button>
        </form>
    </div>
</div>