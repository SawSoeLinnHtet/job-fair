<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\ApplyListsTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());
$applyTable = new ApplyListsTable(new MYSQL());

$id = $_GET["id"] ?? "undefined";

$table->deleteById($id);
$applyTable->deleteByUserId($id);

HTTP::redirect("/admin/users/", "delete_success=1");