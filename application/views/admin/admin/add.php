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
                <div class="page-header-icon"><i data-feather="users"></i></div>
                <span>Tambah Admin</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post">
            <div class="card mb-4">
              <div class="card-header">Tambah Admin</div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Nama Lengkap</label>
                    <?= form_error('name', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="name" name="name" type="text" placeholder="Nama Admin"  />
                  </div>
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Email </label>
                    <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="email" name="email" type="text" placeholder="Email Admin"  />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Password </label>
                    <?= form_error('password', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="password" name="password" type="password" placeholder="Password Admin"  />
                  </div>
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Bagian</label>
                    <?= form_error('pekerjaan', '<small class="text-danger pl-2">', '</small>'); ?>
                    <select class="form-control" name="pekerjaan">
                      <option value="">--PILIH BAGIAN--</option>
                      <option value="Admin">Admin</option>
                      <option value="Karyawan">Karyawan</option>

                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Alamat Rumah</label>
                    <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="alamat" name="alamat" type="text" placeholder="Alamat Rumah"  />
                  </div>
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Nomor Hp</label>
                    <?= form_error('no_hp', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" id="no_hp" name="no_hp" type="text" placeholder="Nomor Hp"  />
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