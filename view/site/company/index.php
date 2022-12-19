<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>

<?php

use Models\Database\JobsTable;
use Models\Database\CompanyTable;
use Models\Database\MYSQL;

$table = new CompanyTable(new MYSQL());
$job_table = new JobsTable(new MYSQL());
$companies = $table->getAll();
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
      <?php foreach($companies as $company ): ?>
      <a href="../jobs/?compid=<?= $company->id ?>" class="company">
        <img src="../../../public/assets/images/companies/<?= $company->image ?? "company.png" ?>" alt="">
      </a>
      <?php endforeach ?>
    </div>
  </div>
</main>
<?php include("../layouts/footer.php") ?>