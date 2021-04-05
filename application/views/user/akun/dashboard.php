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
                <a href="<?php echo base_url('Dashboard')?>" class="list-group-item">Status Pesanan Anda</a>
                <a href="<?php echo base_url('Dashboard/keranjang')?>" class="list-group-item">Keranjang Belanja</a>
              </div>

            </div>
            <div class="col-lg-8">
              
              <div class="card">
                <div class="card-header p-2">
                  <h4>Data Status Pesanan Anda</h4>
                </div><!-- /.card-header -->
                <div class="card-body">
                  <div class="tab-content">
                    <div class="active tab-pane" id="activity">
                      
                    <div class="row">

                      <div class="col-xxl-3 col-lg-4">
                        <div class="card bg-warning text-white mb-4">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="mr-3">
                                <div class="text-white-75 small">Menunggu Konfirmasi</div>
                                <div class="text-lg font-weight-bold"><?= $transaksiMenunggu?></div>
                              </div>
                              <i class="feather-xl text-white-50" data-feather="activity"></i>
                            </div>
                          </div>
                          <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url('Dashboard/konfirmasi') ?>">Lihat
                              Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xxl-3 col-lg-4">
                        <div class="card bg-primary text-white mb-4">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="mr-3">
                                <div class="text-white-75 small">Pesanan Diproses</div>
                                <div class="text-lg font-weight-bold"><?= $transaksiDiproses?></div>
                              </div>
                              <i class="feather-xl text-white-50" data-feather="activity"></i>
                            </div>
                          </div>
                          <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url('Dashboard/proses') ?>">Lihat
                              Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          </div>
                        </div>
                      </div>

                      <div class="col-xxl-3 col-lg-4">
                        <div class="card bg-success text-white mb-4">
                          <div class="card-body">
                            <div class="d-flex justify-content-between align-items-center">
                              <div class="mr-3">
                                <div class="text-white-75 small">Pesanan Dikirim</div>
                                <div class="text-lg font-weight-bold"><?= $transaksiDikirim?></div>
                              </div>
                              <i class="feather-xl text-white-50" data-feather="activity"></i>
                            </div>
                          </div>
                          <div class="card-footer d-flex align-items-center justify-content-between">
                            <a class="small text-white stretched-link" href="<?= base_url('Dashboard/dikirim') ?>">Lihat
                              Detail</a>
                            <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                          </div>
                        </div>
                      </div>

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