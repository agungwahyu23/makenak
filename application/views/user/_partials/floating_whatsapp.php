<?php foreach ($deskripsi as $d) { ?>
  <a href="https://api.whatsapp.com/send?phone=<?= $d['No_Telp'] ?>&text=Selamat Pagi%21%20Saya%20berminat%20membeli..." class="whatsapp-btn d-flex align-items-center justify-content-center" target="_blank">
    <i class="bi bi-whatsapp"></i>
  </a>
<?php } ?>