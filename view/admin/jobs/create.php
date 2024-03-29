<?php
$title = "Jobs-Create";

include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\CategoryTable;
use Models\Database\JobTypesTable;
use Models\Database\MYSQL;
use Helpers\Auth;

Auth::check();

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
      <i class="ri-arrow-go-back-fill"></i>
      <span>Go Back</span>
    </a>
  </div>
  <div class="alert-box">
    <?php if (isset($_GET['create_success']) == 1) : ?>
      <div class="alert alert-success">
        Created Job Failed!
      </div>
    <?php endif ?>
    <?php if (isset($_GET['create_fail']) == 1) : ?>
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
          <textarea name="description" class="summernote" required></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="description">Responsibility<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="responsibility" class="summernote" required></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="requirement">Requirement<span class="required">*</span></label>
        <div class="input-holder">
          <textarea name="requirements" class="summernote" required></textarea>
        </div>
      </div>
      <div class="form-control">
        <label for="date">Close Date<span class="required">*</span></label>
        <div class="input-holder">
          <input type="date" name="close_date" required>
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

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote-lite.min.js"></script>
<script>
  $("#form").validate()
  $(".summernote").summernote({
    tabsize: 2,
    height: 200,
    toolbar: [
      ["style", ["style"]],
      ["font", ["bold", "underline", "clear"]],
      ["color", ["color"]],
      ["para", ["ul", "ol", "paragraph"]],
      ["table", ["table"]],
      ["view", ["fullscreen", "codeview", "help"]],
    ],
  })
</script>
<?php include("../layouts/footer.php") ?>