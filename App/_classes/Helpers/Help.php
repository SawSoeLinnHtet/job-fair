<?php

namespace Helpers;

class Help
{
  static function paraToList($text){

    $isFirstIteration = true;
    $list_items1 = explode("/", $text);
    echo '<ul>';
    foreach ($list_items1 as $list_item)
      if (!$isFirstIteration) {
        echo '<li>' . $list_item . '</li>';
      } else {
        $isFirstIteration = false;
        continue;
      }

    echo '</ul>';
  }
}