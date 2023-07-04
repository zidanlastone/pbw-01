<?php
abstract class MY_Model extends CI_Model
{
  public $table;

  function __construct()
  {
    parent::__construct();
  }

  public function setTable($table_name)
  {
    $this->table = $table_name;
  }

  private function checkTable()
  {
    if (!$this->table)
      throw new Error("Table not set");
  }

  public function save($payload)
  {
    return $this->db->insert($this->table, $payload);
  }

  public function update($payload, $where = [])
  {
    $this->checkTable();
    return $this->db->where($where)->update($this->table, $payload);
  }

  public function delete($where)
  {
    $this->checkTable();
    // menghapus data pada $table, dengan nilai kolom sama dengan $where
    return $this->db->delete($this->table, $where);
  }

  public function listItems()
  {
    $this->checkTable();
    return $this->db->get($this->table)->result();
  }

  public function show($where)
  {
    return $this->db->get_where($this->table, $where);
  }

  abstract public function createObject();
}