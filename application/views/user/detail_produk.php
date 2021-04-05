<!DOCTYPE html>

<html lang="en">



<head>

  <?php $this->load->view('user/_partials/head.php') ?>

</head>



<body>



  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>



  <main id="main">



    <section id="about" class="about mt-5">



      <div class="container" data-aos="fade-up">

        <div class="row gx-0">


          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <!-- untuk melakukan zoom out -->
            <a href="<?= base_url('img/Produk/' . $detailProduk['gambar']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">

            <img style="width: 720px; height: 500px; object-position: center;" src="<?= base_url('img/Produk/' . $detailProduk['gambar']) ?>" class="img-fluid" alt="">

            </a>

          </div>



          <div class="col-lg-6 d-flex flex-column justify-content-center fasilitas" data-aos="fade-up" data-aos-delay="200">

            <div class="content">
              <div class="d-flex justify-content-start">

                <div class="">
                  <h5><b><?= $detailProduk['namaProduk'] ?></b></h5>
                </div>

              </div>

              <p>Netto : <?= $detailProduk['netto'] ?> Gram</p>

              <p><strong>Rp <?= number_format($detailProduk['harga'], 2, ",", ".") ?></strong></p>

              <p class="mt-3">

                Komposisi :

                <?= $detailProduk['komposisi'] ?>

              </p>
              <p class="mt-3">

                <?= $detailProduk['deskripsi'] ?>

              </p>
              <p class="mt-3 text-danger" >
                Minimal pembelian di luar Jember <br> 1. Jawa Timur minimal order 1 dus atau 32 toples. <br> 2. Jawa Tengah dan Jawa Barat minimal order 3 dus atau 32 x 3 toples. <br>
              </p>
              <div class="d-grid gap-10">
                <button class="btn btn-success" type="button">Pesan sekarang</button>
              </div>
            </div>

            <!-- <div class="alert alert-light" role="alert">
                         </div> -->
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