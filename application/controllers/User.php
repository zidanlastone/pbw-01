<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel', 'user_model');
  }
  private function checkSession($userdata, $target = '/')
  {
    if (!$this->session->userdata('id')) {
      redirect($target);
    }
    return $this->session->userdata($userdata);
  }

  private function checkNavbar()
  {
    $navbar = 'unauthenticated';
    if ($this->session->userdata('id')) {
      $navbar = 'authenticated';
    }
    return $this->load->view('layout/navbars/' . $navbar, [], true);
  }

  protected function layout($view, $data)
  {
    $data['view'] = $view;
    $data['navbar'] = $this->checkNavbar();
    $data['content'] = $this->load->view($view, $data, true);
    return $this->load->view('layout/clean', $data);
  }

  public function profile()
  {
    $userid = $this->checkSession('id');
    $data['item'] = $this->user_model->show(['id' => $userid])->row();
    $this->layout('user/profile', $data);
  }

  public function index()
  {
    redirect('user/profile');
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