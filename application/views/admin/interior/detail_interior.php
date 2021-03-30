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
                <span>Detail Interior</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Detail Interior</div>
              <div class="card-body">
                <?php foreach ($data as $d) { ?>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <img src="<?= base_url('uploads/Desain_Interior/' . $d['foto']) ?>" alt="" style="max-width: 25vw;">
                    </div>

                  </div>
                  <div class="row mt-3">
                    <div class="form-group col-lg-12 col-sm-12">
                      <h3>Nama Desain</h3>
                      <p><?= $d['nama'] ?></p>
                    </div>
                    <div class="form-group col-lg-4 col-sm-12">
                      <h3>Kategori</h3>
                      <p><?= $d['nama_kategori'] ?></p>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <h3>Deskripsi</h3>
                      <p><?= $d['deskripsi'] ?></p>
                    </div>
                  </div>
                <?php } ?>
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