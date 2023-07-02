<?php

class CategoryObject
{
  public $category;
  public $type;
  public $description;
}
class CategoryModel extends MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->setTable('category');
  }

  public function createObject()
  {
    return new CategoryObject();
  }
}