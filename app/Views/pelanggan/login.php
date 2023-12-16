<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Login Wisatawan</title>
  <style>
    .bg-login {
      background: url(../../assets/lelang.jpg);
      width: 100%;
      height: 100vh;
      background-size: cover;
      position: relative;
    }
  </style>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="../../plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
</head>

<body class="bg-login">
  <section class="vh-100">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <form action="/auth/log" method="post">
            <div class="card shadow-2-strong" style="border-radius: 1rem;">
              <div class="card-body p-5 text-center">
                <h3 class="mb-2">Pelayanan<br></h3>
                <h5 class="mb-3">Lelang Online</h5>
                <?php if (!empty(session()->getFlashdata('gagal'))) : ?>
                  <div class="alert alert-warning" role="alert">
                    <?= session()->getFlashdata('gagal'); ?>
                  </div>
                <?php endif; ?>
                <?php if (!empty(session()->getFlashdata('salah'))) : ?>
                  <div class="alert alert-danger" role="alert">
                    <?= session()->getFlashdata('salah'); ?>
                  </div>
                <?php endif; ?>

                <div class="form-outline mb-4">
                  <input type="text" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Nomor Induk Kependudukan" name="212369_nik" />
                </div>
                <div class="form-outline mb-3">
                  <input type="password" id="typeEmailX-2" class="form-control form-control-lg" placeholder="Katasandi" name="212369_katasandi" />
                </div>

                <!-- Checkbox -->

                <a class="form d-flex mb-2" href="/register "><i class="fas fa-user">Belum punya akun?</i></a>

                <button class="btn btn-primary btn-lg btn-block" type="submit">Masuk</button>

                <hr class="my-3">

              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
  </section>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
</body>

</html>