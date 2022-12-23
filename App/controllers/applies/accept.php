<?php

  include("../../../vendor/autoload.php");

  use Models\Database\ApplyListsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new ApplyListsTable(new MYSQL());


  $job_id = $_GET["job_id"] ?? "undefined";
  $apply_id = $_GET["apply_id"] ?? "undefined";

  if($table){
    $table->updateAccept($apply_id);

    HTTP::redirect("/admin/applicatiants/", "job_id=$job_id&&accept=1");
  }else{
    HTTP::redirect("/admin/applicatiants/", "job_id=$job_id&&unaccept=0");
  }

?>