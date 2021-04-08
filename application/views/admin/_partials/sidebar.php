<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-yellow">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Dashboard</div>
                <a class="nav-link" href="<?php echo base_url('admin/Dashboard') ?>">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
                </a>

                <!-- <div class="sidenav-menu-heading">Master Data</div>
                <a class="nav-link" href="<?php echo base_url('admin/User') ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    User
                </a>
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Admin') ?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Admin Data
                </a>
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Blok') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Blok Rumah
                </a>
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Kategori_Interior') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Kategori Desain Interior
                </a>
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Kategori_Rumah') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Kategori Desain Rumah
                </a>
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Partners') ?>">
                    <div class="nav-link-icon"><i data-feather="users"></i></div>
                    Our Partners
                </a> -->
                <div class="sidenav-menu-heading">Data Mak Enak</div>
                <?php if ($Pengguna['Pekerjaan'] === 'Admin') { ?>
                    <a class="nav-link" href="<?php echo base_url('admin/Admin') ?>">
                        <div class="nav-link-icon"><i data-feather="users"></i></div>
                        Data Admin
                    </a>
                <?php } ?>
                <a class="nav-link" href="<?php echo base_url('admin/Produk') ?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Data Produk
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Kategori') ?>">
                    <div class="nav-link-icon"><i data-feather="grid"></i></div>
                    Data Kategori Produk
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/rekening') ?>">
                    <div class="nav-link-icon"><i data-feather="credit-card"></i></div>
                    Data Rekening
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Ongkir') ?>">
                    <div class="nav-link-icon"><i data-feather="truck"></i></div>
                    Data Ongkir
                </a>




                <div class="sidenav-menu-heading">Transaksi</div>
                <a class="nav-link" href="<?php echo base_url('admin/Transaksi') ?>">
                    <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                    Pesanan
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Transaksi/dikemas') ?>">
                    <div class="nav-link-icon"><i data-feather="box"></i></div>
                    Dikemas
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Transaksi/selesai') ?>">
                    <div class="nav-link-icon"><i data-feather="check-square"></i></div>
                    Selesai
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Transaksi/ditolak') ?>">
                    <div class="nav-link-icon"><i data-feather="x-square"></i></div>
                    Ditolak
                </a>
                <!-- <a class="nav-link" href="<?php echo base_url('admin/Interior') ?>">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Desain Interior
                </a>
                <a class="nav-link" href="<?php echo base_url('admin/Desain_Rumah') ?>">
                    <div class="nav-link-icon"><i data-feather="home"></i></div>
                    Desain Rumah
                </a>
                <div class="sidenav-menu-heading">Transaksi</div>
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Transaksi') ?>">
                    <div class="nav-link-icon"><i data-feather="file-text"></i></div>
                    Transaksi Rumah
                </a> -->
                <!-- <a class="nav-link collapsed" href="#">
                    <div class="nav-link-icon"><i data-feather="image"></i></div>
                    Transaksi Desain Rumah
                </a>
                <a class="nav-link collapsed" href="#">
                    <div class="nav-link-icon"><i data-feather="image"></i></div>
                    Transaksi Desain Interior
                </a> -->
                <div class="sidenav-menu-heading">Setting Akun</div>
                <a class="nav-link" href="<?php echo base_url('admin/Profile') ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Company Profile
                </a>
                <!-- <a class="nav-link" href="<?= base_url('admin/Bank') ?>">
                    <div class="nav-link-icon"><i data-feather="dollar-sign"></i></div>
                    Akun Bank
                </a>
                <a class="nav-link collapsed" href="<?php echo base_url('admin/Masukkan') ?>">
                    <div class="nav-link-icon"><i data-feather="message-square"></i></div>
                    Masukkan User
                </a> -->
                <!-- <a class="nav-link collapsed" href="<?php echo base_url('admin/User_Profile') ?>">
                    <div class="nav-link-icon"><i data-feather="user"></i></div>
                    Profile Admin
                </a> -->

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