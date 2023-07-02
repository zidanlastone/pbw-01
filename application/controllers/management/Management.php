<?php

class Management extends MY_DashController
{

  public function __construct()
  {
    parent::__construct();
    $this->checkSession('id', '/auth');
  }

  protected function layout($view, $data)
  {
    $data['view'] = $view;
    $data['navbar'] = $this->checkNavbar();
    $data['content'] = $this->load->view($view, $data, true);
    return $this->load->view('layout/management', $data);
  }

  public function index()
  {
    $this->layout('management/dashboard', []);
  }
}