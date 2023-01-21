<?php
  include("../../../vendor/autoload.php");

  use Helpers\URI;
?>

<section id="sidebar">
  <div class="logo">
    <i class="ri-menu-fill icon icon-1 menu"></i>
    <img src="../../../public/assets/images/logo.png" alt="">
  </div>
  <div class="sidebar-menu">
    <ul class="sidebar-items">
      <li class="sidebar-item <?= URI::check("/home/"); ?>">
        <a href="../home/">
          <i class="ri-home-4-fill icon"></i>
          <span>Home</span>
        </a>
      </li>
      <li class="sidebar-item <?= URI::check("/jobs/"); ?>">
        <a href="../jobs/">
          <i class="ri-search-eye-fill icon"></i>
          <span>Find Jobs</span>
        </a>
      </li>
      <li class="sidebar-item <?= URI::check("/category/"); ?>">
        <a href="../category/">
          <i class="ri-shape-fill icon"></i>
          <span>Categories</span>
        </a>
      </li>
      <li class="sidebar-item <?= URI::check("/company/"); ?>">
        <a href="../company/">
          <i class="ri-community-fill icon"></i>
          <span>Companies</span>
        </a>
      </li>
      <li class="sidebar-item <?= URI::check("/news/"); ?>">
        <a href="../news/">
          <i class="ri-newspaper-line icon"></i>
          <span>News</span>
        </a>
      </li>
    </ul>
  </div>
  <div class="sidebar-profile-wrap">
    <a href="../profile/">
      <div class="sidebar-profile">
        <div class="img">
          <img src="../../../public/assets/images/users/user.png" alt="profile">
        </div>
        <div class="profile-info">
          <h5>
            Profile
          </h5>
        </div>
      </div>
    </a>
  </div>
</section>