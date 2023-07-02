<?php

class Tagihan extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('PelangganModel', 'pelanggan_model');
    $this->load->model('TagihanModel', 'tagihan_model');
    // $this->load->model('TarifListrikModel', 'tl_model');
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
    // $data['navbar'] = $this->checkNavbar();
    $data['content'] = $this->load->view($view, $data, true);
    return $this->load->view('layout/management', $data);
  }

  private function validationRules($validation = [])
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
    // $data['list_tarif_listrik'] = $this->tl_model->list();
    $data['list_pelanggan'] = $this->pelanggan_model->list();
    $this->layout('management/tagihan/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/tagihan');
    }

    $payload = $this->tagihan_model->createObject();
    $payload->pelanggan_id = $this->input->post('pelanggan_id');
    $payload->tahun_tagihan = $this->input->post('tahun_tagihan');
    $payload->bulan_tagihan = $this->input->post('bulan_tagihan');
    $payload->pemakaian = $this->input->post('pemakaian');

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
    $data['list_tarif_listrik'] = $this->tl_model->list();
    $this->layout('management/tagihan/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/tagihan');
    }

    $payload = $this->tagihan_model->createObject();
    $payload->pelanggan_id = $this->input->post('pelanggan_id');
    $payload->tahun_tagihan = $this->input->post('tahun_tagihan');
    $payload->bulan_tagihan = $this->input->post('bulan_tagihan');
    $payload->pemakaian = $this->input->post('pemakaian');

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
    $this->layout('management/tagihan/form', $data);
  }
}