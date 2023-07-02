<?php


abstract class MY_AdminController extends CI_Controller
{

  public function __construct()
  {
    parent::__construct();
    $this->load->helper('debug');
  }

  protected function checkNavbar($navbar = 'authenticated')
  {
    if (!$this->session->userdata('id')) {
      $navbar = 'unauthenticated';
    }
    return $this->load->view('layout/navbars/' . $navbar, [], true);
  }

  protected function checkSession($userdata = 'id', $target = '/auth')
  {
    if (!$this->session->userdata($userdata)) {
      redirect($target);
    }
    return $this->session->userdata($userdata);
  }

  protected function layout($view, $data)
  {
    $data['view'] = $view;
    $data['navbar'] = $this->checkNavbar();
    $data['content'] = $this->load->view($view, $data, true);
    return $this->load->view('layout/management', $data);
  }

  /**
   * this function should return an validation array 
   * that could be merged with defined validation inside the function
   */
  abstract protected function validationRules($validation = []);

  /**
   * this function should return object created from post data
   * with shape defined in every model
   */
  abstract protected function createPayload($post);
}


abstract class MY_DashController extends CI_Controller
{
  protected function checkNavbar($navbar = 'authenticated')
  {
    if (!$this->session->userdata('id')) {
      $navbar = 'unauthenticated';
    }
    return $this->load->view('layout/navbars/' . $navbar, [], true);
  }

  protected function checkSession($userdata = 'id', $target = '/auth')
  {
    if (!$this->session->userdata($userdata)) {
      redirect($target);
    }
    return $this->session->userdata($userdata);
  }

  abstract protected function layout($view, $data);
}