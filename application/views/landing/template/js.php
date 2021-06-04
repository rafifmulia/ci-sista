<!-- javascript -->
<script src="<?= base_url('assets/js/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('assets/js/bootstrap/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('assets/js/scrollspy/scrollspy.min.js') ?>"></script>
<script src="<?= base_url('assets/js/jquery-easing/jquery.easing.min.js') ?>"></script>
<!-- feather icons -->
<script src="https://unpkg.com/feather-icons"></script>
<!-- carousel -->
<script src="<?= base_url('assets/js/owl/owl.carousel.min.js') ?>"></script>
<!-- Main Js -->
<script src="<?= base_url('assets/js/nodify/app.js') ?>"></script>
<!-- DataTable -->
<script src="<?= base_url('assets/js/datatable/jquery.dataTables.min.js') ?>"></script>
<script src="<?= base_url('assets/js/datatable/dataTables.bootstrap4.min.js') ?>"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
<script src="https://cdn.datatables.net/responsive/2.2.6/js/responsive.bootstrap.min.js"></script>
<!-- SweetAlert2 -->
<script src="<?= base_url('assets/js/sweetalert/sweetalert2.all.min.js') ?>"></script>
<script>
  // Fether icon
  feather.replace()

  // Testimonial
  $('#testi-clients').owlCarousel({
    loop: true,
    center: true,
    autoplay: true,
    autoplayTimeout: 3000,
    margin: 20,
    nav: true,
    responsive: {
      0: {
        items: 1
      },
      600: {
        items: 2
      },
      1000: {
        items: 3
      }
    }
  });
</script>