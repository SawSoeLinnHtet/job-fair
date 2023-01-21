<?php
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MailsTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();
$table = new MailsTable(new MYSQL());
$user_table = new UsersTable(new MYSQL());

$mails = $table->getByUser($_SESSION["user"][0]->id);
$length = count($mails);
$user_id = $_SESSION["user"][0]->id;
$user = $user_table->findById($user_id);
?>
<?php include("../layouts/header.php") ?>

<main>
  <div class="profile-container">
    <div class="profile-detail-wrapper">
      <div class="profile-wrap">
        <?php if (isset($_GET['edit_success']) == 1) : ?>
          <div class="noti-text">
            <span>Edited Your Profile Successfully!</span>
            <i class="ri-close-line close"></i>
          </div>
        <?php endif ?>
        <div class="content">
          <img src="../../../public/assets/images/users/<?= $user[0]->image ?? "user.png" ?>" alt="Profile">
          <div class="options">
            <a href="./message.php" class="noti">
              <i class="ri-notification-fill"></i>
              <span class="badge">
                <?= $length  ?>
              </span>
            </a>
            <a href="./edit.php?id=<?= $user[0]->id ?>" class="edit-button">
              <i class="ri-edit-box-fill">
              </i><span class="edit-text">Edit your Profile</span>
            </a>
          </div>
        </div>
        <div class="content-details">
          <div class="content-text">
            <h3>
              <?= $user[0]->name ?>
            </h3>
          </div>
          <div class="content-text">
            <i class="ri-mail-line"></i>
            <span>
              <?= $user[0]->email ?>
            </span>
          </div>
          <div class="content-text">
            <i class="ri-phone-line"></i>
            <span>
              <?= $user[0]->phone_number ?>
            </span>
          </div>
          <div class="content-text">
            <i class="ri-map-pin-line"></i>
            <span>
              <?= $user[0]->address ?>
            </span>
          </div>
          <div class="content-text">
            <i class="ri-building-2-line"></i>
            <span>
              <?= $user[0]->city ?>
            </span>
          </div>
          <div class="content-text">
            <i class="ri-barcode-line"></i>
            <span>
              <?= $user[0]->postal_code ?>
            </span>
          </div>
          <div class="content-text logout">
            <a href="../../../App/controllers/logout.php" class="logout">
              <i class="ri-logout-box-line"></i>
              <span>
                Log Out
              </span>
            </a>
          </div>
        </div>
      </div>
    </div>
  </div>
</main>
<script>
  document.querySelector(".close").addEventListener("click", close);

  function close() {
    document.querySelector(".noti-text").style.display = "none"
  }
</script>
<?php include("../layouts/footer.php") ?>