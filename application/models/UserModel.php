<?php

class UserObject
{
  public $name;
  public $username;
  public $email;
  public $password;
  public $hak_akses = 0;
}

class UserModel extends MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->setTable('tb_user');
  }

  public function checkPassword($password, $emailOrUsername)
  {

    $this->db->where('email', $emailOrUsername)->or_where('username', $emailOrUsername);
    $user = $this->db->get($this->table)->row();

    if (!password_verify($password, $user->password)) {
      return false;
    }

    return $user;
  }

  public function createObject()
  {
    return new UserObject();
  }
}