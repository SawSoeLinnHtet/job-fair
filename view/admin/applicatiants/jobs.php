<?php
$title = "Jobs";
?>
<?php

include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\ApplyListsTable;
use Models\Database\MYSQL;

$company_id = $_GET["company_id"] ?? "undefined";
$cata_id = $_GET["cate_id"] ?? "undefined";

$table = new JobsTable(new MYSQL());
$apply_table = new ApplyListsTable(new MYSQL());
$jobs = $table->findByCompanyAndCategory($company_id, $cata_id);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Job Lists</p>
    <a class="previous-btn">
      Back
    </a>
  </div>
  <div class="related_area">
    <div class="applicant_relate">
      <table>
        <thead>
          <tr>
            <th>
              No
            </th>
            <th>
              Job Name And Appliciant Number
            </th>
            <th>
              Total Appliciants
            </th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($jobs) >= 0) : ?>
            <?php foreach ($jobs as $i => $job) : ?>
              <tr>
                <td>
                  <?= $i + 1 ?>
                </td>
                <td>
                  <a href="./?job_id=<?= $job->id ?>">
                    <?= $job->name ?>
                  </a>
                </td>
                <td>
                  <?php $counts = count($apply_table->findByJobId($job->id)); ?>
                  <?= $counts !== 0 ? $counts : "None"; ?>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else : ?>
            <tr>
              <td colspan="2">
                <span class="alert">
                  No Data Found. Please Come Back Later!
                </span>
              </td>
            </tr>
          <?php endif ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php include("../layouts/footer.php") ?>