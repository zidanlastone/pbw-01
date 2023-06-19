<?php

class CategoryModel extends MY_Model {

  function __construct()
  {
    parent::__construct();
    $this->setTable('category');
  }
  
}