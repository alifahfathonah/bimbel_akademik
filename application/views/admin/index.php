<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Dashboard</h1>
</div>

<div class="row">
    <div class="col-6">
        <div class="card bg-primary text-white shadow">
            <div class="card-body">
                Selamat Datang di Aplikasi Bimbel Akademik <b><?= $this->fungsi->user_login()->nama; ?></b>
                <div class="text-white-50 small">Anda <b><?= $this->fungsi->user_login()->level; ?></b> mempunyai hak akses penuh pada aplikasi ini</div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <!-- Earnings (Monthly) Card Example -->
    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Tentor</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 m-2 ml-0">
                            <?= $tentor ?> Orang
                        </div>
                        <a href="<?= base_url('admin/user') ?>">Selengkapnya <i class="fas fa-arrow-right"></i> </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Siswa</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 m-2 ml-0">
                            <?= $siswa ?> Orang
                        </div>
                        <a href="<?= base_url('admin/pendaftaran') ?>">Selengkapnya <i class="fas fa-arrow-right"></i> </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-xl-3 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Rombel</div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800 m-2 ml-0">
                            <?= $rombel ?> Angkatan
                        </div>
                        <a href="<?= base_url('admin/rombel') ?>">Selengkapnya <i class="fas fa-arrow-right"></i> </a>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>