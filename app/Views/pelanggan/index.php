<?= $this->extend('templates/index-user'); ?>

<?= $this->section('index'); ?>
<section id="about" class="about">
    <div class="container" data-aos="fade-up">

        <div class="row">
            <div class="col-lg-6 order-1 order-lg-2" data-aos="fade-left" data-aos-delay="100">
                <img src="<?= base_url(); ?>/assets/img/about.jpg" class="img-fluid" alt="">
            </div>
            <div class="col-lg-6 pt-4 pt-lg-0 order-2 order-lg-1 content" data-aos="fade-right" data-aos-delay="100">
                <h3>Tata cara melakukan lelang online.</h3>
                <p>
                    Perhatikan dengan seksama tata cara tersebut!!
                </p>
                <p class="fst-italic">
                    Pilih Kategori dan Jenis Kendaraan!!
                </p>
                <ul>
                    <li><i class="ri-check-double-line"></i>Jelajahi daftar lelang yang sedang berlangsung atau yang akan datang.</li>
                    <li><i class="ri-check-double-line"></i>Tentukan merek, model, dan tahun kendaraan yang sesuai dengan preferensi Anda.</li>
                </ul>
                <p class="fst-italic">
                    Telusuri Daftar Lelang
                </p>
                <ul>
                    <li><i class="ri-check-double-line"></i>Pilih kategori kendaraan yang ingin Anda lelang, misalnya mobil, sepeda motor, atau kendaraan komersial.</li>
                    <li><i class="ri-check-double-line"></i>Perhatikan detail setiap kendaraan yang akan dijual, termasuk foto, deskripsi, dan informasi teknis lainnya.</li>
                </ul>
                <p class="fst-italic">
                    Penawaran Awal
                </p>
                <ul>
                    <li><i class="ri-check-double-line"></i>Tentukan jumlah penawaran awal yang ingin Anda berikan.</li>
                    <li><i class="ri-check-double-line"></i>Beberapa platform lelang mungkin memiliki batasan atau persyaratan tertentu untuk setiap penawaran.</li>
                </ul>
                <p>
                    Jika memiliki pertanyaan, kendala segera konfirmasi ke admin!!
                </p>
            </div>
        </div>

    </div>
</section>
<section class="portfolio">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Lelang</h2>
            <p>Daftar Kendaraan Lelang</p>
        </div>

        <div class="row" data-aos="fade-up" data-aos-delay="100">
            <div class="col-lg-12 d-flex justify-content-center">
                <h3>Kendaraan</h3>
            </div>
        </div>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
            <?php if (empty($lelang)) : ?>
                <p>Tidak ada lelang yang sesuai.</p>
            <?php else : ?>
                <?php foreach ($lelang as $ds) : ?>
                    <?php if ($ds['212369_status'] != 'Selesai' && $ds['212369_status'] != 'Batal') : ?>
                        <div class="col-lg-4 col-md-6 portfolio-item filter-card">
                            <div class="portfolio-wrap">
                                <img src="<?= base_url('assets/foto/' . $ds['212369_gambar']) ?>" class="img-fluid" alt="">
                                <div class="portfolio-info">
                                    <h4><?= $ds['212369_namalelang']; ?></h4>
                                    <p><?= $ds['212369_namakendaraan']; ?></p>
                                    <div class="portfolio-links">
                                        <a href="<?= base_url('assets/foto/' . $ds['212369_gambar']) ?>" data-gallery="portfolioGallery" class="portfolio-lightbox" title="
                                            <B><?= $ds['212369_namakendaraan']; ?></b><br>
                                            Merek, <?= $ds['212369_merek']; ?><br>
                                            Model, <?= $ds['212369_model']; ?><br>
                                            Mulai Harga, <?= $ds['212369_mulaiharga']; ?><br>
                                            Deskripsi, <?= $ds['212369_deskripsi']; ?><br><br>
                                            <a href='/pelanggan/tampil/<?= $ds['212369_idlelang'] ?>' class='btn btn-success'>Lelang</a>">
                                            <i class="bx bx-plus"></i></a>
                                        <a href="/pelanggan/tampil/<?= $ds['212369_idlelang'] ?>" title="Detail Lelang"><i class="bx bx-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endif; ?>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</section>
<?= $this->endSection(); ?>