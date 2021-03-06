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
                <span>Data Satuan Produk</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <div class="card mb-4">
            <div class="card-header">
              <a class="btn btn-primary btn-sm shadow-sm mr-3" href="<?php echo base_url('admin/Satuan/add') ?>">
                Tambah Satuan Produk
              </a>
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
                      <th>Nama Satuan</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i= 1; foreach($satuan as $data ) {?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?= $data['namaSatuan']?></td>
                        <!-- <td>IDR <?= number_format($d['Harga'], 2, ",", ".") ?></td> -->
                        <td>
                          <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/Satuan/edit/'. $data['idSatuan']) ?>"><i data-feather="edit-2"></i></a>
                          
                        </td>
                      </tr>
                    <?php $i++; }?>
                  </tbody>
                </table>
                <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">??</span>
                        </button>
                      </div>
                      <div class="modal-body">Apakah Anda yakin untuk hapus data?</div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="button" data-dismiss="modal">Batal</button>
                        <a class="btn btn-danger" id="delete_link" type="button" href="">Hapus</a>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </main>
        <!-- <div class="modal fade" id="editData" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered modal-xs">
            <div class="modal-content">
              <form method="post" action="<?= base_url('admin/Rumah/editStatus') ?>">
                <div class="modal-header">
                  <h4>Ubah Status Rumah</h4>
                </div>
                <div class="modal-body">
                  <p>Pilih Status : </p>
                  <input name="id_rumah" id="id_rumah" value="" hidden>
                  <select class="form-control" name="status">
                    <option value="0">---PILIH STATUS---</option>
                    <option value="3">Terjual</option>
                    <option value="2">Booking</option>
                    <option value="1">Kosong</option>
                  </select>
                </div>
                <div class="modal-footer">
                  <button class="btn btn-danger" data-dismiss="modal">Batal</button>
                  <button class="btn btn-info" type="submit">Simpan</button>
                </div>
              </form>
            </div>
          </div>
        </div> -->

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