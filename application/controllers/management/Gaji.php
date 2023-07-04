<?php

class Gaji extends MY_AdminController
{
  protected $viewFolder = 'management/gaji';
  public function __construct()
  {
    parent::__construct();
    $this->load->model('GajiModel', 'gaji_model');
    $this->load->model('PegawaiModel', 'pegawai_model');
    $this->load->model('PresensiModel', 'presensi_model');
  }

  protected function createPayload($input)
  {
    $post = (object) $input; // converting array to object
    $payload = $this->gaji_model->createObject();
    $payload->pegawai_id = $post->pegawai_id;
    $payload->gaji = $post->gaji;
    $payload->bulan = $post->bulan;
    $payload->tanggal = $post->tanggal;
    $payload->keterangan = $post->keterangan;

    return $payload;
  }

  protected function validationRules($validation = [])
  {
    $default = [
      ['field' => 'pegawai_id', 'label' => 'Pegawai', 'rules' => 'required'],
      ['field' => 'gaji', 'label' => 'Nominal Gaji', 'rules' => 'required'],
      ['field' => 'bulan', 'label' => 'Bulan Gajian', 'rules' => 'required'],
      ['field' => 'tanggal', 'label' => 'Tanggal Gajian', 'rules' => 'required'],
      ['field' => 'keterangan', 'label' => 'Keterangan', 'rules' => 'required'],
    ];

    return array_merge($validation, $default);
  }

  public function index()
  {
    $data['list'] = $this->gaji_model->listWithRelation();
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
      redirect($this->viewFolder);
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->gaji_model->save($payload);

    if (!$result) {
      redirect($this->viewFolder);
    }

    redirect($this->viewFolder);
  }

  public function edit($id)
  {
    $data['mode'] = 'edit';
    $data['item'] = $this->gaji_model->show(['id' => $id])->row();
    $data['list_pegawai'] = $this->pegawai_model->listItems();
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
      redirect($this->viewFolder);
    }

    $payload = $this->createPayload($this->input->post());

    $result = $this->gaji_model->update($payload, ['id' => $id]);

    if (!$result) {
      redirect($this->viewFolder);
    }

    redirect($this->viewFolder);
  }

  public function delete($id)
  {
    $result = $this->gaji_model->delete(['id' => $id]);
    redirect($this->viewFolder);
  }

  public function show($id)
  {
    $data['mode'] = 'show';
    $data['item'] = $this->gaji_model->show(['id' => $id])->row();
    $this->layout($this->viewFolder . '/form', $data);
  }

  public function lembur($id)
  {
    $bulan = $this->input->get('bulan');

    $masukLembur = $this->presensi_model->show(['pegawai_id' => $id, 'status_presensi' => 'MASUKLEMBUR'])->result();
    $pulangLembur = $this->presensi_model->show(['pegawai_id' => $id, 'status_presensi' => 'PULANGLEMBUR'])->result();

    $presensiMasuk = $this->presensi_model->show(['pegawai_id' => $id, 'status_presensi' => 'MASUK'])->result();
    $presensiPulang = $this->presensi_model->show(['pegawai_id' => $id, 'status_presensi' => 'PULANG',])->result();

    $jamBekerja = array_sum($this->workTime($presensiMasuk, $presensiPulang));
    $jamLembur = array_sum($this->workTime($masukLembur, $pulangLembur));

    $pegawai = $this->pegawai_model->show(['id' => $id])->row();

    $gajiLembur = 0;
    $gajiTunjangan = 0;
    $LEMBUR = 20000;

    switch ($pegawai->jabatan) {
      case 'satpam':
        $gajiLembur = ($jamLembur * $LEMBUR);
        break;
      case 'sales':
        # code... TODO cari data jumlah pelanggan
        break;
      case 'administrasi':
        $awal = new DateTime($pegawai->tanggal_gabung);
        $now = new DateTime();
        $diff = $now->diff($awal, true);

        if ($diff->y >= 5) {
          $gajiTunjangan = ($pegawai->gaji * 0.03);
        } else if ($diff->y >= 3 && $diff->y < 5) {
          $gajiTunjangan = ($pegawai->gaji * 0.01);
        }

        break;
      case 'manajer':
        # code... TODO cari persentase peningkatan penjulan perbulan
        break;
    }

    return $this->output
      ->set_content_type('application/json')
      ->set_status_header(200)
      ->set_output(
        json_encode([
          // 'pegawai' => $pegawai,
          'jam_kerja' => $jamBekerja,
          'jam_lembur' => $jamLembur,
          'gaji_lembur' => $gajiLembur,
          'gaji_tunjangan' => $gajiTunjangan,
        ])
      );
  }

  private function workTime($dataMasuk, $dataPulang)
  {
    $data = [];
    if (count($dataMasuk) > 0 && count($dataPulang) > 0) {
      foreach ($dataMasuk as $key => $value) {
        $filtered = array_values(array_filter($dataPulang, function ($dp) use ($value) {
          return $dp->tanggal == $value->tanggal;
        }));
        array_push($data, $this->timeDiff($value->jam, $filtered[0]->jam));
      }
    }
    return $data;
  }


  private function timeDiff($firstTime, $lastTime)
  {
    // convert to unix timestamps
    $firstTime = strtotime($firstTime);
    $lastTime = strtotime($lastTime);

    // perform subtraction to get the difference (in seconds) between times
    $timeDiff = $lastTime - $firstTime;

    // return the difference
    return $timeDiff / 3600;
  }
}