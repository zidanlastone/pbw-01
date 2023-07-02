<?php


class TagihanObject
{
  public $pelanggan_id;
  public $tahun_tagihan;
  public $bulan_tagihan;
  public $pemakaian;
}

class TagihanModel extends MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->setTable('tb_tagihan');
  }

  public function createObject()
  {
    return new TagihanObject();
  }


  public function listTagihanPelanggan()
  {
    $this->db->join('tb_pelanggan', 'tb_tagihan.pelanggan_id = tb_pelanggan.id');
    $this->db->join('tb_tarif_listrik', 'tb_tarif_listrik.id = tb_pelanggan.tarif_listrik_id');
    $this->db->select('tb_tagihan.*, tb_pelanggan.nama_pelanggan, tb_pelanggan.pelanggan_id, tb_tarif_listrik.tarif_perkwh');
    return $this->db->get($this->table)->result();
  }

}