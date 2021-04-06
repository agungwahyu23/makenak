<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

  <main id="main">

    <section id="checkout" class="checkout">

      <div class="container">
        <div class="row justify-content-center">
          <div class="col-lg-12">
            <div class="card shadow-lg border-0 rounded-lg mt-15">
              <div class="card-header justify-content-center">
                <img class="checkout-logo" src="<?= base_url('img/logo.png') ?>" alt="Logo">
              </div>
              <div class="card-body">
                <div class="col">

                  <form action="<?= base_url('Checkout/Post') ?>" method="post" enctype="multipart/form-data">
                    <?php foreach ($deskripsi as $d) { ?>
                      <input type="hidden" name="no_telp_wa" value="<?= $d['No_Telp'] ?>">
                    <?php } ?>

                    <h3 class="sub-title">Data Penerima</h3>
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_lengkap">Nama Lengkap</label>
                        <input type="text" class="form-control mb-3" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap" required>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="email">Email</label>
                        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="nomor_telepon">Nomor Telepon</label>
                        <input type="text" class="form-control mb-3" id="nomor_telepon" name="nomor_telepon" placeholder="Nomor Telepon" required>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Alamat</label>
                        <input type="text" class="form-control mb-3" id="alamat" name="alamat" placeholder="Alamat" required>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="pekerjaan">Pekerjaan</label>
                        <input type="text" class="form-control mb-3" id="pekerjaan" name="pekerjaan" placeholder="Pekerjaan" required>
                        <?php if ($_GET['metode'] == 2) { ?>
                          <input type="text" class="form-control mb-3" id="metode" name="metode" required value="Cash" hidden>
                        <?php } elseif ($_GET['metode'] == 3) { ?>
                          <input type="text" class="form-control mb-3" id="metode" name="metode" required value="Cash Tempo" hidden>
                        <?php } else { ?>
                          <input type="text" class="form-control mb-3" id="metode" name="metode" required value="KPR" hidden>
                        <?php } ?>

                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="foto_ktp">Upload Foto KTP</label>
                        <input type="file" accept="image/*" onchange="tampilkanPreviewKtp(this, 'previewKtp')" class="form-control mb-3" id="foto_ktp" name="foto_ktp" required />
                      </div>
                      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"><label class="small mb-1" for="previewKtp">Preview</label>
                        <img src="" class="form-control mb-3 preview" id="previewKtp" name="previewKtp" />
                      </div>
                    </div>

                    <h3 class="sub-title mt-3">Data Pembayaran</h3>
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="bank">Bank</label>
                        <select class="form-select mb-3" id="bank" name="bank" required>
                          <option value="">-- Pilih Bank-- </option>
                          <?php foreach ($bank as $bank) { ?>
                            <option value="<?= $bank['Id_Bank'] ?>">Bank <?= $bank['Nama_Bank'] ?> <?= $bank['Nomor_Rekening'] ?> (A/N : <?= $bank['Nama_Pemilik'] ?>)</option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="foto_bukti">Upload Bukti Pembayaran</label>
                        <input type="file" accept="image/*" onchange="tampilkanPreview(this, 'preview')" class="form-control mb-3" id="foto_bukti" name="foto_bukti" required />
                      </div>
                      <div class="col-xl-2 col-lg-2 col-md-2 col-sm-12 col-xs-12"><label class="small mb-1" for="preview">Preview</label>
                        <img src="" class="form-control mb-3 preview" id="preview" name="preview" />
                      </div>
                    </div>

                    <h3 class="sub-title mt-3">Data Pemesanan Properti</h3>
                    <div class="row mb-5">
                      <?php foreach ($rumah as $rumah) { ?>
                        <?php if ($rumah['Tipe'] == "36") { ?>
                          <div class="house-type"><span>Tipe</span>36+</div>
                          <input type="text" name="types" id="types" value="<?= $rumah['Tipe'] ?>" hidden>
                        <?php } else { ?>
                          <div class="house-type"><span>Tipe</span><?= $rumah['Tipe'] ?></div>
                          <input type="text" name="types" id="types" value="<?= $rumah['Tipe'] ?>" hidden>
                        <?php } ?>

                        <input type="text" value="<?= $_GET['idrumah'] ?>" name="idrumah" hidden>
                        <?php foreach ($blokrumah as $b) { ?>
                          <div class="house-type"><span>Blok</span><?= $b['Kode_Rumah'] ?></div>
                          <input type="text" name="bl" id="bl" value="<?= $b['Kode_Rumah'] ?>" hidden>
                        <?php } ?>
                        <div class="house-type"><span>Harga</span>Rp <?= number_format($rumah['Harga'], 2, ",", ".") ?></div>
                    </div>

                    <div>* Minimal Down Payment (DP) Rp 10.000.000</div>

                    <hr>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" type="button" id="start">
                          Checkout
                        </button>
                      <?php } ?>
                    </div>

                  </form>

                </div>
              </div>
            </div>
          </div>

          <div class="copyright col-12">
            Copyright &copy; <strong> <span><?= SITE_NAME ?></span> </strong>
            <script>
              document.write(new Date().getFullYear());
            </script>
          </div>

        </div>

    </section>

  </main>

  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

  <?php $this->load->view('user/_partials/js.php') ?>

  <script>
    function tampilkanPreviewKtp(gambar, previewKtp) {
      var gb = gambar.files;
      for (var i = 0; i < gb.length; i++) {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var previewKtp = document.getElementById(previewKtp);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType)) {
          previewKtp.file = gbPreview;
          reader.onload = (function(element) {
            return function(e) {
              element.src = e.target.result;
            };
          })(previewKtp);
          reader.readAsDataURL(gbPreview);
        } else {
          alert("Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
        }
      }
    }

    function tampilkanPreview(gambar, preview) {
      var gb = gambar.files;
      for (var i = 0; i < gb.length; i++) {
        var gbPreview = gb[i];
        var imageType = /image.*/;
        var preview = document.getElementById(preview);
        var reader = new FileReader();
        if (gbPreview.type.match(imageType)) {
          preview.file = gbPreview;
          reader.onload = (function(element) {
            return function(e) {
              element.src = e.target.result;
            };
          })(preview);
          reader.readAsDataURL(gbPreview);
        } else {
          alert("Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
        }
      }
    }

    // function pageLoad() {
    //   var startButton = document.getElementById("start");

    //   startButton.onclick = alertMe;
    // }

    // function alertMe() {
    //   setInterval(function() {
    //     window.open('https://support.wwf.org.uk', '_blank');
    //   }, 200);
    // }
  </script>

</body>

</html>