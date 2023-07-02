<?php

class PelangganObject
{
  public $tarif_listrik_id;
  public $pelanggan_id;
  public $nama_pelanggan;
  public $alamat;

  function __construct(
    $tarif_listrik_id = '',
    $pelanggan_id = '',
    $nama_pelanggan = '',
    $alamat = ''
  ) {
    $this->tarif_listrik_id = $tarif_listrik_id;
    $this->pelanggan_id = $pelanggan_id;
    $this->nama_pelanggan = $nama_pelanggan;
    $this->alamat = $alamat;
  }
}

class PelangganModel extends MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->setTable('tb_pelanggan');
  }

  public function createObject()
  {
    return new PelangganObject();
  }

  public function listPelangganWithTarif()
  {
    $this->db->join('tb_tarif_listrik', 'tb_tarif_listrik.id = tb_pelanggan.tarif_listrik_id');
    $this->db->select('tb_pelanggan.*, tb_pelanggan.id, tb_tarif_listrik.kd_tarif, tb_tarif_listrik.beban,  tb_tarif_listrik.tarif_perkwh');
    return $this->db->get($this->table)->result();
  }

  public function createPelangganId()
  {
    $date = date('ymd');
    $this->db->select('pelanggan_id');
    $this->db->from($this->table);
    $this->db->like('pelanggan_id', "P" . $date);

    $count = $this->db->count_all_results();

    $this->db->order_by('created_at');

    $number = '0000';

    if ($count > 1) {
      $last = $this->db
        ->order_by('created_at', 'DESC')
        ->get($this->table)->last_row();
      $suffix = substr($last->pelanggan_id, -4);
      $newsuffix = intval($suffix) + 1;
      $number = str_pad($newsuffix, 4, 0, STR_PAD_LEFT);
    }

    $postnumber = str_pad($number, 4, 0, STR_PAD_LEFT);

    return "P" . $date . '-' . $postnumber;
  }

}