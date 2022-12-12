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
      <table>
        <tr>
          <td>
            Email:
          </td>
          <td>
            <?= $user[0]->name ?>
          </td>
        </tr>
        <tr>
          <td>
            Email:
          </td>
          <td>
            <?= $user[0]->email ?>
          </td>
        </tr>
        <tr>
          <td>
            Phone Number:
          </td>
          <td>
            <?= $user[0]->phone_number ?>
          </td>
        </tr>
        <tr>
          <td>
            Address:
          </td>
          <td>
            <?= $user[0]->address ?>
          </td>
        </tr>
        <tr>
          <td>
            City:
          </td>
          <td>
            <?= $user[0]->city ?>
          </td>
        </tr>
        <tr>
          <td>
            Contact:
          </td>
          <td>
            <a href="#" class="contact">
              <i class="ri-facebook-box-fill facebook"></i>
            </a>
            <a href="#" class="contact">
              <i class="ri-instagram-line instagram"></i>
            </a>
            <a href="#" class="contact">
              <i class="ri-twitter-line twitter"></i>
            </a>
            <a href="#" class="contact">
              <i class="ri-whatsapp-line whatsapp"></i>
            </a>
          </td>
        </tr>
      </table>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>