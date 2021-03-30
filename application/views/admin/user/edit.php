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
                <div class="page-header-icon"><i data-feather="monitor"></i></div>
                <span>Edit User</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post">
            <div class="card mb-4">
              <div class="card-header">Edit User</div>
              <?php foreach ($data as $d) { ?>
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Nama User</label>
                      <input class="form-control" id="name" name="name" type="text" placeholder="Nama User" required value="<?= $d['Nama'] ?>" />
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Email User</label>
                      <input class="form-control" id="email" name="email" type="text" placeholder="Email User" required value="<?= $d['Email'] ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Password User</label>
                      <input class="form-control" id="password" name="password" type="password" placeholder="Password User" />
                      <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Pekerjaan</label>
                      <input class="form-control" id="pekerjaan" name="pekerjaan" type="text" placeholder="Pekerjaan" required value="<?= $d['Pekerjaan'] ?>" />
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Alamat Rumah</label>
                      <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Alamat Rumah" required value="<?= $d['Alamat'] ?>" />
                    </div>
                    <div class="form-group col-lg-6 col-sm-12">
                      <label>Nomor Hp</label>
                      <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="Nomor Hp" required value="<?= $d['No_Hp'] ?>" />
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