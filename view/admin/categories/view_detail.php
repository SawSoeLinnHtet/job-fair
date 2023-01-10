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
    <p>Category Details</p>

    <a class="previous-btn">
      <i class="ri-arrow-go-back-fill"></i>
      <span>
        Go Back
      </span>
    </a>
  </div>
  <div class="details-wrapper">
    <div class="wrap">
      <div class="profile-holder">
        <img src="../../../public/assets/images/categories/<?= $category[0]->image ?? 'no-image.jpg' ?>" alt="image" class="detail-img">
      </div>
      <div class="profile-details">
        <p class="title">
          <?= $category[0]->name ?>
        </p>
        <div class="details-footer">
          <a href="./edit.php?id=<?= $category[0]->id ?>" class="edit-btn">Edit</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>