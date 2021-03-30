<!DOCTYPE html>
<html lang="en">

<!-- Head -->
<?php $this->load->view("admin/_partials/head.php") ?>
<?php $this->load->view("admin/_partials/modal/save.php") ?>

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
                                <div class="page-header-icon"><i data-feather="grid"></i></div>
                                <span>Tambah Kategori</span>
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="container-fluid mt-n10">
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="card mb-4">
                            <div class="card-header">Tambah Kategori</div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <label>Nama Kategori</label>
                                        <input class="form-control" id="name" name="name" type="text" placeholder="Nama Kategori" required />
                                    </div>
                                </div>
                                <!-- <div class="row">
                                    <div class="form-group col-lg-12 col-sm-12">
                                        <label>Logo</label>
                                        <input name="logo" id="logo" type="file" accept="image/*" class="form-control border-dark small mb-3" placeholder="" aria-describedby="basic-addon2">
                                    </div>
                                    <div class="col-sm-12 col-lg-12">
                                        <div class="input-group">
                                            <label>Image Preview</label>
                                            <br />
                                        </div>
                                        <img id="preview" src="" alt="" style="width:140px" /> <br>
                                    </div>
                                </div> -->

                            </div>
                        </div>
                        <button name="save" id="save" type="submit" class="btn btn-primary mr-2" href="#">
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
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#preview').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
    }

    $("#logo").change(function() {
        readURL(this);
    });
</script>

</html>