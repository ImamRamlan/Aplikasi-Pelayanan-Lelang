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
              <li class="breadcrumb-item active">Buat Data User</li>
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
            <h5>Buat Data User</h5>
            <a href="/kategori">Kembali</a>
          <?php if(session()->getFlashdata('errors')) : ?>
              <div class="card-body col-md-5">
                <div class="alert alert-danger alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h5><i class="icon fas fa-ban"></i>Data User</h5>
                  <?= session()->getFlashdata('errors'); ?>
                </div>
              </div>
            <?php endif; ?>
            <form action="/kategori/save" method="post">
                <?=csrf_field();?>
                <div class="card card-primary">
                    <div class="card-body">
                    <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text"name="212369_nama" class="form-control form-control-border border-width-2 col-md-10" placeholder="Masukkan Nama User" autofocus>
                        </div>
                      </div>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block col-md-4">Tambah</button>
                </div>
            </form>
              
            </div>
          </div>
        </div>
    </div>
      </div>
    </section>

<?= $this->endSection(); ?>