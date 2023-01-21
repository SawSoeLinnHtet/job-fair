<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CompanyTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CompanyTable(new MYSQL());

  $id = $_GET["id"] ?? "undefined";
  $name = $_POST["name"] ?? "undefined";
  $name = $_POST["name"] ?? "undefined";
  $type = $_POST["type"] ?? "undefined";
  $email = $_POST["email"] ?? "undefined";
  $location = $_POST["location"] ?? "undefined";

  $company = $table->findById($id);

  if ($_FILES["cover_image"]['name'] === "") {
    $image = $company[0]->image;
  } else {
    $cover_name = $_FILES['cover_image']['name'];
    $cover_error = $_FILES['cover_image']['error'];
    $cover_tmp = $_FILES['cover_image']['tmp_name'];
    $cover_type = $_FILES['cover_image']['type'];

    if ($cover_error) {
      HTTP::redirect("/admin/companies/edit.php", "id=$id&&image_error=1");
    }

    if ($cover_type === "image/png" || $cover_type === "image/jpg" || $cover_type === "image/jpeg") {
      move_uploaded_file($cover_tmp, "../../../public/assets/images/companies/" . $cover_name);
      $image = $cover_name;
    } else {
      HTTP::redirect("/admin/companies/edit.php", "id=$id&&type_error=1");
    }
  }

  $data = [
    "id" => $_GET["id"] ?? "undefined",
    "name" => $_POST['name'] ?? "undefined",
    "type" => $_POST['type'] ?? "undefined",
    "email" => $_POST['email'] ?? "undefined",
    "location" => $_POST['location'] ?? "undefined",
    "image" => $image
  ];

  $table->edit($data);

  HTTP::redirect("/admin/companies/", "edit_success=1");