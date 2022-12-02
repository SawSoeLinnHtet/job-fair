<?php
  include("../../../vendor/autoload.php");

  use Models\Database\CompanyTable;
  use Models\Database\MYSQL;

  $table = new CompanyTable(new MYSQL());
  $company = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <?php var_dump($company) ?>
</section>

<?php include("../layouts/footer.php") ?>