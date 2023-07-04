<?php

class Pegawai extends MY_AdminController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PegawaiModel', 'pegawai_model');
    $this->load->model('UserModel', 'user_model');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->pegawai_model->createObject();
    $payload->user_id = $post->user_id;
    $payload->nama = $post->nama;
    $payload->email = $post->email;
    $payload->no_hp = $post->no_hp;
    $payload->alamat = $post->alamat;
    $payload->tempat_lahir = $post->tempat_lahir;
    $payload->tanggal_lahir = $post->tanggal_lahir;
    $payload->jenis_kelamin = $post->jenis_kelamin;
    $payload->status_pernikahan = $post->status_pernikahan;
    $payload->tanggal_gabung = $post->tanggal_gabung;
    $payload->divisi = $post->divisi;
    $payload->jabatan = $post->jabatan;
    $payload->gaji = $post->gaji;
    $payload->status_bekerja = $post->status_bekerja;
    return $payload;
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'user_id', 'label' => 'User', 'rules' => 'required'],
      ['field' => 'nama', 'label' => 'Nama Pegawai', 'rules' => 'required'],
      ['field' => 'email', 'label' => 'Email', 'rules' => 'required'],
      ['field' => 'no_hp', 'label' => 'No HP', 'rules' => 'required'],
      ['field' => 'alamat', 'label' => 'alamat', 'rules' => 'required'],
      ['field' => 'tempat_lahir', 'label' => 'Tempat Lahir', 'rules' => 'required'],
      ['field' => 'tanggal_lahir', 'label' => 'Tanggal Lahir', 'rules' => 'required'],
      ['field' => 'jenis_kelamin', 'label' => 'Jenis Kelamin', 'rules' => 'required'],
      ['field' => 'status_pernikahan', 'label' => 'Status pernikahan', 'rules' => 'required'],
      ['field' => 'tanggal_gabung', 'label' => 'Tanggal Gabung', 'rules' => 'required'],
      ['field' => 'divisi', 'label' => 'Divisi', 'rules' => 'required'],
      ['field' => 'jabatan', 'label' => 'Jabatan', 'rules' => 'required'],
      ['field' => 'gaji', 'label' => 'Gaji', 'rules' => 'required'],
      ['field' => 'status_bekerja', 'label' => 'Status bekerja', 'rules' => 'required'],
    ];

    return array_merge($validation, $default);
  }

  public function index()
  {
    $data['list'] = $this->pegawai_model->listItems();
    $this->layout('management/pegawai/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $data['list_user'] = $this->user_model->listItems();
    $this->layout('management/pegawai/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    // early validation
    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/pegawai');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->pegawai_model->save($payload);

    if (!$result) {
      redirect('management/pegawai');
    }

    redirect('management/pegawai');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->pegawai_model->show(['id' => $id])->row();
    $data['list_user'] = $this->user_model->listItems();
    $this->layout('management/pegawai/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    // early validation
    if ($this->form_validation->run() == FALSE) {
      $errors = validation_errors('<li class="list-group-item list-group-item-danger alert alert-danger" role="alert">', '</li>');
      $this->session->set_flashdata('errors', $errors);
      redirect('management/pegawai');
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->pegawai_model->update($payload, ['id' => $id]);

    if (!$result) {
      redirect('management/pegawai');
    }

    redirect('management/pegawai');
  }

  public function delete($id)
  {
    $result = $this->pegawai_model->delete(['id' => $id]);
    redirect('management/pegawai');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->pegawai_model->show(['id' => $id])->row();
    $this->layout('management/pegawai/form', $data);
  }
}