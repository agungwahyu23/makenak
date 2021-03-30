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
                <div class="page-header-icon"><i data-feather="image"></i></div>
                <span>Tambah Galeri</span>
              </h1>
            </div>
          </div>
        </div>
        <div class="container-fluid mt-n10">

          <form id="upload_form" enctype="multipart/form-data">
            <div class="card mb-4">
              <div class="card-header">Tambah Galeri</div>
              <div class="card-body">
                <div id="divMsg" class="alert alert-success" style="display: none">
                  <span id="msg"></span>
                </div>
                <div class="col mt-3">
                  <?php echo $this->session->flashdata('pesan') ?>
                </div>
                <div class="form-group">
                  <label for="exampleEmail">Gambar</label>
                  <input type="file" class="form-control mb-3" id="image_file" multiple="multiple" />
                  <small style="text-align: italic">ukuran maksimal multiple image <b>5MB</b><br>
                    <b>Ekstensi yang diperbolehkan :</b> <br>
                    <ul>
                      <li>jpeg, jpg, png, gif</li>
                    </ul>
                  </small>
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
                <div class="page-header-icon"><i data-feather="image"></i></div>
                <span>Data Galeri</span>
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
                        <th>Gambar</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                    <tbody id="target">
                      <!-- <?php $no = 1;
                            foreach ($galeri as $d) { ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><img src="<?= base_url('uploads/Rumah/' . $d['Galeri']); ?>" width="140px"></td>
                          <td>Action</td>
                        </tr>
                      <?php } ?> -->


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
<script type="text/javascript">
  $(document).ready(function() {
    $('#upload_form').on('submit', function(e) {
      e.preventDefault();
      if ($('#image_file').val() == '') {
        alert("Please Select the File");
      } else {
        $('#divMsg').html('<div class="alert alert-success" role="alert">Sedang Melakukan Proses Upload ......</div>');
        $('#divMsg').show();
        var form_data = new FormData();
        var ins = document.getElementById('image_file').files.length;
        for (var x = 0; x < ins; x++) {
          form_data.append("files[]", document.getElementById('image_file').files[x]);
        }
        $.ajax({
          url: "<?php echo base_url(); ?>admin/Rumah/unggahGambar/<?= $this->uri->segment(4); ?>",
          method: "POST",
          data: form_data,
          contentType: false,
          cache: false,
          processData: false,
          dataType: "json",
          success: function(res) {
            console.log(res.success);
            if (res.success == true) {
              $('#image_file').val('');
              $('#msg').html(res.msg);
              $('#divMsg').show();

              //   swal("Berhasil", "Gambar Berhasil Ter Upload", "success");
              setTimeout(function() {
                window.location.reload(true)
              }, 2000)
            } else if (res.success == false) {
              $('#msg').html(res.msg);
              $('#divMsg').show();

              //   swal("Gagal", "Gambar Gagal Ter Upload", "success");
              setTimeout(function() {
                window.location.reload(true)
              }, 2000)
            }
          },
        });
      }
    });
  });
</script>
<script type="text/javascript">
  ambil();

  function ambil() {
    $.ajax({
      type: 'POST',
      url: "<?php echo base_url(); ?>admin/Rumah/ambilData/<?= $this->uri->segment(4); ?>",
      dataType: 'json',
      success: function(data) {
        var baris = '';
        for (var i = 0; i < data.length; i++) {
          baris += '<tr>' +
            '<td>' + (i + 1) + '</td>' +
            `<td><img style="width : 120px" src=<?= base_url('uploads/Rumah/') ?>${data[i].Galeri} "' /></td>` +
            '<td hidden>' + data[i].Id_Galeri + '</td>' +
            '<td><a onclick="hapusdata(\'' + data[i].Id_Galeri + '\')" href="" class="btn btn-sm btn-danger btn-circle"><i class="fas fa-trash"></i></a></td>'
          '</tr>'
        }


        $('#target').html(baris);

      }
    });
  }

  function hapusdata(id) {
    var tanya = confirm('apakah anda ingin hapus data ? ');
    // var var1 = document.getElementById("id").value;
    console.log(id)
    if (tanya) {
      $.ajax({
        type: 'POST',
        url: `<?php echo base_url('admin/Rumah/hapusgaleri/') ?>` + id,
        success: function(data) {
          ambil();
        }
      });
    } else {
      console.log('err')
    }
  }
</script>

</html>