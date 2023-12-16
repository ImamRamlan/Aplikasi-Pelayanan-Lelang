<?= $this->extend('templates/index-user'); ?>

<?= $this->section('index'); ?>
<section class="breadcrumbs">
    <div class="container">
        <div class="d-flex justify-content-between align-items-center">
            <h2>Daftar Penawaran</h2>
            <ol>
                <li><a href="/festival_user">Beranda</a></li>
                <li>Penawaran</li>
            </ol>
        </div>
    </div>
</section>
<section class="team">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Daftar Penawaran</h2>
            <p>Penawaran Lelang Kendaraan</p>
            <span class="info-box-text text-center text-muted"><i class="fas fa-tag"> Harga Awal Lelang : </i></span>
            <span data-purecounter-start="0" data-purecounter-end="<?= $lelang['212369_harga']; ?>" data-purecounter-duration="4" class="purecounter"></span><br>
            <?php if (!empty($pemenang)) : ?>
                <i class="bi bi-award"></i><strong>Pemenang </strong> <?= $pemenang['212369_nama']; ?>
            <?php else : ?>
                <i class="bi bi-award"></i><strong> Belum Pemenang </strong>
            <?php endif; ?>
        </div>
        <a href="/pelanggan" class="btn btn-outline-primary">Kembali</a>
        <a href="/pelanggan/buat/<?= $lelang['212369_idlelang'] ?>" class="btn btn-outline-success">Tambah Penawaran</a>
        <br>
        <br>
        <?php if (session()->getFlashdata('pesan')) : ?>
            <div class="alert alert-success alert-dismissible col-md-5">
                <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan'); ?></h5>
            </div>
        <?php endif; ?>

        <?php if (session()->getFlashdata('hapus')) : ?>
            <div class="alert alert-danger alert-dismissible col-md-5">
                <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('hapus'); ?></h5>
            </div>
        <?php endif; ?>
        <div class="row">
            <?php if (!empty($lelang) && !empty($penawaran)) : ?>
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
            <?php else : ?>
                <p><strong>Tidak ada data penawaran untuk lelang ini.</strong></p>
            <?php endif; ?>
        </div>

    </div>
</section>
<?= $this->endSection(); ?>