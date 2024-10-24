<?php

class M_store Extends CI_Model{

	public function simpan($data)
	{
		$this->db->insert('tbl_toko', $data);
	}

	public function getAllDataToko()
	{
		return $this->db->get('tbl_toko');
	}

	public function update($id_toko, $data)
	{
		$this->db->where('id_toko', $id_toko);
		$this->db->update('tbl_toko', $data);
	}

	public function delete($id_toko)
	{
		$this->db->where('id_toko', $id_toko);
		$this->db->delete('tbl_toko');
	}
}