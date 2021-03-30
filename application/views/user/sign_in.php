<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('user/_partials/head.php')?>
</head>

<body>

  <?php $this->load->view('user/_partials/navbar.php')?>

  <main id="main">

  <section id="sign-in" class="sign-in">

    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-5">
          <div class="card shadow-lg border-0 rounded-lg mt-15">
            <div class="card-header justify-content-center">
              <img class="sign-in-logo" src="<?= base_url('img/logo.png')?>" alt="Logo">
            </div>
            <div class="card-body">
              <div class="col">
                <form action="" method="post">
                  <div class="col-md-12"><label class="small mb-1" for="password">Email</label>
                    <input type="email" class="form-control mb-3" name="email" placeholder="Email" required>
                  </div>
                  <div class="col-md-12"><label class="small mb-1" for="password">Password</label>
                      <input class="form-control" id="password" name="password" type="password" placeholder="Password" />
                  </div>
                  <div class="form-group d-flex align-items-center justify-content-between mt-4 mb-0">
                    <button type="submit" class="btn btn-primary">
                      Sign In
                    </button>
                  </div>
                </form>
            </div>
          </div>
          <div class="card-footer text-center">
              <div class="small">Didn’t have an account? <a href="<?= base_url('SignUp')?>">Sign up now</a></div>
          </div>
        </div>
      </div>

      <div class="copyright col-12">
        Copyright &copy; <strong> <span><?= SITE_NAME?></span> </strong>
        <script>
          document.write(new Date().getFullYear());
        </script>
      </div>

    </div>

  </section>

  </main>

  <?php $this->load->view('user/_partials/floating_whatsapp.php')?>

  <?php $this->load->view('user/_partials/js.php')?>

</body>

</html>