<?php

class Management extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    // $this->load->model('TarifListrikModel', 'tl_model');
    $this->load->helper('debug');
    $this->checkSession('id', '/auth');
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

  private function layout($view, $data)
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