<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CompanyTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CompanyTable(new MYSQL());

  $id = $_GET["id"];
  $cover_name = $_FILES['cover_image']['name'];
  $cover_error = $_FILES['cover_image']['error'];
  $cover_tmp = $_FILES['cover_image']['tmp_name'];
  $cover_type = $_FILES['cover_image']['type'];

  if ($cover_error) {
    HTTP::redirect("/admin/companies/view_detail.php", "id=$id,image_error=1");
  }

  if ($cover_type === "image/png" || $cover_type === "image/jpg" || $cover_type === "image/jpeg") {
    move_uploaded_file($cover_tmp, "../../../public/assets/images/companies/" . $cover_name);

    $table->upload($id, $cover_name);

    HTTP::redirect("/admin/companies/view_detail.php", "id=$id,upload_success=1");
  } else {
    HTTP::redirect("/admin/comapnies/view_detail.php", "id=$id,upload_fail=1");
  }