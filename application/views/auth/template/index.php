<!DOCTYPE html>
<html lang="id">

<head>

  <!-- Primary CSS, META TAG -->
  <?= $head ?>

  <!-- Other CSS -->
  <?php if (isset($ex_css)) echo $ex_css; ?>

</head>

<body class="bg-gradient-primary">

  <div class="container">
    <?= $content ?>
  </div>

  <!-- Primary JS -->
  <?= $js ?>

  <!-- Other JS -->
  <?php if (isset($ex_js)) echo $ex_js; ?>

</body>

</html>