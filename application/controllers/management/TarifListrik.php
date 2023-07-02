<?php

class TarifListrik extends MY_AdminController
{
  public function __construct()
  {
    parent::__construct();
    $this->load->model('TarifListrikModel', 'tl_model');

    $this->checkSession('id', '/auth');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->tl_model->createObject();
    $payload->beban = $post->beban;
    $payload->user_id = $this->checkSession('id');
    $payload->kd_tarif = $post->kd_tarif;
    $payload->tarif_perkwh = $post->tarif_perkwh;
    return $payload;
  }

  protected function validationRules($validation = [])
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

    $payload = $this->createPayload($this->input->post());

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

    $payload = $this->createPayload($this->input->post());

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