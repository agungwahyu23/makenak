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
        <?php echo $this->session->flashdata('message') ?>
        <div class="row">
          <div class="col-lg-4 mb-4">
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
                              <th width="28%">Produk</th>
                              <th width="8%">Jumlah</th>
                              <th width="15%">Harga</th>
                              <th width="22%">Subtotal</th>
                              <th width="15%">Aksi</th>

                            </tr>
                          </thead>
                          <tbody>
                            <form action="<?= base_url('Dashboard/keranjangUpdate')?>" method="POST">
                              <?php $i = 1;
                              foreach ($keranjang as $data) { ?>
                                <tr>
                                  <td><img style="size: 50px; width: 50px;" class="img-responsive" src="<?= base_url('img/produk/') . $data['gambar'] ?>" alt="Image"></td>
                                  <td><?= $data['namaProduk'] ?></td>
                                  <td><input type="number" id="jumlahBeli" class="form-control input-sm" name="jumlahBeli[<?= $i ?>]" value="<?= $data['jumlahBeli'] ?>" data="<?= $data['idDetailTransaksi'] ?>" /></td>
                                  <td id="hargaSatuan">Rp. <?= number_format($data['hargaSatuan']) ?></td>
                                  <td id="totalHarga">Rp. <?= number_format($data['totalHarga']) ?></td>
                                  <td>
                                    <a href="<?= base_url('Dashboard/hapusKeranjang/' . $data['idDetailTransaksi']) ?>">
                                      <span class="badge rounded-pill bg-danger">Hapus</span>
                                    </a>
                                  </td>
                                </tr>
                                <input type="hidden" name="id[<?= $i ?>]" value="<?= $data['idDetailTransaksi']?>">
                              <?php $i++;
                              } ?>
                          </tbody>
                        </table>
                      </div>
                      <?php if ($keranjang) { ?>
                        <div class="">
                          <div class="d-grid gap-2 justify-content-md-end">
                            <button type="submit" class="btn btn-warning">Update Keranjang</button>
                          </div>
                          <hr>
                          <div class="d-grid gap-2 justify-content-md-end">
                            <a href="<?= base_url('Dashboard/validasi') ?>" class="btn btn-success">Bayar Sekarang</a>
                          </div>

                          
                        </div>
                      <?php } else { ?>
                        <div class="alert alert-light text-center" role="alert">
                          Tidak ada produk didalam keranjang
                        </div>
                      <?php } ?>
                      
                    </div>
                    
                    </form>
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
  <!-- <script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#jumlahBeli').on('keyup', function() {
        var idDetail = $(this).attr('data');
        var jumlahUbah = $(this).val();
        console.log(idDetail);
        $.ajax({
          url: "<?= base_url(); ?>Dashboard/dataDetail",
          method: "POST",
          data: {
            idDetail: idDetail
          },
          async: false,
          dataType: "json",
          success: function(data) {
            if (jumlahUbah < parseInt(data.detail[0].isiDus)) { //harga ecer
              $('#hargaSatuan').html('Rp. ' + data.detail[0].harga + '');
              $('#totalHarga').html('Rp. ' + parseInt(data.detail[0].harga) * jumlahUbah + '');
            } else if (jumlahUbah > (parseInt(data.detail[0].isiDus) * 30)) { //jika 30 Dus 
              Swal.fire({
                icon: 'info',
                title: '<h4>Pemberitahuan !',
                text: 'Untuk Pemesanan Diatas 30 Dus, Silahkan Melakukan Pemesanan Di WA Admin Mak Enak',
                footer: '<a class="btn btn-success btn-sm" href="https://api.whatsapp.com/send?phone=' + data.wa[0].wa2 + '">Pesan Melalui WA</a>'
              }).then(function() {
                window.location = "<?= base_url('Dashboard/keranjang') ?>";
              });
            } else if (jumlahUbah >= (parseInt(data.detail[0].isiDus) * 10)) { //harga 10 dus
              $('#hargaSatuan').html('Rp. ' + data.detail[0].harga10Dus + '');
              $('#totalHarga').html('Rp. ' + parseInt(data.detail[0].harga10Dus) * jumlahUbah + '');
            } else if (jumlahUbah >= data.detail[0].isiDus) { //harga 1 dus
              $('#hargaSatuan').html('Rp. ' + data.detail[0].harga1Dus + '');
              $('#totalHarga').html('Rp. ' + parseInt(data.detail[0].harga1Dus) * jumlahUbah + '');
            } else if (jumlahUbah >= 50) { //harga 50 pcs
              $('#hargaSatuan').html('Rp. ' + data.detail[0].harga50Pcs + '');
              $('#totalHarga').html('Rp. ' + parseInt(data.detail[0].harga50Pcs) * jumlahUbah + '');
            }
            console.log(jumlahUbah);
          }
        });
      });
    });
  </script> -->

  <?php $this->load->view('user/_partials/footer.php') ?>

  <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

  <?php $this->load->view('user/_partials/js.php') ?>

</body>

</html>