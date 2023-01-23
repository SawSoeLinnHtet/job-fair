<?php

namespace Helpers;
use Helpers\HTTP;

class Auth
{
  static function check(){ 
    session_start();
    if(isset($_SESSION["user"])){
      return $_SESSION["user"];
    }else{
      HTTP::redirect("/auth/login.php");
    }
  }
}