<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\MYSQL;

$table = new CompanyTable(new MYSQL());

$companies = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Companies</p>
    <a href="./create.php">
      <i class="ri-add-fill"></i>ADD NEW COMPANY
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Success']) == 1) : ?>
      <div class="alert alert-success">
        New Company Is Created!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['Role_change_success']) == 1) : ?>
      <div class="alert alert-success">
        Role is changed!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['Delete_success']) == 1) : ?>
      <div class="alert alert-danger">
        Deleted!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <table>
      <thead>
        <tr>
          <th>#</th>
          <th>Name</th>
          <th>Type</th>
          <th>Email</th>
          <th>Location</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($companies as $i => $company) : ?>
          <tr>
            <td>
              <?= $i + 1 ?>
            </td>
            <td>
              <?= $company->name ?>
            </td>
            <td>
              <?= $company->type ?>
            </td>
            <td>
              <?= $company->email ?>
            </td>
            <td>
              <?= $company->location ?>
            </td>
            <td>
              <a href="./view_detail.php?id=<?= $company->id ?>">
                <i class="ri-eye-line view"></i>
              </a>
              <a href="./edit.php?id=<?= $company->id ?>">
                <i class="ri-edit-line edit"></i>
              </a>
              <a href="../../../App/controllers/companies/delete.php?id=<?= $company->id ?>">
                <i class="ri-delete-bin-line delete"></i>
              </a>
            </td>
          </tr>
        <?php endforeach ?>
      </tbody>
    </table>
  </div>
</section>

<?php include("../layouts/footer.php") ?>