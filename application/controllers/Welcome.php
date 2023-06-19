<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {


	public function __construct(){
    parent::__construct();
    $this->load->model('PostModel', 'post_model');
    $this->load->model('CategoryModel', 'category_model');
  }
	
	public function index()
	{
		$data['categories'] = $this->category_model->list();
		$data['posts'] = $this->post_model->list();
		$this->load->view('main_page', $data);
	}
}
