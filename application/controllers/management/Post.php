<?php

class Post extends MY_AdminController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PostModel', 'post_model');
    $this->load->model('CategoryModel', 'category_model');
    $this->checkSession('id', '/auth');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object

    $payload = $this->post_model->createObject();
    $payload->author = $this->checkSession('id');
    $payload->category = $post->category;
    $payload->title = $post->title;
    $payload->content = $post->content;
    $payload->publication_date = $post->publication_date;
    $payload->tags = $post->tags;
    return $payload;
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'category', 'label' => 'Category', 'rules' => 'required'],
      ['field' => 'title', 'label' => 'Title', 'rules' => 'required'],
      ['field' => 'content', 'label' => 'Content', 'rules' => 'required'],
      ['field' => 'publication_date', 'label' => 'Publication Date', 'rules' => 'required'],
      ['field' => 'tags', 'label' => 'tags', 'rules' => 'required'],
    ];
    return array_merge($validation, $default);
  }

  public function index()
  {
    $this->load->library('markdown');
    $data['list'] = $this->post_model->listWithAuthor();
    $this->layout('management/post/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $data['list_category'] = $this->category_model->list();
    $this->layout('management/post/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());
    // early validation
    if ($this->form_validation->run() == FALSE) {
      redirect('management/post');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->post_model->save($payload);

    if (!$result) {
      redirect('management/post');
    }

    redirect('management/post');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->post_model->show(['id' => $id])->row();
    $data['list_category'] = $this->category_model->list();
    $this->layout('management/post/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    // early validation
    if ($this->form_validation->run() == FALSE) {
      redirect('management/post');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->post_model->update($payload, ['id' => $id]);

    if (!$result) {
      redirect('management/post');
    }

    redirect('management/post');
  }

  public function delete($id)
  {
    $result = $this->post_model->delete(['id' => $id]);
    redirect('management/post');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->post_model->show(['id' => $id])->row();
    $data['list_category'] = $this->category_model->list();
    $this->layout('management/post/form', $data);
  }
}