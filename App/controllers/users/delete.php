<?php

include("../../../vendor/autoload.php");

use Models\Database\UsersTable;
use Models\Database\MailTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new UsersTable(new MYSQL());
$mailTable = new MailTable(new MYSQL());

$id = $_GET["id"] ?? "undefined";

$table->deleteById($id);
$mailTable->deleteByUser($id);

HTTP::redirect("/admin/users/", "delete_success=1");