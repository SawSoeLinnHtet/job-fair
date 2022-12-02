<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());

$id = $_GET["id"] ?? "undefined";

$table->deleteById($id);

HTTP::redirect("/admin/users/", "Deleted=1");