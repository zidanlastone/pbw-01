<?php

class User extends CI_Controller 
{
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel', 'user_model');
  }

  public function profile()
  {
    
  }

  public function index()
  {
    $data['list'] = $this->user_model->list();
    $this->load->view('management/user/index.php', $data);
  }

  public function create()
  {
        
  }

  public function store()
  {

  }

  public function edit()
  {

  }

  public function update()
  {

  }

  public function delete()
  {

  }

  public function show()
  {

  }
}

