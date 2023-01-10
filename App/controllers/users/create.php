<?php

  include("../../../vendor/autoload.php");

  use Models\Database\UsersTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new UsersTable(new MYSQL());

  if($_FILES['cover_image']['name'] == ""){
    $image = null;
  }else{
    $cover_name = $_FILES['cover_image']['name'];
    $cover_error = $_FILES['cover_image']['error'];
    $cover_tmp = $_FILES['cover_image']['tmp_name'];
    $cover_type = $_FILES['cover_image']['type'];

    if ($cover_error) {
      HTTP::redirect("/admin/users/create.php", "image_error=1");
    }
    if ($cover_type === "image/png" || $cover_type === "image/jpg" || $cover_type === "image/jpeg" || $cover_type === "image/webp") {
      move_uploaded_file($cover_tmp, "../../../public/assets/images/users/" . $cover_name);
      $amge = $cover_name;
    } else {
      HTTP::redirect("/admin/users/create.php", "type_error=1");
    }
  }

  $data = [
    "name" => $_POST["name"] ?? "undefined",
    "email" => $_POST["email"] ?? "undefined",
    "password" => md5($_POST["password"]) ?? "undefined",
    "phone_number" => $_POST["phone"] ?? "undefined",
    "address" => $_POST["address"] ?? "undefined",
    "city" => $_POST["city"] ?? "undefined",
    "image" => $image,
    "postal_code" => $_POST["postal_code"] ?? "undefined",
  ];

  if ($table) {
    $table->insert($data);

    HTTP::redirect("/admin/users/", "create_success=1");
  } else {
    HTTP::redirect("/admin/users/create.php", "create_fail=1");
  }

    