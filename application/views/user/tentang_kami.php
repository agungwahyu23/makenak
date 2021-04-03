<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/navbar.php') ?>


<<<<<<< Updated upstream
  <section id="hero" class="hero-half d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/tentangKamiHeader.png'); ?>)">



    <div class="container">

      <div class="row">

        <div class="col-lg-6 d-flex flex-column justify-content-center">

          <h1 data-aos="fade-up">Mak Enak Jember</h1>

          <h2 data-aos="fade-up" data-aos-delay="400">Produsen roti kering khas Jember</h2>

=======
  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>



  <section id="hero" class="hero-half d-flex align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-12 d-flex flex-column text-center">
          <h1 data-aos="fade-up">Tentang Mak Enak Jember</h1>
          <h5 data-aos="fade-up" data-aos-delay="400">Memiliki pengalaman lebih dari 5 tahun di industri kue kering, Mak Enak Jember menjadi produsen kue kering khas Jember dengan jaringan distribusi di berbagai Provinsi</h5>
>>>>>>> Stashed changes
        </div>
      </div>
    </div>
  </section>

  <main id="main">
<<<<<<< Updated upstream

    <section id="about-home" class="about-home">



=======
    <section id="about-us" class="about-us">
>>>>>>> Stashed changes
      <div class="container" data-aos="fade-up">
        <div class="row gx-0">
<<<<<<< Updated upstream

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Kontak Kami</p>
        </header>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">

            <img src="<?= base_url('img/ImageBackGround/tentangKami.png') ?>" class="img-fluid" alt="">

=======
          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?= base_url('img/user/bg_about.jpg') ?>" width="600px" class="img-fluid" alt="">
>>>>>>> Stashed changes
          </div>
          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
<<<<<<< Updated upstream

              <h3>Who We Are</h3>
              <h2>Mak Enak Jember</h2>
              <p>
                Mak Enak Jember merupakan produsen kue kering khas Jember yang berdiri sejak tahun 2015.
                Mak Enak Jember memiliki outlet di Jalan Letjen S Parman X/21 Jember dan gudang yang
                berada di Jalan Letjen Sutoyo 115 Jember. Berawal dari 1 varian kue yaitu kue kacang,
                Mak Enak Jember kini memiliki 40 lebih varian kue kering.
                Dengan menggunakan bahan yang halal dan berkualitas, produk Mak Enak memiliki cita rasa
                kekinian yang nikmat. Seiring dengan pengembangan zaman dan permintaan pasar akan
                jaminan keamanan produk pangan, Mak Enak Jember telah menjalankan Sistem
                Manajemen Keamanan Pangan yakni Sertifikat PIRT NO : 0219993918391.
              </p>
=======
              <?php foreach ($deskripsi as $d) { ?>
                <h2><?= $d['Nama_Kantor'] ?></h2>
                <p>
                  <?= $d['Deskripsi'] ?>
                </p>
              <?php } ?>
>>>>>>> Stashed changes
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