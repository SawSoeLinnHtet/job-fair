<?php 

  include("../../../vendor/autoload.php");

  use Models\Database\CategoryTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CategoryTable(new MYSQL());
  $name = $_POST["name"] ?? "undefined";

  if($table){
    $table->insert($name);

    HTTP::redirect("/admin/categories/", "success=1");
  }else{
    HTTP::redirect("/admin/categories/", "fail=1");
  }