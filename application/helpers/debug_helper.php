<?php

if(!function_exists('dprint')){
  function dprint($var){
    echo '<pre>';
    print_r($var);
    echo '</pre>';
    die();
  }
}
