<!DOCTYPE html>

<html lang="en">



<head>

  <?php $this->load->view('user/_partials/head.php') ?>

</head>



<body>



<?php $this->load->view('user/_partials/navbar.php') ?>



  <main id="main">



    <div class="gap-80"></div>



    <section id="type" class="type mt-5">



      <div class="container" data-aos="fade-up">



        <header class="section-header">

          <h2>Produk</h2>

          <p>Produk Mak Enak</p>

        </header>



        <div class="row gy-4" data-aos="fade-left">



          <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">


              <div class="box">

                <img src="<?= base_url('img/Produk/Union.png') ?>" class="img-fluid" alt="">

                <div class="house-type"><span>Kue Nastar Mak Enak</span></div>

                <ul>

                  <li>Rp <?= number_format('20000', 2, ",", ".") ?></li>

                </ul>

                <a href="<?= base_url() ?>Perumahan?tipe=36#search" class="btn-detail">Pilih</a>

              </div>

          </div>
          <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">


              <div class="box">

                <img src="<?= base_url('img/Produk/Union.png') ?>" class="img-fluid" alt="">

                <div class="house-type"><span>Kue Nastar Mak Enak</span></div>

                <ul>

                  <li>Rp <?= number_format('20000', 2, ",", ".") ?></li>

                </ul>

                <a href="<?= base_url() ?>Perumahan?tipe=36#search" class="btn-detail">Pilih</a>

              </div>

          </div>
          <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">


              <div class="box">

                <img src="<?= base_url('img/Produk/Union.png') ?>" class="img-fluid" alt="">

                <div class="house-type"><span>Kue Nastar Mak Enak</span></div>

                <ul>

                  <li>Rp <?= number_format('20000', 2, ",", ".") ?></li>

                </ul>

                <a href="<?= base_url() ?>Perumahan?tipe=36#search" class="btn-detail">Pilih</a>

              </div>

          </div>
          <div class="col-lg-3 col-md-3" data-aos="zoom-in" data-aos-delay="100">


              <div class="box">

                <img src="<?= base_url('img/Produk/Union.png') ?>" class="img-fluid" alt="">

                <div class="house-type"><span>Kue Nastar Mak Enak</span></div>

                <ul>

                  <li>Rp <?= number_format('20000', 2, ",", ".") ?></li>

                </ul>

                <a href="<?= base_url() ?>Perumahan?tipe=36#search" class="btn-detail">Pilih</a>

              </div>

          </div>



          



        </div>



      </div>



    </section>



    <section id="denah" class="denah d-flex align-items-center">

      <div class="container" data-aos="fade-up">



        <header class="section-header">

          <h2>Siteplan Perumahan</h2>

          <p>River Prawn Residence</p>

        </header>



        <div class="center">

          <a href="<?= base_url('img/user/siteplan_horizontal.jpg') ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">

            <img id="siteplan" src="<?= base_url('img/user/siteplan_horizontal.jpg') ?>" alt="">

          </a>

        </div>



      </div>

    </section>



    <section id="search" class="search d-flex align-items-center">

      <div class="container" data-aos="fade-up">



        <div class="col-12">

          <?php if (!empty($_GET['tipe'])) : ?>

            <div class='alert alert-success mt-3'>

              <p class="text-center"><b><?= $totalResult; ?></b> Property ditemukan!</p>

            </div>

            <div class="col">

              <?php echo $this->session->flashdata('pesan') ?>

            </div>

          <?php elseif (!empty($_GET['blok'])) : ?>

            <div class='alert alert-success mt-3'>

              <p class="text-center"><b><?= $totalResult; ?></b> Property ditemukan!</p>

            </div>

            <div class="col">

              <?php echo $this->session->flashdata('pesan') ?>

            </div>

          <?php endif; ?>

        </div>



        <div id="search-box" class="search-box">

          <div class="col-12">

            <span>Cari Properti</span>

            <form method="get" action="<?= base_url(); ?>Perumahan">

              <div class="mt-3 row">

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="tipe">Tipe Properti</label>

                  <select class="form-select mb-3" id="tipe" name="tipe">

                    <option value="">-- Pilih Tipe Properti -- </option>

                    <option value="Ruko">Ruko</option>

                    <option value="36">Tipe 36+</option>

                    <option value="40">Tipe 40</option>

                    <option value="45">Tipe 45</option>

                  </select>

                </div>

                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="blok">Blok</label>

                  <select class="form-select mb-3" id="blok" name="blok">

                    <option value="">-- Pilih Blok -- </option>

                  </select>

                </div>

              </div>

              <button type="submit" class="btn btn-primary" type="button">Cari</button>

            </form>

          </div>

        </div>



        <div class="row mt-3 aos-init aos-animate">

          <?php foreach ($data as $d) { ?>

            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12 col-xs-12" data-aos="zoom-in">



              <a href="<?php echo base_url('Perumahan/detail/' . $d['blok'])  ?>">

                <div class="box-list" <?php if ($d['cek'] == 3) { ?> style="background: rgba(1, 41, 112, 0.4); transform: scale(1); cursor: default;" <?php } else if ($d['cek'] == 2) { ?> style="background: rgba(1, 41, 112, 0.4); transform: scale(1); cursor: default;" <?php } ?>>

                  <?php if ($d['cek'] == 3) { ?>

                    <div class="status-sold">

                      <a>TERJUAL</a>

                    </div>

                  <?php } else if ($d['cek'] == 2) { ?>

                    <div class="status-booked">

                      <a>BOOKED</a>

                    </div>

                  <?php } ?>

                  <img class="item-list" src="<?= base_url('uploads/Rumah/') . $d['Banner'] ?>" alt="Foto Rumah">

                  <div class="row">

                    <div class="d-flex justify-content-start">

                      <?php if ($d['Tipe'] == "36") { ?>

                        <div class="house-type"><span>Tipe</span>36+</div>

                      <?php } else { ?>

                        <div class="house-type"><span>Tipe</span><?= $d['Tipe'] ?></div>

                      <?php } ?>

                      <div class="house-type"><span>Blok</span><?= $d['Kode_Rumah'] ?></div>

                    </div>

                    <p>Luas Tanah <?= $d['Luas_Tanah'] ?></p>

                    <p><strong>Rp <?= number_format($d['Harga'], 2, ",", ".") ?></strong></p>

                  </div>

                </div>

              </a>



            </div>

          <?php } ?>

        </div>



      </div>

    </section>



  </main>



  <?php $this->load->view('user/_partials/footer.php') ?>



  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>



  <?php $this->load->view('user/_partials/js.php') ?>



  <script type="text/javascript">

    $(document).ready(function() {

      $('#tipe').change(function() {

        var tipe = $(this).val(); //tipe

        // console.log(tipe);

        if (tipe == "") {

          var html = '';

          // html += '<option value="">-- Pilih Blok --</option>';

          $.ajax({

            url: "<?= base_url(); ?>Perumahan/getAllBlok",

            method: "POST",

            data: {



            },

            async: false,

            dataType: "json",

            success: function(data) {

              var html = '<option value="">-- Pilih Blok --</option>';

              console.log(data);

              for (i = 0; i < data.length; i++) {

                html += '<option value="' + data[i].Kode_Rumah + '">' + data[i].Kode_Rumah + '</option>';

              }

              $('#blok').html(html);

              // console.log(html);

            }

          });

          // $('#blok').html(html);

          // console.log(html);

        } else {

          $.ajax({

            url: "<?= base_url(); ?>Perumahan/getBlok",

            method: "POST",

            data: {

              tipe: tipe

            },

            async: false,

            dataType: "json",

            success: function(data) {

              var html = '<option value="">-- Pilih Blok --</option>';

              console.log(data);

              for (i = 0; i < data.length; i++) {

                html += '<option value="' + data[i].Kode_Rumah + '">' + data[i].Kode_Rumah + '</option>';

              }

              $('#blok').html(html);

              // console.log(html);

            }

          });

        }

      });

      $.ajax({

        url: "<?= base_url(); ?>Perumahan/getAllBlok",

        method: "POST",

        data: {



        },

        async: false,

        dataType: "json",

        success: function(data) {

          var html = '<option value="">-- Pilih Blok --</option>';

          console.log(data);

          for (i = 0; i < data.length; i++) {

            html += '<option value="' + data[i].Kode_Rumah + '">' + data[i].Kode_Rumah + '</option>';

          }

          $('#blok').html(html);

          // console.log(html);

        }

      });

      // $.get("<?= base_url("Perumahan/getAllBlok"); ?>", function(data) {

      //   var html = '<option value="">-- Pilih Blok --</option>';

      //   for (i = 0; i < data.length; i++) {

      //     html += '<option value="' + data[i].Kode_Rumah + '">' + data[i].Kode_Rumah + '</option>';

      //   }

      //   console.log(data)

      //   $('#blok').html(html);

      // });

    });

  </script>

</body>



</html>