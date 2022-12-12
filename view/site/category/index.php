<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>

<?php
  use Models\Database\JobsTable;
  use Models\Database\CategoryTable;
  use Models\Database\MYSQL;

  $table = new CategoryTable(new MYSQL());
  $job_table = new JobsTable(new MYSQL());
  $categories = $table->getAll();
?>
<?php include("../layouts/header.php") ?>
<main>
  <div class="category-search-bar">
    <div class="display-page-title">
      <h3>
        Categories
      </h3>
    </div>
    <form action="">
      <input type="text" name="categories-name" placeholder="Enter Categories Name">
      <button type="submit">
        <i class="ri-search-2-line"></i>
      </button>
    </form>
  </div>
  <div class="categories-list">
    <div class="categories-wrapper">
      <?php foreach($categories as $category): ?>
      <div>
        <a href="#" class="category">
          <img src="../../../public/assets/images/categories/technology.png" alt="category image">
          <div class="category_box-text">
            <p>
              <?= $category->name ?> 
              <span>(<?= count($job_table->findByCategory($category->id)) ?>)<span>
            </p>
          </div>
        </a>
      </div>
      <?php endforeach ?>
    </div>
</main>
<?php include("../layouts/footer.php") ?>