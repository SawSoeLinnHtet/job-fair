<?php
include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\MYSQL;

$table = new JobsTable(new MYSQL());

$jobs = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Jobs</p>
    <a href="./create.php">
      <i class="ri-add-fill"></i>ADD NEW JOB
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Success']) == 1) : ?>
      <div class="alert alert-success">
        New Job Is Created!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['Delete_success']) == 1) : ?>
      <div class="alert alert-danger">
        Deleted!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <div class="table">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Category</th>
            <th>Gender</th>
            <th>Salary</th>
            <th>Job Type</th>
            <th>Last Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach($jobs as $i=>$job): ?>
            <tr>
              <td>
                <?= $i + 1 ?>
              </td>
              <td>
                <?= $job->name ?>
              </td>
              <td>
                <?= $job->company_name ?>
              </td>
              <td>
                <?= $job->category_name ?>
              </td>
              <td>
                <?= $job->gender ?>
              </td>
              <td>
                <?= $job->salary ?>
              </td>
              <td>
                <?= $job->job_type_name ?>
              </td>
              <td>
                <?= $job->close_date   ?>
              </td>
              <td>
                <a href="./view_detail.php?id=<?= $job->id ?>">
                  <i class="ri-eye-line view"></i>
                </a>
                <a href="./edit.php?id=<?= $job->id ?>">
                  <i class="ri-edit-line edit"></i>
                </a>
                <a href="../../../App/controllers/jobs/delete.php?id=<?= $job->id ?>">
                  <i class="ri-delete-bin-line delete"></i>
                </a>
              </td>
            </tr>
          <?php endforeach ?>
        </tbody>
      </table>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>