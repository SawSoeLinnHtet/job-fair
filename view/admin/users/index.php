<?php
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;

$table = new UsersTable(new MYSQL());

$users = $table->getALL();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Users</p>

    <a href="./create.php">
      <i class="ri-add-fill"></i>ADD NEW USERS
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Success']) == 1) : ?>
      <div class="alert alert-success">
        New User Is Created!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['Role_change_success']) == 1) : ?>
      <div class="alert alert-success">
        Role is changed!
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
            <th>Email</th>
            <th>Phone Number</th>
            <th>Postal_code</th>
            <th>Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($users as $i => $user) : ?>
            <tr>
              <td>
                <?= $i + 1 ?>
              </td>
              <td>
                <?= $user->name ?>
              </td>
              <td>
                <?= $user->email ?>
              </td>
              <td>
                <?= $user->phone_number ?>
              </td>
              <td>
                <?= $user->postal_code ?>
              </td>
              <td>
                <?= $user->role ?>
              </td>
              <td>
                <a href="./view_detail.php?id=<?= $user->id ?>">
                  <i class="ri-eye-line view"></i>
                </a>
                <a href="./edit.php?id=<?= $user->id ?>">
                  <i class="ri-edit-line edit"></i>
                </a>
                <a href="../../../App/controllers/users/delete.php?id=<?= $user->id ?>">
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