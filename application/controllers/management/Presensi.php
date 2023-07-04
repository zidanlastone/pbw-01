<?php

class Presensi extends MY_AdminController
{

  protected $viewFolder = 'management/presensi';
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PresensiModel', 'presensi_model');
    $this->load->model('PegawaiModel', 'pegawai_model');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->presensi_model->createObject();
    $payload->pegawai_id = $post->pegawai_id;
    $payload->status_presensi = $post->status_presensi;
    $payload->tanggal = $post->tanggal;
    $payload->jam = $post->jam;
    $payload->bukti = $post->bukti;
    return $payload;
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'pegawai_id', 'label' => 'Pegawai', 'rules' => 'required'],
      ['field' => 'status_presensi', 'label' => 'Status Presensi', 'rules' => 'required'],
      ['field' => 'tanggal', 'label' => 'Tanggal', 'rules' => 'required'],
      ['field' => 'jam', 'label' => 'Jam', 'rules' => 'required'],
      ['field' => 'bukti', 'label' => 'Bukti', 'rules' => 'required'],
    ];

    return array_merge($validation, $default);
  }

  public function index()
  {
    $data['list'] = $this->presensi_model->listPresensiPegawai();
    $this->layout($this->viewFolder . '/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $data['list_pegawai'] = $this->pegawai_model->listItems();
    $this->layout($this->viewFolder . '/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    // early validation
    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/presensi');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->presensi_model->save($payload);

    if (!$result) {
      redirect('management/presensi');
    }

    redirect('management/presensi');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->presensi_model->show(['id' => $id])->row();
    $this->layout($this->viewFolder . '/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    // early validation
    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/presensi');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->presensi_model->update($payload, ['id' => $id]);

    if (!$result) {
      redirect('management/presensi');
    }

    redirect('management/presensi');
  }

  public function delete($id)
  {
    $result = $this->presensi_model->delete(['id' => $id]);
    redirect('management/presensi');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->presensi_model->show(['id' => $id])->row();
    $this->layout($this->viewFolder . '/form', $data);
  }
}