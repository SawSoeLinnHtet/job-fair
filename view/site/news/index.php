<?php
  $title = "News";
  include("../../../vendor/autoload.php");

  use Helpers\Auth;

  Auth::check();

?>
<?php include("../layouts/header.php") ?>

<main class="main-content">
  <div class="news">
    <img src="../../../public/assets/images/maintenance-min.png" class="maintenance" alt="">
  </div>
</main>

<?php include("../layouts/footer.php") ?>