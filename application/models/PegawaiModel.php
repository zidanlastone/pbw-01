<?php

/**
 * json
{
  "user_id": 1,
  "nama": "Zidan",
  "email": "zidanlastone01@gmail.com",
  "no_hp": "083892091230",
  "alamat": "Kp. Kabandungan",
  "tempat_lahir": "Bogor",
  "tanggal_lahir": "2001-06-24",
  "jenis_kelamin": "L",
  "status_pernikahan": "Belum Menikah",
  "tanggal_gabung": "2022-01-01",
  "divisi": "Sales",
  "jabatan": "Manager",
  "gaji": 4800000,
  "status_bekerja": "BEKERJA" // "KARYAWAN|KONTRAK|BERHENTI"
}
 * */

class PegawaiObject
{
  public $user_id;
  public $nama;
  public $email;
  public $no_hp;
  public $alamat;
  public $tempat_lahir;
  public $tanggal_lahir;
  public $jenis_kelamin;
  public $status_pernikahan;
  public $tanggal_gabung;
  public $divisi;
  public $jabatan;
  public $status_bekerja;
}

class PegawaiModel extends MY_Model
{
  function __construct()
  {
    parent::__construct();
    $this->setTable('tb_pegawai');
  }

  public function createObject()
  {
    return new PegawaiObject();
  }
}