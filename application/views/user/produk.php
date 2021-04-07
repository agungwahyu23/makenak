<!DOCTYPE html>
<html lang="en">

<head>
  <?php $this->load->view('user/_partials/head.php') ?>
</head>

<body>

  <?php $this->load->view('user/_partials/static_color_navbar.php') ?>

    <main id="main">
        <div class="gap-80"></div>

        <!-- <section id="breadcrumbs" class="breadcrumbs">
            <div class="container" data-aos="fade-up">
                <nav aria-label="breadcrumbs">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item"><a href="#">Library</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Data</li>
                    </ol>
                </nav>
            </div>
        </section> -->

        <section id="product-show" class="product-show">

            <div class="container" data-aos="fade-up">

                <div class="row mt-0">
                    <div class="col-lg-3">
                        <form class="d-flex">
                            <input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </form>
                    </div>
                </div>

                <div class="row mt-4" data-aos="fade-left">
                    <?php foreach ($product as $data) { ?>
                    <div class="col-lg-3 col-md-3 col-produk" data-aos="zoom-in" data-aos-delay="200">
                        <div class="box">
                            <div class="box-header">
                                <img src="<?= base_url('img/Produk/'.$data['gambar']) ?>" class="img-fluid" alt="">
                            </div>
                            

                            <div class="nama-product"><span><?= $data['namaProduk']?></span></div>
                            <ul>
                                <li>Rp <?= number_format($data['harga'], 0, ",", ".") ?></li>
                            </ul>
                            <a href="<?= base_url('Produk/DetailProduk/') . $data['id'] ?>"
                                class="btn-detail">Detail</a>
                            <a href="<?= base_url('Produk/DetailProduk/') . $data['id'] ?>" class="btn-choose">Beli
                                Sekarang</a>
                        </div>
                    </div>
                    <?php } ?>
                </div>
                <div class="container">
                    <div class="pagination flex-m flex-w p-t-26 justify-content-center">
                        <?php
                    // Tampilkan link-link paginationnya
                    echo $pagination;
                    ?>
                    </div>
                 </div>
            </div>
            
        </section>
        <section id="pagin">
            
        </section>
    </main>

    <?php $this->load->view('user/_partials/footer.php') ?>
    <?php $this->load->view('user/_partials/floating_whatsapp.php') ?>
    <?php $this->load->view('user/_partials/js.php') ?>
</body>

</html>