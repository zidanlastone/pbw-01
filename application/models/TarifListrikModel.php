<?php

class TarifListrikObject
{
  public $user_id;
  public $kd_tarif;
  public $beban;
  public $tarif_perkwh;

  function __construct(
    $user_id = '',
    $kd_tarif = '',
    $beban = '',
    $tarif_perkwh = ''
  ) {
    $this->user_id = $user_id;
    $this->kd_tarif = $kd_tarif;
    $this->beban = $beban;
    $this->tarif_perkwh = $tarif_perkwh;
  }
}

class TarifListrikModel extends MY_Model
{
  public function __construct()
  {
    parent::__construct();
    $this->setTable('tb_tarif_listrik');
  }

  public function createObject()
  {
    return new TarifListrikObject();
  }

  public function listTarifWithUser()
  {
    $this->db->join('tb_user', 'tb_user.id = tb_tarif_listrik.user_id');
    $this->db->select('tb_tarif_listrik.*, tb_user.username');
    return $this->db->get($this->table)->result();
  }

}