<?php
  $title = "Company";
  include("../../../vendor/autoload.php");

  use Models\Database\JobsTable;
  use Models\Database\CompanyTable;
  use Models\Database\MYSQL;
  use Helpers\Auth;

  Auth::check();

  $table = new CompanyTable(new MYSQL());
  $job_table = new JobsTable(new MYSQL());
  $companies = $table->getAll();
?>
<?php include("../layouts/header.php") ?>

<main class="main-content">
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
    <?php if(count($companies)!== 0 ): ?>
      <div class="companies-wrapper">
        <?php foreach($companies as $company ): ?>
        <a href="../jobs/?compid=<?= $company->id ?>" class="company">
          <img src="../../../public/assets/images/companies/<?= $company->image ?? "default.png" ?>" alt="">
        </a>
        <?php endforeach ?>
      </div>
    <?php else : ?>
      <div class="alert-box">
          <div class="alert alert-warning">
            There is nothing right now! Please Come Back Later!
          </div>
      </div>
    <?php endif ?>
  </div>
</main>
<?php include("../layouts/footer.php") ?>