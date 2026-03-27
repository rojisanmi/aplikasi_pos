<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pengguna_model extends CI_Model {

	private $table = 'pengguna';

	public function create($data)
	{
		$this->db->insert('pengguna', $data);
	}

	public function getAllDataPengguna()
	{
		$this->db->where('role', '2');
		return $this->db->get('pengguna');
	}

	public function update($id, $data)
	{
		$this->db->where('id', $id);
		$this->db->update('pengguna', $data);
	}

	public function delete($id)
	{
		$this->db->where('id', $id);
		return $this->db->delete($this->table);
	}

	public function getPengguna($id)
	{
		$this->db->select('id, username, nama, photo_user');
		$this->db->where('id', $id);
		return $this->db->get($this->table);
	}

	public function search($search="")
	{
		$this->db->like('kategori', $search);
		return $this->db->get($this->table)->result();
	}

}

/* End of file Pengguna_model.php */
/* Location: ./application/models/Pengguna_model.php */