<?php

namespace Helpers;
use Helpers\HTTP;

class Auth
{
  static function check(){
    session_start();
    
    if($_SESSION["user"]){
      return $_SESSION["user"][0];
    }else{
      HTTP::redirect("/auth/login.php");
    }
  }
}