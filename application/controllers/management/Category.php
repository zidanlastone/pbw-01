<?php

class Category extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('CategoryModel', 'category_model');
  }

  public function index()
  {
    $data['list'] = $this->category_model->list();
    $this->load->view('management/category/index.php', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $this->load->view('management/category/form.php', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('category', 'Category Name', 'required');
    $this->form_validation->set_rules('type', 'Category type', 'required');
    $this->form_validation->set_rules('description', 'Category description', 'required');

    // early validation
    if ($this->form_validation->run() == FALSE)
    {
      redirect('management/category');
    }

    $payload = [
      'type'        => $this->input->post('type'),
      'category'    => $this->input->post('category'),
      'description' => $this->input->post('description')
    ];

    $result = $this->category_model->save($payload);

    if(!$result)
    {
      redirect('management/category');
    }

    redirect('management/category');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->category_model->show(['id' => $id])->row();
    $this->load->view('management/category/form.php', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules('category', 'Category Name', 'required');
    $this->form_validation->set_rules('type', 'Category type', 'required');
    $this->form_validation->set_rules('descriiption', 'Category description', 'required');

    // early validation
    if ($this->form_validation->run() == FALSE)
    {
      redirect('management/category');
    }

    $payload = [
      'type'        => $this->input->post('type'),
      'category'    => $this->input->post('category'),
      'description' => $this->input->post('description'),
      'updated_at'  => date()
    ];

    $result = $this->category_model->update($payload, ['id' => $id]);

    if(!$result)
    {
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
    $this->load->view('management/category/form.php', $data);
  }
}