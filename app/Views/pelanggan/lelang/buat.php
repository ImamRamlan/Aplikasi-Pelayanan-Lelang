<?= $this->extend('templates/index-user'); ?>
<?= $this->section('index'); ?>
<section id="breadcrumbs" class="breadcrumbs">
    <div class="container">

        <div class="d-flex justify-content-between align-items-center">
            <h2>Penawaran</h2>
            <ol>
                <li><a href="index.html">Home</a></li>
                <li>Buat Penawaran</li>
            </ol>
        </div>

    </div>
</section>
<section id="contact" class="contact">
    <div class="container" data-aos="fade-up">
        <div class="section-title">
            <h2>Penawaran</h2>
            <p>Buat Penawaran Lelang</p>
        </div>
        <a href="/pelanggan/tampil/<?= $lelang['212369_idlelang'] ?>" class="btn btn-outline-success col-md-1">Kembali</a>
        <div class="row mt-5">
            <div class="col-lg-4">
                <div class="info">
                    <div class="address">
                        <i class="bi bi-tag"></i>
                        <h4>Lelang</h4>
                        <p><?= $lelang['212369_namalelang']; ?></p>
                    </div>
                    <?php if (!empty($penawaran) && isset($penawaran['212369_jumlahpenawaran'])) : ?>
                        <div class="email">
                            <i class="bi bi-tags-fill"></i>
                            <h4>Penawaran Sebelumnya,</h4>
                            <p><?= $penawaran['212369_jumlahpenawaran'] ?></p>
                        </div>
                    <?php endif; ?>
                    <div class="phone">
                        <i class="bi bi-calendar-check"></i>
                        <h4>Tanggal Akhir</h4>
                        <p> <?= $lelang['212369_tanggal_akhir']; ?></p>
                    </div>
                    <div class="phone">
                        <i class="bi bi-calendar-check-fill"></i>
                        <h4>Waktu Akhir</h4>
                        <p> <?= $lelang['212369_waktu_akhir']; ?></p>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 mt-5 mt-lg-0">
                <?php if (session()->getFlashdata('errors')) : ?>
                    <div class="card-body col-md-5">
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fas fa-ban"></i> Penawaran</h5>
                            <?php
                            $errors = session()->getFlashdata('errors');
                            if (is_array($errors)) {
                                echo implode('<br>', $errors);
                            } else {
                                echo $errors;
                            }
                            ?>
                        </div>
                    </div>
                <?php endif; ?>
                <?php echo form_open('/pelanggan/store', 'class="form"', ['onsubmit' => 'return validateForm();']); ?>
                <?= csrf_field(); ?>
                <input type="hidden" name="idlelang" value="<?= $idlelang; ?>" class="form-control form-control-border border-width-2" readonly>
                <input type="hidden" name="iduser" value="<?= session()->get('iduser'); ?>">
                <div class="form-group mt-3">
                    <label>Jumlah Penawaran</label>
                    <?php if (strtotime(date('Y-m-d H:i')) <= strtotime($lelang['212369_tanggal_akhir'] . ' ' . $lelang['212369_waktu_akhir'])) : ?>
                        <input type="number" name="212369_jumlahpenawaran" class="form-control form-control-border border-width-2" placeholder="Masukkan Penawaran" autofocus required>
                    <?php else : ?>
                        <input type="number" name="212369_jumlahpenawaran" class="form-control form-control-border border-width-2" placeholder="Tidak dapat diinput setelah batas waktu." autofocus required disabled>
                    <?php endif; ?>
                </div>
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label for="">Tanggal Penawaran</label>
                        <?php if (strtotime(date('Y-m-d H:i')) <= strtotime($lelang['212369_tanggal_akhir'] . ' ' . $lelang['212369_waktu_akhir'])) : ?>
                            <input type="date" name="tanggalpenawaran" class="form-control form-control-border border-width-2" placeholder="Tanggal Penawaran Anda" autofocus value="<?= date('Y-m-d'); ?>">
                        <?php else : ?>
                            <input type="date" name="tanggalpenawaran" class="form-control form-control-border border-width-2" placeholder="Tanggal Penawaran Anda" autofocus disabled>
                            <small>Tanggal Penawaran tidak dapat diinput setelah batas waktu.</small>
                        <?php endif; ?>
                    </div>
                    <div class="col-md-6 form-group mt-3 mt-md-0">
                        <label>Waktu Penawaran</label>
                        <?php if (strtotime(date('Y-m-d H:i')) <= strtotime($lelang['212369_tanggal_akhir'] . ' ' . $lelang['212369_waktu_akhir'])) : ?>
                            <input type="time" name="waktupenawaran" class="form-control form-control-border border-width-2" placeholder="Waktu Anda" autofocus value="<?= date('H:i'); ?>">
                        <?php else : ?>
                            <input type="time" name="waktupenawaran" class="form-control form-control-border border-width-2" placeholder="Waktu Anda" autofocus disabled>
                            <small>Waktu Penawaran tidak dapat diinput setelah batas waktu.</small>
                        <?php endif; ?>
                    </div>
                </div><br>
                <div class="text-center">
                    
                    <?php if (strtotime(date('Y-m-d H:i')) <= strtotime($lelang['212369_tanggal_akhir'] . ' ' . $lelang['212369_waktu_akhir'])) : ?>
                        <button type="submit" class="btn btn-outline-primary">Tawar</button>
                    <?php else : ?>
                        <button type="submit" class="btn btn-danger" disabled>Tawar</button><br>
                        <small>Tidak dapat diinput setelah batas waktu.</small>
                    <?php endif; ?>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>
    </div>
</section><!-- End Contact Section -->
<?= $this->endSection(); ?>