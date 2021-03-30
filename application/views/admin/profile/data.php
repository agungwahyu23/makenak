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
                <div class="page-header-icon"><i data-feather="user"></i></div>
                <span>Company Profile</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Profile Company</div>
              <?php foreach ($data as $k) { ?>
                <div class="card-body">
                  <div class="col">
                    <?php echo $this->session->flashdata('pesan') ?>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Nama Kantor</label>
                      <input class="form-control" id="nama" name="nama" type="text" placeholder="Nama Kantor" value="<?= $k['Nama_Kantor'] ?>" />
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Alamat</label>
                      <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Alamat" value="<?= $k['Alamat_Kantor'] ?>" />
                    </div>
                  </div>
                  <div class="row">

                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Nomor Telepon</label>
                      <input class="form-control" id="no_telp" name="no_telp" type="text" placeholder="Nomor Telepon" value="<?= $k['No_Telp'] ?>" />
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Nomor Telepon 2</label>
                      <input class="form-control" id="no_telp2" name="no_telp2" type="text" placeholder="Nomor Telepon" value="<?= $k['No_Telp2'] ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Email</label>
                      <input class="form-control" id="email" name="email" type="text" placeholder="Email" value="<?= $k['Email'] ?>" />
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Instagram</label>
                      <input class="form-control" id="ig" name="ig" type="text" placeholder="Instagram" value="<?= $k['Instagram'] ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Deskripsi</label>
                      <textarea class="form-control" id="deskripsi" name="deskripsi" type="text" placeholder="Deskripsi">
                        <?= $k['Deskripsi'] ?>
                      </textarea>
                    </div>
                  </div>
                </div>
              <?php } ?>
            </div>

            <button name="save" id="save" type="submit" class="btn btn-primary mr-2" href="#" data-toggle="modal" data-target="#modalSave">
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
<script>
  CKEDITOR.replace('deskripsi');
</script>

</html>