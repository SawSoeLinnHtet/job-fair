<?php
$title = "Profile | Message";
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MailsTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$table = new UsersTable(new MYSQL());
$mail_table = new MailsTable(new MYSQL());

$mails = $mail_table->getByUser($_SESSION["user"][0]->id);
?>
<?php include("../layouts/header.php") ?>

<main>
  <div class="profile-container">
    <div class="profile-detail-wrapper">
      <div class="message-wrap">
        <div class="header">
          <h4>
            Yours Mails
          </h4>
          <button class="previous-btn">
            <i class="ri-arrow-go-back-fill"></i> Back
          </button>
        </div>
        <hr>
        <?php if(count($mails) !== 0): ?>
          <?php foreach ($mails as $mail) : ?>
            <div class="mail-wrap">
              <a href="../../../App/controllers/mails/delete.php?id=<?= $mail->id ?>" class="delete_btn">
                <i class="ri-close-circle-fill"></i>
              </a>
              <h3>
                <?= $mail->title ?>
              </h3>
              <p class="message">
                <?= $mail->message ?>
              </p>
              <p class="sender">
                From
                <span> <?= $mail->sender ?></span>
              </p>
            </div>
          <?php endforeach ?>
        <?php else: ?>
          <div class="alert">
            <p>Nothing Here!</p>
          </div>
        <?php endif ?>
      </div>
    </div>
  </div>
</main>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script>
  $(document).ready(function() {
    $('.previous-btn').click(function() {
      console.log("hello")
      window.history.go(-1);
      return false;
    })
  })
</script>
<?php include("../layouts/footer.php") ?>