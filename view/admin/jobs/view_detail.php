<?php
include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\MYSQL;

$table = new JobsTable(new MYSQL());
$job = $table->findById($_GET["id"]);
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <?php var_dump($job) ?>
</section>

<?php include("../layouts/footer.php") ?>