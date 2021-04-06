<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

  <main id="main">
    <div class="gap-80"></div>
    <section class="dasbor">
      <div class="container">
        <div class="row">
          <div class="col-lg-4">

            <div class="list-group">
              <div class="text-center list-group-item pb-3">
                <img class="profile-user-img img-fluid img-circle" src="<?= base_url('img/admin/user.png') ?>" width="50px" height="50px" alt="User profile picture">
              </div>
              <a href="<?php echo base_url('Dashboard') ?>" class="list-group-item">Status Pesanan Anda</a>
              <a href="<?php echo base_url('Dashboard/keranjang') ?>" class="list-group-item">Keranjang Belanja</a>
            </div>

          </div>
          <div class="col-lg-8">

            <div class="card">
              <div class="card-header p-2">
                <h4>Keranjang Belanja Anda</h4>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">
                  <div class="active tab-pane" id="activity">

                    <!-- Table row -->
                    <div class="row">
                      <div class="col-12 table-responsive">
                        <table class="table table-striped">
                          <thead>
                            <tr>
                              <th width="12%">Gambar</th>
                              <th width="30%">Product</th>
                              <th width="8%">Jumlah</th>
                              <th width="20%">Harga</th>
                              <th width="20%">Subtotal</th>
                              <th width="10%">Aksi</th>

                            </tr>
                          </thead>
                          <tbody>
                            <?php foreach ($keranjang as $data) { ?>
                              <tr>
                                <td><img style="size: 50px; width: 50px;" class="img-responsive" src="<?= base_url('img/produk/') . $data['gambar'] ?>" alt="Image"></td>
                                <td><?= $data['namaProduk'] ?></td>
                                <td><input type="text" class="form-control input-sm" name="jumlahBeli" value="<?= $data['jumlahBeli'] ?>" /></td>
                                <td><?= $data['harga'] ?></td>
                                <td><?= $data['totalHarga'] ?></td>
                                <td><a href="<?= base_url('Dashboard/hapusKeranjang/' . $data['idDetailTransaksi']) ?>">
                                    <span class="badge rounded-pill bg-danger">Hapus</span>
                                  </a></td>
                              </tr>
                            <?php } ?>
                          </tbody>
                        </table>
                      </div>
                      <?php if ($keranjang) { ?>
                        <a href="<?= base_url('Dashboard/checkout')?>" class="btn btn-success">Bayar Sekarang</a>
                      <?php } else { ?>
                        <div class="alert alert-light text-center" role="alert">
                         Tidak ada produk didalam keranjang
                        </div>
                      <?php } ?>
                      <!-- /.col -->
                    </div>
                    <!-- /.row -->

                    <div class="row">
                      <col-6></col-6>
                    </div>

                  </div>
                </div>
              </div>
            </div>





          </div>
        </div>
      </div>
    </section>
  </main>

  <?php $this->load->view('user/_partials/footer.php') ?>

  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

  <?php $this->load->view('user/_partials/js.php') ?>

</body>

</html>