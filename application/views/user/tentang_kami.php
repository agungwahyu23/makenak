<!DOCTYPE html>

<html lang="en">



<head>

  <?php $this->load->view('user/_partials/head.php') ?>

</head>



<body>



  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>



  <section id="hero" class="hero-half d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/bg-hero2_c2.jpg'); ?>)">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 d-flex flex-column text-center">
          <h1 data-aos="fade-up">Tentang Mak Enak Jember</h1>
          <h5 data-aos="fade-up" data-aos-delay="400">Memiliki pengalaman lebih dari 5 tahun di industri kue kering, Mak Enak Jember menjadi produsen kue kering khas Jember dengan jaringan distribusi di berbagai Provinsi</h5>
        </div>
      </div>
    </div>
  </section>

  <main id="main">
    <!-- <section id="about-us" class="about-us">
      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?= base_url('img/user/bg_about.jpg') ?>" width="600px" class="img-fluid" alt="">
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
                <h2><?= $tentangKami['Nama_Kantor'] ?></h2>
                <p>
                  <?= $tentangKami['Deskripsi'] ?>
                </p>
            </div>
          </div>
        </div>
      </div>
    </section> -->

    <section id="about-home" class="about-home">
      <div class="container" data-aos="fade-down">
        <header class="section-header">
          <p>Pusat Untuk Ragam Olahan Kue Kering</p>
          <h5>Menemani hari santai anda bersama kerabat dan keluarga </h5>
        </header>

        <div class="row gx-0">
          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <a href="<?= base_url('img/profil1.mp4') ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">
              <video playsinline="playsinline" id="video-content" name="video-content" muted autoplay="autoplay"
                loop="loop">
                <source src="<?= base_url('img/' . $tentangKami['video']) ?>" type="video/mp4">
              </video>
            </a>
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2><?= $tentangKami['Nama_Kantor'] ?></h2>
              <p>
              <?= $tentangKami['Deskripsi'] ?>
              </p>
            </div>
          </div>
        </div>
      </div>
    </section>
    </main>

  <?php $this->load->view('user/_partials/footer.php') ?>
  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>
  <?php $this->load->view('user/_partials/js.php') ?>

</body>
</html>