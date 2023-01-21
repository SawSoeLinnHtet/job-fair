<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());

$id = $_GET["id"] ?? "undefined";
$user = $table->findById($id);

if ($_FILES["cover_image"]['name'] === "") {
  $image = $user[0]->image;
} else {
  $cover_name = $_FILES['cover_image']['name'];
  $cover_error = $_FILES['cover_image']['error'];
  $cover_tmp = $_FILES['cover_image']['tmp_name'];
  $cover_type = $_FILES['cover_image']['type'];

  if ($cover_error) {
    HTTP::redirect("/site/profile/edit.php", "id=$id&&image_error=1");
  }

  if ($cover_type === "image/png" || $cover_type === "image/jpg" || $cover_type === "image/jpeg" || $cover_type === "image/webp") {
    move_uploaded_file($cover_tmp, "../../../public/assets/images/users/" . $cover_name);
    $image = $cover_name;
  } else {
    HTTP::redirect("/site/profile/edit.php", "id=$id&&type_error=1");
  }
}

$data = [
  "id" => $_GET["id"] ?? "undefined",
  "name" => $_POST["name"] ?? "undefined",
  "email" => $_POST["email"] ?? "undefined",
  "phone_number" => $_POST["phone"] ?? "undefined",
  "address" => $_POST["address"] ?? "undefined",
  "city" => $_POST["city"] ?? "undefined",
  "image" => $image ?? null,
  "postal_code" => $_POST["postal_code"] ?? "undefined",
];

var_dump($data);



if($table){
  $table->edit($data);
  HTTP::redirect("/site/profile/", "edit_success=1");
}else{
  HTTP::redirect("/site/profile/edit.php", "id=$id&&edit_fail=1");
}

