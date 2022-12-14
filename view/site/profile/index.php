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
      <div>
        <img src="../../../public/assets/images/users/profile-picture.png" alt="">
        <h3>
          Hazel Doom
        </h3>
      </div>
      <div>
        <p>
          Email : <span>hazeldoom520@gmail.com</span>
        </p>
      </div>
    </div>
  </div>
</main>

<?php include("../layouts/footer.php") ?>