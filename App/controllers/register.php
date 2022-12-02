<?php 

  include("../../vendor/autoload.php");

  use Models\Database\UsersTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new UsersTable(new MYSQL());

  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];

  if($password !== $confirm_password){
    HTTP::redirect("/auth/register.php", "MatchPassword=1");
  }

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

    HTTP::redirect("/auth/register.php", "Registered=1");
  }