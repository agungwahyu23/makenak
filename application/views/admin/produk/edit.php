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
                <span>Edit Produk</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form action="" method="post" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Edit Produk</div>
              <div class="card-body">
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Nama Produk</label>
                    <?= form_error('namaProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="namaProduk" type="text" placeholder="Nama Produk" value="<?= $produk['namaProduk'] ?>" />
                  </div>
                  <div class="form-group col-lg-6 col-sm-12">
                    <label>Kategori Produk</label>
                    <?= form_error('kategoriProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <select class="form-control" name="kategoriProduk">
                      <option value="<?= set_value('kategori') ?>">--- Pilih ---</option>
                      <?php foreach ($kategori as $row) { ?>
                        <option value="<?= $row['idkategori']; ?>" <?php echo ($sub[0]->idKategori == $row['idkategori'] ? 'selected' : '') ?>>
                          <?= $row['kategori'] ?></option>
                      <?php } ?>
                      <!-- <option value="60"></option>
                        <option value="Ruko">Ruko</option> -->
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-4 col-sm-4">
                    <label>Netto Produk</label>
                    <?= form_error('nettoProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="nettoProduk" type="text" placeholder="Netto Produk" value="<?= $produk['netto'] ?>" />
                  </div>
                  <div class="form-group col-lg-4 col-sm-4">
                    <label>Stok Produk</label>
                    <?= form_error('stokProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="stokProduk" type="number" placeholder="Harga Produk" value="<?= $produk['stok'] ?>" />
                  </div>
                  <div class="form-group col-lg-4 col-sm-4">
                    <label>Isi Per Dus</label>
                    <?= form_error('perDus', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="perDus" type="number" placeholder="isi Per Produk" value="<?= $produk['isiDus'] ?>" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-3 col-sm3">
                    <label>Harga Produk</label>
                    <?= form_error('hargaProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="hargaProduk" type="number" placeholder="Harga Produk" value="<?= $produk['harga'] ?>" />
                  </div>
                  <div class="form-group col-lg-3 col-sm-3">
                    <label>Harga 50Pcs</label>
                    <?= form_error('harga50Pcs', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="harga50Pcs" type="number" placeholder="Harga 50Pcs" value="<?= $produk['harga50Pcs'] ?>" />
                  </div>
                  <div class="form-group col-lg-3 col-sm-3">
                    <label>Harga 1 Dus</label>
                    <?= form_error('harga1Dus', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="harga1Dus" type="number" placeholder="Harga 1 Dus" value="<?= $produk['harga1Dus'] ?>" />
                  </div>
                  <div class="form-group col-lg-3 col-sm-3">
                    <label>Harga 10Dus</label>
                    <?= form_error('harga10Dus', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="harga10Dus" type="number" placeholder="Harga 10 Dus" value="<?= $produk['harga10Dus'] ?>" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12 col-sm-12">
                    <label>Status Produk</label>
                    <?= form_error('statusProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <select class="form-control" name="statusProduk">
                      <option value="">--- Pilih ---</option>
                      <option value="1" <?= $produk['status'] == 1 ? 'selected' : '' ?>>Tampil</option>
                      <option value="2" <?= $produk['status'] == 2 ? 'selected' : '' ?>>Tidak Tampil</option>
                    </select>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-12 col-sm-6">
                    <label>Komposisi Produk</label>
                    <?= form_error('komposisiProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <input class="form-control" name="komposisiProduk" type="text" placeholder="Komposisi" value="<?= $produk['komposisi'] ?>" />
                  </div>
                </div>
                <div class="row">
                  <div class="form-group col-lg-6 col-sm-6">
                    <label>Gambar Produk</label>
                    <input name="gambarProduk" id="banner" type="file" accept="image/*" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
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
                    <?= form_error('deskripsiProduk', '<small class="text-danger pl-2">', '</small>'); ?>
                    <textarea class="form-control" name="deskripsiProduk" id="deskripsi">
                      <?= $produk['deskripsi'] ?>
                      </textarea>
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