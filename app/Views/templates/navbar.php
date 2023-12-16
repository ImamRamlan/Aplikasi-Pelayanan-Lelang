 <nav class="main-header navbar navbar-expand-md navbar-light navbar-white">
   <div class="container">
     <a href="/pelanggan" class="navbar-brand">
       <!-- <img src="../../dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> -->
       <span class="brand-text font-weight-light">Pelayanan Lelang Online</span>
     </a>
     <button class="navbar-toggler order-1" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
       <span class="navbar-toggler-icon"></span>
     </button>
     <div class="collapse navbar-collapse order-3" id="navbarCollapse">
       <!-- Left navbar links -->
       <ul class="navbar-nav">
         <li class="nav-item">
           <a href="/pelanggan" class="nav-link">Beranda</a>
         </li>
         <li class="nav-item">
           <a href="/kendaraan" class="nav-link">Kendaraan</a>
         </li>

       </ul>
     </div>
     <ul class="order-1 order-md-3 navbar-nav navbar-no-expand ml-auto">
       <li class="nav-item">
         <a class="nav-link" class="/edit_profil">
           <?= session()->get('nama'); ?>
         </a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="/auth/logout" onclick="return confirm ('apakah anda yakin?');">
           <i class="fas fa-sign-out-alt"></i>
         </a>
       </li>
     </ul>
   </div>
 </nav>




 </div>