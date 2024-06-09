<div class="footer">
  <div class="fcopy">
    <div class="container">
      <div class="row">
        <div class="col-sm-12 col-md-12">
          <p class="ftex">Copyright &copy; <a href="https://wasd.netmedia-framecode.com" class="text-decoration-none">WASD Netmedia Framecode</a> <?= date('Y') ?> | Develop by Alfonsius Afong Manek</p>
        </div>
      </div>
    </div>
  </div>
</div>

<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/jquery.min.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/bootstrap.min.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/jquery.superslides.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/owl.carousel.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/bootstrap-hover-dropdown.min.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/jquery.magnific-popup.min.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/easings.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/isotope.pkgd.min.js"></script>

<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/validator.min.js"></script>
<script type="text/javascript" src="<?= $baseURL ?>assets/js/vendor/form-scripts.js"></script>

<script type='text/javascript' src='https://maps.google.com/maps/api/js?sensor=false&amp;ver=4.1.5'></script>

<script type="text/javascript" src="<?= $baseURL ?>assets/js/script.js"></script>

<script>
  const showMessage = (type, title, message) => {
    if (message) {
      Swal.fire({
        icon: type,
        title: title,
        text: message,
      });
    }
  };

  showMessage("success", "Berhasil Terkirim", $(".message-success").data("message-success"));
  showMessage("info", "For your information", $(".message-info").data("message-info"));
  showMessage("warning", "Peringatan!!", $(".message-warning").data("message-warning"));
  showMessage("error", "Kesalahan", $(".message-danger").data("message-danger"));
</script>

<script>
  $('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
  });
</script>