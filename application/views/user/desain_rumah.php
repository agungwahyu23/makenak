<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

  <main id="main">

    <div class="gap-80"></div>

    <section id="search-desain-rumah" class="search-desain-rumah d-flex align-items-center">
      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Jasa Desain Rumah</h2>
          <p>Contoh Karya Desain Rumah Kami</p>
        </header>

        <div class="col-12">
          <?php if (!empty($_GET['kategori'])) { ?>
            <div class='alert alert-success mt-3'>
              <p class="text-center"><b><?= $totalResult; ?></b> Property ditemukan!</p>
            </div>
          <?php } ?>
          <div class="col">
            <?php echo $this->session->flashdata('pesan') ?>
          </div>
        </div>


        <div id="search-box" class="search-box">
          <div class="col-12">
            <span>Cari Desain Rumah</span>
            <form method="get" action="<?= base_url(); ?>DesainRumah">
              <div class="mt-3 row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1" for="tipe">Kategori Properti</label>
                  <select class="form-select mb-3" id="kategori" name="kategori">
                    <option value="">-- Pilih Kategori Properti-- </option>
                    <?php foreach ($desain as $d) : ?>
                      <option value="<?= $d['id_kategori_rumah']; ?>"><?= $d['nama_kategori']; ?></option>
                    <?php endforeach; ?>
                  </select>
                </div>
              </div>
              <button type="submit" class="btn btn-primary" type="button">Cari</button>
            </form>
          </div>
        </div>
      </div>
    </section>

    <section id="portfolio" class="portfolio">

      <div class="container" data-aos="fade-up">

        <header class="section-header">
          <h2>Jasa Desain Rumah</h2>
          <p>Contoh Karya Desain Rumah Kami</p>
        </header>

        <div class="row portfolio-container" data-aos="fade-up" data-aos-delay="200">
          <?php if (!empty($_GET['kategori']) && $totalResult != 0) : ?>
            <?php foreach ($tampil as $t) : ?>
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 portfolio-item">
                <div class="portfolio-wrap">
                  <img src="<?= base_url('uploads/Desain_Rumah/' . $t['foto']) ?>" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4><?= $t['nama']; ?></h4>
                    <p><?= $t['nama_kategori']; ?></p>
                    <div class="portfolio-links">
                      <a href="<?= base_url('uploads/Desain_Rumah/' . $t['foto']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $t['nama']; ?>"><i class="bi bi-zoom-in"></i></a>
                      <a href="<?= base_url('DetailDesainRumah/Index/' . $t['id_desain_rumah']) ?>" title="Lihat Detail"><i class="bi bi-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
          <?php elseif (!empty($_GET['kategori']) && $totalResult == 0) : ?>
            <h3 class="section-header">Tidak ditemukan</h3>
          <?php else : ?>
            <?php foreach ($dataawal as $d) : ?>
              <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 portfolio-item">
                <div class="portfolio-wrap">
                  <img src="<?= base_url('uploads/Desain_Rumah/' . $d['foto']) ?>" class="img-fluid" alt="">
                  <div class="portfolio-info">
                    <h4><?= $d['nama']; ?></h4>
                    <p><?= $d['nama_kategori']; ?></p>
                    <div class="portfolio-links">
                      <a href="<?= base_url('uploads/Desain_Rumah/' . $d['foto']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox" title="<?= $d['nama']; ?>"><i class="bi bi-zoom-in"></i></a>
                      <a href="<?= base_url('DetailDesainRumah/Index/') . $d['id_desain_rumah'] ?>" title="Lihat Detail"><i class="bi bi-plus"></i></a>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach; ?>
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