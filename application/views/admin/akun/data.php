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
                <span>Edit Akun Anda</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="<?= base_url('admin/User_Profile/post') ?>" method="post">
            <div class="card mb-4">
              <div class="card-header">Edit Akun Admin</div>
              <div class="card-body">
                <div class="col">
                  <?php echo $this->session->flashdata('pesan') ?>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Nama Admin</label>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Nama Admin" required value="<?= $Pengguna['Nama']?>" />
                  </div>
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Alamat Rumah</label>
                    <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Alamat Rumah" required value="<?= $Pengguna['Alamat'] ?>" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Nomor Hp</label>
                    <input class="form-control" id="no_hp" name="no_hp" type="number" placeholder="Nomor Hp" required value="<?= $Pengguna['No_Hp'] ?>" />
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