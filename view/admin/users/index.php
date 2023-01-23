<?php

$title = "Users-Index";
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$table = new UsersTable(new MYSQL());

$users = $table->getALL();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Users</p>

    <a href="./create.php">
      <i class="ri-add-fill"></i>
      <span>
        ADD NEW USERS
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
    <?php if (isset($_GET['role_change_success']) == 1) : ?>
      <div class="alert alert-success">
        Role is changed!
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
            <th>Email</th>
            <th>Phone Number</th>
            <th>Change Role</th>
            <th>Action</th>
          </tr>
        </thead>
        <tbody>
          <?php if (count($users) > 0) : ?>
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
                  <div class="dropdown">
                    <button class="dropbtn 
                    <?= $user->role_id == 1 ? 'switch-admin' : 'switch-other' ?>">
                      <?= $user->role ?>
                    </button>
                    <div class="dropdown-content">
                      <a href="../../../App/controllers/users/role_switch.php?id=<?= $user->id ?>&&role=2">
                        User
                      </a>
                      <a href="../../../App/controllers/users/role_switch.php?id=<?= $user->id ?>&&role=1">
                        Admin
                      </a>
                    </div>
                  </div>
                </td>
                <td>
                  <div class="dropdown">
                    <button class="dropbtn">Action</button>
                    <div class="dropdown-content">
                      <a href="./view_detail.php?id=<?= $user->id ?>">
                        <i class="ri-eye-line view"></i>
                      </a>
                      <a href="./edit.php?id=<?= $user->id ?>">
                        <i class="ri-edit-line edit"></i>
                      </a>
                      <a href="../../../App/controllers/users/delete.php?id=<?= $user->id ?>">
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