<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;

$table = new UsersTable(new MYSQL());
$user = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>User Details</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>
      <span>Go Back</span>
    </a>
  </div>
  <div class="details-wrapper">
    <div class="wrap">
      <div class="profile-holder">
        <img src="../../../public/assets/images/users/<?= $user[0]->image ?? "no-image.jpg" ?>" alt="image" class="detail-img">
      </div>
      <div class="profile-details">
        <p class="title">
          <?= $user[0]->name ?>
        </p>
        <p class="type">
          - <?= $user[0]->role_id == 2 ? "Admin" : "User" ?>
        </p>
        <p class="mail">
          - <?= $user[0]->email ?>
        </p>
        <p class="address">
          - <?= $user[0]->phone_number ?>
        </p>
        <p class="address">
          - <?= $user[0]->address ?>
        </p>
        <div class="details-footer">
          <ul class="contact-lists">
            <li>
              <a href="#" class="contact">
                <i class="ri-facebook-box-fill facebook"></i>
              </a>
            </li>
            <li>
              <a href="#" class="contact">
                <i class="ri-instagram-line instagram"></i>
              </a>
            </li>
            <li>
              <a href="#" class="contact">
                <i class="ri-twitter-line twitter"></i>
              </a>
            </li>
            <li>
              <a href="#" class="contact">
                <i class="ri-whatsapp-line whatsapp"></i>
              </a>
            </li>
          </ul>
          <a href="./edit.php?id=<?= $user[0]->id ?>" class="edit-btn">Edit</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>