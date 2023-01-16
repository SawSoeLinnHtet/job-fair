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

<section class="main-content">
  <div class="related_header">
    <p>Your Profile</p>
    <a href="previous-btn">
      <i class="ri-add-fill"></i>
      <span>
        Back
      </span>
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['create_success']) == 1) : ?>
      <div class="alert alert-success">
        New User Is Created!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['edit_success']) == 1) : ?>
      <div class="alert alert-success">
        Edited!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['delete_success']) == 1) : ?>
      <div class="alert alert-danger">
        Deleted!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <div class="profile-wrapper">
      <img src="../../../public/assets/images/users/<?= $user[0]->image ?? "no-image.jpg" ?>" alt="">
      <div class="details-text">
        <div class="profile-field">
          <span class="field-name">Name :</span>
          <span class="field-value"><?= $user[0]->name ?></span>
        </div>
        <div class="profile-field">
          <span class="field-name">Email :</span>
          <span class="field-value"><?= $user[0]->email ?></span>
        </div>
        <div class="profile-field">
          <span class="field-name">Phone Number :</span>
          <span class="field-value"><?= $user[0]->phone_number ?></span>
        </div>
        <div class="profile-field">
          <span class="field-name">Address :</span>
          <span class="field-value"><?= $user[0]->address ?></span>
        </div>
        <div class="profile-field">
          <span class="field-name">City :</span>
          <span class="field-value"><?= $user[0]->city ?></span>
        </div>
        <div class="profile-field">
          <span class="field-name">Postal Code :</span>
          <span class="field-value"><?= $user[0]->postal_code ?></span>
        </div>
        <div class="profile-field">
          <a href="../users/edit.php?id=<?= $user[0]->id ?>" class="edit-btn">Edit</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>