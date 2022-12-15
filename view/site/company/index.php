<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>

<?php

use Models\Database\JobsTable;
use Models\Database\CompanyTable;
use Models\Database\MYSQL;

$table = new CompanyTable(new MYSQL());
$job_table = new JobsTable(new MYSQL());
$categories = $table->getAll();
?>
<?php include("../layouts/header.php") ?>
<main>
  <div class="category-search-bar">
    <div class="display-page-title">
      <h3>
        Companies
      </h3>
    </div>
    <form action="">
      <input type="text" name="categories-name" placeholder="Enter Categories Name">
      <button type="submit">
        <i class="ri-search-2-line"></i>
      </button>
    </form>
  </div>
  <div class="companies-list">
    <div class="companies-wrapper">
      <a href="">
        <img src="../../../public/assets/images/companies/company.png" alt="">
      </a>
    </div>
  </div>
</main>
<?php include("../layouts/footer.php") ?>