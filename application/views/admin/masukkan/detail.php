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
                <div class="page-header-icon"><i data-feather="message-square"></i></div>
                <span>Detail Masukkan</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Detail Masukkan</div>
              <div class="card-body">
                <?php foreach ($data as $d) { ?>
                  <div class="row">
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Nama User</h3>
                      <p><?= $d['Fullname'] ?></p>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Email</h3>
                      <p><?= $d['Email'] ?></p>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Dibuat Tanggal</h3>
                      <p><?= $d['CreatedDate'] ?></p>
                    </div>

                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <h3>Subject</h3>
                      <p><?= $d['Subject'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <h3>Deskripsi</h3>
                      <p><?= $d['Deskripsi'] ?></p>
                    </div>

                  </div>

                <?php } ?>


              </div>
            </div>

            <a class="btn btn-danger" href="javascript:history.go(-1)">
              Kembali
            </a>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    Apakah Anda Ingin Mengubah Data ?
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="button" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
              </div>
            </div>
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