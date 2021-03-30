<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/navbar.php') ?>

  <!-- <section id="hero" class="hero d-flex align-items-center">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">River Prawn Residence<br>Kaliurang Jember</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Hunian modern bergaya Eropa pertama di Jember</h2>
          <div data-aos="fade-up" data-aos-delay="600">
          </div>
        </div>
      </div>
    </div>

  </section> -->

  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <!-- <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div> -->
    <div class="carousel-inner">
      <div class="carousel-item active">
        <section id="hero" class="hero d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/Union.png'); ?>)">
          <div class="container">
            <div class="row justify-content-center">
              <div class="col-lg-9 d-flex flex-column text-center">
                <h1 data-aos="fade-up">Mak Enak</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Oleh - oleh Khas Jember. Berbagai varian kue kering dan frozen food
                  kami hadirkan untuk anda sebagai sajian hari istimewa dan
                  camilan untuk menemani hari anda.</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <!-- <div class="carousel-item">
        <section id="hero" class="hero d-flex align-items-center" style="background-image: url(<?= base_url('img/assets_images/Slider/Slide2.jpeg'); ?>)">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">River Prawn Residence 2<br>Kaliurang Jember 2</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Hunian modern bergaya Eropa pertama di Jember 2</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="carousel-item">
        <section id="hero" class="hero d-flex align-items-center" style="background-image: url(<?= base_url('img/assets_images/Slider/Slide3.jpeg'); ?>)">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">River Prawn Residence 3<br>Kaliurang Jember 3</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Hunian modern bergaya Eropa pertama di Jember 3</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                </div>
              </div>
            </div>
          </div>
        </section>
      </div> -->
    </div>
    <!-- <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button> -->
  </div>

  <main id="main">

    <section id="about-home" class="about-home">

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-8 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <a href="<?= base_url('img/user/dummy-video.mp4') ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">
              <video playsinline="playsinline" id="video-content" name="video-content" muted autoplay="autoplay" loop="loop">
                <source src="<?= base_url('img/user/dummy-video.mp4') ?>" type="video/mp4">
              </video>
            </a>
          </div>

          <div class="col-lg-4 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

            <div class="content">

              <h3>Who We Are</h3>
              <h2>Mak Enak Jember</h2>
              <p>
                Mak Enak Jember merupakan produsen kue kering khas Jember yang berdiri sejak tahun 2015.
                Mak Enak Jember memiliki outlet di Jalan Letjen S Parman X/21 Jember dan gudang yang
                berada di Jalan Letjen Sutoyo 115 Jember. Berawal dari 1 varian kue yaitu kue kacang,
                Mak Enak Jember kini .....
              </p>
              <div class="text-center text-lg-start">
                <a href="<?= base_url('TentangKami') ?>" class="btn-read-more d-inline-flex align-items-center justify-content-center align-self-center">
                  <span>Selengkapnya</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

        </div>
      </div>

    </section>

    <!-- <section id="service" class="service">

      <div class="container" data-aos="fade-up">

        <div class="section-header">
          <h2>Produk</h2>
          <p>Produk Kami</p>
        </div>

        <div class="row">

          <div class="service-click col-lg-4">
            <a href="<?= base_url('Perumahan') ?>">
              <div class="box" data-aos="fade-up" data-aos-delay="200">
                <img src="<?= base_url('img/user/il-residence.png') ?>" class="img-fluid" alt="">
                <h3>Perumahan</h3>
                <p>Perumahan modern dan bergaya Eropa pertama di Jember yang dikembangkan oleh developer berpengalaman persembahan PT. ...</p>
              </div>
            </a>
          </div>

          <div class="service-click col-lg-4 mt-4 mt-lg-0">
            <a href="<?= base_url('DesainRumah') ?>">
              <div class="box" data-aos="fade-up" data-aos-delay="400">
                <img src="<?= base_url('img/user/il-house-design.png') ?>" class="img-fluid" alt="">
                <h3>Desain Rumah</h3>
                <p>Menyediakan jasa desain rumah yang profesional dengan berbagai gaya seperti, rumah modern, rumah klasik, rumah tropis, dan rumah minimalis.</p>
              </div>
            </a>
          </div>

          <div class="service-click col-lg-4 mt-4 mt-lg-0">
            <a href="<?= base_url('DesainInterior') ?>">
              <div class="box" data-aos="fade-up" data-aos-delay="600">
                <img src="<?= base_url('img/user/il-interior-design.png') ?>" class="img-fluid" alt="">
                <h3>Desain Interior</h3>
                <p>Kami juga menyediakan jasa desain interior seperti ruang tamu, ruang keluarga, kitchen set, dan lemari custom.</p>
              </div>
            </a>
          </div>

        </div>

      </div>

    </section> -->

    <section id="type" class="type">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Produk</h2>
          <p>Produk Kami</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">
          <?php foreach ($produkBeranda as $data) { ?>
            <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="200">
              <div class="box">
                <img src="<?= base_url('img/Produk/' . $data['gambar']) ?>" class="img-fluid" alt="">
                <div class="house-type"><span><?= $data['namaProduk']?></span></div>
                <ul>
                  <li>Rp <?= number_format($data['harga'], 2, ",", ".") ?></li>
                </ul>
                <a href="<?= base_url('Produk/DetailProduk/') . $data['id'] ?>" class="btn-choose">Detail</a>
              </div>
            </div>
          <?php } ?>

        </div>

      </div>

    </section>

    <section id="partner" class="partner">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Partner</h2>
          <p>Temukan Kami Di Marketplace</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">
          <div class="col-lg-3 col-md-3 align-items-center">
            <div><img src="<?= base_url('img/ImagePartner/Tokped.png') ?>" class="img-fluid" alt=""></div>
          </div>
        </div>
        <div class="row gy-4" data-aos="fade-left">
          <div class="col-lg-3 col-md-3 align-items-center">
            <div><img src="<?= base_url('img/ImagePartner/Tokped.png') ?>" class="img-fluid" alt=""></div>
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