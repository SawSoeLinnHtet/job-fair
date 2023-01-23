<?php

  include("../../../vendor/autoload.php");

  use Models\Database\JobsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new JobsTable(new MYSQL());

  $data = [
    "id" => $_GET["id"] ?? "undefined",
    "name" => $_POST["name"] ?? "undefined",
    "company_id" => $_POST["company_id"] ?? "undefined",
    "category_id" => $_POST["category_id"] ?? "undefined",
    "gender" => $_POST["gender"] ?? "undefined",
    "salary" => $_POST["salary"] ?? "undefined",
    "job_type_id" => $_POST["job_type_id"] ?? "undefined",
    "address" => $_POST["address"] ?? "undefined",
    "description" => $_POST["description"] ?? "undefined",
    "requirements" => $_POST["requirements"] ?? "undefined",
    "close_date" => $_POST["close_date"] ?? "undefined",
    "responsibility" => $_POST["responsibility"] ?? "undefined"
  ];

  if($table){
    $table->edit($data);
    
    HTTP::redirect("/admin/jobs/", "edit_success=1");
  }else{
    HTTP::redirect("/admin/jobs/edit.php", "edit_fail=1");
  }