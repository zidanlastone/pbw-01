<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Post extends CI_Controller {

	public function __construct(){
    parent::__construct();
    $this->load->model('PostModel', 'post_model');
    $this->load->model('CategoryModel', 'category_model');
		$this->load->model('UserModel', 'user_model');

		$this->load->helper('debug_helper');
  }
	
	public function index()
	{
		$this->load->library('markdown');
		$data['categories'] = $this->category_model->list();
		$data['posts'] = $this->post_model->listWithAuthor();
		$this->load->view('main_page', $data);
	}

	public function read($id)
	{
		$this->load->library('markdown');

		$post = $this->post_model->show(['id' => $id])->row();

		if($post){
			$post->author  = $this->user_model->show(['id' => $post->author])->row();
			$post->content = $this->markdown->transform($post->content);
		}
		
		$data['categories'] = $this->category_model->list();
		$data['post'] = $post;

		$this->load->view('post/show.php', $data);
	}

	public function create()
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
      redirect('post/create');
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

		// TODO flash data
    if(!$result)
    {
      redirect('post/create');
    }

    redirect('post/create');
	}
}
