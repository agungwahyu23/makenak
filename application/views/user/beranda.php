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
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <section id="hero" class="hero d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/bg-slide_c.png'); ?>)">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Mak Enak Jember</h1>
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
      <div class="carousel-item">
        <section id="hero" class="hero d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/bg-hero1_c.JPG'); ?>)">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Aneka Kue Kering</h1>
                <h2 data-aos="fade-up" data-aos-delay="400">Kami hadirkan aneka olahan kue kering khas Jember untuk menemani hari istimewa Anda.</h2>
                <div data-aos="fade-up" data-aos-delay="600">
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>
      <div class="carousel-item">
        <section id="hero" class="hero d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/bg-hero2_c.JPG'); ?>)">
          <div class="container">
            <div class="row">
              <div class="col-lg-6 d-flex flex-column justify-content-center">
                <h1 data-aos="fade-up">Mak Enak Jember</h1>
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

      <div class="container" data-aos="fade-down">

        <header class="section-header">
          <p>Pusat Untuk Ragam Olahan Kue Kering</p>
          <h5>Menemani hari santai anda bersama kerabat dan keluarga </h5>
        </header>

        <div class="row gx-0">

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <a href="<?= base_url('img/user/dummy-video.mp4') ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">
              <video playsinline="playsinline" id="video-content" name="video-content" muted autoplay="autoplay" loop="loop">
                <source src="<?= base_url('img/user/dummy-video.mp4') ?>" type="video/mp4">
              </video>
            </a>
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">

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
            <div class="col-lg-3 col-md-3 col-produk" data-aos="zoom-in" data-aos-delay="200">
              <div class="box">
                <div class="box-header">
                  <img src="<?= base_url('img/Produk/' . $data['gambar']) ?>" class="img-fluid" alt="">
                </div>


                <div class="nama-product"><span><?= $data['namaProduk'] ?></span></div>
                <ul>
                  <li>Rp <?= number_format($data['harga'], 0, ",", ".") ?>/Toples</li>
                </ul>
                <a href="<?= base_url('Produk/DetailProduk/') . $data['id'] ?>" class="btn-detail">Selengkapnya</a>
                <!-- <a href="<?= base_url('Produk/Beli/') . $data['id'] ?>" class="btn-choose">Beli
                  Sekarang</a> -->
              </div>
            </div>
          <?php } ?>
        </div>
        <div class="row mt-4" data-aos="fade-left">
          <div class="d-grid gap-2 col-lg-2 col-md-3 col-sm-3 col-xs-3 mx-auto">
            <a href="<?= base_url('Produk') ?>" class="btn-selengkapnya text-center">Produk Lainnya</a>
          </div>
        </div>
      </div>
    </section>


    <section id="about-home" class="about-home">
      <div class="container" data-aos="fade-up">
        <header class="section-header">
          <h2>P-IRT</h2>
          <p>Memiliki Izin P-IRT</p>
        </header>
        <div class="row gx-0">

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Bersertifikat P-IRT</h2>
              <p>
                Seiring dengan pengembangan zaman dan permintaan pasar akan
                jaminan keamanan produk pangan, Mak Enak Jember telah menjalankan Sistem
                Manajemen Keamanan Pangan yakni Sertifikat PIRT NO : 0219993918391.
              </p>
            </div>
          </div>

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?= base_url('img/user/Intersect.png') ?>" class="img-fluid" alt="">
          </div>

        </div>
      </div>
    </section>

    <!-- <section id="about-home" class="about-home">
      <div class="container" data-aos="fade-up">
        <div class="row gx-0">

          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <img src="<?= base_url('img/user/sertif.png') ?>" class="img-fluid" alt="">
          </div>

          <div class="col-lg-6 d-flex flex-column justify-content-center" data-aos="fade-up" data-aos-delay="200">
            <div class="content">
              <h2>Bersertifikat P-IRT</h2>
              <p>
              Seiring dengan pengembangan zaman dan permintaan pasar akan 
              jaminan keamanan produk pangan, Mak Enak Jember telah menjalankan Sistem 
              Manajemen Keamanan Pangan yakni Sertifikat PIRT NO : 0219993918391.
              </p>
            </div>
          </div>

        </div>
      </div>
    </section> -->

    <section id="partner" class="partner" style="background-image: url(<?= base_url('img/ImageBackGround/bg-slide_c.png'); ?>)">

      <div class="container" data-aos="fade-up">

        
          <h1>Inovasi Kue Kering Yang Luar Biasa</h1><br>
          <h6> HADIRKAN RASA TERISTIMEWA</h6><br>
        
        <a href="<?= base_url('Produk') ?>" class="btn-detail">Lihat Produk Kami</a>

      </div>

    </section>

    <!-- <section id="partner" class="partner">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Marketplace</h2>
          <p>Temukan Kami Di Marketplace</p>
        </header>

        <div class="row gy-4" data-aos="fade-left">
          <div class="col-lg-3 col-md-3 align-items-center col-partner">
            <div><img src="<?= base_url('img/ImagePartner/Tokped.png') ?>" class="img-fluid" alt=""></div>
          </div>
          <div class="col-lg-3 col-md-3 align-items-center col-partner">
            <div><img src="<?= base_url('img/ImagePartner/Blibli.png') ?>" class="img-fluid" alt=""></div>
          </div>
          <div class="col-lg-3 col-md-3 align-items-center col-partner">
            <div><img src="<?= base_url('img/ImagePartner/Bukalapak.png') ?>" class="img-fluid" alt=""></div>
          </div>
          <div class="col-lg-3 col-md-3 align-items-center col-partner">
            <div><img src="<?= base_url('img/ImagePartner/Shopee.png') ?>" class="img-fluid" alt=""></div>
          </div>
        </div>
      </div>

    </section> -->

    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <div class="row gy-4">

          <div class="col-lg-6">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.2118530134367!2d113.71718941478072!3d-8.181401394111575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6967f747f1973%3A0x152f0c9f7177b876!2sMAK%20ENAK%20JEMBER!5e0!3m2!1sid!2sid!4v1617248498435!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

          </div>

          <div class="col-lg-6">

            <div class="row gy-4">
              <?php foreach ($deskripsi as $data) { ?>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-whatsapp"></i>
                  <h3>Telepon/WA</h3>
                  <p><a href="https://wa.me/<?= $data['wa1']?>" target="blank"><?= $data['wa1']?></a> <br>
                    <a href="https://wa.me/<?= $data['wa2']?>" target="blank"> <span><?= $data['wa2']?></span></a><br>
                    <a href="https://wa.me/<?= $data['wa3']?>" target="blank"> <span><?= $data['wa3']?></span></a><br>
                    <a href="https://wa.me/<?= $data['wa4']?>" target="blank"> <span><?= $data['wa4']?></span></a></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-instagram"></i>
                  <h3>Sosial media kami</h3>
                  <p><a href="https://www.instagram.com/<?= $data['Instagram1']?>/" target="blank"> <img src="<?= base_url('img/user/ic_ig.png') ?>" width="30px" height="30px" alt=""><span><?= $data['Instagram1']?></span></a><br>
                  <a href="https://www.instagram.com/<?= $data['Instagram2']?>/" target="blank"> <img src="<?= base_url('img/user/ic_ig.png') ?>" width="30px" height="30px" alt=""><span><?= $data['Instagram2']?></span></a><br>
                  <a href="https://www.facebook.com/makenakofficial" target="blank"> <img src="<?= base_url('img/user/ic_fb.png') ?>" width="30px" height="30px" alt=""><span>Mak Enak Jember</span></a></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-geo-alt"></i>
                  <h3>Alamat</h3>
                  <p><a href="https://www.google.com/maps?q=-8.165755271911621,113.73561096191406&z=17&hl=en">
            Jl. Letjen S.Parman X No.15, Tegal Boto Kidul, Karangrejo, <br> Kec. Sumbersari, Kabupaten Jember, Jawa Timur 68121</a></p>
                </div>
              </div>
              <div class="col-md-6">
                <div class="info-box">
                  <i class="bi bi-clock"></i>
                  <h3>Jam Buka</h3>
                  <p>Senin - Minggu<br>8 Pagi - 9 Malam</p>
                </div>
              </div>
              <?php } ?>
            </div>

          </div>

        </div>

      </div>

    </section>

    <!-- <section id="map" class="map">
      <div class="container" data-aos="fade-up">

        <div class="row" data-aos="fade-up">
          <div class="col-lg-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.2118530134367!2d113.71718941478072!3d-8.181401394111575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6967f747f1973%3A0x152f0c9f7177b876!2sMAK%20ENAK%20JEMBER!5e0!3m2!1sid!2sid!4v1617248498435!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>

          <div class="col-lg-5">
            <div class="card">
              <div class="row">
                <?php foreach ($deskripsi as $data) { ?>
                  <div class="col-lg-6" style="padding-left:50px;">
                    <h6 style="padding-left:10px; padding-top:15px;">Cotact Our Team</h6>
                    <a href="https://wa.me/<?= $data['wa1']?>" target="blank"> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px" alt=""><span><?= $data['wa1']?></span></a> <br>
                    <a href="https://wa.me/<?= $data['wa2']?>" target="blank"> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px" alt=""><span><?= $data['wa2']?></span></a><br>
                    <a href="https://wa.me/<?= $data['wa3']?>" target="blank"> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px" alt=""><span><?= $data['wa3']?></span></a><br>
                    <a href="https://wa.me/<?= $data['wa4']?>" target="blank"> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px" alt=""><span><?= $data['wa4']?></span></a>
                  </div>
                

                <div class="col-lg-6" style="padding-left:50px;">
                  <h6 style="padding-top:15px;">Follow Our Media</h6>
                  <a href="https://www.instagram.com/<?= $data['Instagram1']?>/" target="blank"> <img src="<?= base_url('img/user/ic_ig.png') ?>" width="40px" height="40px" alt=""><span><?= $data['Instagram1']?></span></a><br>
                  <a href="https://www.instagram.com/<?= $data['Instagram2']?>/" target="blank"> <img src="<?= base_url('img/user/ic_ig.png') ?>" width="40px" height="40px" alt=""><span><?= $data['Instagram2']?></span></a><br>
                  <a href="https://www.facebook.com/makenakofficial" target="blank"> <img src="<?= base_url('img/user/ic_fb.png') ?>" width="40px" height="40px" alt=""><span>Mak Enak Jember</span></a>
                </div>
              </div>
              <?php } ?>
            </div>
          </div>
        </div>

      </div>
    </section> -->

  </main>

  <?php $this->load->view('user/_partials/footer.php') ?>

  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

  <?php $this->load->view('user/_partials/js.php') ?>

</body>

</html>