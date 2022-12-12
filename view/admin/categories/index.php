<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php

include("../../../vendor/autoload.php");

use Models\Database\CategoryTable;
use Models\Database\MYSQL;

$table = new CategoryTable(new MYSQL());

$categories = $table->getAll();

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
    <?php if (isset($_GET['success']) == 1) : ?>
      <div class="alert alert-success">
        New Company Is Created!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['role_change_success']) == 1) : ?>
      <div class="alert alert-success">
        Role is changed!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['delete_success']) == 1) : ?>
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
          <th>Created At</th>
          <th>Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($categories as $i => $category) : ?>
          <tr>
            <td>
              <?= $i + 1 ?>
            </td>
            <td>
              <?= $category->name ?>
            </td>
            <td>
              <?= $category->created_at ?>
            </td>
            <td>
              <a href="./edit.php?id=<?= $category->id ?>">
                <i class="ri-edit-line edit"></i>
              </a>
              <a href="../../../App/controllers/categories/delete.php?id=<?= $category->id ?>">
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