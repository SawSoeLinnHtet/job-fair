<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());

$id = $_GET["id"] ?? "undefined";
$name = $_POST["name"] ??"undefined";
$email = $_POST["email"] ?? "undefined";
$phone_number = $_POST["phone"] ?? "undefined";
$address = $_POST["address"] ?? "undefined";
$city = $_POST["city"] ?? "undefined";
$postal_code = $_POST["postal_code"] ?? "undefined";

$table->edit($id, $name, $email, $phone_number, $address, $city, $postal_code);

HTTP::redirect("/admin/users/", "success=1");