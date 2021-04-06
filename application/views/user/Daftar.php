<!doctype html>
<html>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1.0, user-scalable=no">
  <title>Hostify</title>
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/bootstrap.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/bootstrap-slider.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/fontawesome-all.min.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/slick.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/style.css') ?>">
  <link rel="stylesheet" type="text/css" href="<?= base_url('css/auth/custom.css') ?>">
</head>

<body class="fullpage">
  <div id="form-section" class="container-fluid signin">
    <div class="row">
      <div class="info-slider-holder">
        <div class="info-holder">
          <h6>Mak Enak Jember</h6>
          <div class="bold-title">Oleh - oleh Khas Jember<br>
            Untuk Menemani <span>Harimu</span></div>
        </div>
      </div>
      <div class="form-holder">
        <div class="menu-holder">
          <ul class="main-links">
            <li><a class="normal-link" href="<?= base_url('Auth/Daftar') ?>">Sudah Punya Akun?</a></li>
            <li><a class="sign-button" href="<?= base_url('Auth/Daftar') ?>">Login</a></li>
          </ul>
        </div>
        <div class="signin-signup-form">
          <div class="form-items">
            <div class="form-title">Daftar dan dapatkan oleh-oleh kesukaanmu</div>
            <form id="signupform">
              <div class="row">
                <div class="col-md-6 form-text">
                  <input type="text" name="nama" placeholder="Nama Lengkap" required />
                </div>
                <div class="col-md-6 form-text">
                  <input type="text" name="email" placeholder="Email" required />
                </div>
              </div>
              <div class="form-text">
                <input type="text" name="username" placeholder="E-mail Address" required />
              </div>
              <div class="form-text">
                <input type="password" name="password" placeholder="Password" required />
              </div>
              <div class="form-text text-holder">
                <span class="text-only">Preferred method of payment.</span>
                <input type="radio" name="pmethod" class="hno-radiobtn" id="rad1" /><label for="rad1">Paypal</label>
                <input type="radio" name="pmethod" class="hno-radiobtn" id="rad2" /><label for="rad2">Credit Card</label>
              </div>
              <div class="form-button">
                <button id="submit" type="submit" class="ybtn ybtn-accent-color">
                  Create new account
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="<?= base_url() ?>js/auth/jquery.min.js"></script>
  <script src="<?= base_url() ?>js/auth/bootstrap.min.js"></script>
  <script src="<?= base_url() ?>js/auth/bootstrap-slider.min.js"></script>
  <script src="<?= base_url() ?>js/auth/slick.min.js"></script>
  <script src="<?= base_url() ?>js/auth/main.js"></script>
</body>

</html>