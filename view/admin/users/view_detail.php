<?php
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;

$table = new UsersTable(new MYSQL());
$user = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <?php var_dump($user) ?>

  <div class="dropdown">
    <button class="dropbtn">Dropdown</button>
    <div class="dropdown-content">
      <a href="
          ../../../App/controllers/users/role_switch.php?id=<?= $user[0]->id ?>&role=1">Admin</a>
      <a href="
          ../../../App/controllers/users/role_switch.php?id=<?= $user[0]->id ?>&role=2
        ">User</a>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>