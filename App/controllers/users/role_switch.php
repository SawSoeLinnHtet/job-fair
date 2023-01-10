<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());
$id = $_GET["id"] ?? "undefined";
$role = $_GET["role"] ?? "undefined";

$table->roleChangeById($id, $role);

HTTP::redirect("/admin/users/index.php", "role_change_success=1");

