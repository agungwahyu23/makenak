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
                <div class="page-header-icon"><i data-feather="home"></i></div>
                <span>Detail Rumah</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Detail Rumah</div>
              <div class="card-body">
                <?php foreach ($data as $d) { ?>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <img src="<?= base_url('uploads/Rumah/' . $d['Banner']) ?>" alt="">
                    </div>

                  </div>
                  <div class="row mt-3">
                    <div class="form-group col-lg-12 col-sm-12">
                      <h3>Judul</h3>
                      <p><?= $d['Judul'] ?></p>
                    </div>
                    <!-- <div class="form-group col-lg-4 col-sm-12">
                      <h3>Blok</h3>
                      <p><?= $d['Blok'] ?></p>
                    </div> -->
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Type Rumah</h3>
                      <p><?= $d['Tipe'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Luas Tanah</h3>
                      <p><?= $d['Luas_Tanah'] ?></p>
                    </div>
                    <div class="form-group col-lg-6 col-sm-6">
                      <h3>Harga Rumah</h3>
                      <p>IDR <?= number_format($d['Harga'], 2, ",", ".") ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <h3>Deskripsi</h3>
                      <p><?= $d['Deskripsi'] ?></p>
                    </div>
                  </div>
                <?php } ?>

                <hr />
                <h1>Galeri</h1>
                <div class="row">
                  <?php foreach ($galeri as $g) { ?>
                    <div class="form-group col-lg-3 col-sm-12">
                      <div class="card mr-2" style="width: 190px;">
                        <img class="card-img-top img-thumbnail rounded" src="<?= base_url('uploads/Rumah/' . $g['Galeri']) ?>" alt="Card image cap">
                      </div>
                    </div>

                  <?php } ?>
                </div>
              </div>
            </div>
            <a class="btn btn-danger" href="javascript:history.go(-1)">
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
  CKEDITOR.replace('deskripsi');
</script>
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