<?php 

  include("../../../vendor/autoload.php");

  use Models\Database\ApplyListsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new ApplyListsTable(new MYSQL());
  $id = $_GET["id"] ?? "undefined";

  $table->denied($id);

  HTTP::redirect("/admin/appliciants/","denined=1");