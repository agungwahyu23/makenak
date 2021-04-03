<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/navbar.php') ?>


  <section id="hero" class="hero-half d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/tentangKamiHeader.png'); ?>)">



    <div class="container">

      <div class="row">

        <div class="col-lg-6 d-flex flex-column justify-content-center">

          <h1 data-aos="fade-up">Mak Enak Jember</h1>

          <h2 data-aos="fade-up" data-aos-delay="400">Produsen roti kering khas Jember</h2>

        </div>

      </div>

    </div>



  </section>



  <main id="main">

    <section id="about-home" class="about-home">



      <div class="container" data-aos="fade-up">

        <div class="row gx-0">



          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">

            <img src="<?= base_url('img/ImageBackGround/tentangKami.png') ?>" class="img-fluid" alt="">

          </div>



          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <div class="content">

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