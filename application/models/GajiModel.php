<?php

class GajiObject
{
  public $pegawai_id;
  public $gaji;
  public $bulan;
  public $tanggal;
  public $keterangan;
}

class GajiModel extends MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->setTable('tb_gaji');
  }

  public function createObject()
  {
    return new GajiObject();
  }

  public function listWithRelation()
  {
    $this->db->join('tb_pegawai', 'tb_pegawai.id = tb_gaji.pegawai_id');
    $this->db->select('tb_gaji.*, tb_pegawai.nama');
    return $this->db->get($this->table)->result();
  }
}