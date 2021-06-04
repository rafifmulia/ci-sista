<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Primary CSS, META TAG -->
  <?= $head ?>

  <!-- Other CSS -->
  <?php if (isset($ex_css)) echo $ex_css; ?>

</head>

<body>

  <!-- Loader -->
  <?= $loader ?>

  <!--Navbar Start-->
  <?= $nav_top ?>

  <!-- Content Start -->
  <section class="hero-1-bg bg-light" style="background-image: url(<?= base_url('assets/img/nodify/hero-1-bg-img.png)') ?>" id="home">
    <?= $content ?>
  </section>

  <!-- Primary JS -->
  <?= $js ?>

  <!-- Other JS -->
  <?php if (isset($ex_js)) echo $ex_js; ?>

</body>

</html>