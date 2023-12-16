<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
        <h1 class="m-0">Data Lelang</h1>
      </div><!-- /.col -->
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Data Lelang</a></li>
          <li class="breadcrumb-item active">Buat Data Lelang</li>
        </ol>
      </div><!-- /.col -->
    </div><!-- /.row -->
  </div><!-- /.container-fluid -->
</div>
<!-- /.content-header -->

<!-- Main content -->
<section class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8">
        <div class="card ">
          <div class="card-body">
            <h5>Buat Data Lelang</h5>
            <a href="/datalelang/index">Kembali</a>
            <?php if (session()->getFlashdata('errors')) : ?>
              <div class="card-body col-md-5">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>Data Lelang</h5>
                  <?= session()->getFlashdata('errors'); ?>
                </div>
              </div>
            <?php endif; ?>
            <?php echo form_open_multipart('datalelang/save', array('onsubmit' => 'return validateForm();')); ?>
            <?= csrf_field(); ?>
            <?php if (isset($mulaiHargaKendaraan)) : ?>
              <script>
                function validateForm() {
                  var hargaInput = document.getElementsByName("212369_harga")[0].value;
                  var mulaiHargaKendaraan = <?= json_encode($mulaiHargaKendaraan); ?>;

                  if (parseInt(hargaInput) < parseInt(mulaiHargaKendaraan)) {
                    alert('Harga tidak boleh kurang dari Mulai Harga Kendaraan.');
                    return false;
                  }

                  return true;
                }
              </script>
            <?php endif; ?>
            <div class="card card-primary">
              <div class="card-body">
                <div class="form-group">
                  <label>Nama Lelang</label>
                  <input type="text" name="212369_namalelang" class="form-control form-control-border border-width-2" autofocus required>
                </div>
                <div class="form-group">
                  <label>Waktu Mulai</label>
                  <input type="time" name="212369_waktu_mulai" class="form-control form-control-border border-width-2" autofocus required>
                </div>
                <div class="form-group">
                  <label>Waktu Akhir</label>
                  <input type="time" name="212369_waktu_akhir" class="form-control form-control-border border-width-2" autofocus required>
                </div>
                <div class="form-group">
                  <label>Tanggal Mulai</label>
                  <input type="date" name="212369_tanggal_mulai" class="form-control form-control-border border-width-2" autofocus required>
                </div>
                <div class="form-group">
                  <label>Tanggal Akhir</label>
                  <input type="date" name="212369_tanggal_akhir" class="form-control form-control-border border-width-2" autofocus required>
                </div>
                <div class="form-group">
                  <label for="">Nama Kendaraan</label>
                  <select name="212369_idkendaraan_lelang" class="form-control" onchange="updateHarga()">
                    <option value=""></option>
                    <?php foreach ($kendaraan as $ds) : ?>
                      <option value="<?= $ds['212369_idkendaraan']; ?>" data-harga="<?= $ds['212369_mulaiharga']; ?>"><?= $ds['212369_namakendaraan']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
                <div class="form-group">
                  <label>Harga Awal</label>
                  <input type="number" id="hargaInput" class="form-control" autofocus required disabled>
                </div>
                <div class="form-group">
                  <label>Harga</label>
                  <input type="number" name="212369_harga" id="hargaInput" class="form-control form-control-border border-width-2" autofocus required>
                </div>
                <label for="gambar">Pilih Gambar:</label>
                <input type="file" name="212369_gambar" id="gambar" required class="form-control col-md-5">
                <div class="form-group">
                  <label for="">Status</label>
                  <select name="212369_status" class="form-control col-md-5">
                    <option value=""></option>
                    <option value="Aktif">Aktif</option>
                    <option value="Selesai">Selesai</option>
                    <option value="Batal">Batal</option>
                  </select>
                </div>
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
<script>
  function updateHarga() {
    var selectElement = document.getElementsByName("212369_idkendaraan_lelang")[0];
    var hargaInput = document.getElementById("hargaInput");

    // Dapatkan harga dari data-harga atribut pada opsi yang dipilih
    var selectedOption = selectElement.options[selectElement.selectedIndex];
    var hargaKendaraan = selectedOption.getAttribute("data-harga");

    // Setel nilai input harga sesuai dengan harga kendaraan yang dipilih
    hargaInput.value = hargaKendaraan;
  }
</script>
<?= $this->endSection(); ?>