<?php
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\Auth;

$session_user = Auth::check();

$table = new UsersTable(new MYSQL());

$user = $table->findById($session_user->id);
?>
<?php include("../layouts/header.php") ?>

<main>
  <div class="profile-container">
    <div class="profile-detail-wrapper">
      <img src="../../../public/assets/images/users/profile-picture.png" alt="">
      <h3>
        Hazel Doom
      </h3>
      <div class="button-wrap">
        <a href="#" class="edit">Edit Profile</a>
      </div>
      <ul class="profile-social">
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
      <a href="../../../App/controllers/logout.php">Log Out</a>
    </div>
  </div>
</main>

<?php include("../layouts/footer.php") ?>