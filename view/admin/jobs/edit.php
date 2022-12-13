<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php
include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\CompanyTable;
use Models\Database\CategoryTable;
use Models\Database\JobTypesTable;
use Models\Database\MYSQL;

$job_table = new JobsTable(new MYSQL());
$company_table = new CompanyTable(new MYSQL());
$category_table = new CategoryTable(new MYSQL());
$job_types_table = new JobTypesTable(new MYSQL());

$job = $job_table->findById($_GET["id"]);
$companies = $company_table->getAll();
$categories  = $category_table->getAll();
$types = $job_types_table->getAll();
?>

<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Jobs Edit Form</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['Failed']) == 1) : ?>
      <div class="alert alert-danger">
        Edited Fail!
      </div>
    <?php endif ?>
  </div>
  <div class="related_area">
    <form action="../../../App/controllers/jobs/edit.php?id=<?= $_GET["id"] ?>" method="post">
      <div class="form-control">
        <label for="name">Name <span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" id="name" name="name" value="<?= $job[0]->name ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="company">Company Name <span class="required">*</span> </label>
        <div class="input-holder">
          <select name="company_id" id="company" value="<?= $job[0]->company_id ?>">
            <?php foreach ($companies as $company) : ?>
              <option value="<?= $company->id ?>" <?= $company->id == $job[0]->company_id ? 'selected' : ''; ?>>
                <?= $company->name ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="category">Category <span class="required">*</span></label>
        <div class="input-holder">
          <select name="category_id" id="company" value="<?= $job[0]->category_id ?>">
            <?php foreach ($categories as $category) : ?>
              <option value="<?= $category->id ?>" <?= $category->id == $job[0]->category_id ? 'selected' : ''; ?>>
                <?= $category->name ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="gender">Gender <span class="required">*</span></label>
        <div class="input-holder">
          <select name="job_type_id" id="type" value="<?= $job[0]->job_type_id ?>">
            <?php foreach ($types as $type) : ?>
              <option value="<?= $type->id ?>" <?= $type->id == $job[0]->job_type_id ? 'selected' : ''; ?>>
                <?= $type->name ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="salary">Salary<span class="required">*</span></label>
        <div class="input-holder">
          <input type="text" name="salary" id="salary" value="<?= $job[0]->salary ?>">
        </div>
      </div>
      <div class="form-control">
        <label for="type">Job Type<span class="required">*</span></label>
        <div class="input-holder">
          <select name="job_type_id" id="type" value="<?= $job[0]->job_type_id ?>">
            <?php foreach ($types as $type) : ?>
              <option value="<?= $type->id ?>" <?= $type->id == $job[0]->job_type_id ? 'selected' : ''; ?>>
                <?= $type->name ?>
              </option>
            <?php endforeach ?>
          </select>
        </div>
      </div>
      <div class="form-control">
        <label for="address">Address<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="address" id="address"><?= $job[0]->address ?>
          </textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="description">Description<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="description" class="summernote" id="description"><?= $job[0]->description ?>
          </textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="requirement">Requirement<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="requirements" class="summernote" id="requirement"><?= $job[0]->requirements ?>
          </textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="date">Close Date<span class="required">*</span></label>
        <div class="input-holder">
          <input type="date" name="close_date" id="date" value="<?= $job[0]->close_date ?>">
        </div>
      </div>
      <div class="form-control">
        <label></label>
        <button class="submit" type="submit">
          Create
        </button>
      </div>
    </form>
  </div>
</section>

<?php include("../jquery.php") ?>
<?php include("../layouts/footer.php") ?>