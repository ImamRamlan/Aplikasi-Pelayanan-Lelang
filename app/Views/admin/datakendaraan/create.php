<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Kendaraan</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data Kendaraan</a></li>
          <li class="breadcrumb-item active">Buat Data Kendaraan</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>

<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card">
          <a href="/dataKendaraan/index">Kembali</a>
          <?php if (session()->getFlashdata('validation')) : ?>
            <div class="card-body">
              <div class="alert alert-danger alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h5><i class="icon fas fa-ban"></i>Data Kendaraan</h5>
                <?= session()->getFlashdata('validation')->listErrors(); ?>
              </div>
            </div>
          <?php endif; ?>
          <form action="/dataKendaraan/store" method="post">
            <?= csrf_field(); ?>
            <div class="card-body">
              <div class="form-group">
                <label>Nama Kendaraan</label>
                <input type="text" name="212369_namakendaraan" class="form-control form-control-border border-width-2" placeholder="Masukkan Nama Kendaraan" autofocus>
              </div>
              <div class="form-group">
                <label>Merek Kendaraan</label>
                <input type="text" name="212369_merek" class="form-control form-control-border border-width-2" placeholder="Merek Kendaraan Anda." autofocus>
              </div>
              <div class="form-group col-md-3">
                <label for="">Kategori Kendaraan</label>
                <select name="212369_idkategori" class="form-control select2bs4">
                  <option value="">--Kategori--</option>
                  <?php foreach ($kategori as $ds) : ?>
                    <option value="<?= $ds['212369_idkategori']; ?>"><?= $ds['212369_namakategori']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Model Kendaraan</label>
                <input type="text" name="212369_model" class="form-control form-control-border border-width-2" placeholder="Model Kendaraan Kendaraan Anda." autofocus>
              </div>
              <div class="form-group">
                <label>No Mesin Kendaraan</label>
                <input type="number" name="212369_no_mesin" class="form-control form-control-border border-width-2" placeholder="Merek Kendaraan Anda." autofocus>
              </div>
              <div class="form-group">
                <label>No Rangka Kendaraan</label>
                <input type="number" name="212369_no_rangka" class="form-control form-control-border border-width-2" placeholder="No Rangka Kendaraan Anda." autofocus>
              </div>
              <div class="form-group">
                <label>Deskripsi</label>
                <div class="form-floating">
                  <textarea class="form-control" placeholder="Tentang Kendaraan Anda" name="212369_deskripsi" id="floatingTextarea2" style="height: 100px"></textarea>
                </div>
              </div>
              <div class="form-group col-md-3">
                <label for="">Penjual</label>
                <select name="212369_iduser_penjual" class="form-control select2bs4">
                  <option value="">--Penjual--</option>
                  <?php foreach ($user as $ds) : ?>
                    <option value="<?= $ds['212369_iduser']; ?>"><?= $ds['212369_nama']; ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
              <div class="form-group">
                <label>Mulai Harga</label>
                <input type="text" name="212369_mulaiharga" class="form-control form-control-border border-width-2" placeholder="Mulai Harga." autofocus>
              </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block col-md-3">Tambah</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</section>

<?= $this->endSection(); ?>