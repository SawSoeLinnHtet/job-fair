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
    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Failed']) == 1) : ?>
      <div class="alert alert-danger">
        Editted user Failed!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <form action="../../../App/controllers/users/edit.php?id=<?= $id ?>" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" value="<?= $user[0]->name ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="email">Email <span class="required">*</span> </label>
        <div class="input-holder">
          <input type="email" id="email" name="email" value="<?= $user[0]->email ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="phone">Phone <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="phone" name="phone" value="<?= $user[0]->phone_number ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="address">Address <span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="address" id="address"><?= $user[0]->address ?></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="city">City <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="city" name="city" value="<?= $user[0]->city ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="postal-code">Postal Code <span class="required">*</span></label>
        <div class="input-holder">
          <input type="number" id="postal-code" name="postal_code" value="<?= $user[0]->postal_code ?>">
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

<?php include("../layouts/footer.php") ?>