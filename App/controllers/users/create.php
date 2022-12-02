<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());

$data = [
  "name" => $_POST["name"] ?? "undefined",
  "email" => $_POST["email"] ?? "undefined",
  "password" => md5($_POST["password"]) ?? "undefined",
  "phone_number" => $_POST["phone"] ?? "undefined",
  "address" => $_POST["address"] ?? "undefined",
  "city" => $_POST["city"] ?? "undefined",
  "postal_code" => $_POST["postal_code"] ?? "undefined"
];

if($table){
  $table->insert($data);

  HTTP::redirect("/admin/users/", "Success=1");
}else{
  HTTP::redirect("/admin/users/created.php", "Failed=1");
}