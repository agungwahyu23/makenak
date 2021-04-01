<footer id="footer" class="footer">

  <div class="footer-top">
    <div class="container">
      <div class="row gy-4">
        <div class="col-lg-4 col-md-12 footer-info">
          <a href="<?= base_url('Beranda') ?>" class="logo">
            <img src="<?= base_url('img/icon/logo1.png') ?>" alt="">
          </a>
          
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <h4>Navigasi</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('Beranda') ?>">Beranda</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('TentangKami') ?>">Tentang Kami</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('KontakKami') ?>">Kontak Kami</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-6 footer-links">
          <h4>Bantuan</h4>
          <ul>
            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('CaraDaftar') ?>">Cara Daftar</a></li>
            <li><i class="bi bi-chevron-right"></i> <a href="<?= base_url('Konfirmasi') ?>">Konfirmasi Bayar</a></li>
          </ul>
        </div>

        <div class="col-lg-2 col-md-12 footer-contact text-center text-md-start">
          <h4>Kontak Kami</h4>
          <a href="https://www.google.com/maps?q=-8.165755271911621,113.73561096191406&z=17&hl=en">
            Jl. Kaliurang, Kec. Sumbersari,<br>
            Kabupaten Jember,<br>
            Jawa Timur 68124<br><br>
          </a>
          <div class="social-links mt-3">
            <?php foreach ($deskripsi as $d) { ?>
              <a href="https://www.instagram.com/<?= $d['Instagram'] ?>/" class="instagram"><i class="bi bi-instagram bx bxl-instagram"></i></a>
              <a href="https://api.whatsapp.com/send?phone=<?= $d['No_Telp'] ?>" class="whatsapp"><i class="bi bi-whatsapp"></i></a>
              <a href="mailto:<?= $d['Email'] ?>?Subject=RiverPrawn&Body=" class="envelope"><i class="bi bi-envelope"></i></a>
              <!-- <a href="mailto:<?= $d['Email'] ?>?Subject=RiverPrawn&Body=">
                <img src="https://www.kursuswebsite.org/wp-content/uploads/2017/03/email.png" alt="Email" />
              </a> -->
            <?php } ?>
          </div>
        </div>

      </div>
    </div>
  </div>

  <div class="container">
    <div class="copyright">
      Copyright &copy; <strong><span><?= SITE_NAME ?></span></strong>
      <script>
        document.write(new Date().getFullYear());
      </script>
    </div>
    <div class="credits">
      Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
    </div>
  </div>
</footer>