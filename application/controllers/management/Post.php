<?php

class Post extends CI_Controller
{
  public function __construct(){
    parent::__construct();
    $this->load->model('PostModel', 'post_model');
  }

  public function index()
  {
    $data['list'] = $this->post_model->list();
    $this->load->view('management/post/index.php', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $this->load->view('management/post/form.php', $data);
  }

  public function store()
  {
		$this->load->library('form_validation');
    $this->form_validation->set_rules('category', 'Category', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('content', 'Content', 'required');
    $this->form_validation->set_rules('publication_date', 'Publication Date', 'required');
    $this->form_validation->set_rules('tags', 'tags', 'required');

    // early validation
    if ($this->form_validation->run() == FALSE)
    {
      redirect('management/post');
    }

    $payload = [
			'author'           => $this->session->userdata('id'),
      'category'         => $this->input->post('category'),
      'title'    				 => $this->input->post('title'),
      'content' 				 => $this->input->post('content'),
      'publication_date' => $this->input->post('publication_date'),
      'tags' 						 => $this->input->post('tags')
    ];

    $result = $this->post_model->save($payload);

    if(!$result)
    {
      redirect('management/post');
    }

    redirect('management/post');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->post_model->show(['id' => $id])->row();
    $this->load->view('management/post/form.php', $data);
  }

  public function update($id)
  {
		$this->load->library('form_validation');
    $this->form_validation->set_rules('category', 'Category', 'required');
    $this->form_validation->set_rules('title', 'Title', 'required');
    $this->form_validation->set_rules('content', 'Content', 'required');
    $this->form_validation->set_rules('publication_date', 'Publication Date', 'required');
    $this->form_validation->set_rules('tags', 'tags', 'required');

    // early validation
    if ($this->form_validation->run() == FALSE)
    {
      redirect('management/post');
    }

    $payload = [
			'author'           => $this->session->userdata('id'),
      'category'         => $this->input->post('category'),
      'title'    				 => $this->input->post('title'),
      'content' 				 => $this->input->post('content'),
      'publication_date' => $this->input->post('publication_date'),
      'tags' 						 => $this->input->post('tags')
    ];

    $result = $this->post_model->update($payload, ['id' => $id]);

    if(!$result)
    {
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
    $this->load->view('management/post/form.php', $data);
  }
}