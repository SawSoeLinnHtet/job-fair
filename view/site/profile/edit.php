<?php
$title = "Profile | Edit";
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$table = new UsersTable(new MYSQL());

$user = $table->findById($_GET["id"])[0];
?>
<?php include("../layouts/header.php") ?>
<div class="profile-container">
  <div class="profile-detail-wrapper">
    <div class="profile-wrap">
      <?php if (isset($_GET['edit_fail']) == 1) : ?>
        <div class="noti-text fail">
          <span>Edit Your Profile Failed!</span>
          <i class="ri-close-line close"></i>
        </div>
      <?php endif ?>
      <?php if (isset($_GET['type_error'])) : ?>
        <div class="noti-text fail">
          <span>Check Error Image Type!</span>
          <i class="ri-close-line close"></i>
        </div>
      <?php endif ?>
      <?php if (isset($_GET['image_error'])) : ?>
        <div class="noti-text fail">
          <span>Your Image has Error</span>
          <i class="ri-close-line close"></i>
        </div>
      <?php endif ?>
      <h3 class="header">Edit Form</h3>
      <hr>
      <div class="form-wrap">
        <form id="form" action="../../../App/controllers/users/site_edit.php?id=<?= $user->id ?>" method="POST" enctype="multipart/form-data">
          <div class="upload">
            <img src="../../../public/assets/images/users/<?= $user->image ?? "user.png" ?>" width="120" height="120" alt="Profile">
            <div class="round">
              <input type="file" name="cover_image">
              <i class="ri-camera-line"></i>
            </div>
          </div>
          <div class="form-control">
            <label for="name">
              User Name
            </label>
            <input type="text" class="form-input" value="<?= $user->name ?>" name="name" required>
          </div>
          <div class="form-control">
            <label for="name">
              Email
            </label>
            <input type="email" class="form-input" value="<?= $user->email ?>" name="email" required>
          </div>
          <div class="form-control">
            <label for="name">
              Phone Number
            </label>
            <input type="text" class="form-input" value="<?= $user->phone_number ?>" name="phone" required>
          </div>
          <div class="form-control">
            <label for="name">
              Address
            </label>
            <textarea name="address" id="" required><?= $user->address ?></textarea>
          </div>
          <div class="form-control">
            <label for="name">
              City
            </label>
            <input type="text" name="city" class="form-input" value="<?= $user->city ?>" required>
          </div>
          <div class="form-control">
            <label for="name">
              Postal Code
            </label>
            <input type="number" class="form-input" value="<?= $user->postal_code ?>" name="postal_code" required>
          </div>
          <div class="form-control btn">
            <button class="previous-btn">Back</button>
            <button type="submit" class="edit-btn">Edit</button>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script>
  $(document).ready(function() {
    $("#form").validate()
    $('.previous-btn').click(function() {
      console.log("hello")
      window.history.go(-1);
      return false;
    })
  });

  document.querySelector(".close").addEventListener("click", close);

  function close() {
    document.querySelector(".noti-text").style.display = "none"
  }
</script>
<?php include("../layouts/footer.php") ?>