<?php
include("../../../vendor/autoload.php");

use Helpers\URI;
?>
<section id="navbar">
  <div class="navbar">
    <p class="nav-btn">
      <i class="ri-menu-fill icon nav-icon menu-btn"></i>
      <i class="ri-close-line icon nav-icon cancel-btn fade"></i>
    </p>
    <img src="../../../public/assets/images/logo.png" alt="">
  </div>
  <div class="nav-menu">
    <ul>
      <li class="<?= URI::check("/home/"); ?>">
        <a href="../home/">
          <i class="ri-home-4-fill"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="<?= URI::check("/jobs/"); ?>">
        <a href="../jobs/">
          <i class="ri-search-eye-fill"></i>
          <span>Find Jobs</span>
        </a>
      </li>
      <li class="<?= URI::check("/category/"); ?>">
        <a href="../category/">
          <i class="ri-shape-fill"></i>
          <span>Categories</span>
        </a>
      </li>
      <li class="<?= URI::check("/company/"); ?>">
        <a href="../company/">
          <i class="ri-community-fill"></i>
          <span>Companies</span>
        </a>
      </li>
      <li class="<?= URI::check("/news/"); ?>">
        <a href="">
          <i class="ri-newspaper-line"></i>
          <span>News</span>
        </a>
      </li>
      <li>
        <a href="../profile/">
          <i class="ri-user-smile-line"></i>
          <span>Profile</span>
        </a>
      </li>
    </ul>
  </div>
</section>