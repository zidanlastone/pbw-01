<?php


class Auth extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('UserModel', 'user_model');
    $this->load->library('form_validation');
    if($this->session->userdata('email')){
      redirect('/');
    }
  }

  public function index(){
    $this->load->view('auth/login.php');
  }

  public function login()
  {
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    
    $username = $this->input->post('username');
    $password = $this->input->post('password');

    $user = $this->user_model->checkPassword($password, $username);

    if(!$user){
      redirect('auth');
    }

    $payload = [
      'email'    => $user->email,
      'name'     => $user->name,
      'username' => $user->username
    ];

    $this->session->set_userdata($payload);
    redirect('/');
  }

  public function register()
  {
    // set validation rules
    $this->form_validation->set_rules('name', 'Name', 'required');
    $this->form_validation->set_rules('username', 'username', 'required');
    $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
    $this->form_validation->set_rules('password', 'Password', 'trim|required|min_length[8]');
    $this->form_validation->set_rules('password_confirmation', 'Password Confirmation', 'trim|required|matches[password]');

    // early validation
    if ($this->form_validation->run() == FALSE){
      redirect('auth');
    }

    // continue the process
    $password = $this->input->post('password');

    $payload = [
      'email'    => $this->input->post('email'),
      'name'     => $this->input->post('name'),
      'username' => $this->input->post('username'),
      'password' => password_hash($password, PASSWORD_BCRYPT)
    ];

    $result = $this->user_model->save($payload);

    // early check
    if(!$result){
      redirect('auth');
    }

    unset($payload['password']); // unset password from session

    $this->session->set_userdata($payload);

    redirect('user/profile');
  }

}