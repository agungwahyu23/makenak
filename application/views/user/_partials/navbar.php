<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="<?= base_url('Beranda') ?>" class="logo d-flex align-items-center">
      <img src="<?= base_url('img/Icon/logo1.png') ?>" alt="Logo <?= SITE_NAME ?>">
    </a>

    <nav id="navbar" class="navbar">
      <ul>
      <li><a class="nav-link active" href="<?= base_url('Beranda') ?>">Beranda</a></li>
        <li><a class="nav-link active" href="<?= base_url('Produk') ?>">Produk</a></li>
        <li><a class="nav-link active" href="<?= base_url('TentangKami') ?>">Tentang Kami</a></li>
        <li><a class="nav-link active" href="<?= base_url('KontakKami') ?>">Kontak Kami</a></li>


        <?php if (!$this->session->userdata('idCustomer')) { ?>
          <li><a class="nav-link active" href="<?= base_url('Auth') ?>"><i class="bi bi-cart-fill" style='font-size:16px'></i></a></li>
          <li><a class="getstarted scrollto" href="<?= base_url('Auth') ?>">Masuk</a></li>
        <?php } else { ?>
          <li><a class="nav-link active" href="<?= base_url('Dashboard/keranjang') ?>"><i class="bi bi-cart-fill" style='font-size:16px'></i></a></li>
          <li><a class="nav-link active" href="<?= base_url('Auth/Akun') ?>"><i class="bi bi-person-circle" style='font-size:16px'></i></a></li>
          <li><a class="getstarted scrollto" href="<?= base_url('Auth/Keluar') ?>">Keluar</a></li>

        <?php } ?>
      </ul>
      <i class="bi bi-list mobile-nav-toggle"></i>
    </nav>

  </div>
</header>

<script>
  function myFunction() {
    document.getElementById("myDropdown").classList.toggle("show");
  }

  // Close the dropdown if the user clicks outside of it
  window.onclick = function(event) {
    if (!event.target.matches('.dropbtn')) {
      var dropdowns = document.getElementsByClassName("dropdown-content-search");
      var i;
      for (i = 0; i < dropdowns.length; i++) {
        var openDropdown = dropdowns[i];
        if (openDropdown.classList.contains('show')) {
          openDropdown.classList.remove('show');
        }
      }
    }
  }
</script>