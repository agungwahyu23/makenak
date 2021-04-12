<!DOCTYPE html>

<html lang="en">



<head>

  <?php $this->load->view('user/_partials/head.php') ?>

</head>



<body>



  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>



  <main id="main">



    <section id="about" class="about mt-5">


      <div class="container">
        <div class="row justify-content-center">
          <div class="col-md-6">
            <?php echo $this->session->flashdata('message') ?>
          </div>
        </div>
      </div>

      <div class="container" data-aos="fade-up">
        <div class="row gx-0">


          <div class="col-lg-6 d-flex align-items-center" data-aos="zoom-out" data-aos-delay="200">
            <!-- untuk melakukan zoom out -->
            <a href="<?= base_url('img/Produk/' . $detailProduk['gambar']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">

              <img src="<?= base_url('img/Produk/' . $detailProduk['gambar']) ?>" class="img-fluid" alt="">

            </a>

          </div>



          <div class="col-lg-6 d-flex flex-column justify-content-center fasilitas" data-aos="fade-up" data-aos-delay="200">

            <div class="content">
              <div class="d-flex justify-content-start">

                <div class="mb-2">
                  <h5><b><?= $detailProduk['namaProduk'] ?></b></h5>

                </div>

              </div>

              <strong> Rp <?= number_format($detailProduk['harga'], 0, ",", ".") ?> / <?= $detailProduk['namaSatuan']?></strong>
              <p> Netto : <?= $detailProduk['netto'] ?> Gram</p>

              <p class="mt-3">

                Komposisi :

                <?= $detailProduk['komposisi'] ?>

              </p>
              <p class="mt-3">

                <?= $detailProduk['deskripsi'] ?>

              </p>
              <br>

              <p class="mt-3 text-danger">
                <b> *Catatan :</b> <br> Minimal pembelian di luar Jember <br> 1. Jawa Timur minimal order 1 dus atau <?= $detailProduk['isiDus'] ?> <?= $detailProduk['namaSatuan'] ?>. <br> 2. Jawa Tengah dan Jawa Barat minimal order 3 dus atau <?= $detailProduk['isiDus'] * 3 ?> <?= $detailProduk['namaSatuan'] ?>. <br>
              </p>
              <div class="d-grid gap-10">
                <form method="POST">


                  <div class="flex-r-m flex-w p-t-10">
                    <div class="w-size16 flex-m flex-w">
                      <div class="flex-l bo5 of-hidden m-r-22 m-t-10 m-b-10">
                        <button class="btn-num-product-down bomin bg3 color1 flex-c-m size7 eff2">
                          <i class="fs-12 fa fa-minus" aria-hidden="true"></i>
                        </button>

                        <input class="size8 m-text18 t-center num-product" value="1" type="number" name="jumlah" min="1">

                        <button class="btn-num-product-up boplus bg3 color1 flex-c-m size7 eff2">
                          <i class="fs-12 fa fa-plus" aria-hidden="true"></i>
                        </button>
                      </div>

                      <div class="btn-addcart-product-detail size9 trans-0-4 m-t-10 m-b-10">
                        <!-- Button -->
                        <button type="submit" name="submit" value="submit" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">
                          Add to Cart
                        </button>
                      </div>
                    </div>
                  </div>
                </form>
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



        <span>Produk Lainnya</span>



        <div class="row gy-4 portfolio-container mt-2" data-aos="fade-up" data-aos-delay="200">



          <?php foreach ($produkBeranda as $data) { ?>
            <div class="col-lg-3 col-md-3 portfolio-item" data-aos="zoom-in" data-aos-delay="200">
              <div class="box">
                <div class="box-header">
                  <img src="<?= base_url('img/Produk/' . $data['gambar']) ?>" class="img-fluid" alt="">
                </div>


                <div class="nama-product"><span><?= $data['namaProduk'] ?></span></div>
                <ul>
                  <li>Rp <?= number_format($data['harga'], 0, ",", ".") ?> /Toples</li>
                </ul>
                <a href="<?= base_url('Produk/DetailProduk/') . $data['id'] ?>" class="btn-detail">Detail</a>
                <!-- <a href="<?= base_url('Produk/DetailProduk/') . $data['id'] ?>" class="btn-choose">Beli
                  Sekarang</a> -->
              </div>
            </div>
          <?php } ?>
          <!-- <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 portfolio-item">
            <div class="portfolio-wrap">
              <img src="<?= base_url('uploads/Produk/_MG_8820.jpg') ?>" class="img-galeri" alt="">
              <div class="portfolio-info">
                
                <div class="portfolio-links">
                  <a href="<?= base_url('uploads/Produk/_MG_8820.jpg') ?>" data-gallery="portfolioGallery"
                    class="portfokio-lightbox"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-xxl-4 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-xs-6 portfolio-item">
            <div class="portfolio-wrap">
              <img src="<?= base_url('uploads/Produk/_MG_8841.jpg') ?>" class="img-galeri" alt="">
              <div class="portfolio-info">
               
                <div class="portfolio-links">
                  <a href="<?= base_url('uploads/Produk/_MG_8823.jpg') ?>" data-gallery="portfolioGallery"
                    class="portfokio-lightbox"><i class="bi bi-zoom-in"></i></a>
                </div>
              </div>
            </div>
          </div> -->




        </div>



      </div>



    </section>



  </main>



  <?php $this->load->view('user/_partials/footer.php') ?>



  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>



  <?php $this->load->view('user/_partials/js.php') ?>



</body>



</html>