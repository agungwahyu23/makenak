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
                <span>Edit Wilayah Pengiriman</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Edit Wilayah Pengiriman</div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Nama Provinsi</label>
                    <?= form_error('provinsi', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="provinsi" type="text" placeholder="Nama Provinsi" value="<?= $ongkir['provinsi']?>" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Biaya Pengiriman</label>
                    <?= form_error('harga', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="harga" type="number" placeholder="Biaya Pengiriman" value="<?= $ongkir['harga']?>" />
                  </div>
                </div>
              </div>
            </div>
            <button type="submit" class="btn btn-primary mr-2">
              Simpan
            </button>
            <a class="btn btn-danger" href="javascript:history.go(-1)">
              Batal
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