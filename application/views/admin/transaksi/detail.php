<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>

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
                <div class="page-header-icon"><i data-feather="file-text"></i></div>
                <span>Detail Transaksi</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Detail Transaksi</div>
              <div class="card-body">
                <?php foreach ($data as $d) { ?>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Nama Lengkap</h3>
                      <p><?= $d['Nama_Lengkap'] ?></p>
                    </div>
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Email</h3>
                      <p><?= $d['Email'] ?></p>
                    </div>
                  </div>
                  <div class="row mt-3">
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Nomor Telepon</h3>
                      <p><?= $d['No_Telp'] ?></p>
                    </div>
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Alamat</h3>
                      <p><?= $d['Alamat'] ?></p>
                    </div>
                  </div>
                  <div class="row">
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
                  </div>
                  <hr />
                  <h1>Konfirmasi Pembayaran</h1>


                  <h5>Data Bangunan</h5>
                  <div class="d-flex justify-content-start mb-4 align-content-center">

                    <img src="<?= base_url('uploads/Rumah/' . $d['Banner']) ?>" width="120px">
                    <div class="col">
                      <div class="house-type">
                        <?php if ($d['Tipe'] == "36") { ?>
                          <h4><strong>Tipe : </strong> 36+</h4>
                        <?php } else { ?>
                          <h4><strong>Tipe : </strong> <?= $d['Tipe'] ?></h4>
                        <?php } ?>

                      </div>
                      <div class="house-type">
                        <h4><strong>Blok : </strong> <?= $d['Kode_Rumah'] ?></h4>
                      </div>
                    </div>
                    <div class="house-type">
                      <h4> Harga : <strong><?= number_format($d['Harga'], 2, ",", ".") ?></strong></h4>
                    </div>

                  </div>
                  <div class="row mr-3">
                    <div class="col-lg-12 col-sm-12 ">
                      <?php if ($d['Pembayaran'] == "Cash") { ?>
                        <a href="<?= base_url('admin/Transaksi/Selesai/' . $d['Id_Transaksi']) ?>" class="btn btn-primary btn-sm">Selesaikan Transaksi</a>
                        <a href="<?= base_url('admin/Transaksi/Tolak/' . $d['Id_Transaksi']) ?>" class="btn btn-danger btn-sm">Tolak Transaksi</a>
                      <?php } ?>
                      <?php if ($d['Pembayaran'] == "KPR" || $d['Pembayaran'] == "Cash Tempo") { ?>
                        <?php if ($d['Status'] == 4) { ?>
                          <a href="<?= base_url('admin/Transaksi/Selesai/' . $d['Id_Transaksi']) ?>" class="btn btn-primary btn-sm">Selesaikan Transaksi</a>
                          <a href="<?= base_url('admin/Transaksi/Tolak/' . $d['Id_Transaksi']) ?>" class="btn btn-danger btn-sm">Tolak Transaksi</a>
                        <?php } else if ($d['Status'] == 1) { ?>
                          <a href="<?= base_url('admin/Transaksi/Berlangsung/' . $d['Id_Transaksi']) ?>" class="btn btn-success btn-sm">Terima Pembayaran</a>
                          <a href="<?= base_url('admin/Transaksi/Tolak/' . $d['Id_Transaksi']) ?>" class="btn btn-danger btn-sm">Tolak Transaksi</a>
                        <?php } ?>

                      <?php } ?>
                    </div>
                  </div>
                <?php } ?>


              </div>
            </div>
            <a class="btn btn-orange" href="javascript:history.go(-1)">
              Kembali
            </a>
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