<?php

class Category extends MY_AdminController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('CategoryModel', 'category_model');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->category_model->createObject();
    $payload->category = $post->category;
    $payload->type = $post->type;
    $payload->description = $post->description;
    return $payload;
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'category', 'label' => 'Category', 'rules' => 'required'],
      ['field' => 'type', 'label' => 'Category Type', 'rules' => 'required'],
      ['field' => 'description', 'label' => 'Content', 'rules' => 'required'],
    ];

    return array_merge($validation, $default);
  }

  public function index()
  {
    $data['list'] = $this->category_model->list();
    $this->layout('management/category/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $this->layout('management/category/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    // early validation
    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/category');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->category_model->save($payload);

    if (!$result) {
      redirect('management/category');
    }

    redirect('management/category');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->category_model->show(['id' => $id])->row();
    $this->layout('management/category/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    // early validation
    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/category');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->category_model->update($payload, ['id' => $id]);

    if (!$result) {
      redirect('management/category');
    }

    redirect('management/category');
  }

  public function delete($id)
  {
    $result = $this->category_model->delete(['id' => $id]);
    redirect('management/category');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->category_model->show(['id' => $id])->row();
    $this->layout('management/category/form', $data);
  }
}