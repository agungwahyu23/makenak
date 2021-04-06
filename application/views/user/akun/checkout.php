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

                    <h3 class="sub-title">Data Penerima</h3>
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_lengkap">Nama Lengkap Penerima</label>
                        <input type="text" class="form-control mb-3" id="nama_lengkap" name="nama" placeholder="Nama Lengkap Penerima" value="<?= $user['Nama'] ?>" required>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="email">Email Penerima</label>
                        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email Penerima" value="<?= $user['Email'] ?>" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="whatsapp">Nomor Whatsapp Penerima</label>
                        <input type="number" class="form-control mb-3" id="no_telp" name="noWa" placeholder="Nomor Whatsapp Penerima" value="<?= $user['No_Hp'] ?>" required>
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Alamat Penerima</label>
                        <input type="text" class="form-control mb-3" id="alamat" name="alamat" placeholder="Alamat Penerima" required>
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="kelurahan">Provinsi</label>
                        <select class="form-select mb-3" id="provinsi" name="provinsi" required>
                          <option value="">-- Pilih Provinsi-- </option>
                          <?php foreach ($provinsi as $data) { ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="kelurahan">Kabupaten/Kota</label>
                        <select class="form-select mb-3" id="kabKota" name="kabKota" required>
                          <option value="">-- Pilih Kabupaten/Kota-- </option>
                        </select>
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Kecamatan</label>
                        <input type="text" class="form-control mb-3" id="kecamatan" name="kecamatan" placeholder="Kecamatan" required>
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
                          Rp. <?= $keranjang['totalBayar'] ?>
                        </div>
                        <div id="ongkir">
                          Rp.
                        </div>
                        <div>
                          <strong>Rp. </strong>
                        </div>
                      </div>
                    </div>

                    <hr>

                    <div class="row justify-content-center mb-4">
                      <div class="col-lg-12 col-sm-12 text-center">
                        <h3 class="sub-title">Upload Data Pembayaran</h3>
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
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1" for="foto_ktp">Upload Foto KTP</label>
                            <input type="file" accept="image/*" onchange="tampilkanPreviewKtp(this, 'previewKtp')" class="form-control mb-3" id="foto_ktp" name="foto_ktp" required />
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


  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#provinsi').change(function() {
        var id_prov = $(this).val(); //id provinsi
        console.log(id_prov);
        $.ajax({
          url: "<?= base_url(); ?>DataWilayah",
          method: "POST",
          data: {
            id_prov: id_prov
          },
          async: false,
          dataType: "json",
          success: function(data) {
            var html = '<option value="">-- Pilih Kabupaten/Kota-- </option>';
            for (i = 0; i < data.length; i++) {
              html += '<option value="' + data[i].id + '">' + data[i].name + '</option>';
            }
            // $('#kabKota').html('');
            $('#kabKota').html(html);
            console.log(html);
          }
        });
      });
    });
  </script>

  <script type="text/javascript">
    $(document).ready(function() {
      $('#kabKota').change(function() {
        var idKab = $(this).val(); //id kab_kota
        // console.log(idKab);
        $.ajax({
          url: "<?= base_url(); ?>DataWilayah/Ongkir",
          method: "POST",
          data: {
            idKab: idKab
          },
          async: false,
          dataType: "json",
          success: function(data) {
            console.log(data);
            // if(data.wilayah[0].province_id === "35"){
            //   console.log('huhu')
            // }
            if(data.wilayah[0].province_id === "35" && data.wilayah[0].id === "999"){
              $('#ongkir').html("Rp. 0");
            }else if(data.wilayah[0].province_id === "35"){
              $('#ongkir').html("Rp. 45000");
            }else if(data.wilayah[0].province_id === "33" || data.wilayah[0].province_id === "34"){
              $('#ongkir').html("Rp. 75000");
            }else if(data.wilayah[0].province_id === "31" || data.wilayah[0].province_id === "32" || data.wilayah[0].province_id === "36"){
              $('#ongkir').html("Rp. 100000");
            }
            // var html = '';
            // for (i = 0; i < data.length; i++) {
            //   html += '<option value="' + data[i].id_kec + '">' + data[i].nama + '</option>';
            // }
            // $('#kecamatan').html(html);
          }
        });
      });
    });
  </script>

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