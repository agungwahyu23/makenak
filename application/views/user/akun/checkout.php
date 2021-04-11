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

                  <form action="" method="post" enctype="multipart/form-data">
                    <?php echo $this->session->flashdata('message') ?>
                    <h3 class="sub-title">Data Penerima</h3>
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_lengkap">Nama Lengkap Penerima</label>
                        <?= form_error('nama', '<small class="text-danger pl-2">', '</small>'); ?>
                        <input type="text" class="form-control mb-3" id="nama_lengkap" name="nama" placeholder="Nama Lengkap Penerima" value="<?= $user['Nama'] ?>">
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="email">Email Penerima</label>
                        <?= form_error('email', '<small class="text-danger pl-2">', '</small>'); ?>
                        <input type="email" class="form-control mb-3" id="email" name="email" placeholder="Email Penerima" value="<?= $user['Email'] ?>">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="whatsapp">Nomor Whatsapp Penerima</label>
                        <?= form_error('noWa', '<small class="text-danger pl-2">', '</small>'); ?>
                        <input type="number" class="form-control mb-3" id="no_telp" name="noWa" placeholder="Nomor Whatsapp Penerima" value="<?= $user['No_Hp'] ?>">
                      </div>
                      <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Alamat Penerima</label>
                        <?= form_error('alamat', '<small class="text-danger pl-2">', '</small>'); ?>
                        <input type="text" class="form-control mb-3" id="alamat" name="alamat" placeholder="Alamat Penerima">
                      </div>
                    </div>
                    <div class="row">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1" for="kelurahan">Provinsi</label>
                        <?= form_error('provinsi', '<small class="text-danger pl-2">', '</small>'); ?>
                        <select class="form-select mb-3" id="provinsi" name="provinsi">
                          <option value="">-- Pilih Provinsi-- </option>
                          <?php foreach ($provinsi as $data) { ?>
                            <option value="<?= $data['id'] ?>"><?= $data['name'] ?></option>
                          <?php } ?>
                        </select>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1" for="kelurahan">Kabupaten/Kota</label>
                        <?= form_error('kabKota', '<small class="text-danger pl-2">', '</small>'); ?>
                        <select class="form-select mb-3" id="kabKota" name="kabKota">
                          <option value="">-- Pilih Kabupaten/Kota-- </option>
                        </select>
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Kecamatan</label>
                        <?= form_error('kecamatan', '<small class="text-danger pl-2">', '</small>'); ?>
                        <input type="text" class="form-control mb-3" id="kecamatan" name="kecamatan" placeholder="Kecamatan">
                      </div>
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Desa</label>
                        <?= form_error('desa', '<small class="text-danger pl-2">', '</small>'); ?>
                        <input type="text" class="form-control mb-3" name="desa" placeholder="Desa">
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <!-- <?= form_error('ongkir', '<small class="text-danger pl-2">', '</small>'); ?> -->
                        <input type="hidden" class="form-control mb-3" id="inputOngkir" name="ongkir">
                      </div>
                      <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12">
                        <!-- <?= form_error('idTransaksi', '<small class="text-danger pl-2">', '</small>'); ?> -->
                        <input type="hidden" class="form-control mb-3" name="idTransaksi" value="<?= $keranjang['idTransaksi'] ?>">
                      </div>
                      <!-- <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Id Detail Transaksi</label>
                        <input type="text" class="form-control mb-3" name="idDetailTransaksi" required value="<?= $keranjang['idTransaksi'] ?>">
                      </div> -->
                    </div>

                    <hr>

                    <div class="row justify-content-end">

                      <div class="mb-5 col-md-4">
                        <table class="table">
                          <tbody>
                            <tr>
                              <td>Total Belanja</td>
                              <td><b>Rp. <?= $keranjang['totalBayar'] ?></b></td>
                            </tr>
                          </tbody>
                          <tbody>
                            <tr>
                              <td>Ongkir</td>
                              <td><b id="ongkir"></b></td>
                            </tr>
                          </tbody>
                          <tbody>
                            <tr>
                              <td>Total Bayar </td>
                              <td><b id="total"></b></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                    </div>
                    <!-- <div class="row mb-5">
                      <div>Total Belanja <b>Rp. <?= $keranjang['totalBayar'] ?></b></div>
                      <div>Ongkir <b id="ongkir"></b></div>
                      <div>Total Bayar <b id="total"></b></div>
                    </div> -->
                    <!-- <div class="row justify-content-end">
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
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
                      <div class="col-xl-3 col-lg-3 col-md-3 col-sm-12 col-xs-12">
                        <div>
                          Rp. <?= $keranjang['totalBayar'] ?>
                        </div>
                        <div id="ongkir">
                          Rp.
                        </div>
                        <div>
                          <strong id="total">Rp. </strong>
                        </div>
                      </div>
                    </div> -->

                    <hr>

                    <div class="row justify-content-center mb-4">
                      <div class="col-lg-12 col-sm-12 text-center">
                        <h3 class="sub-title">Upload Data Pembayaran</h3>
                      </div>
                    </div>

                    <div class="row justify-content-center">
                      <div class="col-lg-6 col-sm-6 mb-4">
                        <div class="row">
                          <div class="col-auto align-self-center">
                            <div>
                              <img src="<?= base_url('img/icon/bca.png') ?>" width="100px" alt="">
                            </div>
                          </div>
                          <div class="col bank">
                            <div>
                              <?= $bca['namaBank'] ?> <br>
                              <?= $bca['nomorRekening'] ?> <br>
                              <?= $bca['namaTabungan'] ?>
                            </div>
                          </div>
                          <div class="col-auto align-self-center">
                            <div>
                              <img src="<?= base_url('img/icon/mandiri.png') ?>" width="100px" alt="">
                            </div>
                          </div>
                          <div class="col bank">
                            <div>
                              <?= $mandiri['namaBank'] ?> <br>
                              <?= $mandiri['nomorRekening'] ?> <br>
                              <?= $mandiri['namaTabungan'] ?>
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
                              <?= $bri['namaBank'] ?> <br>
                              <?= $bri['nomorRekening'] ?> <br>
                              <?= $bri['namaTabungan'] ?>
                            </div>
                          </div>
                          <div class="col-auto align-self-center">
                            <div>
                              <img src="<?= base_url('img/icon/bni.png') ?>" width="100px" alt="">
                            </div>
                          </div>
                          <div class="col bank">
                            <div>
                              <?= $bni['namaBank'] ?> <br>
                              <?= $bni['nomorRekening'] ?> <br>
                              <?= $bni['namaTabungan'] ?>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="col-tf col-lg-6 col-sm-6">

                        <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_pengirim">Nama Pengirim di Rekening Bank</label>
                            <?= form_error('namaPengirim', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="text" class="form-control mb-3" id="nama_pengirim" name="namaPengirim" placeholder="Nama Pengirim di Rekening Bank">
                          </div>
                        </div>
                        <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_bank">Transfer Dari Bank</label>
                            <?= form_error('namaBank', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="text" class="form-control mb-3" id="nama_bank" name="namaBank" placeholder="Masukkan Nama Bank">
                          </div>
                        </div>

                        <div class="row">
                          <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-xs-12"><label class="small mb-1" for="foto_ktp">Upload Bukti Pembayaran</label>
                            <?= form_error('bukti', '<small class="text-danger pl-2">', '</small>'); ?>
                            <input type="file" class="form-control mb-3" name="bukti" />
                          </div>
                        </div>

                      </div>
                    </div>

                    <div class="d-flex justify-content-end">
                      <button type="submit" class="btn btn-primary" id="start">
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


  <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#kabKota').change(function() {
        var idKab = $(this).val(); //id kab_kota
        var idProv = $('#provinsi').val();
        // console.log(idKab);
        $.ajax({
          url: "<?= base_url(); ?>DataWilayah/Ongkir",
          method: "POST",
          data: {
            idKab: idKab,
            idProv: idProv
          },
          async: false,
          dataType: "json",
          success: function(data) {
            console.log(data);

            if (data.wilayah[0].province_id === "35" && data.wilayah[0].id === "999") { // kota jember
              $('#ongkir').html('Rp. ' + Intl.NumberFormat().format(data.ongkirJember[0].harga));
              $('#inputOngkir').val(data.ongkirJember[0].harga);
              $('#total').html("Rp. " + Intl.NumberFormat().format((parseInt(data.transaksi[0].totalBayar) + parseInt(data.ongkirJember[0].harga))));
            } else if (data.wilayah[0].province_id === "35") { // jawa timur
              for (i = 0; i < data.produk.length; i++) {
                if (parseInt(data.produk[i].jumlahBeli) < parseInt(data.produk[i].isiDus)) { // kurang dari 1 dus
                  Swal.fire({
                    icon: 'error',
                    title: '<h4>Peringatan Untuk Produk ' + data.produk[i].namaProduk + '</h4>',
                    text: 'Minimal pembelian daerah jawa timur ' + data.produk[i].isiDus + ' Toples/Bal, (1 Dus, 1 varian)',
                    footer: '<a href="<?= base_url('Dashboard/keranjang') ?>">Lihat Keranjang</a>'
                  }).then(function() {
                    window.location = "<?= base_url('Dashboard/checkout') ?>";
                  });
                } else {

                  if ((parseInt(data.produk[i].jumlahBeli) % parseInt(data.produk[i].isiDus)) !== 0) { // bukan kelipatan 1 dus
                    Swal.fire({
                      icon: 'error',
                      title: '<h4>Peringatan Untuk Produk ' + data.produk[i].namaProduk + '</h4>',
                      text: 'Pembelian Hanya Berlaku Kelipatan 1 Dus, (1 Dus, 1 Varian)',
                      footer: '<a href="<?= base_url('Dashboard/keranjang') ?>">Lihat Keranjang</a>'
                    }).then(function() {
                      window.location = "<?= base_url('Dashboard/checkout') ?>";
                    });
                  } else {
                    $('#ongkir').html("Rp. " + Intl.NumberFormat().format(data.ongkir[0].harga));
                    $('#inputOngkir').val(data.ongkir[0].harga);
                    $('#total').html("Rp. " + Intl.NumberFormat().format((parseInt(data.transaksi[0].totalBayar) + parseInt(data.ongkir[0].harga))));

                  }
                }
              }
            } else { // jawa barat dan jawa tengah
              for (i = 0; i < data.produk.length; i++) {
                if (parseInt(data.totalDus[0].totalDus) < 3) { //gak sampai 3 dus
                  Swal.fire({
                    icon: 'error',
                    title: '<h4>Peringatan</h4>',
                    text: 'Minimal pembelian di luar jawa timur 3 Koli atau 3 Dus',
                    footer: '<a href="<?= base_url('Dashboard/keranjang') ?>">Lihat Keranjang</a>'
                  }).then(function() {
                    window.location = "<?= base_url('Dashboard/checkout') ?>";
                  });
                } else {
                  if ((parseInt(data.produk[i].jumlahBeli) % parseInt(data.produk[i].isiDus)) !== 0) { // bukan kelipatan 1 dus
                    Swal.fire({
                      icon: 'error',
                      title: '<h4>Peringatan Untuk Produk ' + data.produk[i].namaProduk + '</h4>',
                      text: 'Pembelian Hanya Berlaku Kelipatan 1 Dus, (1 Dus, 1 Varian)',
                      footer: '<a href="<?= base_url('Dashboard/keranjang') ?>">Lihat Keranjang</a>'
                    }).then(function() {
                      window.location = "<?= base_url('Dashboard/checkout') ?>";
                    });
                  } else {
                    $('#ongkir').html("Rp. " + Intl.NumberFormat().format(data.ongkir[0].harga));
                    $('#inputOngkir').val(data.ongkir[0].harga);
                    $('#total').html("Rp. " + Intl.NumberFormat().format((parseInt(data.transaksi[0].totalBayar) + parseInt(data.ongkir[0].harga))));
                  }
                }
              }
            }
          }
        });
      });
    });
  </script>

  <!-- <script>
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
    } -->

  <!-- // function pageLoad() {
    //   var startButton = document.getElementById("start");

    //   startButton.onclick = alertMe;
    // }

    // function alertMe() {
    //   setInterval(function() {
    //     window.open('https://support.wwf.org.uk', '_blank');
    //   }, 200);
    // } -->
  </script>

</body>

</html>