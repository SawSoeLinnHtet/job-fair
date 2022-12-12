<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\MYSQL;
use Helpers\Help;

$table = new JobsTable(new MYSQL());
$job = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Details</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="detail-wrapper">
    <div class="job-profile">
      <img src="../../../public/assets/images/companies/lotteria.png" alt="">

      <div class="text">
        <p class="job-name">
          <?= $job[0]->name ?>
        </p>
        <p class="job-company">
          <?= $job[0]->company_name ?>
        </p>
        <ul>
          <li>
            <i class="ri-map-pin-fill"></i><?= $job[0]->address ?>
          </li>
          <li>
            <i class="ri-time-fill"></i><?= $job[0]->job_type_name ?>
          </li>
        </ul>
      </div>
      <div class="job-text">
        <ul>
          <li>
            <i class="ri-money-dollar-circle-line"></i><?= $job[0]->salary ?>
          </li>
          <li>
            <i class="ri-mail-close-line"></i><?= $job[0]->close_date ?>
          </li>
          <li>
            <i class="ri-history-fill"></i><?= $job[0]->created_at ?>
          </li>
        </ul>
      </div>
    </div>
    <div class="long-text">
      <h2>
        Description
      </h2>
      <span>
        <?= $job[0]->description ?>
      </span>
      <h2>
        Requirements
      </h2>
      <span>
        <?= $job[0]->requirements ?>
      </span>
    </div>
    <a class="updated">
      Updated by <?= $job[0]->company_name ?>
    </a>
  </div>
</section>

<?php include("../layouts/footer.php") ?>