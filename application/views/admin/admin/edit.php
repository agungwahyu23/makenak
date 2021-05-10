<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>

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
                <div class="page-header-icon"><i data-feather="users"></i></div>
                <span>Edit Admin</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post">
            <div class="card mb-4">
              <div class="card-header">Edit Admin</div>
              <?php foreach ($data as $d) { ?>
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Nama Lengkap</label>
                      <input class="form-control" id="name" name="name" type="text" placeholder="Nama Admin" required value="<?= $d['Nama'] ?>" disabled/>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Status Pengguna</label>
                      <?= form_error('kategoriProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                      <select class="form-control" name="isValid">
                        <option value="">--- Pilih ---</option>
                        <option value="1">Aktif</option>
                        <option value="0">Non Aktif</option>
                      </select>
                    </div>
                  </div>
                </div>
              <?php } ?>
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