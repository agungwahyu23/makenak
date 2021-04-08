<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>

<?php

$dataWa = substr($dataPenerima['wa'], 1);

?>

<body class="nav-fixed">

  <!-- Topbar -->
  <?php $this->load->view("admin/_partials/topbar.php") ?>

  <div id="layoutSidenav">

    <!-- Sidebar -->
    <?php $this->load->view("admin/_partials/sidebar.php") ?>

    <div id="layoutSidenav_content">
      <main>
        <div class="page-header pb-10 page-header-dark bg-gradient-primary-to-secondary">
          <div class="container-fluid">
            <div class="page-header-content">
              <h1 class="page-header-title">
                <div class="page-header-icon"><i></i></div>
                <span>Barang yang ditolak</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Barang yang sudah ditolak</div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-6">
                    <h3>Nama Penerima</h3>
                    <p><?= $dataPenerima['namaPenerima'] ?></p>
                  </div>
                  <div class="form-group col-lg-6 col-sm-6">
                    <h3>Email Penerima</h3>
                    <p><?= $dataPenerima['emailPenerima'] ?></p>
                  </div>
                </div>
                <div class="row mt-3">
                  <div class="form-group col-lg-6 col-sm-6">
                    <h3>Nomor WhatsApp</h3>
                    <p><a href="https://api.whatsapp.com/send?phone=62<?= $dataWa?>&text=Hai%20kakak!%20Saya%20dari%20Admin%20Mak%20Enak%20ingin%20menginformasikan%20bahwa%20pesanan%20yang%20anda%20buat%20dengan%20data%20berikut%3A%20%0A1.%20nama%20rekening%20pengirim%20<?= $dataPenerima['namaPengirim']?>%0A2.%20tanggal%20pemesanan%20<?= $dataPenerima['tanggalTransaksi']?>%20%0A3.%20total%20pembayaran%20<?= number_format($dataPenerima['totalBayar'], 2, ",", ".") ?>"><?= $dataPenerima['wa'] ?></a></p>
                  </div>
                  <div class="form-group col-lg-6 col-sm-6">
                    <h3>Alamat</h3>
                    <p><?= $dataPenerima['alamatPenerima'] ?>, <?= $dataPenerima['desa'] ?>, <?= $dataPenerima['kecamatan'] ?>, <?= $dataPenerima['name'] ?>, <?= $provinsi['name'] ?></p>
                  </div>
                </div>
                <!-- <div class="row">
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Pekerjaan</h3>
                      <p><?= $d['Pekerjaan'] ?></p>
                    </div>
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Bank</h3>
                      <p>Bank <?= $d['Nama_Bank'] ?> <?= $d['Nomor_Rekening'] ?> (A/N : <?= $d['Nama_Pemilik'] ?>)</p>

                    </div>

                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Pembayaran</h3>
                      <p><?= $d['Pembayaran'] ?></p>
                    </div>
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Status</h3>
                      <?php if ($d['Status'] == 1) { ?>
                        <div class="badge badge-warning badge-pill">Menunggu</div>
                      <?php } else if ($d['Status'] == 2) { ?>
                        <div class="badge badge-success badge-pill">Pembayaran Selesai</div>
                      <?php } else if ($d['Status'] == 3) { ?>
                        <div class="badge badge-danger badge-pill">Batal</div>
                      <?php } else { ?>
                        <div class="badge badge-orange badge-pill">Pembayaran Berlangsung</div>
                      <?php } ?>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Foto KTP</h3>
                      <a href="<?= base_url('uploads/Files/' . $d['Foto_KTP']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">
                        <img src="<?= base_url('uploads/Files/' . $d['Foto_KTP']) ?>" style="width:160px; cursor: zoom-in;">
                      </a>
                    </div>
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Foto Bukti Transfer</h3>
                      <a href="<?= base_url('uploads/Files/' . $d['Foto_Bukti_TF']) ?>" data-gallery="portfolioGallery" class="portfokio-lightbox">
                        <img src="<?= base_url('uploads/Files/' . $d['Foto_Bukti_TF']) ?>" style="width:160px; cursor: zoom-in;">
                      </a>
                    </div>
                  </div> -->
                <hr />
                <h1>Produk yang dipesan :</h1>

                <div class="d-flex justify-content-start mb-4 align-content-center mt-3">
                  <div class="datatable table-responsive">

                    <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Produk</th>
                          <th>Harga Produk</th>
                          <th>Jumlah beli</th>
                          <th>Total Harga</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $i = 1;
                        foreach ($detailPemesanan as $data) { ?>
                          <tr class="table-primary">
                            <td><?= $i ?></td>
                            <td><?= $data['namaProduk'] ?></td>
                            <td>Rp. <?= number_format($data['harga'], 2, ",", ".") ?></td>
                            <td><?= $data['jumlahBeli'] ?> Toples</td>
                            <td>Rp. <?= number_format($data['totalHarga'], 2, ",", ".") ?></td>
                          </tr>
                        <?php $i++;
                        } ?>
                        <tr>
                          <td colspan="4" ></td>
                          <td>Rp. <?= number_format($dataPenerima['totalBayar'], 2, ",", ".") ?></td>
                        </tr>

                      </tbody>
                    </table>

                  </div>
                </div>


<!-- 
                <div class="row mr-3">
                  <div class="col-lg-12 col-sm-12 ">
                    <a href="<?= base_url('admin/Transaksi/selesaiDikemas/' . $dataPenerima['idTransaksi']) ?>" class="btn btn-success btn-sm">Selesai Dikemas</a>
                    <a href="<?= base_url('admin/Transaksi/dikemas') ?>" class="btn btn-danger btn-sm">Kembali</a>

                  </div>
                </div> -->


              </div>
            </div>

          </form>
        </div>
      </main>

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
  </div>

  <!-- JS -->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>
<script>
  function readURL(input) {
    if (input.files && input.files[0]) {
      var reader = new FileReader();

      reader.onload = function(e) {
        $('#preview').attr('src', e.target.result);
      }

      reader.readAsDataURL(input.files[0]); // convert to base64 string
    }
  }

  $("#banner").change(function() {
    readURL(this);
  });
</script>

</html>