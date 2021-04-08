<!DOCTYPE html>
<html lang="en">

<head>
	<?php $this->load->view('user/_partials/head.php')?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php')?>

  <main id="main">

  <section id="error-page" class="error-page">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Error 404</h2>
          <p>Halaman Tidak Ditemukan</p>
        </header>

        <div class="row">

          <img src="<?= base_url('img/user/il-not-found.svg')?>" class="img-error" alt="">
              
        </div>

      </div>

    </section>

  </main>

  <?php $this->load->view('user/_partials/floating_whatsapp.php')?>

  <?php $this->load->view('user/_partials/js.php')?>

</body>

</html>