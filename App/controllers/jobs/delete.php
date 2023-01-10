<?php

  include("../../../vendor/autoload.php");

  use Models\Database\JobsTable;
  use Models\Database\ApplyListsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new JobsTable(new MYSQL());
  $applyTable = new ApplyListsTable(new MYSQL());

  $id = $_GET["id"] ?? "undefined";

  $table->delete($id);
  $applyTable->deleteByJobId($id);
  
  HTTP::redirect("/admin/jobs/", "delete_success=1"); 
