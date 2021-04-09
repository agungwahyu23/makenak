<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>
<?php $this->load->view("admin/_partials/modal/save.php") ?>

<body class="nav-fixed">

  <!-- Topbar -->
  <?php $this->load->view("admin/_partials/topbar.php") ?>

  <div id="layoutSidenav">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="layoutSidenav_content">
      <main>
        <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
          <div class="container-fluid">
            <div class="page-header-content">
              <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="user"></i></div>
                <span>Ganti Password</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post">
            <div class="card mb-4">
              <div class="card-header">Ganti Password</div>
              <div class="card-body">
                <div class="col">
                  <?php echo $this->session->flashdata('pesan') ?>
                </div>
                <div class="row">
                <div class="form-group col-lg-12 col-sm-12">
                    <label>Password Sekarang</label>
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="no_hp" name="password" type="password" placeholder="Password Sekarang" required/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Password baru</label>
                    <?= form_error('passwordBaru', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="no_hp" name="passwordBaru" type="password" placeholder="Password Baru" required/>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Konfirmasi Password baru</label>
                    <?= form_error('konfirmasiPassword', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="no_hp" name="konfirmasiPassword" type="password" placeholder="Konfirmasi Password Baru" required/>
                  </div>
                </div>
              </div>
            </div>
            <button name="save" id="save" type="submit" class="btn btn-primary mr-2" href="#">
              Simpan
            </button>
            <a class="btn btn-danger" href="javascript:history.go(-1)">
              Batal
            </a>
          </form>
        </div>
      </main>

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
  </div>

  <!-- JS -->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>

</html>