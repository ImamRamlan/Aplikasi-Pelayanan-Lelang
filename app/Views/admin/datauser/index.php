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
                    <li class="breadcrumb-item"><a href="#">Beranda Utama</a></li>
                    <li class="breadcrumb-item active">Data User</li>
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
                        <h5>List Data User</h5>
                        <a href="/dataUser/create" class="btn btn-success mt-3"><i class="fas fa-plus-square"></i> </a>
                        <a href="/dataUser/exportpdf" class="btn btn-warning mt-3"><i class="fas fa-print"> CETAK</i> </a>
                        <br><br>
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
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Nama User</th>
                                    <th scope="col">Nik</th>
                                    <th scope="col">Kata Sandi</th>
                                    <th scope="col">Alamat</th>
                                    <th colspan="3" class="text-center">Aksi</th>
                                </tr>
                            </thead>
                            <?php $i = 1 + (5 * ($currentPage - 1)); ?>
                            <?php foreach ($datauser as $ds) : ?>
                                <tr>
                                    <th scope="row"><?= $i++; ?></th>
                                    <td><?= $ds['212369_nama']; ?></td>
                                    <td><?= $ds['212369_nik']; ?></td>
                                    <td><?= $ds['212369_katasandi']; ?></td>
                                    <td><?= $ds['212369_jeniskelamin']; ?></td>
                                    <td class="text-center">
                                        <a href="/datauser/detail/<?= $ds['212369_iduser'] ?>" class="btn btn-primary"><i class="fas fa-info"></i></a>
                                        <a href="/datauser/edit/<?= $ds['212369_iduser'] ?>" class="btn btn-success"><i class="fas fa-edit"></i></a>
                                        <a href="/datauser/delete/<?= $ds['212369_iduser'] ?>" class="btn btn-danger" onclick="return confirm ('apakah anda yakin?');"><i class="fas fa-trash"></i></a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                            </tbody>
                        </table>
                        <br>
                        <?= $pager->links('tbl_user_212369', 'pagination') ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<?= $this->endSection(); ?>
