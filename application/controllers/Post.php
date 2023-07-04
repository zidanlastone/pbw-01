<?php
defined('BASEPATH') or exit('No direct script access allowed');

interface PostInterface
{
	public function index();
	public function read($id);
	public function create();
	public function store();
	public function edit($id);
	public function update($id);
	public function delete($id);
}

class Post extends CI_Controller implements PostInterface
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('PostModel', 'post_model');
		$this->load->model('CategoryModel', 'category_model');
		$this->load->model('UserModel', 'user_model');
		$this->load->helper('debug_helper');
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
		$data['categories'] = $this->category_model->listItems();
		$data['content'] = $this->load->view($view, $data, true);
		return $this->load->view('layout/main', $data);
	}

	public function index()
	{
		$this->load->library('markdown');
		$data['posts'] = $this->post_model->listWithAuthor();
		$this->layout('post/list', $data);
	}

	public function read($id)
	{
		$this->load->library('markdown');

		$post = $this->post_model->show(['id' => $id])->row();

		if ($post) {
			$post->author = $this->user_model->show(['id' => $post->author])->row();
			$post->content = $this->markdown->transform($post->content);
		}

		$data['post'] = $post;
		$this->layout('post/show', $data);
	}

	public function create()
	{
		$this->checkSession('auth');
		$data['mode'] = 'create';
		$this->layout('post/form', $data);
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
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
			$this->session->set_flashdata('errors', $errors);
			redirect('post/create');
		}

		$payload = [
			'author' => $this->session->userdata('id'),
			'category' => $this->input->post('category'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'publication_date' => $this->input->post('publication_date'),
			'tags' => $this->input->post('tags')
		];

		$result = $this->post_model->save($payload);

		// TODO flash data
		if (!$result) {
			redirect('post/create');
		}

		redirect('/');
	}

	public function edit($id)
	{
		$this->checkSession();
		$data['mode'] = 'edit';
		$data['item'] = $this->post_model->show(['id' => $id])->row();
		$this->layout('post/form', $data);
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
		if ($this->form_validation->run() == FALSE) {
			$errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
			$this->session->set_flashdata('errors', $errors);
			redirect('post/edit');
		}

		$payload = [
			'author' => $this->session->userdata('id'),
			'category' => $this->input->post('category'),
			'title' => $this->input->post('title'),
			'content' => $this->input->post('content'),
			'publication_date' => $this->input->post('publication_date'),
			'tags' => $this->input->post('tags')
		];

		$result = $this->post_model->update($payload, ['id' => $id]);

		// TODO flash data
		if (!$result) {
			redirect('post/edit');
		}

		redirect('/');
	}

	public function delete($id)
	{
		if (isset($_POST['_delete'])) {
			$this->post_model->delete(['id' => $id]);
			redirect('/');
		}
	}

}