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
                <span>Detail Admin</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Detail Admin</div>
              <div class="card-body">
                <?php foreach ($data as $d) { ?>
                  <div class="row">
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Nama User</h3>
                      <p><?= $d['Nama'] ?></p>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Email</h3>
                      <p><?= $d['Email'] ?></p>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Pekerjaan</h3>
                      <p><?= $d['Pekerjaan'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-4 col-sm-4">
                      <h3>Alamat</h3>
                      <p><?= $d['Alamat'] ?></p>
                    </div>
                    <div class="form-group col-lg-4 col-sm-4">
                      <h3>No_Hp</h3>
                      <p><?= $d['No_Hp'] ?></p>
                    </div>
                    <div class="form-group col-lg-4 col-sm-4">
                      <h3>Bergabung Tanggal</h3>
                      <p><?= $d['CreatedDate'] ?></p>
                    </div>
                  </div>
                <?php } ?>


              </div>
            </div>
            <a class="btn btn-danger" href="javascript:history.go(-1)">
              Kembali
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