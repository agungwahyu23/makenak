<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/navbar.php') ?>

  <main id="main">

    <section id="sign-in" class="sign-in">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-7">
            <div class="card shadow-lg border-0 rounded-lg">
              <div class="card-header justify-content-center">
                <h5>Daftar dan mulai untuk berbelanja</h5>
              </div>
              <div class="card-body">
                <div class="col">
                  <form class="row g-3" method="POST">
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Nama Lengkap</label>
                      <input type="text" name="nama" class="form-control" id="inputEmail4" placeholder="Masukan Nama Lengkap Anda">
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword4" class="form-label">Email</label>
                      <input type="text" name="email" class="form-control" id="inputPassword4" placeholder="Masukan Email Anda">
                    </div>
                    <div class="col-6">
                      <label for="inputAddress" class="form-label">Nomor Telepon / WhatsApp</label>
                      <input type="number" name="noWa" class="form-control" id="inputAddress" placeholder="08xxxxxx">
                    </div>
                    <div class="col-6">
                      <label for="inputState" class="form-label">Provinsi</label>
                      <select id="inputState" name="provinsi" class="form-select">
                        <option selected>--PILIH--</option>
                        <option>...</option>
                      </select>
                    </div>
                    <div class="col-md-6">
                      <label for="inputEmail4" class="form-label">Password</label>
                      <input type="password" name="password" class="form-control" id="inputEmail4" placeholder="Masukan Password Anda">
                    </div>
                    <div class="col-md-6">
                      <label for="inputPassword4" class="form-label">Konfirmasi Password</label>
                      <input type="password" name="konfirmasiPassword" class="form-control" id="inputPassword4" placeholder="Konfirmasi Password Anda">
                    </div>
                    <div class="col-12">
                      <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                  </form>
                </div>

              </div>
              <div class="card-footer text-center">
                <div class="small"><a href="<?= base_url('Auth') ?>">Belum Punya Akun? Daftar Disini</a></div>
              </div>
            </div>
          </div>

          <div class="copyright col-12">
            Copyright &copy; <strong> <span><?= SITE_NAME ?></span> </strong>
            <script>
              document.write(new Date().getFullYear());
            </script>
          </div>

        </div>
      </div>

    </section>

  </main>

  <!-- <?php $this->load->view('user/_partials/floating_whatsapp.php') ?> -->

  <?php $this->load->view('user/_partials/js.php') ?>

</body>

</html>