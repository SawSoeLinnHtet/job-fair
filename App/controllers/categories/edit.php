<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CategoryTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());

  $id = $_GET["id"] ?? "undefined";
  $name = $_POST["name"] ?? "undefined";

  $table->edit($id, $name);

  HTTP::redirect("/admin/categories/", "edit_success");