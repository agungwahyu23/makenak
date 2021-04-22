<div id="layoutSidenav_nav">
    <nav class="sidenav shadow-right sidenav-light">
        <div class="sidenav-menu">
            <div class="nav accordion" id="accordionSidenav">

                <div class="sidenav-menu-heading">Dashboard</div>
                <a class="nav-link" href="<?php echo base_url('admin/Dashboard') ?>">
                    <div class="nav-link-icon"><i data-feather="activity"></i></div>
                    Dashboard
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
                <!-- <a class="nav-link" href="<?php echo base_url('admin/Transaksi/ditolak') ?>">
                    <div class="nav-link-icon"><i data-feather="x-square"></i></div>
                    Ditolak
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