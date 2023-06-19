<?php

class UserModel extends MY_Model {

  function __construct()
  {
    parent::__construct();
    $this->setTable('user');
  }

  public function checkPassword($password, $emailOrUsername)
  {

    $this->db->where('email', $emailOrUsername)->or_where('username', $emailOrUsername);
    $user = $this->db->get($this->table)->row();

    if(!password_verify($password, $user->password))
    {
      return false;
    }

    return $user;
  }
}