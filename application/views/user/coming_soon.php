<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/navbar.php') ?>

  <main id="main">

    <section id="error-page" class="error-page mt-5">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Coming Soon</h2>
          <p>Fitur Terbaru Kami Dalam Tahap Pengerjaan</p>
        </header>

        <div class="row">
          <img src="<?= base_url('img/user/il-coming-soon.svg') ?>" class="img-error" alt="">
        </div>

      </div>

    </section>

  </main>

  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

  <?php $this->load->view('user/_partials/js.php') ?>

</body>

</html>