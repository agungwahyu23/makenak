<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

  <main id="main">

    <section id="portfolio-details" class="portfolio-details mt-5">
      <div class="container mt-5">

        <?php foreach ($tampil as $t) : ?>
          <div class="row gy-4">
            <div class="col-lg-8">
              <div class="portfolio-details-slider swiper-container">
                <div class="swiper-wrapper align-items-center">
                  <div class="swiper-slide">
                    <img src="<?= base_url('uploads/Desain_Rumah/' . $t['foto']) ?>" alt="">
                  </div>
                </div>
              </div>
            </div>

            <div class="col-lg-4">
              <div class="portfolio-info mb-4">
                <h3><?= $t['nama']; ?></h3>
                <p><?= $t['deskripsi']; ?></p>
              </div>
              <?php foreach ($deskripsi as $d) : ?>
                <button type="submit" class="btn btn-primary" type="button" onclick="window.open('https://api.whatsapp.com/send?phone=<?= $d['No_Telp'] ?>&text=saya%20tertarik%20dengan%20desain%20rumah%20dengan%20nama%20desain%20rumah%20<?= $t['nama'] ?>')">Hubungi Admin</button>
              <?php endforeach; ?>
              <!-- <button type="submit" class="btn btn-primary" type="button">Hubungi Admin</button> -->
            </div>

          </div>
        <?php endforeach; ?>
      </div>
    </section>

    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <!-- <h2>Jasa Desain Interior</h2> -->
          <p>Desain Serupa</p>
        </header>

        <div class="row gy-4 portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php if ($lain == true) : ?>
            <?php foreach ($lain as $l) : ?>
              <div class="col-lg-4 col-md-6 portfolio-item filter-app">
                <div class="portfolio-wrap">
                  <img src="<?= base_url('uploads/Desain_Rumah/' . $l['foto']) ?>" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4><?= $l['nama']; ?></h4>
                    <p><?= $l['nama_kategori']; ?></p>
                    <div class="portfolio-links">
                      <a href="<?= base_url('uploads/Desain_Rumah/' . $l['foto']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $l['nama']; ?>"><i class="bi bi-zoom-in"></i></a>
                      <a href="<?= base_url('DetailDesainRumah/Index/') . $l['id_desain_rumah'] ?>" title="Lihat Detail"><i class="bi bi-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php else : ?>
            <h3 class="section-header">Tidak ada desain serupa</h3>
          <?php endif; ?>


        </div>

      </div>

    </section>

  </main>

  <?php $this->load->view('user/_partials/footer.php') ?>

  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

  <?php $this->load->view('user/_partials/js.php') ?>

</body>

</html>