<?php

  include("../../../vendor/autoload.php");

  use Models\Database\CompanyTable;
  use Models\Database\JobsTable;
  use Models\Database\MYSQL;
  use Helpers\HTTP;

  $table = new CompanyTable(new MYSQL());
  $jobTable = new JobsTable(new MYSQL());

  $id = $_GET['id'] ?? "undefined";

  $table->delete($id);
  $jobTable->deleteJobsByCompanyId($id);

  HTTP::redirect("/admin/companies/", "delete_success=1");