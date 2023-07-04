<?php

class Pelanggan extends MY_AdminController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PelangganModel', 'pelanggan_model');
    $this->load->model('TarifListrikModel', 'tl_model');
    $this->checkSession('id', '/auth');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->pelanggan_model->createObject();
    $payload->pelanggan_id = $post->pelanggan_id;
    $payload->nama_pelanggan = $post->nama_pelanggan;
    $payload->tarif_listrik_id = $post->tarif_listrik_id;
    $payload->alamat = $post->alamat;

    return $payload;
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'nama_pelanggan', 'label' => 'Kode Tarif', 'rules' => 'required'],
      ['field' => 'tarif_listrik_id', 'label' => 'Beban', 'rules' => 'required|integer'],
      ['field' => 'alamat', 'label' => 'Alamat Pelanggan', 'rules' => 'required'],
    ];
    return array_merge($validation, $default);
  }

  public function index()
  {
    $data['list'] = $this->pelanggan_model->listPelangganWithTarif();
    $this->layout('management/pelanggan/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $data['list_tarif_listrik'] = $this->tl_model->listItems();
    $this->layout('management/pelanggan/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/pelanggan');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->pelanggan_model->save($payload);

    // early check
    if (!$result) {
      redirect('management/pelanggan');
    }
    redirect('management/pelanggan');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->pelanggan_model->show(['id' => $id])->row();
    $data['list_tarif_listrik'] = $this->tl_model->listItems();
    $this->layout('management/pelanggan/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/pelanggan');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->pelanggan_model->update($payload, ['id' => $id]);
    // early check
    if (!$result) {
      redirect('management/pelanggan');
    }
    redirect('management/pelanggan');
  }

  public function delete($id)
  {
    $result = $this->pelanggan_model->delete(['id' => $id]);
    redirect('management/pelanggan');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->pelanggan_model->show(['id' => $id])->row();
    $data['list_tarif_listrik'] = $this->tl_model->listItems();
    $this->layout('management/pelanggan/form', $data);
  }
}