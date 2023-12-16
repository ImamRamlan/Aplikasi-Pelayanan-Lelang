<?= $this->extend('templates/index'); ?>

<?= $this->section('page-content'); ?>
<div class="content-header">
<div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Data Kategori</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
              <li class="breadcrumb-item active">Data Kategori</li>
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
            <h5>List Kategori</h5>
            <?php if(session()->getFlashdata('pesan')) : ?>
                <div class="alert alert-success alert-dismissible col-md-5">
                  <h5><i class="icon fas fa-check"></i><?= session()->getFlashdata('pesan'); ?></h5>
                </div>
            <?php endif; ?>

            <?php if(session()->getFlashdata('hapus')) : ?>
                <div class="alert alert-danger alert-dismissible col-md-5">
                  <h5><i class="icon fas fa-ban"></i><?= session()->getFlashdata('hapus'); ?></h5>
                </div>
            <?php endif; ?>
            
            <div class="list-group">
                <?php foreach($kategori as $ds) :?>
                <a href="#" class="list-group-item list-group-item-action"><?= $ds['212369_namakategori']; ?></a>
                <?php endforeach; ?>

            </div>
            <br>
            <h5>Form Tambah Kategori Produk</h5>
            <form action="/kategori/save" method="post">
                <?=csrf_field();?>
                <div class="card card-primary">
                    <div class="card-body">
                        <div class="form-group">
                            <label>Nama Kategori</label>
                            <input type="text"name="namakategori" class="form-control form-control-border border-width-2 col-md-10" placeholder="Masukkan Nama User" autofocus>
                            <button type="submit" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i></button>
                        </div>
                    </div>
                </div>
            </form>
              <br>
              
            </div>
          </div>
        </div>
        </div>
      </div>
    </section>

<?= $this->endSection(); ?>