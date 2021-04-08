<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
  <title><?= SITE_NAME ?></title>
  <link href="<?= base_url('img/Icon/Logo.png') ?>" rel="icon" type="image/x-icon">
  <link href="<?= base_url('img/Icon/Logo.png') ?>" rel="apple-touch-icon">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/bootstrap-slider.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/fontawesome-all.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/slick.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/custom.css') ?>">
</head>

<body>
  <div id="form-section" class="container-fluid signin align-item-center">
    <div class="row">
    <div class="col">
      <div class="info-slider-holder">
        <div class="info-holder">
          <h6>Mak Enak Jember</h6>
          <div class="bold-title">Oleh - oleh Khas Jember<br>
            Untuk Menemani <span>Harimu</span></div>
        </div>
      </div>
    </div>

    <div class="col">
    <div class="form-holder">
        <div class="menu-holder">
          <ul class="main-links">
            <li><a class="normal-link" href="<?= base_url('Auth/Daftar') ?>">Belum Punya Akun?</a></li>
            <li><a class="sign-button" href="<?= base_url('Auth/Daftar') ?>">Daftar</a></li>
          </ul>
        </div>
        <div class="signin-signup-form">
          <div class="form-items">
            <?php echo $this->session->flashdata('message') ?>
            <div class="form-title">Masuk dan mulai berbelanja</div>
            <form id="signinform" method="POST">
              <div class="form-text">
                <input type="text" name="email" placeholder="Masukan Email Anda" required>
              </div>
              <div class="form-text">
                <input type="password" name="password" placeholder="Masukan Password Anda" required>
              </div>
              <div class="form-button">
                <button id="submit" type="submit" class="ybtn ybtn-accent-color">Masuk</button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>


      
      
    </div>
  </div>

<!-- <section class="signin">
  <div class="row justify-content-center">
    <div class="col-lg-5">
      ilustrasi
    </div>
    <div class="col-lg-7">
      form
    </div>
  </div>
</section> -->

  <script src="<?= base_url() ?>js/auth/jquery.min.js"></script>
  <script src="<?= base_url() ?>js/auth/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>js/auth/bootstrap-slider.min.js"></script>
  <script src="<?= base_url() ?>js/auth/slick.min.js"></script>
  <script src="<?= base_url() ?>js/auth/main.js"></script>
</body>

</html>