<?php

class User extends MY_AdminController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('UserModel', 'user_model');
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'name', 'label' => 'Name', 'rules' => 'required'],
      ['field' => 'username', 'label' => 'Username', 'rules' => 'required'],
      ['field' => 'email', 'label' => 'Email', 'rules' => 'required'],
      ['field' => 'password', 'label' => 'Password', 'rules' => 'trim|required|min_length[8]'],
      ['field' => 'password_confirmation', 'label' => 'Password Confirmation', 'rules' => 'trim|required|matches[password]'],
    ];
    return array_merge($validation, $default);
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->user_model->createObject();
    $payload->name = $post->name;
    $payload->username = $post->username;
    $payload->email = $post->email;
    $payload->password = password_hash($post->password, PASSWORD_BCRYPT);
    return $payload;
  }

  public function index()
  {
    $data['list'] = $this->user_model->list();
    $this->layout('management/user/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $this->layout('management/user/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/user');
    }

    $payload = $this->createPayload($this->input->post());

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
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/user');
    }

    // continue the process
    $email = $this->input->post('email');
    $payload = $this->createPayload($this->input->post());

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
    redirect('management/user');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->user_model->show(['id' => $id])->row();
    $this->load->view('management/user/form', $data);
  }
}