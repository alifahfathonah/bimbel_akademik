<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Input Nilai</h1>
</div>

<div class="row">
    <div class="col-6">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b>Pilih Rombel</b>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <label for="">Nama Rombel</label>
                    <select name="" id="rombelNilai" class="form-control">
                        <option value="">-- Pilih --</option>
                        <?php foreach ($rombel as $key) : ?>

                            <option value="<?= $key['id'] ?>"><?= $key['nama_rombel'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="col-6" id="viewNilai">

    </div>
</div>