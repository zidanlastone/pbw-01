<?php

class Tagihan extends MY_AdminController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PelangganModel', 'pelanggan_model');
    $this->load->model('TagihanModel', 'tagihan_model');
    $this->checkSession('id', '/auth');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->tagihan_model->createObject();
    $payload->pelanggan_id = $post->pelanggan_id;
    $payload->tahun_tagihan = $post->tahun_tagihan;
    $payload->bulan_tagihan = $post->bulan_tagihan;
    $payload->pemakaian = $post->pemakaian;
    return $payload;
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'pelanggan_id', 'label' => 'Pelanggan', 'rules' => 'required'],
      ['field' => 'tahun_tagihan', 'label' => 'Tahun Tagihan', 'rules' => 'required|min_length[4]|max_length[4]'],
      ['field' => 'bulan_tagihan', 'label' => 'Bulan Tagihan', 'rules' => 'required|integer'],
      ['field' => 'pemakaian', 'label' => 'Pemakaian Listrik', 'rules' => 'required'],
    ];
    return array_merge($validation, $default);
  }

  public function index()
  {
    $data['list'] = $this->tagihan_model->listTagihanPelanggan();
    $this->layout('management/tagihan/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $data['list_pelanggan'] = $this->pelanggan_model->list();
    $this->layout('management/tagihan/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/tagihan');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->tagihan_model->save($payload);

    // early check
    if (!$result) {
      redirect('management/tagihan');
    }

    redirect('management/tagihan');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->tagihan_model->show(['id' => $id])->row();
    $data['list_pelanggan'] = $this->pelanggan_model->list();
    $this->layout('management/tagihan/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/tagihan');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->tagihan_model->update($payload, ['id' => $id]);
    // early check
    if (!$result) {
      redirect('management/tagihan');
    }

    redirect('management/tagihan');
  }

  public function delete($id)
  {
    $result = $this->tagihan_model->delete(['id' => $id]);
    redirect('management/tagihan');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->tagihan_model->show(['id' => $id])->row();
    $data['list_pelanggan'] = $this->pelanggan_model->list();
    $this->layout('management/tagihan/form', $data);
  }
}