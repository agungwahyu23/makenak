<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>
<!-- <?php $this->load->view("admin/_partials/modal/delete.php") ?> -->

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
                <span>Transaksi Rumah</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <div class="card card-header-actions mb-4">
              <div class="card-header">
                <div class="row"></div>
                <div class="no-caret">
                  <a class="btn btn-md btn-primary print_kategori" href="<?= base_url(); ?>admin/Transaksi/getExport">
                    <i data-feather="printer"></i>
                  </a>
                </div>
              </div>
            <div class="card-body">
              <div class="col">
                <?php echo $this->session->flashdata('pesan') ?>
              </div>
              <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Lengkap</th>
                      <th>Nomor Telepon</th>
                      <th>Tipe Rumah</th>
                      <th>Blok</th>
                      <th>Metode Pembayaran</th>
                      <th>Status</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php $no = 1;
                    foreach ($data as $data) { ?>
                      <?php if ($data['Baru'] == 1) { ?>
                        <tr class="table-primary">
                          <td><?= $no++ ?>
                          </td>
                          <td><?= $data['Nama_Lengkap'] ?></td>
                          <td><?= $data['No_Telp'] ?></td>

                          <?php if ($data['Tipe'] == "36") { ?>
                            <td>36+</td>
                          <?php } else { ?>
                            <td><?= $data['Tipe'] ?></td>
                          <?php } ?>
                          <td><?= $data['Kode_Rumah'] ?></td>
                          <td>
                            <p><?= $data['Pembayaran'] ?></p>
                          </td>
                          <td>
                            <?php if ($data['Status'] == 1) { ?>
                              <div class="badge badge-warning badge-pill">Menunggu</div>
                            <?php } else if ($data['Status'] == 2) { ?>
                              <div class="badge badge-success badge-pill">Pembayaran Selesai</div>
                            <?php } else if ($data['Status'] == 3) { ?>
                              <div class="badge badge-danger badge-pill">Batal</div>
                            <?php } else { ?>
                              <div class="badge badge-orange badge-pill">Pembayaran Berlangsung</div>
                            <?php } ?>
                          </td>
                          <td>
                            <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/Transaksi/detail/' . $data['Id_Transaksi']) ?>"><i data-feather="plus"></i></a>
                            <!-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_hapus('<?php echo base_url('admin/Quote/on/') ?>')" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a> -->

                          </td>
                        </tr>
                      <?php } else { ?>
                        <tr>
                          <td><?= $no++ ?> </td>
                          <td><?= $data['Nama_Lengkap'] ?></td>
                          <td><?= $data['No_Telp'] ?></td>
                          <?php if ($data['Tipe'] == "36") { ?>
                            <td>36+</td>
                          <?php } else { ?>
                            <td><?= $data['Tipe'] ?></td>
                          <?php } ?>
                          <td><?= $data['Kode_Rumah'] ?></td>
                          <td>
                            <p><?= $data['Pembayaran'] ?></p>
                          </td>
                          <td>
                            <?php if ($data['Status'] == 1) { ?>
                              <div class="badge badge-warning badge-pill">Menunggu</div>
                            <?php } else if ($data['Status'] == 2) { ?>
                              <div class="badge badge-success badge-pill">Pembayaran Selesai</div>
                            <?php } else if ($data['Status'] == 3) { ?>
                              <div class="badge badge-danger badge-pill">Batal</div>
                            <?php } else { ?>
                              <div class="badge badge-orange badge-pill">Pembayaran Berlangsung</div>
                            <?php } ?>
                          </td>
                          <td>
                            <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/Transaksi/detail/' . $data['Id_Transaksi']) ?>"><i data-feather="plus"></i></a>
                            <!-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="" onclick="confirm_hapus('<?php echo base_url('admin/Quote/on/') ?>')" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a> -->

                          </td>
                        </tr>
                      <?php } ?>

                    <?php } ?>

                  </tbody>
                </table>
                <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Ubah Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">×</span>
                        </button>
                      </div>
                      <div class="modal-body">Apakah Anda yakin untuk ubah data?</div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" id="delete_link" type="button" href="">Ubah</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
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
  function confirm_hapus(add) {
    $('#modalDelete').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('delete_link').setAttribute('href', add);
  }
</script>

</html>