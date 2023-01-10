<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CategoryTable;
  use Models\Database\JobsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());
  $jobTable = new JobsTable(new MYSQL());

  $id = $_GET["id"] ?? "undefined";

  $table->delete($id);
  $jobTable->deleteJobsByCategoryId($id);

  HTTP::redirect("/admin/categories/", "delete_success=1");
