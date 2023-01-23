<?php 
  $title = "Categories"; 
?>
<?php
  include("../../../vendor/autoload.php");

  use Models\Database\CategoryTable;
  use Models\Database\JobsTable;
  use Models\Database\MYSQL;
  use Helpers\Auth;

  Auth::check();

  $table = new JobsTable(new MYSQL());

  $company_id = $_GET["company_id"] ?? "undefined";
  $categories_id = $table->findCategoryByCompanyId($company_id);

  function findById($id)
  {
    $category_table = new CategoryTable(new MYSQL());
    echo $category_table->findById($id)[0]->name;
  }
?>
<?php include("../layouts/header.php") ?>

<section class="main-content">
  <div class="related_header">
    <p>Category Lists</p>
    <a class="previous-btn">
      Back
    </a>
  </div>
  <div class="related_area">
    <div class="applicant_relate">
      <div class="table-holder">
        <table>
          <thead>
            <tr>
              <th>
                No
              </th>
              <th>
                Category Name
              </th>
              <th>
                Total Companies
              </th>
            </tr>
          </thead>
          <tbody>
            <?php if (count($categories_id) >= 1) : ?>
              <?php foreach ($categories_id as $i => $category_id) : ?>
                <tr>
                  <td>
                    <?= $i + 1 ?>
                  </td>
                  <td>
                    <?php
                    $cata_id = $category_id->category_id;

                    $_SESSION["company_id"] = $company_id;
                    $_SESSION["cata_id"] = $cata_id;
                    ?>
                    <a href="./jobs.php?company_id=<?= $company_id ?>&&cate_id=<?= $cata_id ?>">
                      <?php findById($cata_id) ?>
                    </a>
                  </td>
                  <td>
                    <?= count($table->findByCompanyAndCategory($company_id, $cata_id)) ?>
                  </td>
                </tr>
              <?php endforeach ?>
            <?php else : ?>
              <tr>
                <td colspan="3">
                  <span class="alert">
                    No Data Found. Please Come Back Later!
                  </span>
                </td>
              </tr>
            <?php endif ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>
</section>

<script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
<?php include("../layouts/footer.php") ?>