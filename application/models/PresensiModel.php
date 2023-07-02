<?php

/**
 * ```json
{
  "pegawai_id": 1,
  "status_presensi": "MASUK", // "MASUK|PULANG|MASUKLEMBUR|PULANGLEMBUR"
  "tanggal": "2023-06-01",
  "jam": "07:00",
  "bukti": "https://image"
}
```
 */

class PresensiObject
{
  public $pegawai_id;
  public $status_presensi;
  public $tanggal;
  public $jam;
  public $bukti;
}

class PresensiModel extends MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->setTable('tb_presensi');
  }

  public function createObject()
  {
    return new PresensiObject();
  }
}