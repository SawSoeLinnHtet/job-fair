<?php

include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new CompanyTable(new MYSQL());

if($_FILES['cover_image']['name'] == ""){
  $image = null;
}else{
  $cover_name = $_FILES['cover_image']['name'];
  $cover_error = $_FILES['cover_image']['error'];
  $cover_tmp = $_FILES['cover_image']['tmp_name'];
  $cover_type = $_FILES['cover_image']['type'];

  if ($cover_error) {
    HTTP::redirect("/admin/companies/create.php", "image_error=1");
  }

  if ($cover_type === "image/png" || $cover_type === "image/jpg" || $cover_type === "image/jpeg") {
    move_uploaded_file($cover_tmp, "../../../public/assets/images/companies/" . $cover_name);

    $image = $cover_name;
  }else{
    HTTP::redirect("/admin/companies/create.php", "type_error=1");
  }
}

  $data = [
    "name" => $_POST['name'] ?? "undefined",
    "type" => $_POST['type'] ?? "undefined",
    "email" => $_POST['email'] ?? "undefined",
    "location" => $_POST['location'] ?? "undefined",
    "image" => $image ?? null,
  ];

  if ($table) {
    $table->insert($data);

    HTTP::redirect("/admin/companies/", "create_success=1");
  } else {
    HTTP::redirect("/admin/companies/create.php", "create_fail=1");
  }