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
    <section id="contact" class="contact">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Kontak</h2>
          <p>Kontak Kami</p>
        </header>

        <div class="row gy-4">
          <div class="col-lg-12">
            <?php foreach ($deskripsi as $d) { ?>
              <div class="row gy-4">
                <div class="col-md-6">
                  <div class="info-box">
                    <i class="bi bi-geo-alt"></i>
                    <h3>Alamat</h3>
                    <a href="https://www.google.com/maps?q=-8.165755271911621,113.73561096191406&z=17&hl=en">
                      <?= $d['Alamat_Kantor'] ?></a>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="info-box">
                    <i class="bi bi-telephone"></i>
                    <h3>Nomor Telepon</h3>
                    <a href="https://api.whatsapp.com/send?phone= <?= $d['No_Telp'] ?> &text=Selamat Pagi%21%20Saya%20berminat%20membeli...">
                      <?= $d['No_Telp'] ?></a>
                      <br>
                    <a href="https://api.whatsapp.com/send?phone= <?= $d['No_Telp2'] ?> &text=Selamat Pagi%21%20Saya%20berminat%20membeli...">
                      <?= $d['No_Telp2'] ?></a>
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="info-box">
                    <i class="bi bi-envelope"></i>
                    <h3>Email</h3>
                    <a href="mailto:river_prawn@gmail.com">
                      river_prawn@gmail.com</a>
                  </div>
                </div>
              </div>
            <?php } ?>

          </div>
          <?php echo $this->session->flashdata('pesan') ?>
          <div class="col-lg-6 ">
            <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3949.3667532172894!2d113.73561099999999!3d-8.165755299999999!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwMDknNTYuNyJTIDExM8KwNDQnMDguMiJF!5e0!3m2!1sid!2sid!4v1613392584295!5m2!1sid!2sid" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
          </div>

          <div class="col-lg-6">
            <form action="<?= base_url('KontakKami/send') ?>" method="post">
              <div class="row gy-4">
                <div class="col-md-6">
                  <input type="text" name="name" class="form-control" placeholder="Nama Anda" required>
                </div>

                <div class="col-md-6 ">
                  <input type="email" class="form-control" name="email" placeholder="Email Anda" required>
                </div>

                <div class="col-md-12">
                  <input type="text" class="form-control" name="subject" placeholder="Subjek" required>
                </div>

                <div class="col-md-12">
                  <textarea class="form-control" name="description" rows="6" placeholder="Deskripsi" required></textarea>
                </div>

                <div class="col-md-12 text-center">
                  <button type="submit" class="btn btn-dark">Kirim Pesan</button>

                </div>

              </div>
            </form>

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