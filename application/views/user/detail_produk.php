<!DOCTYPE html>

<html lang="en">



<head>

  <?php $this->load->view('user/_partials/head.php') ?>

</head>



<body>



  <?php $this->load->view('user/_partials/navbar.php') ?>



  <main id="main">



    <section id="about" class="about mt-5">



      <div class="container" data-aos="fade-up">

        <div class="row gx-0">


          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">

            <a href="<?= base_url('img/Produk/' . $detailProduk['gambar']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">

              <img src="<?= base_url('img/Produk/' . $detailProduk['gambar']) ?>" class="img-fluid" alt="">

            </a>

          </div>



          <div class="col-lg-6 d-flex flex-column justify-content-center fasilitas" data-aos="fade-up" data-aos-delay="200">

            <div class="content">
                <div class="d-flex justify-content-start">

                  <div class="house-type"><?= $detailProduk['namaProduk']?></div>

                </div>

                <p>Netto : <?= $detailProduk['netto']?></p>

                <p><strong>Rp <?= number_format($detailProduk['harga'], 2, ",", ".") ?></strong></p>

                <p class="mt-3">

                  Komposisi :<br>

                  <?= $detailProduk['komposisi']?>

                </p>
                <p class="mt-3">

                <?= $detailProduk['deskripsi']?>

                </p>
            </div>

          </div>




        </div>

      </div>



    </section>


    <section id="portfolio" class="portfolio">



      <div class="container" data-aos="fade-up">



        <span>Produk Terkait</span>



        <div class="row gy-4 portfolio-container mt-2" data-aos="fade-up" data-aos-delay="200">



          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 portfolio-item">



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