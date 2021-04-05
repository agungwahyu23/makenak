<header id="header" class="header fixed-top">
  <div class="container-fluid container-xl d-flex align-items-center justify-content-between">

    <a href="<?= base_url('Beranda') ?>" class="logo d-flex align-items-center">
      <img src="<?= base_url('img/Icon/logo.png') ?>" alt="Logo <?= SITE_NAME ?>">
    </a>

    <nav id="navbar" class="navbar">
      <ul>
        <li><a class="nav-link active" href="<?= base_url('Beranda') ?>">Beranda</a></li>
        <li><a class="nav-link active" href="<?= base_url('Produk') ?>">Produk</a></li>
        <li><a class="nav-link active" href="<?= base_url('TentangKami') ?>">Tentang Kami</a></li>
        <li><a class="nav-link active" href="<?= base_url('TentangKami') ?>">Kontak Kami</a></li>
        <?php if (!$this->session->userdata('idCustomer')) { ?>
          <li><a class="nav-link active" href="<?= base_url('Auth/Daftar') ?>">Daftar</a></li>
          <li><a class="getstarted scrollto" href="<?= base_url('Auth') ?>">Masuk</a></li>
        <?php } else { ?>
          <li><a class="nav-link active" href="<?= base_url('Auth/Akun') ?>"><i class="bi bi-person-circle" style='color:white;font-size:16px'></i></a></li>
          <li><a class="getstarted scrollto" href="<?= base_url('Auth/Keluar') ?>">Keluar</a></li>

        <?php } ?>
        <li><a class="nav-link active" href="<?= base_url('Keranjang') ?>"><i class="bi bi-cart-fill" style='color:white;font-size:16px'></i></a></li>

        <li class="dropdown-search">
          <a onclick="myFunction()"><i class="bi bi-search dropbtn" style='color:white;font-size:16px'></i></a>
          <div id="myDropdown" class="dropdown-content-search">
            <input type="text" placeholder="Search" name="" id="">
            <button type="submit"><i class="bi bi-search"></i></button>
          </div>

          <!-- jadi -->
          <!-- <a onclick="myFunction()"><i class="bi bi-search" style='color:white;font-size:16px'></i></a>
          <div id="myDropdown" class="dropdown-content-search">
            <input type="text" placeholder="Search.." id="myInput">
            <button type="submit"><i class="fa fa-search"></i></button>
          </div> -->

          <!-- <a class="nav-link" onclick="myFunction()" href="#"><i class="bi bi-search" style='color:white;font-size:16px'></i></a>
            <ul class="dropdown-content" id="myDropdown">
              <li><a href="#"><input class="form-control me-2" type="search" placeholder="Search" aria-label="Search"></a></li>
            </ul> -->
        </li>
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