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
    <p>Categories</p>
    <a href="./create.php">
      <i class="ri-add-fill"></i>
      <span>
        ADD NEW CATEGORY
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
            <th>Created At</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($categories) > 0) : ?>
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
                  <div class="dropdown">
                    <button class="dropbtn">Action</button>
                    <div class="dropdown-content">
                      <a href="./view_detail.php?id=<?= $category->id ?>">
                        <i class="ri-eye-line view"></i>
                      </a>
                      <a href="./edit.php?id=<?= $category->id ?>">
                        <i class="ri-edit-line edit"></i>
                      </a>
                      <a href="../../../App/controllers/categories/delete.php?id=<?= $category->id ?>">
                        <i class="ri-delete-bin-line delete"></i>
                      </a>
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
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php include("../layouts/footer.php") ?>