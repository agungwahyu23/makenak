<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

  <section id="hero" class="hero-half d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/bg-slide_c.jpg'); ?>)">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Mak Enak Jember</h1>
          <h5 data-aos="fade-up" data-aos-delay="400">Produsen kue kering khas Jember</h5>
        </div>
      </div>
    </div>

  </section>

  <main id="main">
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

  </main>

  <?php $this->load->view('user/_partials/footer.php') ?>

  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

  <?php $this->load->view('user/_partials/js.php') ?>

</body>

</html>