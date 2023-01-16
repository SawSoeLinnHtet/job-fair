<?php

  include("../../../vendor/autoload.php");

  use Models\Database\ApplyListsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new ApplyListsTable(new MYSQL());
  $job_id = $_GET["job_id"];

  $cv_name = $_FILES['cv_form']['name'];
  $cv_error = $_FILES['cv_form']['error'];
  $cv_tmp = $_FILES['cv_form']['tmp_name'];
  $cv_type = $_FILES['cv_form']['type'];

  if ($cv_error) {
    HTTP::redirect("/site/apply/form.php", "image_error=1");
  }

  if ($cv_type === "application/pdf" || $cv_type === "application/msword") {
    move_uploaded_file($cv_tmp, "../../../public/assets/cv_form/" . $cv_name);
  } else {
    HTTP::redirect("/site/apply/form.php", "upload_fail=1");
  }

  $data = [
    "name" => $_POST["name"] ?? "undefined",
    "email" => $_POST["email"] ?? "undefined",
    "phone_number" => $_POST["phonenumber"] ?? "undefined",
    "job_id" => $_GET["job_id"] ?? "undefined",
    "user_id" => $_GET["user_id"] ?? "undefined",
    "cv_name" => $cv_name ?? "undefined"
  ];
  if($table){
    $table->insert($data);

    HTTP::redirect("/site/apply/form.php", "job_id=$job_id&&Success=1");
  }else{
    HTTP::redirect("/site/apply/form.php", "job_id=$job_id&&Fail=1");
  }