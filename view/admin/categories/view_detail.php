<?php
  $title = "Categories-Details";
?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CategoryTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

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

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php include("../layouts/footer.php") ?>