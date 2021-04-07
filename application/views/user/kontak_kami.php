<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

  <section id="hero" class="hero-half d-flex align-items-center" style="background-image: url(<?= base_url('img/ImageBackGround/tentangkami.png'); ?>)">

    <div class="container">
      <div class="row">
        <div class="col-lg-6 d-flex flex-column justify-content-center">
          <h1 data-aos="fade-up">Mek Enak Jember</h1>
          <h2 data-aos="fade-up" data-aos-delay="400">Produsen roti kering khas Jember</h2>
        </div>
      </div>
    </div>

  </section>

  <main id="main">
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Kontak Kami</p>
        </header>

        <div class="row" data-aos="fade-up">
          <div class="col-lg-7">
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.2118530134367!2d113.71718941478072!3d-8.181401394111575!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd6967f747f1973%3A0x152f0c9f7177b876!2sMAK%20ENAK%20JEMBER!5e0!3m2!1sid!2sid!4v1617248498435!5m2!1sid!2sid" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
          </div>

          <div class="col-lg-5">
            <div class="card">
              <div class="row">
                <div class="col-lg-6" style="padding-left:50px;">
                  <h6 style="padding-left:10px; padding-top:15px;">Cotact Our Team</h6>
                  <a href=""> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px"
                    alt=""><span>085258179830</span></a> <br>
                  <a href=""> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px"
                    alt=""><span>0895411940452</span></a><br>
                  <a href=""> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px"
                    alt=""><span>089517962666</span></a><br>
                  <a href=""> <img src="<?= base_url('img/user/ic_wa.png') ?>" width="40px" height="40px"
                    alt=""><span>089607900900</span></a>
                </div>


                <div class="col-lg-6" style="padding-left:50px;">
                  <h6 style="padding-top:15px;">Follow Our Media</h6>
                  <a href="https://www.instagram.com/mak_enak_jember/"> <img src="<?= base_url('img/user/ic_ig.png') ?>" width="40px" height="40px" alt=""><span>Mak Enak Jember</span></a><br>
                  <a href="https://www.instagram.com/mak_enak_official/"> <img src="<?= base_url('img/user/ic_ig.png') ?>" width="40px" height="40px" alt=""><span>Mak Enak Official</span></a><br>
                  <a href="https://www.facebook.com/makenakofficial"> <img src="<?= base_url('img/user/ic_fb.png') ?>" width="40px" height="40px" alt=""><span>Mak Enak Jember</span></a>
                </div>
              </div>

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