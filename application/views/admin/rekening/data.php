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
                <span>Data Rekening</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">
          <div class="card mb-4">
            <div class="card-body">
              <div class="col">
                <?php echo $this->session->flashdata('pesan') ?>
              </div>
              <div class="datatable table-responsive">
                <table class="table table-bordered table-hover" id="dataTable" width="100%" cellspacing="0">
                  <thead>
                    <tr>
                      <th>No</th>
                      <th>Nama Bank</th>
                      <th>Nama Tabungan</th>
                      <th>Nomer Rekening</th>
                      <!-- <th>Netto</th>
                      <th>Komposisi</th>
                      <th>Harga</th>
                      <th>Status</th> -->
                      <!-- <th>Deskripsi</th> -->
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                  <?php $i= 1; foreach($rekening as $data ) {?>
                      <tr>
                        <td><?= $i;?></td>
                        <td><?= $data['namaBank']?></td>
                        <td>Atas Nama <B><?= $data['namaTabungan']?></B></td>
                        <td><?= $data['nomorRekening']?></td>
                        <!-- <td>IDR <?= number_format($d['Harga'], 2, ",", ".") ?></td> -->
                        <td>
                          <!-- <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/Rumah/Blok/') ?>"><i data-feather="home"></i></a>
                          <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/Rumah/Tambah_Galeri/') ?>"><i data-feather="image"></i></a>
                          <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/Rumah/detail/') ?>"><i data-feather="plus"></i></a> -->
                          <a class="btn btn-datatable btn-icon btn-transparent-dark" href="<?php echo base_url('admin/rekening/edit/'. $data['idRekening']) ?>"><i data-feather="edit-2"></i></a>
                        </td>
                      </tr>
                    <?php $i++; }?>
                  </tbody>
                </table>
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