<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <h5>Buat Penawaran</h5>
                        <a href="/daftarpenawaran">Kembali</a>

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

                        <?php echo form_open('/daftarpenawaran/store', ['onsubmit' => 'return validateForm();']); ?>
                        <?= csrf_field(); ?>

                        <div class="card card-primary">
                            <div class="card-body">
                                <div class="form-group">
                                    <label>Nama Lelang : <?= $lelang['212369_namalelang']; ?></label>

                                    <input type="hidden" name="idlelang" value="<?= $idlelang; ?>" class="form-control form-control-border border-width-2" readonly>
                                </div>
                                <div class="form-group">
                                    <label>User Penawaran</label>
                                    <select class="form-control form-control-border border-width-2" name="iduser">
                                        <option></option>
                                        <?php foreach ($user as $ds) : ?>
                                            <option value="<?= $ds['212369_iduser']; ?>"><?= $ds['212369_nama']; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                </div>
                                <?php if (!empty($penawaran) && isset($penawaran['212369_jumlahpenawaran'])) : ?>
                                    <div class="form-group col-md-5">
                                        <label>Penawaran Sebelumnya</label>
                                        <input type="text" class="form-control form-control-border border-width-2" value="<?= $penawaran['212369_jumlahpenawaran'] ?>" readonly>
                                    </div>
                                <?php endif; ?>
                                <div class="form-group">
                                    <label>Jumlah Penawaran</label>
                                    <input type="number" name="212369_jumlahpenawaran" class="form-control form-control-border border-width-2" placeholder="Masukkan Penawaran" autofocus>
                                </div>
                                <div class="form-group">
                                    <label for="">Waktu Penawaran Terakhir</label><br>
                                    <label for="">Tanggal Akhir : <?= $lelang['212369_tanggal_akhir']; ?></label><br>
                                    <label for="">Waktu Akhir : <?= $lelang['212369_waktu_akhir']; ?></label>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Penawaran</label>
                                    <?php if (strtotime(date('Y-m-d H:i')) <= strtotime($lelang['212369_tanggal_akhir'] . ' ' . $lelang['212369_waktu_akhir'])) : ?>
                                        <input type="date" name="tanggalpenawaran" class="form-control form-control-border border-width-2" placeholder="Tanggal Penawaran Anda" autofocus>
                                    <?php else : ?>
                                        <input type="date" name="tanggalpenawaran" class="form-control form-control-border border-width-2" placeholder="Tanggal Penawaran Anda" autofocus disabled>
                                        <small>Tanggal Penawaran tidak dapat diinput setelah batas waktu.</small>
                                    <?php endif; ?>
                                </div>

                                <div class="form-group">
                                    <label>Waktu Penawaran</label>
                                    <?php if (strtotime(date('Y-m-d H:i')) <= strtotime($lelang['212369_tanggal_akhir'] . ' ' . $lelang['212369_waktu_akhir'])) : ?>
                                        <input type="time" name="waktupenawaran" class="form-control form-control-border border-width-2" placeholder="Waktu Anda" autofocus>
                                    <?php else : ?>
                                        <input type="time" name="waktupenawaran" class="form-control form-control-border border-width-2" placeholder="Waktu Anda" autofocus disabled>
                                        <small>Waktu Penawaran tidak dapat diinput setelah batas waktu.</small>
                                    <?php endif; ?>
                                </div>
                                <!-- <div class="form-group">
                                    <label>Waktu Penawaran</label>
                                    <input type="time" name="waktupenawaran" class="form-control form-control-border border-width-2" placeholder="Waktu Anda" autofocus>
                                </div>
                                <div class="form-group">
                                    <label>Tanggal Penawaran</label>
                                    <input type="date" name="tanggalpenawaran" class="form-control form-control-border border-width-2" placeholder="Tanggal Penawaran Anda" autofocus>
                                </div> -->
                            </div>
                            <button type="submit" class="btn btn-primary btn-block col-md-4">Tambah</button>
                        </div>
                        <?php echo form_close(); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>