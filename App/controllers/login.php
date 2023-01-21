<?php

include("../../vendor/autoload.php");

var_dump("hello");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

// header("location: ../_classes/Models/Database/MYSQL.php");

$table = new UsersTable(new MYSQL());
$email = $_POST["email"] ?? "undefined";
$password = md5($_POST["password"]) ?? "undefined";

$user = $table->findByEmailAndPassword($email, $password);
if($user){
  session_start();
  $_SESSION["user"] = $user;

  $_SESSION["start"] = time();
  $_SESSION["expire"] = $_SESSION["start"] + (10 * 60);

  if($user[0]->role_id == 1){
    HTTP::redirect("/auth/option.php");
  }else{
    HTTP::redirect("/site/home/");
  }
}else{
  HTTP::redirect("/auth/login.php","Login_Failed=1");
}