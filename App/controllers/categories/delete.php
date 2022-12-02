<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CategoryTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());
  $id = $_GET["id"] ?? "undefined";

  $table->delete($id);

  HTTP::redirect("/admin/categories/", "delete_success=1");
