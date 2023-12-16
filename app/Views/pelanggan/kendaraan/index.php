<?= $this->extend('templates/index-user'); ?>

<?= $this->section('index'); ?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Daftar Kendaraan</h2>
            <ol>
                <li><a href="/pelanggan">Beranda</a></li>
                <li>Kendaraan</li>
            </ol>
        </div>
    </div>
</section>
<section class="team">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Daftar Kendaraan</h2>
            <p>Kendaraan Anda</p>
        </div>
        <a href="/pelanggan" class="btn btn-outline-primary">Kembali</a><br><br>
        <div class="row">
            <?php foreach ($kendaraan as $row) : ?>
                <div class="col-md-10 d-flex align-items-stretch">
                    <div class="card" style="width: 18rem;">
                        <div class="card-body">
                            <h5 class="card-title"><?= $row['212369_namakendaraan']; ?></h5>
                            <h6 class="card-subtitle mb-2 text-muted"><?= $row['212369_nama']; ?></h6>
                            <p class="card-text">Harga, Rp. <?= $row['212369_mulaiharga']; ?><br>
                                Merek , <?= $row['212369_merek']; ?><br>
                                Kategori, <?= $row['212369_namakategori']; ?><br>
                            </p>
                            <ul class="list-group list-group-flush">
                                <li class="list-group-item">Deskripsi</li>
                                <li class="list-group-item"><?= $row['212369_deskripsi']; ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>