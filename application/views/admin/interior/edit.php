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
                <span>Edit Desain Interior</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Edit Desain Interior</div>
              <?php foreach ($data as $d) { ?>
                <div class="card-body">
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Nama Desain</label>
                      <input class="form-control" name="nama" type="text" placeholder="Nama Desain" value="<?= $d['nama'] ?>" />
                    </div>
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Kategori</label>
                      <select class="form-control" name="kategori">
                        <?php foreach ($kategori as $k) : ?>
                          <option value="<?= $k['id_kategori_interior'] ?>" <?= ($d['id_kategori_interior'] == $k['id_kategori_interior'] ? 'selected' : '') ?>><?= $k['nama_kategori'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-6 col-sm-6">
                      <label>Banner</label>
                      <input name="banner" id="banner" type="file" accept="image/*" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                    </div>
                    <div class="col-sm-12 col-lg-6">
                      <div class="input-group">
                        <label>Image Preview</label>
                        <br />
                      </div>
                      <img id="preview" src="" alt="" style="width:140px" /> <br>
                    </div>
                  </div>
                  <div class="row">
                    <div class="form-group col-lg-12 col-sm-12">
                      <label>Deskripsi</label>
                      <textarea class="form-control" name="deskripsi" id="deskripsi"><?= $d['deskripsi'] ?></textarea>
                    </div>
                  </div>
                </div>
              <?php } ?>
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