<?php

  include("../../../vendor/autoload.php");

  use Models\Database\MailTable;
  use Models\Database\JobsTable;
  use Models\Database\UsersTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new MailTable(new MYSQL());
  $job_table = new JobsTable(new MYSQL());
  $user_table = new UsersTable(new MYSQL());

  $job_id = $_GET["job_id"] ?? "undefined";
  $user_id = $_GET["user_id"] ?? "undefined";
  $user_name = $user_table->findById($user_id)[0]->name;
  $job = $job_table->findById($job_id);

  $data = [
    "user_id" => $_GET["user_id"] ?? "undefined",
    "message" => "Dear Mr./Ms. " .$user_name.  ", I am pleased to extend the following offer of employment to you on behalf of ".$job[0]->company_name." . You have been selected as the best candidate for the " .$job[0]->category_name. " position. Congratulations!" 
  ];
  if($table){
    $table->insert($data);

    HTTP::redirect("/admin/applicatiants/acceptedLists.php", "job_id=$job_id&&mail_success=1");
  }else{
    HTTP::redirect("/admin/applicatiants/acceptedLists.php", "job_id=$job_id&&mail_fail=1");
  }