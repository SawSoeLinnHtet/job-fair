<?php 

  include("../../../vendor/autoload.php");

  use Models\Database\CategoryTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());

  if($_FILES['cover_image']['name'] == ""){
    $image = null;
  }else{
    $cover_name = $_FILES['cover_image']['name'];
    $cover_error = $_FILES['cover_image']['error'];
    $cover_tmp = $_FILES['cover_image']['tmp_name'];
    $cover_type = $_FILES['cover_image']['type'];

    if ($cover_error) {
      HTTP::redirect("/admin/categories/create.php", "image_error=1");
    }

    if ($cover_type === "image/png" || $cover_type === "image/jpg" || $cover_type === "image/jpeg") {
      move_uploaded_file($cover_tmp, "../../../public/assets/images/categories/" . $cover_name);
    } else {
      HTTP::redirect("/admin/companies/create.php", "type_error=1");
    }
  }

  $name = $_POST["name"] ?? "undefined";
  $pf_image = $image;

  if ($table) {
    $table->insert($name, $pf_image);

    HTTP::redirect("/admin/categories/", "create_success=1");
  } else {
    HTTP::redirect("/admin/categories/create.php", "create_fail=1");
  }
