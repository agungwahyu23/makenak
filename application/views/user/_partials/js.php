<script src="<?= base_url('assets/user/bootstrap/js/bootstrap.bundle.js') ?>"></script>
<script src="<?= base_url('assets/user/aos/aos.js') ?>"></script>
<script src="<?= base_url('assets/user/php-email-form/validate.js') ?>"></script>
<script src="<?= base_url('assets/user/swiper/swiper-bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/user/purecounter/purecounter.js') ?>"></script>
<script src="<?= base_url('assets/user/isotope-layout/isotope.pkgd.min.js') ?>"></script>
<script src="<?= base_url('assets/user/glightbox/js/glightbox.min.js') ?>"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.js"></script>

<script src="<?= base_url('js/user/main.js') ?>"></script>

<script>
    let allImages = document.querySelectorAll("img");
      allImages.forEach((value)=>{
        value.oncontextmenu = (e)=>{
          e.preventDefault();
      }
    })
    $('body').on('dragstart', function(event) {
        event.preventDefault();
    });
    $('body').on('contextmenu', function(e) {
        return false;
    });
</script>