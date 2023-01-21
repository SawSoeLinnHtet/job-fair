<?php
$title = "Mail Box";
?>
<?php

  include("../../../vendor/autoload.php");

  use Models\Database\UsersTable;
  use Models\Database\MYSQL;

  $table = new UsersTable(new MYSQL());

  $user_id = $_GET["user_id"] ?? "undefined";
  $job_id = $_GET["job_id"] ?? "undefined";

  $user = $table->findById($user_id);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p class="apply-job-name">
      Mail Box
    </p>
    <div class="backandshow">
      <a class="previous-btn">
        Back
      </a>
    </div>
  </div>
  <div class="related_area">
    <div class="alert-box">
      <?php if (isset($_GET['mail_success']) == 1) : ?>
        <div class="alert alert-success">
          Mail Send to This Person
        </div>
      <?php endif ?>
      <?php if (isset($_GET['mail_fail']) == 1) : ?>
        <div class="alert alert-danger">
          Mail is not Success
        </div>
      <?php endif ?>
    </div>
    <div class="mail-form-area">
      <form id="form" action="../../../App/controllers/mails/create.php?user_id=<?= $user_id ?>&&job_id=<?= $job_id ?>" method="post">
        <div class="form-control">
          <label for="name">To<span class="required">*</span></label>
          <div class="input-holder">
            <input type="text" id="name" name="to" value="<?= $user[0]->name ?>" required>
          </div>
        </div>
        <div class="form-control">
          <label for="name">Title<span class="required">*</span></label>
          <div class="input-holder">
            <input type="text" id="name" name="title" required>
          </div>
        </div>
        <div class="form-control">
          <label for="name">Message<span class="required">*</span></label>
          <div class="input-holder">
            <textarea type="text" id="name" name="message" required></textarea>
          </div>
        </div>
        <div class="form-control">
          <label for="name">From<span class="required">*</span></label>
          <div class="input-holder">
            <input type="text" id="name" name="from" required>
          </div>
        </div>
        <div class="form-control">
          <label></label>
          <button class="submit" type="submit">
            Create
          </button>
        </div>
      </form>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>