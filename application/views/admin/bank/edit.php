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
                <div class="page-header-icon"><i data-feather="monitor"></i></div>
                <span>Edit Bank</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post">
            <div class="card mb-4">
              <div class="card-header">Edit Bank</div>
              <div class="card-body">
                <?php foreach ($data as $d) { ?>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Nama Bank</label>
                      <input class="form-control" id="bank" name="bank" type="text" placeholder="Nama Bank" required value="<?= $d['Nama_Bank'] ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Nama Pemilik</label>
                      <input class="form-control" id="name" name="name" type="text" placeholder="Nama Pemilik" required value="<?= $d['Nama_Pemilik'] ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Nomor Rekening</label>
                      <input class="form-control" id="nomor" name="nomor" type="text" placeholder="Nomor Rekening" required value="<?= $d['Nomor_Rekening'] ?>" />
                    </div>
                  </div>
                <?php } ?>
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