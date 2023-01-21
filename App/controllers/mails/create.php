<?php

  include("../../../vendor/autoload.php");

  use Models\Database\MailsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new MailsTable(new MYSQL());

  $user_id = $_GET["user_id"] ?? "undefined";
  $job_id = $_GET["job_id"] ?? "undefined";

  $data = [
    "recipient"=> $_POST["to"] ?? "undefined",
    "title"=> $_POST["title"] ?? "undefined",
    "message"=>  $_POST["message"] ?? "undefined",
    "sender"=>  $_POST["from"] ?? "undefined",
    "user_id" => $user_id,
    "job_id"=> $job_id
  ];

  if($table){
    $table->insert($data);

    HTTP::redirect("/admin/applicatiants/message.php", "job_id=$job_id&&user_id=$user_id&&mail_success=1");
  }else{
    HTTP::redirect("/admin/applicatiants/message.php", "job_id=$job_id&&user_id=$user_id&&mail_fail=1");
  }