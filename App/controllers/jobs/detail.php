<?php

include("../../../vendor/autoload.php");

use Models\Database\JobsTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new JobsTable(new MYSQL());

$id = $_GET["job_id"] ?? "undefined";

if ($table) {
  $data = $table->findById($id);
  
  // echo json_encode($data);
  echo json_encode(["status" => 1, "data" => $data]);
} else {
  echo json_encode(["status" => 0, "data" => []]);
}
