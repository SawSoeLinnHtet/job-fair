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
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="detail-wrapper">
    <div class="wrap">
      <p class="user-name">
        <?= $user[0]->name ?> -
        <span class="user-role">
          <?= $user[0]->role ?>
        </span>
      </p>
      <img src="../../../public/assets/images/users/<?= $user[0]->image ?? "profile-picture.png" ?>" class="detail-img" alt="">

      <form action="../../../App/controllers/users/upload.php?id=<?= $_GET["id"] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="cover_image" placeholder="To Upload Profile Picture">
        <button type="submit">
          Upload
        </button>
      </form>
    </div>
    <div class="wrap">
      <div class="dropdown">
        <button class="dropbtn">Changer Role</button>
        <div class="dropdown-content">
          <a href="
          ../../../App/controllers/users/role_switch.php?id=<?= $user[0]->id ?>&role=1">Admin</a>
          <a href="
          ../../../App/controllers/users/role_switch.php?id=<?= $user[0]->id ?>&role=2
        ">User</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>