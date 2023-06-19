<?php

class PostModel extends MY_Model {

  function __construct()
  {
    parent::__construct();
    $this->setTable('post');
  }
  
}