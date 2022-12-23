<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php

include("../../../vendor/autoload.php");

use Models\Database\ApplyListsTable;
use Models\Database\JobsTable;
use Models\Database\MYSQL;

$table = new ApplyListsTable(new MYSQL());
$job_table = new JobsTable(new MYSQL());

$appliciants = $table->findByAccept(1, $_GET["job_id"]);

?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p class="apply-job-name">
      <?= $job_table->findById($_GET["job_id"])[0]->name ?>
      <span>( Job Name )</span>
    </p>
    <div class="backandshow">
      <a>
        Accpect Appliciants
      </a>
      <a>
        Back
      </a>
    </div>
  </div>
  <div class="related_area">
    <div class="alert-box">
      <?php if (isset($_GET['mail_success']) == 1) : ?>
        <div class="alert alert-success">
          Mail Send to This Person
        </div>
      <?php endif ?>
      <?php if (isset($_GET['mail_fail']) == 1) : ?>
        <div class="alert alert-danger">
          Mail is not Success
        </div>
      <?php endif ?>
    </div>
    <div class="appliciant_companies">
      <table>
        <thead>
          <tr>
            <th>
              No
            </th>
            <th>
              Appliciant Name
            </th>
            <th>
              Appliciant Email
            </th>
            <th>
              CV Form
            </th>
            <th>
              <?php if (isset($_GET["accept"]) == 1) : ?>
                Send Mail To User
              <?php else : ?>
                Accept/Denied
              <?php endif ?>
            </th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($appliciants) >= 0) : ?>
            <?php foreach ($appliciants as $i => $appliciant) : ?>
              <tr>
                <td>
                  <?= $i + 1 ?>
                </td>
                <td>
                  <?= $appliciant->name ?>
                </td>
                <td>
                  <?= $appliciant->email ?>
                </td>
                <td>
                  <a href="../../../public/assets/images/cv_form/<?= $appliciant->cv_name ?>">Tap to Download</a>
                </td>
                <td>
                  <a href="../../../App/controllers/mails/create.php?job_id=<?=$appliciant->job_id ?>&&user_id=<?= $appliciant->user_id ?>" class="accept">
                    <i class="ri-chat-upload-line"></i>
                  </a>
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

<script>
  if (location.href.includes("&&")) {
    setTimeout(function() {
      history.pushState('', '', location.href.split("&&")[0]);
      location.reload(true);
    }, 30000);
  }
</script>

<?php include("../layouts/footer.php") ?>