<?php include("../../../App/_classes/Helpers/RouteAuthCheck.php") ?>
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
    <p>Company Details</p>

    <a href="./">
      <i class="ri-arrow-go-back-fill"></i>Go Back
    </a>
  </div>
  <div class="detail-wrapper">
    <div class="wrap">
      <span class="company-name">
        <?= $company[0]->name ?>
      </span>

      <img src="../../../public/assets/images/companies/<?= $company[0]->image ?? "company.png" ?>" alt="image" class="detail-img">

      <form action="../../../App/controllers/companies/upload.php?id=<?= $_GET["id"] ?>" method="post" enctype="multipart/form-data">
        <input type="file" name="cover_image">
        <button type="submit">
          Upload
        </button>
      </form>
    </div>
    <div class="wrap">
      <table>
        <tr>
          <td>
            EMAIL :
          </td>
          <td>
            <?= $company[0]->email ?>
          </td>
        </tr>
        <tr>
          <td>
            TYPE :
          </td>
          <td>
            <?= $company[0]->type ?>
          </td>
        </tr>
        <tr>
          <td>
            ADDRESS :
          </td>
          <td>
            <?= $company[0]->location ?>
          </td>
        </tr>
        <tr>
          <td>
            CONTACT :
          </td>
          <td>
            <ul>
              <li>
                <a href="#" class="contact">
                  <i class="ri-facebook-box-fill facebook"></i>
                </a>
              </li>
              <li>
                <a href="#" class="contact">
                  <i class="ri-instagram-line instagram"></i>
                </a>
              </li>
              <li>
                <a href="#" class="contact">
                  <i class="ri-twitter-line twitter"></i>
                </a>
              </li>
              <li>
                <a href="#" class="contact">
                  <i class="ri-whatsapp-line whatsapp"></i>
                </a>
              </li>
            </ul>
          </td>
        </tr>
      </table>
    </div>
  </div>
</section>

<?php include("../layouts/footer.php") ?>