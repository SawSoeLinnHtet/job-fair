<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CompanyTable;
  use Models\Database\MYSQL;

  $table = new CompanyTable(new MYSQL());

  $companies = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Lists</p>
  </div>
  <div class="related_area">
    <div class="applicant_companies">
      <?php foreach ($companies as $i=>$company): ?>
        <a href="./categories.php?company_id=<?= $company->id ?>" class="applicant_company">
          <img src="../../../public/assets/images/companies/<?= $company->image ?? "company.png" ?>" alt="">
          <span>
            <?= $company->name ?> 
          </span>
        </a>
      <?php endforeach ?>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>