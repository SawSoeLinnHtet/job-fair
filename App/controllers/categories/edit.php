<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CategoryTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());

  $id = $_GET["id"] ?? "undefined";
  $name = $_POST["name"] ?? "undefined";

  $category = $table->findById($id);

  if($_FILES['cover_image']['name'] == ""){
    $image = $category[0]->image;
  }else{
    $cover_name = $_FILES['cover_image']['name'];
    $cover_error = $_FILES['cover_image']['error'];
    $cover_tmp = $_FILES['cover_image']['tmp_name'];
    $cover_type = $_FILES['cover_image']['type'];

    if ($cover_error) {
      HTTP::redirect("/admin/categories/edit.php", "id=$id&&image_error=1");
    }

    if ($cover_type === "image/png" || $cover_type === "image/jpg" || $cover_type === "image/jpeg") {
      move_uploaded_file($cover_tmp, "../../../public/assets/images/categories/" . $cover_name);
      $image = $cover_name;
    }else{
      HTTP::redirect("/admin/categories/edit.php", "id=$id&&type_error=1");
    }
  }

  $table->edit($id, $name,$image);

  HTTP::redirect("/admin/categories/", "edit_success=1");