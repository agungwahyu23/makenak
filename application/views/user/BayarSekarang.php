<!DOCTYPE html>
<html lang="en">

<head>
    <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

    <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

    <main id="main">

        <section id="checkout" class="checkout">

            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-lg-12">
                        <div class="card shadow-lg border-0 rounded-lg mt-15">
                            <div class="card-header justify-content-center">
                                <h6>Data Penerima</h6>
                            </div>
                            <div class="card-body">
                                <div class="col">

                                    <form action="<?= base_url('Checkout/Post') ?>" method="post" enctype="multipart/form-data">

                                        <h3 class="sub-title">Data Calon Pembeli</h3>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="nama_lengkap">Nama Lengkap Penerima</label>
                                                <input type="text" class="form-control mb-3" id="nama_lengkap" name="nama_lengkap" placeholder="" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="email">Email Penerima</label>
                                                <input type="email" class="form-control mb-3" id="email" name="email" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="nomor_telepon">Nomor WhatsApp Penerima</label>
                                                <input type="text" class="form-control mb-3" id="nomor_telepon" name="nomor_telepon" placeholder="" required>
                                            </div>
                                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-xs-12"><label class="small mb-1" for="alamat">Alamat Penerima</label>
                                                <input type="text" class="form-control mb-3" id="alamat" name="alamat" placeholder="" required>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="provinsi">Provinsi</label>
                                                <select class="form-select mb-3" id="provinsi" name="provinsi" required>
                                                    <option value="">-- Pilih Provinsi-- </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="kabKota">Kabupaten/Kota</label>
                                                <select class="form-select mb-3" id="kabKota" name="kabKota" required>
                                                    <option value="">-- Pilih kabupaten/Kota-- </option>
                                                </select>
                                            </div>
                                            <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 col-xs-12"><label class="small mb-1" for="kecamatan">Kecamatan</label>
                                                <select class="form-select mb-3" id="kecamatan" name="kecamatan" required>
                                                    <option value="">-- Pilih Kecamatan-- </option>
                                                </select>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>

                </div>

        </section>

    </main>

    <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>

    <?php $this->load->view('user/_partials/js.php') ?>

    <?php $this->load->view('user/_partials/footer.php') ?>

    <script>
        function tampilkanPreviewKtp(gambar, previewKtp) {
            var gb = gambar.files;
            for (var i = 0; i < gb.length; i++) {
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var previewKtp = document.getElementById(previewKtp);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    previewKtp.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(previewKtp);
                    reader.readAsDataURL(gbPreview);
                } else {
                    alert("Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
                }
            }
        }

        function tampilkanPreview(gambar, preview) {
            var gb = gambar.files;
            for (var i = 0; i < gb.length; i++) {
                var gbPreview = gb[i];
                var imageType = /image.*/;
                var preview = document.getElementById(preview);
                var reader = new FileReader();
                if (gbPreview.type.match(imageType)) {
                    preview.file = gbPreview;
                    reader.onload = (function(element) {
                        return function(e) {
                            element.src = e.target.result;
                        };
                    })(preview);
                    reader.readAsDataURL(gbPreview);
                } else {
                    alert("Hanya dapat menampilkan preview tipe gambar. Harap simpan perubahan untuk melihat dan merubah gambar.");
                }
            }
        }

        // function pageLoad() {
        //   var startButton = document.getElementById("start");

        //   startButton.onclick = alertMe;
        // }

        // function alertMe() {
        //   setInterval(function() {
        //     window.open('https://support.wwf.org.uk', '_blank');
        //   }, 200);
        // }
    </script>

</body>

</html>