<?php

class TarifListrik extends CI_Controller
{
  public function __construct()
  {
    parent::__construct();
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
      ['field' => 'kd_tarif', 'label' => 'Kode Tarif', 'rules' => 'required'],
      ['field' => 'beban', 'label' => 'Beban', 'rules' => 'required|integer'],
      ['field' => 'tarif_perkwh', 'label' => 'Tarif Per Kwh', 'rules' => 'required|integer'],
    ];
    return array_merge($validation, $default);
  }

  public function index()
  {
    $data['list'] = $this->tl_model->listTarifWithUser();
    $this->layout('management/tarif-listrik/index', $data);
  }

  public function create()
  {
    $data['mode'] = 'create';
    $this->layout('management/tarif-listrik/form', $data);
  }

  public function store()
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/tarif-listrik');
    }

    $payload = $this->tl_model->createObject();
    $payload->beban = $this->input->post('beban');
    $payload->user_id = $this->checkSession('id');
    $payload->kd_tarif = $this->input->post('kd_tarif');
    $payload->tarif_perkwh = $this->input->post('tarif_perkwh');

    $result = $this->tl_model->save($payload);

    // early check
    if (!$result) {
      redirect('management/tarif-listrik');
    }

    redirect('management/tarif-listrik');
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->tl_model->show(['id' => $id])->row();
    $this->layout('management/tarif-listrik/form', $data);
  }

  public function update($id)
  {
    $this->load->library('form_validation');
    $this->form_validation->set_rules($this->validationRules());

    if ($this->form_validation->run() == FALSE) {
      redirect('management/tarif-listrik');
    }

    $payload = $this->tl_model->createObject();

    $payload->beban = $this->input->post('beban');
    $payload->user_id = $this->checkSession('id');
    $payload->kd_tarif = $this->input->post('kd_tarif');
    $payload->tarif_perkwh = $this->input->post('tarif_perkwh');

    $result = $this->tl_model->update($payload, ['id' => $id]);
    // early check
    if (!$result) {
      redirect('management/tarif-listrik');
    }

    redirect('management/tarif-listrik');
  }

  public function delete($id)
  {
    $result = $this->tl_model->delete(['id' => $id]);
    redirect('management/tarif-listrik');
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->tl_model->show(['id' => $id])->row();
    $this->layout('management/tarif-listrik/form', $data);
  }
}