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
                <span>Tambah Desain Rumah</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Tambah Desain</div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Nama Desain</label>
                    <input class="form-control" name="nama" type="text" placeholder="Nama Desain" />
                    <input class="form-control" name="id_desain_rumah" type="hidden" placeholder="" value="<?= $kd ?>" />
                  </div>
                  <!-- <div class="form-group col-lg-4 col-sm-12">
                    <label>Blok</label>
                    <select class="form-control" name="blok">
                      <option value="A - 1">A - 1</option>
                      <option value="A - 2">A - 2</option>
                      <option value="A - 3">A - 3</option>
                      <option value="A - 4">A - 4</option>
                      <option value="A - 5">A - 5</option>
                      <option value="A - 6">A - 6</option>
                      <option value="A - 7">A - 7</option>
                    </select>
                  </div> -->
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Kategori</label>
                    <select class="form-control" name="kategori">
                      <option value="">Pilih kategori</option>
                      <?php foreach ($kategori as $k) : ?>
                        <option value="<?= $k['id_kategori_rumah']; ?>"><?= $k['nama_kategori']; ?></option>
                      <?php endforeach; ?>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-6">
                    <label>Banner</label>
                    <input name="banner" id="banner" type="file" accept="image/*" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2" required>
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
                    <textarea class="form-control" name="deskripsi" id="deskripsi"></textarea>
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