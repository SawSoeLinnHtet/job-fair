<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\CategoryTable;
use Models\Database\JobTypesTable;
use Models\Database\MYSQL;

$company_table = new CompanyTable(new MYSQL());
$category_table = new CategoryTable(new MYSQL());
$job_types_table = new JobTypesTable(new MYSQL());

$companies = $company_table->getAll();
$categories  = $category_table->getAll();
$types = $job_types_table->getAll();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Jobs Created Form</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Failed']) == 1) : ?>
      <div class="alert alert-danger">
        Created Job Failed!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <form id="form" action="../../../App/controllers/jobs/create.php" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" required>
        </div>
      </div>
      <div class="form-control">
        <label for="company">Company Name <span class="required">*</span> </label>
        <div class="input-holder">
          <select name="company_id" id="company" required>
            <option value="" selected>Select Company Name</option>
            <?php foreach ($companies as $company) : ?>
              <option value="<?= $company->id ?>"><?= $company->name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="category">Category <span class="required">*</span></label>
        <div class="input-holder">
          <select name="category_id" id="company" required>
            <option value="" selected>Select Job's Categories</option>
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category->id ?>"><?= $category->name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="gender">Gender <span class="required">*</span></label>
        <div class="input-holder">
          <select name="gender" id="gender" required>
            <option value="" selected>Select Gender Type</option>
            <option value="Male and Female">Male & Female</option>
            <option value="Male Only">Male Only</option>
            <option value="Female Only">Female Only</option>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="salary">Salary<span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" name="salary" id="salary" required>
        </div>
      </div>
      <div class="form-control">
        <label for="type">Job Type<span class="required">*</span></label>
        <div class="input-holder">
          <select name="job_type_id" id="type" required="required">
            <option value="">Select Job Type</option>
            <?php foreach ($types as $type) : ?>
              <option value="<?= $type->id ?>"><?= $type->name ?></option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="address">Address<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="address" id="address" required></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="description">Description<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="description" id="description" required></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="requirement">Requirement<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="requirements" id="requirement" required></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="date">Close Date<span class="required">*</span></label>
        <div class="input-holder">
          <input type="date" name="close_date" id="date" required>
        </div>
      </div>
      <div class="form-control">
        <label></label>
        <button type="submit">
          Create
        </button>
      </div>
    </form>
  </div>
</section>
<?php include("../jquery-validate.php") ?>
<?php include("../layouts/footer.php") ?>