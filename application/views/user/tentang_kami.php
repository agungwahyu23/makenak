<!DOCTYPE html>

<html lang="en">



<head>

  <?php $this->load->view('user/_partials/head.php') ?>

</head>



<body>



  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>



  <section id="hero" class="hero-half d-flex align-items-center">



    <div class="container">

      <div class="row">

        <div class="col-lg-6 d-flex flex-column justify-content-center">

          <h1 data-aos="fade-up">River Prawn Residence<br>Kaliurang Jember</h1>

          <h2 data-aos="fade-up" data-aos-delay="400">Hunian modern bergaya Eropa pertama di Jember</h2>

        </div>

      </div>

    </div>



  </section>



  <main id="main">

    <section id="about-us" class="about-us">



      <div class="container" data-aos="fade-up">

        <div class="row gx-0">



          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">

            <img src="<?= base_url('img/user/bg-about.jpg') ?>" class="img-fluid" alt="">

          </div>



          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <div class="content">

              <?php foreach ($deskripsi as $d) { ?>

                <h2><?= $d['Nama_Kantor'] ?></h2>

                <p>

                  <?= $d['Deskripsi'] ?>

                </p>

              <?php } ?>

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