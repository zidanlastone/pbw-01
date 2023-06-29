<?php

class User extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel', 'user_model');
    $this->load->helper('debug');
  }

  private function checkSession($target = '/')
  {
    if (!$this->session->userdata('id')) {
      redirect($target);
    }
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

  public function index()
  {
    $data['list'] = $this->user_model->list();
    $this->load->view('management/user/index.php', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $this->layout('management/user/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');

    // continue the process
    $password = $this->input->post('password');

    $payload = [
      'email' => $this->input->post('email'),
      'name' => $this->input->post('name'),
      'username' => $this->input->post('username'),
      'password' => password_hash($password, PASSWORD_BCRYPT)
    ];

    $result = $this->user_model->save($payload);
    // early check
    if (!$result) {
      redirect('management/user');
    }

    redirect('management/user');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->user_model->show(['id' => $id])->row();
    $this->layout('management/user/form', $data);
  }

  public function update()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');

    // continue the process
    $password = $this->input->post('password');
    $email = $this->input->post('email');

    $payload = [
      'email' => $this->input->post('email'),
      'name' => $this->input->post('name'),
      'username' => $this->input->post('username'),
      'password' => password_hash($password, PASSWORD_BCRYPT)
    ];

    $result = $this->user_model->update($payload, ['email' => $email]);
    // early check
    if (!$result) {
      redirect('management/user');
    }

    redirect('management/user');
  }

  public function delete($id)
  {
    $result = $this->user_model->delete(['id' => $id]);
    redirect('management/post');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->user_model->show(['id' => $id])->row();
    $this->load->view('management/user/form', $data);
  }
}