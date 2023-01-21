<?php
  include("../../../vendor/autoload.php");

  use Models\Database\JobsTable;
  use Models\Database\CategoryTable;
  use Models\Database\MYSQL;

  $table = new CategoryTable(new MYSQL());
  $job_table = new JobsTable(new MYSQL());
  $categories = $table->getAll();
?>
<?php include("../layouts/header.php") ?>
<main class="main-content">
  <div class="category-search-bar">
    <div class="display-page-title">
      <h1 class="title-bar">
        Categories
      </h1>
    </div>
    <form action="">
      <input type="text" name="categories-name" placeholder="Enter Categories Name">
      <button type="submit">
        <i class="ri-search-2-line"></i>
      </button>
    </form>
  </div>
  <div class="categories-list">
    <?php if (count($categories) !== 0) : ?>
      <div class="categories-wrapper">
        <?php foreach ($categories as $category) : ?>
          <a href="../jobs/?cataid=<?= $category->id ?>" class="category">
            <img src="../../../public/assets/images/categories/<?= $category->image ?? "default.png" ?>" alt="category image">
            <p>
              <?= $category->name ?>
              <span>(<?= count($job_table->findByCategory($category->id)) ?>)<span>
            </p>
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