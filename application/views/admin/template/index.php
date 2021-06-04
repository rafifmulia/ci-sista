<!DOCTYPE html>
<html lang="id">

<head>

  <!-- Primary CSS, META TAG -->
  <?= $head ?>

  <!-- Other CSS -->
  <?php if (isset($ex_css)) echo $ex_css; ?>

</head>

<body id="page-top">

  <!-- Page Wrapper -->
  <div id="wrapper">

    <!-- Sidebar -->
    <?= $sidebar ?>
    <!-- End of Sidebar -->

    <!-- Content Wrapper -->
    <div id="content-wrapper" class="d-flex flex-column">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <?= $topbar ?>
        <!-- End of Topbar -->

        <!-- Begin Page Content -->
        <?= $content ?>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

      <!-- Footer -->
      <?= $footer ?>
      <!-- End of Footer -->

    </div>
    <!-- End of Content Wrapper -->

  </div>
  <!-- End of Page Wrapper -->

  <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  <?= $modal ?>

  <!-- Primary JS -->
  <?= $js ?>

  <!-- Other JS -->
  <?php if (isset($ex_js)) echo $ex_js; ?>

</body>

</html>