<?php 
  $title = "Companies";
?>
<?php

include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

$table = new CompanyTable(new MYSQL());

$companies = $table->getAll();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>LEE PEL</p>
  </div>
  <div class="related_area">
    <?php if (count($companies) !== 0) : ?>
      <div class="applicant_companies">
        <?php foreach ($companies as $i => $company) : ?>
          <a href="./categories.php?company_id=<?= $company->id ?>" class="applicant_company">
            <img src="../../../public/assets/images/companies/<?= $company->image ?? "no-image.jpg" ?>" alt="">
            <span>
              <?= $company->name ?>
            </span>
          </a>
        <?php endforeach ?>
      </div>
    <?php else : ?>
      <div class="alert-box">
        <div class="alert alert-warning">
          There is nothing right now! Come Back Later!
        </div>
      </div>
    <?php endif ?>
  </div>
</section>

<?php include("../layouts/footer.php") ?>