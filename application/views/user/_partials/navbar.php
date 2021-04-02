<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="<?= base_url('Beranda') ?>" class="logo d-flex align-items-center">
      <img src="<?= base_url('img/Icon/logo.png') ?>" alt="Logo <?= SITE_NAME ?>">
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link active" href="<?= base_url('Beranda') ?>">Beranda</a></li>
        <li class="dropdown active"><a><span class="active">Produk</span> <i class="bi bi-chevron-down active"></i></a>
          <ul>
            <li><a href="#">Kue Kering</a></li>
            <li><a href="#">Forzen Food</a></li>
          </ul>
        </li>
        <li><a class="nav-link active" href="<?= base_url('TentangKami') ?>">Tentang Kami</a></li>
        <li><a class="nav-link active" href="<?= base_url('TentangKami') ?>">Kontak Kami</a></li>
        <li class="dropdown active"><a><span class="active">Transaksi</span> <i class="bi bi-chevron-down active"></i></a>
          <ul>
            <li><a href="#">Dikemas</a></li>
            <li><a href="#">Dikirim</a></li>
            <li><a href="#">Selesai</a></li>
          </ul>
        </li>
        <li><a class="nav-link active" href="<?= base_url('Auth/Daftar') ?>">Daftar</a></li>
        <li><a class="nav-link active" href="<?= base_url('Auth') ?>">Masuk</a></li>
        <li><a class="nav-link active" href="<?= base_url('Keranjang') ?>"><i class="bi bi-cart-fill" style='color:white;font-size:16px'></i></a></li>
        <!-- <li><a class="getstarted scrollto" href="<?= base_url('SignIn') ?>">Sign In</a></li> -->
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

  </div>
</header>