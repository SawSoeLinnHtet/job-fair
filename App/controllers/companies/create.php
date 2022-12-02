<?php

include("../../../vendor/autoload.php");

use Models\Database\CompanyTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new CompanyTable(new MYSQL());

$data = [
  "name" => $_POST['name'] ?? "undefined",
  "type" => $_POST['type'] ?? "undefined",
  "email" => $_POST['email'] ?? "undefined",
  "location" => $_POST['location'] ?? "undefined"
];

if($table){
  $table->insert($data);

  HTTP::redirect("/admin/companies/", "Success=1");
}else{
  HTTP::redirect("/admin/companies/create.php", "Failed=1");
}