
<?php
  $title = "Index";
  include("../../../vendor/autoload.php");

  use Models\Database\ApplyListsTable;
  use Models\Database\JobsTable;
  use Models\Database\MYSQL;

  $table = new ApplyListsTable(new MYSQL());
  $job_table = new JobsTable(new MYSQL());

  $appliciants = $table->findByAccept(0, $_GET["job_id"]);

  $job = $job_table->findById($_GET["job_id"]);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p class="apply-job-name">
      <?= $job[0]->name ?>
    </p>
    <div class="backandshow">
      <a href="./acceptedLists.php?job_id=<?= $_GET["job_id"] ?>">
        Accpect Appliciants
      </a>
      <a class="previous-btn">
        Back
      </a>
    </div>
  </div>
  <div class="related_area">
    <div class="alert-box">
      <?php if (isset($_GET['accept']) == 1) : ?>
        <div class="alert alert-success">
          Applier accept for this job!
        </div>
      <?php endif ?>
      <?php if (isset($_GET['unaccept']) == 1) : ?>
        <div class="alert alert-warning">
          Accept is not success!
        </div>
      <?php endif ?>
      <?php if (isset($_GET['denied']) == 1) : ?>
        <div class="alert alert-danger">
          Applier denied for this job!
        </div>
      <?php endif ?>
    </div>
    <div class="applicant_relate">
      <div class="table-holder">
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
            <?php if (count($appliciants) > 0) : ?>
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
                    <div class="dropdown">
                      <button class="dropbtn">Action</button>
                      <div class="dropdown-content">
                        <a href="../../../App/controllers/applies/accept.php?apply_id=<?= $appliciant->id ?>&&job_id=<?= $appliciant->job_id ?>" class="accept"> Accept <i class="ri-check-line"></i></a>
                        <a href="../../../App/controllers/applies/denied.php?apply_id=<?= $appliciant->id ?>&&job_id=<?= $appliciant->job_id ?>" class="denied"> Denied <i class="ri-close-line"></i></a>
                      </div>
                    </div>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td colspan="5">
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
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<script>
  if (location.href.includes("&&")) {
    setTimeout(function() {
      history.pushState('', '', location.href.split("&&")[0]);
      location.reload(true);
    }, 10000);
  }
</script>

<?php include("../layouts/footer.php") ?>