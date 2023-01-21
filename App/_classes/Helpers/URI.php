<?php

  namespace Helpers;

  class URI
  {
    static function check($path)
    {
      if (strstr($_SERVER["REQUEST_URI"], $path)) {
        echo 'active-link';
      }else{
        echo '';
      }
    }
  }
