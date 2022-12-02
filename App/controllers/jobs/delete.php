<?php

  include("../../../vendor/autoload.php");

  use Models\Database\JobsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new JobsTable(new MYSQL());

  $id = $_GET["id"] ?? "undefined";

  $table->delete($id);

  HTTP::redirect("/admin/jobs/", "Delete_success=1"); 
