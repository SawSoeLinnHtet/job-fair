<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());
$id = $_GET["id"];

$user = $table->findById($id);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>User Edited Form</p>
    <a class="previous-btn">
      <i class="ri-arrow-go-back-fill"></i>
      <span>Go Back</span>
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['edit_fail']) == 1) : ?>
      <div class="alert alert-danger">
        Edit user Failed!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['type_error']) == 1) : ?>
      <div class="alert alert-warning">
        Check Your Image Type!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['image_error']) == 1) : ?>
      <div class="alert alert-danger">
        Your Image Has error!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <form id="form" action="../../../App/controllers/users/edit.php?id=<?= $id ?>" method="post" enctype="multipart/form-data">
      <div class="form-control">
        <label for="image">Upload profile<span class="required">*</span></label>
        <div class="input-holder">
          <img src="../../../public/assets/images/users/<?= $user[0]->image ?? 'no-image.jpg' ?>" alt="No Image">
          <input type="file" id="image" name="cover_image" class="file-upload">
        </div>
      </div>
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" value="<?= $user[0]->name ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for="email">Email <span class="required">*</span> </label>
        <div class="input-holder">
          <input type="email" id="email" name="email" value="<?= $user[0]->email ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for="phone">Phone <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="phone" name="phone" value="<?= $user[0]->phone_number ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for="address">Address <span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="address" id="address" required><?= $user[0]->address ?></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="city">City <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="city" name="city" value="<?= $user[0]->city ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label for="postal-code">Postal Code <span class="required">*</span></label>
        <div class="input-holder">
          <input type="number" id="postal-code" name="postal_code" value="<?= $user[0]->postal_code ?>" required>
        </div>
      </div>
      <div class="form-control">
        <label></label>
        <button class="submit" type="submit">
          Edit
        </button>
      </div>
    </form>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php include("../jquery.php") ?>
<?php include("../layouts/footer.php") ?>