<?php
$title = "Apply-Form";
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$table = new UsersTable(new MYSQL());

$job_id = $_GET["job_id"] ?? "undefined";
$user = $table->findById($_SESSION["user"][0]->id);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Apply Form</title>
  <link rel="stylesheet" href="../../../public/css/site.css">
</head>

<body>
  <div class="apply-form-container">
    <div class="form-wrap">
      <div class="apply-item">
        <div class="alert-box">
          <?php if (isset($_GET['Success']) == 1) : ?>
            <div class="alert alert-success">
              Your appliciant is success!
            </div>
          <?php endif ?>
          <?php if (isset($_GET['Fail']) == 1) : ?>
            <div class="alert alert-danger">
              Your appliciant is failed! Please Try Again.
            </div>
          <?php endif ?>
        </div>
        <h1>
          Enter Applier's Data & CV
        </h1>
        <img src="../../../public/assets/images/applynow.jpg" alt="">
      </div>
      <form action="../../../App/controllers/applies/create.php?user_id=<?= $user[0]->id ?>&&job_id=<?= $job_id ?>" method="post" id="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input id="name" type="text" name="user_name" value="<?= $user[0]->name ?>" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input id="email" type="email" name="email" value="<?= $user[0]->email ?>" required>
        </div>
        <div class="form-group">
          <label for="number">Phone</label>
          <input id="number" type="text" name="phonenumber" value="<?= $user[0]->phone_number ?>" required>
        </div>
        <div class="form-group">
          <label for="cv-form">CV <span>( only PDF (size limit) and DOC )</span></label>
          <input id="cv-form" type="file" name="cv" class="file-input">
        </div>
        <div class="form-group buttons">
          <button type="submit" class="submit">Submit</button>
          <button class="back previous-btn">Back</button>
        </div>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="../../../public/js/site_external.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#form").validate()
      console.log("hi");
    })
    $(".previous-btn").click(function() {
      console.log("hello")
      window.history.go(-1)
      return false
    })
  </script>
</body>

</html>