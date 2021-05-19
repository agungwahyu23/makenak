<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">
                <div class="sidenav-menu-heading">Dashboard</div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseDashboards" aria-expanded="false" aria-controls="collapseDashboards">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Halaman Utama
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse show" id="collapseDashboards" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                        <a class="nav-link" href="<?= base_url("admin/Dashboard") ?>">Dashboard</a>
                        <a class="nav-link" href="<?= base_url("admin/Transaksi") ?>">Pesanan</a>
                        <a class="nav-link" href="<?= base_url("admin/Transaksi/dikemas") ?>">Dikemas</a>
                        <a class="nav-link" href="<?= base_url("admin/Transaksi/selesai") ?>">Selesai</a>
                        <!-- <a class="nav-link" href="<?= base_url("admin/Transaksi/ditolak") ?>">Ditolak</a> -->
                    </nav>
                </div>

                <div class="sidenav-menu-heading">Laporan</div>
                <a class="nav-link collapsed" href="javascript:void(0);" data-toggle="collapse" data-target="#collapseLaporan" aria-expanded="false" aria-controls="collapseLaporan">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Laporan
                    <div class="sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                </a>
                <div class="collapse show" id="collapseLaporan" data-parent="#accordionSidenav">
                    <nav class="sidenav-menu-nested nav accordion" id="accordionSidenavPages">
                    <a href="<?= base_url('admin/Transaksi/paxel') ?>">Paxel</a>
                    <a href="<?= base_url('admin/Transaksi/platinum') ?>">Platinum</a>
                    <a href="<?= base_url('admin/Transaksi/oneex') ?>">One Express</a>
                    </nav>
                </div>

                <div class="sidenav-menu-heading">Data Mak Enak</div>
                <?php if ($Pengguna['Pekerjaan'] === 'Admin') { ?>
                    <a class="nav-link" href="<?php echo base_url('admin/Admin') ?>">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        Data Admin
                    </a>
                <?php } ?>
                <a class="nav-link" href="<?php echo base_url('admin/Admin/pelanggan') ?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Data Pelanggan
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Produk') ?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Data Produk
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Kategori') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Data Kategori Produk
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Satuan') ?>">
                    <div class="nav-link-icon"><i data-feather="archive"></i></div>
                    Data Satuan Produk
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/rekening') ?>">
                    <div class="nav-link-icon"><i data-feather="credit-card"></i></div>
                    Data Rekening
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Ongkir') ?>">
                    <div class="nav-link-icon"><i data-feather="truck"></i></div>
                    Data Ongkir
                </a>

                <div class="sidenav-menu-heading">Setting Akun</div>
                <a class="nav-link" href="<?php echo base_url('admin/Profile') ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Company Profile
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Profile/uploadVideo') ?>">
                    <div class="nav-link-icon"><i data-feather="upload"></i></div>
                    Upload Video
                </a>
            </div>
        </div>
        <div class="sidenav-footer">
            <div class="sidenav-footer-content">
                <div class="sidenav-footer-subtitle">Logged in as:</div>
                <div class="sidenav-footer-title"><?= $Pengguna['Nama'] ?></div>
            </div>
        </div>
    </nav>
</div>

<script>
/* Loop through all dropdown buttons to toggle between hiding and showing its dropdown content - This allows the user to have multiple dropdowns without any conflict */
var dropdown = document.getElementsByClassName("dropdown-btn");
var i;

for (i = 0; i < dropdown.length; i++) {
  dropdown[i].addEventListener("click", function() {
  this.classList.toggle("active");
  var dropdownContent = this.nextElementSibling;
  if (dropdownContent.style.display === "block") {
  dropdownContent.style.display = "none";
  } else {
  dropdownContent.style.display = "block";
  }
  });
}
</script>

<style>
/* Style the sidenav links and the dropdown button */
.sidenav a, .dropdown-btn {
  padding: 6px 8px 6px 16px;
  text-decoration: none;
  display: block;
  border: none;
  background: none;
  width: 100%;
  text-align: left;
  cursor: pointer;
  outline: 0px dotted !important;
  outline: 0px auto -webkit-focus-ring-color !important;
}

.dropdown-container {
  display: none;
  padding-left: 38px;
}
</style>