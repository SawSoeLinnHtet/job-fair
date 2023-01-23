<?php
  $title = "Companies-Index"; 
?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$table = new CompanyTable(new MYSQL());

$companies = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Companies</p>
    <a href="./create.php">
      <i class="ri-add-fill"></i>
      <span>
        ADD NEW COMPANY
      </span>
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['create_success']) == 1) : ?>
      <div class="alert alert-success">
        New User Is Created!
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
            <th>Type</th>
            <th>Email</th>
            <th>Location</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($companies) > 0) : ?>
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
                  <div class="dropdown">
                    <button class="dropbtn">Action</button>
                    <div class="dropdown-content">
                      <a href="./view_detail.php?id=<?= $company->id ?>">
                        <i class="ri-eye-line view"></i>
                      </a>
                      <a href="./edit.php?id=<?= $company->id ?>">
                        <i class="ri-edit-line edit"></i>
                      </a>
                      <a href="../../../App/controllers/companies/delete.php?id=<?= $company->id ?>">
                        <i class="ri-delete-bin-line delete"></i>
                      </a>
                    </div>
                  </div>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else : ?>
            <tr>
              <td colspan="6">
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