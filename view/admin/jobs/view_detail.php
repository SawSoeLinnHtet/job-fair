<?php 
  $title = "Jobs-Details";
?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\MYSQL;

$timeAgo = new Westsworld\TimeAgo();

$table = new JobsTable(new MYSQL());
$job = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Job Details</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>
      <span>Go Back</span>
    </a>
  </div>
  <div class="detail-wrapper">
    <div class="job-profile">
      <img src="../../../public/assets/images/companies/<?= $job[0]->company_image ?? 'no-image.jpg' ?>" alt="">
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
            <i class="ri-history-fill"></i>
            <?= $timeAgo->inWordsFromStrings($job[0]->created_at) ?>
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
      <div class="option">
        <a class="updated">
          Updated by <?= $job[0]->company_name ?>
        </a>
        <a href="./edit.php?id=<?= $job[0]->id ?>" class="edit-btn">Edit</a>
      </div>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>