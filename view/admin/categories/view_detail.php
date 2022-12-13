<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CategoryTable;
use Models\Database\MYSQL;

$table = new CategoryTable(new MYSQL());
$category = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Details</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="detail-wrapper">
    <div class="wrap">
      <span class="company-name">
        <?= $category[0]->name ?>
      </span>

      <img src="../../../public/assets/images/categories/<?= $category[0]->image ?? "technology.png" ?>" alt="image" class="detail-img">

      <form action="../../../App/controllers/categories/upload.php?id=<?= $_GET["id"] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="cover_image">
        <button type="submit">
          Upload
        </button>
      </form>
    </div>
  </div>
</section>