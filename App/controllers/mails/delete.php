<?php

include("../../../vendor/autoload.php");

use Models\Database\MailsTable;
use Models\Database\MYSQL;
use Helpers\HTTP;

$table = new MailsTable(new MYSQL());

$id = $_GET["id"] ?? "undefined";

$table->delete($id);

HTTP::redirect("/site/profile/message.php", "delete_success=1");
