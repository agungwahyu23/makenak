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

                        <div id="datatable-user">
                            <div class="card mb-4">
                                <div class="card-header">
                                    <h4>Data Pesanan Dikirim</h4>
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
                                                    <th>Nama Produk</th>
                                                    <th>Jumlah</th>
                                                    <th>Total Harga</th>
                                                    <th>Nomor Resi</th>
                                                    <th>Status</th>
                                                    <!-- <th>Deskripsi</th> -->
                                                </tr>
                                            </thead>
                                            <tbody>
                                                    <tr>
                                                        <td>1</td>
                                                        <td>Nastar</td>
                                                        <td>10</td>
                                                        <td>100.000</td>
                                                        <td>JNE1239918333</td>
                                                        <td>Dikrim</td>
                                                    </tr>
                                                
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