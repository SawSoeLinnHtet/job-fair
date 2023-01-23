<?php
  $title = "Companies-Details"; 
?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$table = new CompanyTable(new MYSQL());
$company = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Details</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>
      <span> Go Back</span>
    </a>
  </div>
  <div class="details-wrapper">
    <div class="wrap">
      <div class="profile-holder">
        <img src="../../../public/assets/images/companies/<?= $company[0]->image ?? "default.png" ?>" alt="image" class="detail-img">
      </div>
      <div class="profile-details">
        <p class="title">
          <?= $company[0]->name ?>
        </p>
        <p class="type">
          - <?= $company[0]->type ?>
        </p>
        <p class="mail">
          <?= $company[0]->email ?>
        </p>
        <p class="address">
          <?= $company[0]->location ?>
        </p>
        <div class="details-footer">
          <ul class="contact-lists">
            <li>
              <a href="#" class="contact">
                <i class="ri-facebook-box-fill facebook"></i>
              </a>
            </li>
            <li>
              <a href="#" class="contact">
                <i class="ri-instagram-line instagram"></i>
              </a>
            </li>
            <li>
              <a href="#" class="contact">
                <i class="ri-twitter-line twitter"></i>
              </a>
            </li>
            <li>
              <a href="#" class="contact">
                <i class="ri-whatsapp-line whatsapp"></i>
              </a>
            </li>
          </ul>
          <a href="./edit.php?id=<?= $company[0]->id ?>" class="edit-btn">Edit</a>
        </div>
      </div>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>