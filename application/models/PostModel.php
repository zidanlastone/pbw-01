<?php

class PostModel extends MY_Model {

  function __construct()
  {
    parent::__construct();
    $this->setTable('post');
  }

  public function listWithAuthor()
  {
    $this->db->join('user', 'user.id = post.author');
    $this->db->join('category', 'category.id = post.category');
    $this->db->select('post.*, user.name, category.category');
    return $this->db->get($this->table)->result();
  }
  
}