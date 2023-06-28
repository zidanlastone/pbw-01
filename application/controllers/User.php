<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel', 'user_model');
  }

  protected function layout($view, $data)
  {
    $data['view'] = $view;
    $data['navbar'] = $this->load->view('layout/navbars/authenticated', [], true);
    // $data['categories'] = $this->category_model->list();
    // $data['content'] = $this->load->view($view, $data, true);
    return $this->load->view('layout/clean', $data);
  }

  public function profile()
  {
    $this->layout('user', []);
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