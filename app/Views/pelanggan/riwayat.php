<?= $this->extend('templates/index-user'); ?>

<?= $this->section('index'); ?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Penawaran</h2>
            <ol>
                <li><a href="/pelanggan">Beranda</a></li>
                <li>Riwayat Penawaran</li>
            </ol>
        </div>
    </div>
</section>
<section class="team">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Daftar  Riwayat Penawaran</h2>
            <p>Penawaran Lelang Kendaraan</p>
        </div>
        <div class="row">
            <?php foreach ($penawaran as $row) : ?>
                <div class="col-lg-3 col-md-5 d-flex align-items-stretch">
                    <div class="member" data-aos="fade-up" data-aos-delay="100">
                        <div class="member-img">
                            <img src="<?= base_url('assets/foto/' . $row['212369_gambar']) ?>" class="img-fluid" alt="">
                            <!-- <div class="social">
                                    <a href=""><i class="bi bi-twitter"></i></a>
                                </div> -->
                        </div>
                        <div class="member-info">
                            <h4><?= esc($row['212369_nama']) ?></h4>
                            <h5><i class="fas fa-money-bill"></i> Jumlah Penawaran, <?= esc($row['212369_jumlahpenawaran']) ?></h5>
                            <span><?= esc($row['212369_waktupenawaran']) ?></span>
                            <span><?= esc($row['212369_tanggalpenawaran']) ?></span>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>