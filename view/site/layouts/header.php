<?php
global $title;
include("../../../vendor/autoload.php");

use Helpers\Auth;
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $title ?? "Job For You" ?></title>
  <link rel="stylesheet" href="../../../public/css/site.css">
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,300;0,700;1,200&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/remixicon@2.5.0/fonts/remixicon.css" rel="stylesheet">
  <link rel="icon" type="image/x-icon" href="../../../public/assets/images/favicon.png">
</head>

<body>
  <?php include("aside.php") ?>
  <section id="home-wrap">
    <?php include("navbar.php") ?>