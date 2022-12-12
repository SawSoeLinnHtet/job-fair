<?php
include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\Auth;

$session_user = Auth::check();

$table = new UsersTable(new MYSQL());

$user = $table->findById($session_user->id);
?>
<?php include("../layouts/header.php") ?>
  <?php var_dump($user) ?>
<?php include("../layouts/footer.php") ?>