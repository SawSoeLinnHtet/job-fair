<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CategoryTable;
use Models\Database\MYSQL;

$table = new CategoryTable(new MYSQL());
$company = $table->findById($_GET["id"]);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Category Edit Form</p>
    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="related_area">
    <form id="form" action="../../../App/controllers/categories/edit.php?id=<?= $_GET["id"] ?>" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" value="<?= $company[0]->name ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for=""></label>
        <button class="submit" type="submit">
          Edit
        </button>
      </div>
    </form>
  </div>
</section>

<?php include("../jquery-validate.php") ?>
<?php include("../layouts/footer.php") ?>