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
    <div class="categories-list-wrapper">
      <div class="category">
        <img src="../../../public/assets/images/categories/technology.png" alt="category image">
        <a href="#" class="category-name">
          <p>
            Technology
          </p>
        </a>
        <span class="quantity">13</span>
      </div>
    </div>
  </div>
</main>
<?php include("../layouts/footer.php") ?>