<?php
  include("../../../vendor/autoload.php");

  use Models\Database\CompanyTable;
  use Models\Database\MYSQL;

  $table = new CompanyTable(new MYSQL());
  $company = $table->findById($_GET["id"]);
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Company Edit Form</p>
    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Failed']) == 1) : ?>
      <div class="alert alert-danger">
        Created user Failed!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <form action="../../../App/controllers/companies/edit.php?id=<?= $_GET['id'] ?>" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" value="<?= $company[0]->name ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="type">Type <span class="required">*</span> </label>
        <div class="input-holder">
          <input type="text" id="type" name="type" value="<?= $company[0]->name ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="email">Email <span class="required">*</span></label>
        <div class="input-holder">
          <input type="email" id="email" name="email" value="<?= $company[0]->email ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="location">Location <span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="location" id="location"><?= $company[0]->location ?>
          </textarea>
        </div>
      </div>
      <div class="form-control">
        <button type="submit">
          Edit
        </button>
      </div>
    </form>
  </div>
</section>

<?php include("../layouts/footer.php") ?>