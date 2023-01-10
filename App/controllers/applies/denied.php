<?php 

  include("../../../vendor/autoload.php");

  use Models\Database\ApplyListsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new ApplyListsTable(new MYSQL());
  $id = $_GET["apply_id"] ?? "undefined";
  $job_id = $_GET["job_id"] ?? "undefined";

  $table->denied($id);

  HTTP::redirect("/admin/applicatiants/index.php","job_id=$job_id&&denied=1");