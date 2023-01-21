<?php
  $title = "Jobs-Index";
?>
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
      <i class="ri-add-fill"></i>
      <span>ADD NEW JOB</span>
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['create_success']) == 1) : ?>
      <div class="alert alert-success">
        New Job Is Created!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['edit_success']) == 1) : ?>
      <div class="alert alert-success">
        Edited!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['delete_success']) == 1) : ?>
      <div class="alert alert-danger">
        Deleted!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <div class="table-holder">
      <table>
        <thead>
          <tr>
            <th>#</th>
            <th>Name</th>
            <th>Company Name</th>
            <th>Category</th>
            <th>Gender</th>
            <th>Job Type</th>
            <th>Last Date</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($jobs) > 0) : ?>
            <?php foreach ($jobs as $i => $job) : ?>
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
                  <?= $job->job_type_name ?>
                </td>
                <td>
                  <?= $job->close_date   ?>
                </td>
                <td>
                  <div class="dropdown">
                    <button class="dropbtn">Action</button>
                    <div class="dropdown-content">
                      <a href="./view_detail.php?id=<?= $job->id ?>">
                        <i class="ri-eye-line view"></i>
                      </a>
                      <a href="./edit.php?id=<?= $job->id ?>">
                        <i class="ri-edit-line edit"></i>
                      </a>
                      <a href="../../../App/controllers/jobs/delete.php?id=<?= $job->id ?>">
                        <i class="ri-delete-bin-line delete"></i>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else : ?>
            <tr>
              <td colspan="8">
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

<?php include("../layouts/footer.php") ?>