<?php

include("../../../vendor/autoload.php");

use Helpers\Auth;

$session_user = Auth::check();
$job_id = $_GET["job_id"] ?? "undefined";
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
        <h1>
          Enter Applier's Data & CV Form
        </h1>
        <img src="../../../public/assets/images/applynow.jpg" alt="">
      </div>
      <form action="../../../App/controllers/applies/create.php?user_id=<?= $session_user->id ?>&&job_id=<?= $job_id ?>" method="POST" id="form" enctype="multipart/form-data">
        <div class="form-group">
          <label for="name">Name</label>
          <input id="name" type="text" name="name" required>
        </div>
        <div class="form-group">
          <label for="email">Email</label>
          <input type="email" name="email" required>
        </div>
        <div class="form-group">
          <label for="number">Phone</label>
          <input id="number" type="text" name="phonenumber" required>
        </div>
        <div class="form-group">
          <label for="cv-form">Upload your CV <span>( only PDF and DOC )</span></label>
          <input id="cv-form" class="file-input" type="file" name="cv_form" required>
        </div>
        <button type="submit">Submit</button>
        <a href="../jobs/">Back</a>
      </form>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
  <script>
    $(document).ready(function() {
      $("#form").validate()
      console.log("hi");
    })
  </script>
</body>

</html>