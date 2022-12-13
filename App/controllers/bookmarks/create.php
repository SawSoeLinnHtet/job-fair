<?php

  include("../../../vendor/autoload.php");

  use Models\Database\BookmarkTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new BookmarkTable(new MYSQL());

  $user_id = $_GET["user_id"] ?? "undefined";
  $job_id = $_GET["job_id"] ?? "undefined";

  $table->insert($user_id, $job_id);

  HTTP::redirect("/site/jobs/","add_bookmark=1");