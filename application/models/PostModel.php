<?php

class PostModel extends MY_Model
{

  function __construct()
  {
    parent::__construct();
    $this->setTable('post');
  }

  public function listWithAuthor()
  {
    $this->db->join('tb_user', 'tb_user.id = post.author');
    $this->db->join('category', 'category.id = post.category');
    $this->db->select('post.*, tb_user.name, category.category');
    return $this->db->get($this->table)->result();
  }

}