<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data User</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data User</a></li>
              <li class="breadcrumb-item active">Detail Data User</li>
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
        <div class="col-md">
          <div class="card ">
            <div class="card-body">
            <h5>Detail Data User</h5>
            <a href="/dataUser/index">Kembali</a>
            <form>
                <?=csrf_field();?>
                <div class="card card-primary">
                <div class="card-body">
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nama User</label>
                    <div class="col-sm">
                      <input type="text" class="form-control" disabled placeholder="<?= $datauser['212369_nama']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Nomor Induk Kependudukan</label>
                    <div class="col-sm">
                      <input type="text" class="form-control" disabled placeholder="<?= $datauser['212369_nik']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Kata Sandi</label>
                    <div class="col-sm">
                      <input type="text" class="form-control" disabled placeholder="<?= $datauser['212369_katasandi']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Alamat</label>
                    <div class="col-sm">
                      <input type="text" class="form-control" disabled placeholder="<?= $datauser['212369_alamat']; ?>">
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="inputEmail3" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                    <div class="col-sm">
                      <input type="text" class="form-control" disabled placeholder="<?= $datauser['212369_jeniskelamin']; ?>">
                    </div>
                  </div>
                </div>                    
                </div>
            </form>
              
            </div>
          </div>
        </div>
    </div>
      </div>
    </section>

<?= $this->endSection(); ?>