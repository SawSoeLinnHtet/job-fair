<?php
  global $title;
  include("../../../vendor/autoload.php");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>
    <?php echo isset($title) ? $title : "Job For You"; ?>
  </title>
  <link rel="stylesheet" href="../../../public/css/admin.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,200&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../../../public/assets/images/admin.png">
</head>

<body>
  <section class="header">
    <div class="logo">
      <i class="icon ri-menu-line menu"></i>
      <h2>
        Job For<span> You</span>
      </h2>
    </div>
    <div class="search-notification-profile">
      <div class="search">
        <input type="text" placeholder="Enter Your Seach...">
        <button><i class="ri-search-2-line"></i></button>
      </div>
      <div class="notification-profile">
        <div class="picon lock">
          <i class="ri-lock-line"></i>
        </div>
        <div class="picon notification">
          <i class="ri-notification-line"></i>
        </div>
        <div class="picon chat">
          <i class="ri-wechat-line"></i>
        </div>
        <div class="picon profile">
          <a href="../profile/">
            <img src="../../../public/assets/images/users/user.png" alt="profile">
          </a>
        </div>
      </div>
    </div>
  </section>
  <section class="main">
    <?php include("aside.php") ?>