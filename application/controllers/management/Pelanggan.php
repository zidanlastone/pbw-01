<?php

class Pelanggan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PelangganModel', 'pelanggan_model');
    $this->load->model('TarifListrikModel', 'tl_model');
    $this->load->helper('debug');

    $this->checkSession('id', '/auth');
  }

  private function checkSession($userdata, $target = '/')
  {
    if (!$this->session->userdata('id')) {
      redirect($target);
    }
    return $this->session->userdata($userdata);
  }

  private function checkNavbar()
  {
    $navbar = 'unauthenticated';
    if ($this->session->userdata('id')) {
      $navbar = 'authenticated';
    }
    return $this->load->view('layout/navbars/' . $navbar, [], true);
  }

  private function layout($view, $data)
  {
    $data['view'] = $view;
    $data['navbar'] = $this->checkNavbar();
    $data['content'] = $this->load->view($view, $data, true);
    return $this->load->view('layout/management', $data);
  }

  private function validationRules($validation = [])
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
    $data['list_tarif_listrik'] = $this->tl_model->list();
    $this->layout('management/pelanggan/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/pelanggan');
    }

    $payload = $this->pelanggan_model->createObject();
    $payload->pelanggan_id = $this->pelanggan_model->createPelangganId();
    $payload->nama_pelanggan = $this->input->post('nama_pelanggan');
    $payload->tarif_listrik_id = $this->input->post('tarif_listrik_id');
    $payload->alamat = $this->input->post('alamat');

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
    $data['list_tarif_listrik'] = $this->tl_model->list();
    $this->layout('management/pelanggan/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/pelanggan');
    }

    $payload = $this->pelanggan_model->createObject();
    $payload->nama_pelanggan = $this->input->post('nama_pelanggan');
    $payload->tarif_listrik_id = $this->input->post('tarif_listrik_id');
    $payload->alamat = $this->input->post('alamat');

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
    $this->layout('management/pelanggan/form', $data);
  }
}