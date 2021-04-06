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
                <img class="checkout-logo" src="<?= base_url('img/icon/logo1.png') ?>" alt="Logo">
              </div>
              <div class="card-body">
                <div class="col">

                  <form action="#" method="post" enctype="multipart/form-data">
                    <!-- <?php foreach ($deskripsi as $d) { ?>
                      <input type="hidden" name="no_telp_wa" value="<?= $d['No_Telp'] ?>">
                    <?php } ?> -->

                    <h3 class="sub-title">Data Calon Pembeli</h3>
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_lengkap">Nama Lengkap Penerima</label>
                        <input type="text" class="form-control mb-3" id="nama_lengkap" name="nama_lengkap" placeholder="Nama Lengkap Penerima" required>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="email">Email Penerima</label>
                        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email Penerima" required>
                      </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1"
                                for="whatsapp">Nomor Whatsapp Penerima</label>
                            <input type="number" class="form-control mb-3" id="no_telp" name="no_telp"
                                placeholder="Nomor Whatsapp Penerima" required>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1"
                                for="alamat">Alamat Penerima</label>
                            <input type="text" class="form-control mb-3" id="alamat" name="alamat"
                                placeholder="Alamat Penerima" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1"
                                for="kelurahan">Kelurahan</label>
                            <input type="text" class="form-control mb-3" id="kelurahan" name="kelurahan"
                                placeholder="Kelurahan" required>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1"
                                for="kecamatan">Kecamatan</label>
                            <input type="text" class="form-control mb-3" id="kecamatan" name="kecamatan"
                                placeholder="Kecamatan" required>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1"
                                for="kabupaten">Kabupaten</label>
                            <input type="text" class="form-control mb-3" id="kabupaten" name="kabupaten"
                                placeholder="kabupaten" required>
                        </div>
                        <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1"
                                for="kelurahan">Provinsi</label>
                            <select class="form-select mb-3" id="bank" name="bank" required>
                                <option value="">-- Pilih Provinsi-- </option>
                                <option value="Jawa Timur">Jawa Timur</option>
                                <option value="Jawa Tengah">Jawa Tengah</option>
                                <option value="Jawa Barat">Jawa Barat</option>
                            </select>
                        </div>
                    </div>
                    
                    <hr>

                    <div class="row justify-content-end">
                        <div class="col-3">
                            <div>
                                Total Belanja
                            </div>
                            <div>
                                Ongkir
                            </div>
                            <div>
                                <strong>Total Bayar</strong>
                            </div>
                        </div>
                        <div class="col-3">
                            <div>
                                Rp. 100.000
                            </div>
                            <div>
                                Rp. 50.000
                            </div>
                            <div>
                                <strong>Rp. 150.000</strong>
                            </div>
                        </div>
                    </div>

                    <hr>

                    <div class="row justify-content-center">
                        <div class="col-lg-12 col-sm-12 text-center">
                            <h3 class="sub-title">Data Calon Pembeli</h3>
                        </div>
                    </div>

                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-sm-6">
                            <div class="row">
                                <div class="col-auto align-self-center">
                                    <div>
                                        <img src="<?= base_url('img/icon/bca.png') ?>" width="100px" alt="">
                                    </div>
                                </div>
                                <div class="col bank">
                                    <div>
                                        Bank Central Asia <br>
                                        2000423290 <br>
                                        Dono Febriono
                                    </div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div>
                                        <img src="<?= base_url('img/icon/mandiri.png') ?>" width="100px" alt="">
                                    </div>
                                </div>
                                <div class="col bank">
                                    <div>
                                        Bank Mandiri <br>
                                        1430017476514 <br>
                                        Dono Febriono
                                    </div>
                                </div>
                            </div>
                            <div class="row mt-4">
                                <div class="col-auto align-self-center">
                                    <div>
                                        <img src="<?= base_url('img/icon/bri.png') ?>" width="100px" alt="">
                                    </div>
                                </div>
                                <div class="col bank">
                                    <div>
                                        Bank Rakyat Indonesia <br>
                                        774901005607539 <br>
                                        Dono Febriono
                                    </div>
                                </div>
                                <div class="col-auto align-self-center">
                                    <div>
                                        <img src="<?= base_url('img/icon/bni.png') ?>" width="100px" alt="">
                                    </div>
                                </div>
                                <div class="col bank">
                                    <div>
                                        Bank Negara Indonesia <br>
                                        0450220002 <br>
                                        Dono Febriono
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-lg-6 col-sm-6">

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_pengirim">Nama Pengirim di Rekening Bank</label>
                                    <input type="text" class="form-control mb-3" id="nama_pengirim" name="nama_lengkap" placeholder="Nama Pengirim di Rekening Bank" required>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_bank">Transfer Dari Bank</label>
                                    <input type="text" class="form-control mb-3" id="nama_bank" name="nama_bank" placeholder="Masukkan Nama Bank" required>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1"
                                        for="foto_ktp">Upload Foto KTP</label>
                                    <input type="file" accept="image/*"
                                        onchange="tampilkanPreviewKtp(this, 'previewKtp')" class="form-control mb-3"
                                        id="foto_ktp" name="foto_ktp" required />
                                </div>
                            </div>

                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" type="button" id="start">
                          Checkout
                        </button>
                   
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