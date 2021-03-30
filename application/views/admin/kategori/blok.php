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
                <span>Blok Rumah</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">

          <form method="POST" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Blok Rumah</div>
              <div class="card-body">
                <div id="divMsg" class="alert alert-success" style="display: none">
                  <span id="msg"></span>
                </div>
                <div class="col mt-3">
                  <?php echo $this->session->flashdata('pesan') ?>
                </div>
                <div class="form-group">

                  <!-- <select class="js-example-basic-single" name="state">
                    <option value="AL">Alabama</option>
                    ...
                    <option value="WY">Wyoming</option>
                  </select> -->
                  <div class="form-group">
                    <input class="form-control" name="id_rumah" value="<?= $id ?>" hidden />
                    <label>Pilih Blok</label>
                    <select class="form-control js-example-basic-single" name="blok">
                      <?php foreach ($selectblok as $s) { ?>
                        <option value="<?= $s['Id_Kode'] ?>"><?= $s['Kode_Rumah'] ?></option>
                      <?php } ?>
                    </select>
                  </div>
                </div>
                <div class="form-group">
                  <button type="submit" class="btn btn-primary waves-effect waves-light">Submit</button>
                  <a href="<?= base_url(); ?>admin/Rumah" class="btn btn-danger waves-effect waves-light">Batal</a>
                </div>
              </div>
            </div>
          </form>
        </div>
      </main>
      <main>
        <div class="page-header pb-10 p">
          <div class="container-fluid">
            <div class="page-header-content">
              <h1 class="page-header-title">
                <div class="page-header-icon"><i data-feather="home"></i></div>
                <span>Data Blok Rumah</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <form id="upload_form" enctype="multipart/form-data">
            <div class="card mb-4 p-3">
              <div class="container-fluid mt-3">
                <div class="dataTable table-responsive">
                  <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Blok</th>
                        <th>Status</th>
                        <th>Ubah Status</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="target">
                      <?php $no = 1;
                      foreach ($blok as $d) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $d['Kode_Rumah'] ?></td>
                          <td> <?php if ($d['status'] == '1') { ?>
                              <div class="badge badge-danger badge-pill">Tersedia</div>
                            <?php } ?>
                            <?php if ($d['status'] == '2') { ?>
                              <div class="badge badge-warning badge-pill">Booking</div>
                            <?php } ?>
                            <?php if ($d['status'] == '3') { ?>
                              <div class="badge badge-primary badge-pill">Terjual</div>
                            <?php } ?>
                          </td>
                          <td>
                            <p data-toggle="modal" data-target="#editData<?= $d['Id_Blok'] ?>"><i><u>Ubah Status</u></i></p>
                          </td>
                          <td> <a class="btn btn-datatable btn-icon btn-transparent-dark" onclick="confirm_hapus('<?php echo base_url('admin/Rumah/hapusdatablok/' . $d['Id_Blok']) ?>')" data-toggle="modal" data-target="#modalDelete"><i data-feather="trash-2"></i></a>
                          </td>
                        </tr>
                      <?php } ?>
                    </tbody>
                  </table>
                  <div class="modal fade" id="modalDelete" tabindex="-1" role="dialog" aria-labelledby="deleteModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="deleteModalLabel">Hapus Data</h5>
                          <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
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
          </form>
        </div>
      </main> <?php
              foreach ($blok as $r) {
              ?>
        <div class="modal fade" id="editData<?= $r['Id_Blok'] ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
          <div class="modal-dialog modal-dialog-centered modal-xs">
            <div class="modal-content">
              <form method="post" action="<?= base_url('admin/Rumah/editStatus') ?>">
                <div class="modal-header">
                  <h4>Ubah Status Rumah</h4>
                </div>
                <div class="modal-body">
                  <p>Pilih Status : </p>
                  <input name="Id_Blok" id="Id_Blok" value="<?= $r['Id_Blok'] ?>" hidden>
                  <input name="id" id="id" value="<?= $id ?>" hidden>
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
        </div>

      <?php } ?>

      <!-- Footer -->
      <?php $this->load->view("admin/_partials/footer.php") ?>

    </div>
  </div>

  <!-- JS -->
  <?php $this->load->view("admin/_partials/js.php") ?>

</body>
<script type="text/javascript">
  $(document).ready(function() {
    $('.js-example-basic-single').select2();
  });
</script>
<script>
  function confirm_hapus(add) {
    $('#modalDelete').modal('show', {
      backdrop: 'static'
    });
    document.getElementById('delete_link').setAttribute('href', add);
  }
</script>

</html>