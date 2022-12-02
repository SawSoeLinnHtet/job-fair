<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CompanyTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CompanyTable(new MYSQL());

  $id = $_GET["id"] ?? "undefined";
  $name = $_POST["name"] ?? "undefined";
  $type = $_POST["type"] ?? "undefined";
  $email = $_POST["email"] ?? "undefined";
  $location = $_POST["location"] ?? "undefined";

  $table->edit($id, $name, $type, $email, $location);

  HTTP::redirect("/admin/companies/", "edit_success=1");