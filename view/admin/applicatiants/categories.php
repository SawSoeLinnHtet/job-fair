<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
<?php

include("../../../vendor/autoload.php");

use Models\Database\CategoryTable;
use Models\Database\JobsTable;
use Models\Database\MYSQL;

$table = new JobsTable(new MYSQL());


$job_id = $_GET["id"] ?? "undefined";
$categories_id = $table->findCategoryByCompanyId($job_id);

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
    <form action="" method="POST">
      <input type="text" class="search_appliciants">
      <button><i class="ri-search-2-line"></i></button>
    </form>
  </div>
  <div class="related_area">
    <div class="appliciant_companies">
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
                  <?php $cata_id = $category_id->category_id ?>
                  <a href="./jobs.php?job_id=<?= $job_id ?>&&cate_id=<?= $cata_id ?>">
                    <?php findById($cata_id) ?>
                  </a>
                </td>
                <td>
                  <?= count($table->findByCompanyAndCategory($job_id, $cata_id)) ?>
                </td>
              </tr>
            <?php endforeach ?>
          <?php else : ?>
            <tr>
              <td colspan="2">
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
</section>

<?php include("../layouts/footer.php") ?>