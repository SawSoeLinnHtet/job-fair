<?php

include("../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());

$email = $_POST["email"] ?? "undefined";
$password = md5($_POST["password"]) ?? "undefined";

$user = $table->findByEmailAndPassword($email, $password);
if($user){
  session_start();
  $_SESSION["user"] = $user;

  if($user[0]->role_id == 1){
    HTTP::redirect("/auth/option.php");
  }else{
    HTTP::redirect("/site/home/");
  }
}else{
  HTTP::redirect("/auth/login.php","Login_Failed=1");
}