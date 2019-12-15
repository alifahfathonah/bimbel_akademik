<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Cek Nilai</h1>
</div>

<div class="row">
    <div class="col-10">
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <h6 class="m-0 font-weight-bold text-primary"></h6>
                <b>Pilih Opsi</b>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <div class="row">
                        <div class="col">
                            <label for="">Rombel</label>
                            <select name="rombel" id="rombelCN" class="form-control">
                                <option value="">-- Pilih --</option>
                                <?php foreach ($cek as $key) : ?>
                                    <option value="<?= $key['id_rombel'] ?>"><?= $key['nama_rombel'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="col">
                            <label for="">Nama Siswa</label>
                            <select name="siswa" id="siswaCN" class="form-control">
                            </select>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="viewSiswa">

</div>

<script>
    var baseUrlTentor = 'http://localhost/bimbel_akademik/tentor/';
    $('#viewSiswa').hide();
    $('#rombelCN').change(function() {
        $.ajax({
            url: baseUrlTentor + 'nilai/select_siswa',
            type: "POST",
            data: {
                rombelId: $("#rombelCN").val()
            },
            dataType: "json",
            success: function(data) {
                var html = '';
                var i;
                if (data.length == 0) {
                    html += "<option>Tidak ada data</option>";
                    console.log('kosong')
                } else {
                    html += "<option value=''>-- Pilih --</option>";
                }
                for (i = 0; i < data.length; i++) {
                    html += "<option value=" + data[i].id_user + ">" + data[i].nama + "</option>";
                }
                $('#siswaCN').html(html);
                $('#viewSiswa').hide();
            }
        });
    })

    $('#siswaCN').change(function() {
        $.ajax({
            url: baseUrlTentor + 'nilai/load_nilai',
            type: "POST",
            data: {
                siswaId: $("#siswaCN").val()
            },
            dataType: "json",
            success: function(response) {
                $('#viewSiswa').show().html(response.html);
                console.log(response.html)
            }
        });
    })
</script>